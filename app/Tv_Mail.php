<?php
/**
 * Tv_Mail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * メール配送クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Mail extends Mail
{
	/* @var    array     メールエンコード配列*/
	var $mail_enc;
	/* @var    object    メールオブジェクト */
	var $mail;
	/* @var    object    バックエンドオブジェクト */
	var $backend;
	/* @var    object    コンフィグオブジェクト */
	var $config;
	/* @var    object    ユーティリティマネージャオブジェクト */
	var $um;
	/* @var    string    メールドライバ */
	var $driver;
	
	/**
	 * Tv_Mailクラスのコンストラクタ
	 */
	function Tv_Mail($backend, $driver='mail', $params=array())
	{
		// メールドライバ
		$this->driver = $driver;
		
		// バックエンドオブジェクトを取得
		$this->backend = $backend;
		
		// コンフィグオブジェクトを取得
		$this->config = $backend->getConfig();
		
		// ユーティリティマネージャオブジェクトを取得
		$this->um = $backend->getManager('Util');
		
		// ドライバー別にベースのオブジェクトを生成
		// （現在は強制的にSMTPへ上書き中）
		$driver = 'smtp';
		$params = $this->config->get('mail_smtp');
		
		$obj = parent::factory($driver, $params);
		$this->mail = $obj;
		// メールヘッダーのセパレータ文字列の変更（ベースは「\r\n」）
		$this->sep = "\n";
		
		// メール用エンコード配列をセット
		$this->setMailEnc();
	}
	
	/**
	 * メール用エンコード配列をセット
	 */
	 function setMailEnc()
	 {
		$this->mail_enc = array(
			// DOCOMO用エンコード配列
			'DOCOMO' => array(
				'head_charset'		=> 'ISO-2022-JP',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// AU用エンコード配列
			'AU' => array(
				'head_charset'		=> 'ISO-2022-JP',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// SOFTBANK用エンコード配列
			'SOFTBANK' => array(
				'head_charset'		=> 'Shift_JIS',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// PC用エンコード配列
			'PC' => array(
				'head_charset'		=> 'ISO-2022-JP',
				'text_charset'		=> 'ISO-2022-JP',
				'html_charset'		=> 'ISO-2022-JP',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'JIS',
				'text_enc'			=> 'JIS',
				'html_enc'			=> 'JIS',
			),
		);
		return true;
	 }
	 
	/**
	 * 署名付きメールアドレスを生成する
	 */
	function getSignature($signature, $from)
	{
		return '=?ISO-2022-JP?B?' . base64_encode(mb_convert_encoding($signature, 'ISO-2022-JP', 'EUC-JP')) . '?=<' . $from . '>';
	}
	
	/**
	 * 件名を生成する
	 */
	function getSubject($subject, $carrier, $enc)
	{
		// 途中まで本文と同じエンコードなので共通化
		$subject = $this->getBody($subject, $carrier, $enc);
		
		// ここでmime_headerしてしまうと絵文字をこわされてしまうため、独自にMIMEエンコーディングする
		$subject = '=?' . $enc['head_charset'] . '?B?' . base64_encode($subject) . '?=';
		
		return $subject;
	}
	
	/**
	 * 本文を生成する
	 */
	function getBody($body, $carrier, $enc)
	{
	 	 // キャリア別メール絵文字変換を行う
		$body = $GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($body,'SJIS','EUC-JP'), $carrier);
		// 送信文字コードがSJISでない場合のみさらにエンコードする
		if($enc['head_enc'] != 'SJIS'){
			$body = mb_convert_encoding($body, $enc['head_enc'], 'SJIS');
		}
		
		return $body;
	}
	
	/**
	 * HTMLからテキストメール本文を生成する
	 */
	function getTextFromHtml($body_html)
	{
		$body_text = strip_tags(
			str_replace('<br>', "\n", 
			preg_replace('/(src=")(.*?)(".*?><br>)/', '$1$2$3', 
			str_replace('\r\n', '', 
			str_replace('&nbsp;', ' ', 
			$body_html
			)
			)
			)
			)
		);
		return $body_text;
	}
	
	/**
	 * 一通送信用関数
	 * @param
	 *    mailaddress  送信先メールアドレス
	 *    template     メールテンプレート名
	 *    values       テンプレートに割り当てる変数配列
	 */
	function sendOne($to, $template_name='', $values=array())
	{
		// テンプレートモードの場合
		if($template_name != ''){
			// メールテンプレート取得
			$mt = new Tv_MailTemplate($this->backend, array('mail_template_code','mail_template_status'), array($template_name, 1));
			// サブジェクト
			$subject = $mt->get('mail_template_title');
			// 本文
			$body = $mt->get('mail_template_body');
		}
		// 直接配信モードの場合
		else{
			// サブジェクト
			$subject = $values['Subject'];
			// 本文
			$body = $values['Body'];
		}
		// メール送信元メールアドレス
		$from = $this->config->get('from_mailaddress');
		// 署名がある場合は付与する
		if(array_key_exists('Signature', $values)){
			$from = $this->getSignature($values['Signature'], $from);
		}
		
		// メール文章生成
		$carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($to);
		// メール配送キャリアのメールエンコード配列の取得
		$enc = $this->mail_enc[$carrier];
		
		// 件名のタグ置換
		$subject = $this->replaceTags($subject, $values);
		// 本文のタグ置換
		$body = $this->replaceTags($body, $values);
		
		// 件名MIME形式変換
		$subject = $this->getSubject($subject, $carrier, $enc);
		// 本文MIME形式変換
		$body = $this->getBody($body, $carrier, $enc);
		
		// MIME
		$mimeObject = new Tv_MailMime("\n");
		// 本文を取得
		$mimeObject->setTXTBody($body);
		$body = $mimeObject->get($enc);
		// 改行コードを整える
		$body = str_replace("\r\n", "\n", $body);
		// ヘッダーを取得
		$header_params = array(
			'From'		=> $from,
			'Subject'	=> $subject,
			"To"		=> $to,
		);
		$headers = $mimeObject->headers($header_params);
		
		// メール送信
		return parent::send($to, $headers, $body);
	}
	
	
	/**
	 * 複数通送信用関数
	 * @param
	 *    user_list        ユーザリスト
	 *    user_mailaddress メールアドレス
	 *    user_hash        ユーザハッシュ
	 *    user_nickname    ニックネーム
	 *    user_point       ユーザポイント
	 *    magazine メルマガ情報
	 *      subject           件名
	 *      signature         署名
	 *      body_text         テキスト本文
	 *      body_html_status  HTMLメール使用ステータス（0:無効、1:有効）
	 *      body_html         HTML本文
	 */
	function sendAll($user_list=array(), $m=array())
	{
		// 基本情報の準備
		$cut = $this->config->get('tag_cut');
		$error_mailaccount = $this->config->get('error_mailaccount');
		$mail_domain = $this->config->get('mail_domain');
		$mime_types = $this->config->get('mime_types');
		$admin_file_path = $this->config->get('admin_file_path');
		$ctl = $this->backend->getController();
		$tmp_path = $ctl->getDirectory('tmp');
		
		// メルマガ情報ストア
		$lock_file = $m['lock_file'];
		$subject = $m['subject'];
		$signature = $m['signature'];
		$body_text = $m['body_text'];
		$body_html = $m['body_html'];
		$body_html_status = $m['body_html_status'];
		
		// FROMメールアドレス
		$from = $this->config->get('magazine_mailaddress');
		// 署名がある場合は付与する
		if($signature){
			$from = $this->getSignature($signature, $from);
		}
		
		$tags = array();
		// 基本設定情報タグセット
		$o =& new Tv_Config($this->backend,'config_type','config');
		foreach($o->getNameObject() as $k => $v){
			$tags[$k] = mb_convert_encoding($v,$enc['html_enc'],'EUC-JP');
		}
		// タイトルを先に変換しておく
		$subject = $this->replaceTags($subject,$tags);
			
		// メールマガジン準備
		$magazine = array();
		$carrier_list = array('DOCOMO', 'AU', 'SOFTBANK', 'PC');
		foreach($carrier_list as $carrier){
			// エンコード取得
			$enc = $this->mail_enc[$carrier];
			// 件名生成
			$magazine[$carrier]['Subject'] = $this->getSubject($subject, $carrier, $enc);
			// TEXT本文生成
			$magazine[$carrier]['BodyText'] = $this->getBody($body_text, $carrier, $enc);
			// HTML本文生成
			if($body_html_status){
				$magazine[$carrier]['BodyHtml'] = $this->getBody($body_html, $carrier, $enc);
			}
		}
		
		// すべてのユーザに対してメール送信
		foreach($user_list as $k => $u){
			// 配送停止信号がないか確認する
			if(is_file("{$tmp_path}/.{$lock_file}")){
				return $k;
			}
			
			// システム用メールアドレス生成
			$error_mailaddress = $error_mailaccount . '_' . $u['user_hash'] . '@' . $mail_domain;
			
			// メール情報の選択
			$user_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($u['user_mailaddress']);
			$enc = $this->mail_enc[$user_carrier];
			$send_subject = $magazine[$user_carrier]['Subject'];
			$send_body_text = $magazine[$user_carrier]['BodyText'];
			if($body_html_status){
				$send_body_html = $magazine[$user_carrier]['BodyHtml'];
			}
			
			// 変換するタグの準備
			$select = array();
			$replace = array();
			$tags = array();
			// 基本設定情報タグセット
			$o =& new Tv_Config($this->backend,'config_type','config');
			foreach($o->getNameObject() as $k => $v){
				$tags[$k] = mb_convert_encoding($v,$enc['html_enc'],'EUC-JP');
			}
			
			$value = array(
				'user_nickname'	=> mb_convert_encoding($u['user_nickname'],$enc['html_enc'],'EUC-JP'),
				'user_point'	=> $u['user_point'],
			);
			$tags = array_merge($tags, $value);
			foreach($tags as $k => $v){
				if(!$k) continue;
				$select[] = $cut . $k . $cut;
				$replace[] = $v;
			}
			
			// タグの変換
			$send_body_text = str_replace($select, $replace, $send_body_text);
			$send_body_html = str_replace($select, $replace, $send_body_html);
			
			// 広告タグの変換
			$send_body_text = $this->um->replaceAdTag($send_body_text, $u['user_hash']);
			$send_body_html = $this->um->replaceAdTag($send_body_html, $u['user_hash']);
			
			// MIME
			$mimeObject = new Tv_MailMime("\n");
			
			// HTMLメールを使用する場合
			if($body_html_status){
				// 画像タグを検出
				$pattern = '/(src=")(.*?)(".*?>)/';
				$replace = '$1[tag_img]$2[/tag_img]$3';
				$send_body_html = preg_replace($pattern,$replace,$send_body_html);
				$img = $this->um->between('[tag_img]','[/tag_img]',$send_body_html);
				$img_pattern = array();
				$img_url = array();
				// 画像URLを生成
				foreach($img as $k => $v){
					// 画像変換パターンの整備
					$img_pattern[] = '[tag_img]' . $v . '[/tag_img]';
					// 拡張子の取得
					list($pre, $ext) = $this->um->extractName($v);
					// マイムタイプの取得
					$mime_type = $mime_types[$ext];
					// URLの場合
					if($f = file_get_contents($v)){
						$img_url[] = $v;
						// データを投入
						$r = $mimeObject->addHTMLImage($f, $mime_type, $v, false);
					}
					// 管理画面上のファイルの場合
					else{
						$img_url[] = $admin_file_path . preg_replace('/^\//', '', $v);
						// パスを投入
						$r = $mimeObject->addHTMLImage($img_path, $mime_type);
					}
				}
				$send_body_html = str_replace($img_pattern, $img_url, $send_body_html);
				$send_body_html = "<html><head><meta http-equiv='Content-Type' Content='text/html;charset=" . $enc['html_charset'] . "'></head>" . $send_body_html . "</html>";
				
				// MIMEオブジェクトにHTML本文をセット
				$mimeObject->setHTMLBody($send_body_html);
				
				// HTMLメールだけれどもTEXTがない場合はHTMLから自動生成する
				// ここは大本のメールマガジンデータを参照する
				if($body_text == ""){
					$send_body_text = $this->getTextFromHtml($send_body_html);
				}
			}
			// MIMEオブジェクトにHTML本文をセット
			$mimeObject->setTXTBody($send_body_text);
			
			// 本文を取得
			$send_body = $mimeObject->get($enc);
			// 改行コードを整える（これをやららないとDOCOMOでインライン画像を表示してくれなかった）
			$send_body = str_replace("\r\n", "\n", $send_body);
			
			// ヘッダー情報を追加
			$header_params = array(
				'From'		=> $from,
				"Subject"	=> $send_subject,
				"Return-Path"	=> $error_mailaddress,
				"To"		=> $u['user_mailaddress'],
			);
			$headers = $mimeObject->headers($header_params);
			
			// メール送信
			$this->mail->send($u['user_mailaddress'], $headers, $send_body);
			
			// SMTP以外はスリープ
			if($this->driver != 'smtp'){
				// 300mSec wait
				usleep(300000);
			}
		}
		
		// 配送完了
		return count($user_list);
	}
	
	/**
	 * タグの置換を行う
	 * @param string  $string
	 * @param array   $values
	 * @return string $string (タグ置換されたテキスト)
	 */
	function replaceTags($string, $values=array())
	{
		// 変換するタグの準備
		$tags = array();
		$select = array();
		$replace = array();
		$cut = $this->config->get('tag_cut');
		
		// 基本設定情報タグセット
		$o =& new Tv_Config($this->backend,'config_type','config');
		$tags = array_merge($tags, $o->getNameObject());
		
		// 今回のメールで使用する情報セット
		$tags = array_merge($tags, $values);
		
		// ログインURL
		$select[] = "{$cut}login_url{$cut}";
		$replace[] = $this->config->get('login_url');
		
		// お問い合わせメールアドレス
		$select[] = "{$cut}support_mailaddress{$cut}";
		$replace[] = $this->config->get('support_mailaddress');
		
		// 管理社メールアドレス
		$select[] = "{$cut}admin_mailaddress{$cut}";
		$replace[] = $this->config->get('admin_mailaddress');
		
		// ユーザサイトURL
		$select[] = "{$cut}user_url{$cut}";
		$replace[] = $this->config->get('user_url');
		
		// 会員登録用URL
		$select[] = "{$cut}regist_url{$cut}";
		$replace[] = $this->config->get('regist_url') . "&user_hash=" . $value['user_hash'];
		
		// その他のタグ
		foreach($tags as $k => $v){
			if(!$k) continue;
			$select[] = $cut . $k . $cut;
			$replace[] = $v;
		}
		
		//   ##foreach[項目]##
		//   ##/foreach[項目]##
		// 繰り返し処理を行う必要があるか判定
		if(preg_match_all("/{$cut}\/foreach\[(.*)\]{$cut}/", $string, $r)){
			// 結果が配列の場合処理を行う（タグは1番地に格納されている）
			if(is_array($r) && count($r[1]) > 0){
				// すべてのタグに対して処理を行う
				foreach($r[1] as $k => $v){
					// 各行の1番地が目的のタグ
					$_item = $v;
					// 目的のタグが検出されなかった場合は次へ
					if(!$_item) continue;
					// 繰り返し処理開始のタグ
					$_loop_start = "{$cut}foreach[{$_item}]{$cut}";
					// 繰り返し処理終了のタグ
					$_loop_end = "{$cut}/foreach[{$_item}]{$cut}";
					// 置換対象の値が存在する場合
					if(array_key_exists($_item, $values)){
						// 繰り返し処理開始タグから終了タグまでの文字列を取得する
						$_strings = $this->um->between($_loop_start, $_loop_end, $string);
						// すべての繰り返し置換対象文字列に対して処理を行う
						foreach($_strings as $_string){
							// 繰り返し処理を行う対象の文字列が存在する場合
							if($_string){
								// 各行の値で置換された文字列を繋げた足した文字列
								$__string = "";
								// すべての置換対象の値に対して処理を行う
								foreach($values[$_item] as $j => $l){
									// 各行の値に対して置換する準備を行う
									$_select  = array();
									$_replace = array();
									// 各行すべての値に対して処理を行う
									foreach($l as $x => $y){
										// 置換対象
										$_select[]  = $cut . $x . $cut;
										// 割り当てる値
										$_replace[] = $y;
										// デバックログ
										$this->um->trace($x . ' - '. $y );
									}
									// 各行の繰り返し処理対象文字列を置き換え
									$__string .= str_replace($_select, $_replace, $_string);
								}
								// 完成した繰り返し処理対象文字列を置換する
								$string = str_replace($_string, $__string, $string);
							}
						}
					}
					// 改行付きの繰り返し処理検出用タグを消す
					$string = str_replace(array("\n".$_loop_start, $_loop_end) ,array('', ''), $string);
					// 繰り返し処理検出用タグを消す
					$string = str_replace(array($_loop_start, $_loop_end) ,array('', ''), $string);
				}
			}
		}
		
		//   ##if[項目]##
		//   ##/if[項目]##
		// 仮定処理を行う必要があるか判定
		if(preg_match_all("/{$cut}\/if\[(.*)\]{$cut}/", $string, $r)){
			// 結果が配列の場合処理を行う（タグは1番地に格納されている）
			if(is_array($r) && count($r[1]) > 0){
				// すべてのタグに対して処理を行う
				foreach($r[1] as $k => $v){
					// 各行の1番地が目的のタグ
					$_item = $v;
					// 目的のタグが検出されなかった場合は次へ
					if(!$_item) continue;
					// 仮定処理開始のタグ
					$_if_start = "{$cut}if[{$_item}]{$cut}";
					// 仮定処理終了のタグ
					$_if_end = "{$cut}/if[{$_item}]{$cut}";
					// 仮定処理開始タグから終了タグまでの文字列を取得する
					$_strings = $this->um->between($_if_start, $_if_end, $string);
					// 置換対象の値が存在しない場合
					if(!$values[$_item]){
						// すべての仮定置換対象文字列に対して処理を行う
						foreach($_strings as $_string){
							// 仮定処理を行う対象の文字列が存在する場合
							if($_string){
								// 仮定処理対象文字列を空文字列で置換する
								$string = str_replace($_string, '', $string);
							}
						}
					}
					// 改行付きの仮定処理検出用タグを消す
					$string = str_replace(array("\n".$_if_start, $_if_end) ,array('', ''), $string);
					// 仮定処理検出用タグを消す
					$string = str_replace(array($_if_start, $_if_end) ,array('', ''), $string);
				}
			}
		}
		
		// タグの変換
		$string = str_replace($select, $replace, $string);
		
		// 広告タグの変換
		$string = $this->um->replaceAdTag($string, $values['user_hash']);
		
		return $string;
	}
}
?>
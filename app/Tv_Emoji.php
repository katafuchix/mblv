<?php
/**
 *  Tv_Emoji.php
 *
 *  @author	 Kazuya Fujimori <fujimori@technovarth.co.jp>
 */

// {{{ Tv_Emoji
/**
 *  絵文字変換クラス
 *
 *  @author	 Kazuya Fujimori <fujimori@technovarth.co.jp>
 *  @access	 public
 *  @package	Tv
 */
// [au.dat]		絵文字No	絵文字名	絵文字ファイル	S-JISコード(16進数)	S-JISコード(10進数)	Webコード	Unicode		メール用コード	
// [docomo.dat]	絵文字No	絵文字名	絵文字ファイル	S-JISコード(16進数)	S-JISコード(10進数)	Webコード	Unicode	カラー	
// [emoji.dat]		関連付けNo	スクリプト用コード	DoCoMo絵文字No	Vodafone絵文字No	au絵文字No	優先順位	
// [softbank.dat]	絵文字No	絵文字名	絵文字ファイル	S-JISコード(16進数)	MAILコード(16進数)	Webコード	Unicode		UTF-8用コード	
class Tv_Emoji 
{
	/**#@+
	 *  @access private
	 */
	var $config;
	var $carrier;
	var $to_carrier;
	var $geta = '〓';
	
	/**
	 *  Tv_Emojiクラスのコンストラクタ
	 *
	 *  @access     public
	 *  @param  object	 設定オブジェクト
	 */
	function Tv_Emoji (&$config)
	{
		// 基本オブジェクトの設定
		$this->config = $config;
		// 機種情報の設定
		$this->set_device_data();
		// 絵文字データの展開
		$this->set_emoji_data();
	}
	
	/**
	 *  機種情報の設定
	 *
	 *  @access     public
	 *  @param
	 */
	function set_device_data()
	{
		if(array_key_exists('HTTP_USER_AGENT',$_SERVER)){
			$ua = $_SERVER['HTTP_USER_AGENT'];
			if(strstr($ua,'DoCoMo')){
				$this->carrier = 'DOCOMO';
			}elseif(strstr($ua,'J-PHONE') || strstr($ua,'Vodafone') || strstr($ua, 'SoftBank') || strstr($ua, 'MOT')){
				$this->carrier = 'SOFTBANK';
			}elseif(strstr($ua,'UP.Browser') || strstr($ua,'KDDI')){
				$this->carrier = 'AU';
			}else{
				$this->carrier = 'PC';
			}
		}else{
			$this->carrier = 'PC';
		}
	}
	
	/**
	 *  メールアドレスキャリア判別
	 *
	 *  @access     public
	 *  @param texting メールアドレス
	 */
	function get_mailaddress_carrier($mail_address)
	{
		if(preg_match('/^(.+?)\@(.*)docomo(.+)$/',$mail_address)){
			return 'DOCOMO';
		}elseif(preg_match('/^(.+?)\@(.*)vodafone(.+)$/',$mail_address) or preg_match('/^(.+?)\@softbank(.+)$/',$mail_address) or preg_match('/^(.+?)\@disney(.+)$/',$mail_address)){
			return 'SOFTBANK';
		}elseif(preg_match('/^(.+?)\@(.*)ezweb(.+)$/',$mail_address)){
			return 'AU';
		}else{
			return 'PC';
		}
	}
	
	/**
	 *  絵文字データ展開
	 *
	 *  @access     public
	 *  @param
	 */
	function set_emoji_data()
	{
		// 絵文字用URLの決定
		$this->emoji_url = $this->config->get('emoji_url');
		// SSL対応
		if(array_key_exists('HTTPS', $_SERVER)){
			$this->emoji_url = preg_replace('/^http:/', 'https:', $this->emoji_url);
		}
		
		// 基本DB読込み
		$emoji_file = array('emoji','docomo','softbank','au','softbank');
		foreach($emoji_file as $v){
			if(file_exists($this->config->get('emoji_path').'/'.$v.'.dat')){
				$this->$v = file($this->config->get('emoji_path').'/'.$v.'.dat');
			}
		}
		
		// 変換対応データ準備
		$trans_d2s = array();
		$trans_d2a = array();
		$trans_s2d = array();
		$trans_s2a = array();
		$trans_a2d = array();
		$trans_a2s = array();
		foreach ($this->emoji as $v){
			if(empty($v)) break;
			list($e_number,$e_name,$d_number,$s_number,$a_number,$primary_number) = explode("\t", $v);
			// 各キャリア間変換
			$trans_d2s[$d_number] = $s_number;
			$trans_d2a[$d_number] = $a_number;
			$trans_s2d[$s_number] = $d_number;
			$trans_s2a[$s_number] = $a_number;
			$trans_a2d[$a_number] = $d_number;
			$trans_a2s[$a_number] = $s_number;
			
			// 各キャリアと中間コードの変換
			$trans_d2e[$d_number] = $e_number;
			$trans_s2e[$s_number] = $e_number;
			$trans_a2e[$a_number] = $e_number;
			$trans_e2d[$e_number] = $d_number;
			$trans_e2s[$e_number] = $s_number;
			$trans_e2a[$e_number] = $a_number;
			
			//絵文字がない場合の文字列
			$this->decode['emoji_str:'.$e_number] = $e_name;
		}
		
		// SOFTBANKエンコード/デコード用配列展開
		foreach($this->softbank as $v){
			if(empty($v)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni,$eutf8) = explode("\t",$v);
			if(array_key_exists($eno, $trans_s2e)){
				// エンコード用展開
				$this->decode[$eweb]  = '[x:'.$trans_s2e[$eno].']';
				// UTF8用コード
				$decdt = hexdec(substr($eutf8,2));
				$this->softbank_3g_n[$decdt] = $trans_s2e[$eno];
				// デコード用展開
//				$this->decode['s:'.$trans_s2e[$eno]] = $eweb;
				$this->decode['s:'.$trans_s2e[$eno]] = '&#x'.$euni.';';
				// 画像用展開
				// 上書きする
//				if(!array_key_exists('e:'.$trans_s2e[$eno], $this->decode)){
					$this->decode['e:'.$trans_s2e[$eno]] = '<img src="'.$this->emoji_url.$efile.'" border="0" align="center" style="vertical-align: middle">';
//				}
				// メール用展開
				$this->decode['sm:'.$trans_s2e[$eno]] = pack('H*',$esjis10);
			}
		}
		// AUエンコード/デコード用配列展開
		foreach ($this->au as $v){
			if(empty($v)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni,$esjis16m) = explode("\t",$v);
			//echo "$eno:$ename<br>";
			$esjis10 = preg_replace('/\s/','',$esjis10);
			if(array_key_exists($eno, $trans_a2e)){
				// エンコード用展開
				$this->decode[$esjis10] = '[x:'.$trans_a2e[$eno].']';
				// デコード用展開
//				$this->decode['a:'.$trans_a2e[$eno]] = '&#'.$esjis10.';';
				$this->decode['a:'.$trans_a2e[$eno]] = pack('H*',$esjis16);
				// 画像用展開
				// 上書きする
//				if(array_key_exists('e:'.$trans_a2e[$eno], $this->decode)){
					$this->decode['e:'.$trans_a2e[$eno]] = '<img src="'.$this->emoji_url.$efile.'" border="0" align="center" style="vertical-align: middle">';
//				}
				// メール用展開
				$this->decode['am:'.$trans_a2e[$eno]] = pack('H*',$esjis16);
			}
		}
		// DOCOMOエンコード/デコード用配列展開
		foreach ($this->docomo as $v){
			if(empty($v)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni,$color) = explode("\t",$v);
			$esjis10 = preg_replace('/\s/','',$esjis10);
			if(array_key_exists($eno, $trans_d2e)){
				// エンコード用展開(SJIS)
				$this->decode[$esjis10] = '[x:'.$trans_d2e[$eno].']';
				// エンコード用展開(Unicode)
				$this->decode[$euni] = '[x:'.$trans_d2e[$eno].']';
				// 画像用展開
				// 上書きする
//				if(!array_key_exists('e:'.$trans_d2e[$eno], $this->decode)){
					$this->decode['e:'.$trans_d2e[$eno]] = '<img src="'.$this->emoji_url.$efile.'" border="0" align="center" style="vertical-align: middle">';
//				}
				// デコード用展開
				if($eno >= 1000){
					// Unicode
					$this->decode['d:'.$trans_d2e[$eno]] = '<span style="color:'.$color.'">&#x'.$euni.';</span>';
					$this->decode['df:'.$trans_d2e[$eno]] = '&#x'.$euni.';';
				}else{
					// SJIS
					$this->decode['d:'.$trans_d2e[$eno]] = '<span style="color:'.$color.'">&#x'.$euni.';</span>';
					$this->decode['df:'.$trans_d2e[$eno]] = '&#x'.$euni.';';
				}
				// メール用展開
				$this->decode['dm:'.$trans_d2e[$eno]] = pack('H4',dechex($esjis10));
				// PC絵文字入力補助用展開
				$this->input_support[$trans_d2e[$eno]] = $efile;
			}
		}
	}
	
	/**
	 *  絵文字コードエンコード（バイナリコード=>中間コード）
	 *
	 *  @access     public
	 *  @param
	 */
	function emoji_encode($text)
	{
		if($this->carrier == 'DOCOMO'){
		// DOCOMO絵文字エンコード
			$text = $this->replace_emoji_docomo($text);
		}elseif($this->carrier == 'AU'){
		// AU絵文字エンコード
			$text = $this->replace_emoji_au($text);
		}elseif($this->carrier == 'SOFTBANK'){
		// SOFTBANK絵文字エンコード
			$text = $this->replace_emoji_softbank($text);
		}
		return $text;
	 }
	
	
	/**
	 *  通常絵文字コードデコード
	 *
	 *  @access     public
	 *  @param
	 */
	function emoji_decode($text,$type)
	{
		if(count($this->decode) > 0){
			// 通常絵文字コードデコード
			while (preg_match('/\[(x:)(\d{4})\]/', $text, $match)){
				if($type=='WEB'){
					if($this->carrier == 'DOCOMO'){
						$prefix = "d:";
					}elseif($this->carrier == 'SOFTBANK'){
						$prefix = "s:";
					}elseif($this->carrier == 'AU'){
						$prefix = "a:";
					}else{
						$prefix = "e:";
					}
				}elseif($type=='FORM'){
					if($this->carrier == 'DOCOMO'){
						$prefix = "df:";
					}elseif($this->carrier == 'SOFTBANK'){
						$prefix = "s:";
					}elseif($this->carrier == 'AU'){
						$prefix = "a:";
					}else{
						$prefix = "e:";
					}
				}
				
				$select = quotemeta($match[1]).quotemeta($match[2]);//quotemeta:メタ文字をクォートする
				
				//絵文字なし：なければ[文字列]にする
				//絵文字なし：なければ画像にする
				if(is_null($this->decode[$prefix.$match[2]])){
					$prefix = 'e:';
					if($this->carrier == 'DOCOMO'){
						$this->decode[$prefix.$match[2]] = mb_convert_encoding($this->decode[$prefix.$match[2]],'SJIS','EUC-JP');
					}elseif($this->carrier == 'SOFTBANK'){
						$this->decode[$prefix.$match[2]] = mb_convert_encoding($this->decode[$prefix.$match[2]],'UTF-8','EUC-JP');
					}elseif($this->carrier == 'AU'){
						$this->decode[$prefix.$match[2]] = mb_convert_encoding($this->decode[$prefix.$match[2]],'SJIS','EUC-JP');
					}else{
						$this->decode[$prefix.$match[2]] = mb_convert_encoding($this->decode[$prefix.$match[2]],'SJIS','EUC-JP');
					}
					$text = preg_replace('/\['.$select.'\]/', $this->decode[$prefix.$match[2]], $text);
				}
				//絵文字あり
				else{
					$text = preg_replace('/\['.$select.'\]/', $this->decode[$prefix.$match[2]], $text);
				}
			}
			// フォーム用絵文字コードデコード
			while (preg_match('/\[(xf:)(\d{4})\]/', $text, $match)){
				if($this->carrier == 'DOCOMO'){
					// DOCOMOのみフォーム用の絵文字を別途用意する
					$prefix = "df:";
				}elseif($this->carrier == 'SOFTBANK'){
					$prefix = "s:";
				}elseif($this->carrier == 'AU'){
					$prefix = "a:";
				}else{
					// PCなどでは変換を行わない
					break;
				}
				$select = quotemeta($match[1]).quotemeta($match[2]);
				$text = preg_replace('/\['.$select.'\]/', $this->decode[$prefix.$match[2]], $text);
			}
		}
		return $text;
	}
	
	
	/**
	 *  メール絵文字コードデコード
	 *
	 *  @access     public
	 *  @param
	 */
	function emoji_decode_mail($text,$carrier)
	{
		if(count($this->decode) > 0){
			// 通常絵文字コードデコード
			while (preg_match('/\[(x:)(\d{4})\]/', $text, $match)){
				if($carrier == 'DOCOMO'){
					$prefix = "dm:";
				}elseif($carrier == 'SOFTBANK'){
					$prefix = "sm:";
				}elseif($carrier == 'AU'){
					$prefix = "am:";
				}else{
					$prefix = "em:";
				}
				$select = quotemeta($match[1]).quotemeta($match[2]);//quotemeta:メタ文字をクォートする
				
				//絵文字がなければ [はれ]例 にする
				if( (!$this->decode[$prefix.$match[2]]) || ($carrier == 'PC') ){
					$enc = mb_detect_encoding($this->decode['emoji_str:'.$match[2]],'EUC-JP,SJIS,UTF-8');
					$this->decode['emoji_str:'.$match[2]] = mb_convert_encoding($this->decode['emoji_str:'.$match[2]],'SJIS',$enc);
					$this->decode[$prefix.$match[2]] = $this->decode['emoji_str:'.$match[2]];
				}
				$text = preg_replace('/\['.$select.'\]/', $this->decode[$prefix.$match[2]], $text);
			}
		}
		return $text;
	}
	
	
	/**
	 *  Softbank 3G UTF-8対応
	 *
	 *  @access     public
	 *  @param
	 */
	function softbank_3g_utf82sjis($text)
	{
		// SOFTBANK3G絵文字エンコード
		$softbank_emoji_utf8_regex = '\xEE([\x80\x81\x84\x85\x88\x89\x8C\x8D\x90\x91\x94][\x80-\xBF])';
		while (preg_match('/' . $softbank_emoji_utf8_regex . '/',$text,$match)){
//			$select = quotemeta($match[1]);
//			$dec = unpack('n1int', $match[1]);
			$select = quotemeta($match[0]);
			$dec = unpack('n1int', $match[1]);
			$text = preg_replace('|'.$select.'|','[x:'.$this->softbank_3g_n[$dec['int']].']', $text);
		}
		// 文字コード変換
		$text = mb_convert_encoding($text,'SJIS','UTF-8');
		// SOFTBANK絵文字エンコード
		$text = $this->replace_emoji_softbank($text);
		return $text;
	}
	
	
	/**
	 *  DOCOMO絵文字コード変換
	 *
	 *  @access     public
	 *  @param
	 */
	function replace_emoji_docomo($text)
	{
		$old_line = explode("\n", $text);
		foreach ($old_line as $v){
			$old = $v;
			$new = '';
			if(preg_match('/[\xF8\xF9]/', $old)){
				while (1){
					if(preg_match('/^[\xF8\xF9][\x40-\xFC]/', $old , $match)){
						$old = preg_replace('/^[\xF8\xF9][\x40-\xFC]/', '', $old);
						// 絵文字置換え
						$bin = unpack('n1int', $match[0]);
						$new .= '&#'.$bin["int"].';';
					} elseif(preg_match('/^[\x81-\x9F\xE0-\xF7\xFA-\xFC][\x40-\x7E\x80-\xFC]/', $old, $match)){
						$old = preg_replace('/^[\x81-\x9F\xE0-\xF7\xFA-\xFC][\x40-\x7E\x80-\xFC]/', '', $old);
						$new .= $match[0];
					} elseif(preg_match('/^./', $old, $match)){
						$old = preg_replace('/^./', '', $old);
						$new .= $match[0];
					}else{
						break;
						}
				}
			}else{
				$new = $old;
			}
			$new_line[] = $new;
		}
		$text = join("\n", $new_line);
		// 絵文字コード置換え
		while(preg_match('/\&\#x*(.+?)\;/', $text, $match)){
			$pms = quotemeta($match[1]);
			$text = preg_replace('|\&\#x*'.$pms.';|', $this->decode[$match[1]], $text);
		}
		return $text;
	 }
	
	
	/**
	 *  SOFTBANK絵文字コード変換
	 *
	 *  @access     public
	 *  @param
	 */
	function replace_emoji_softbank($text)
	{
		// SOFTBANK絵文字エンコード
		// SI追加
		$text .= "\x0F";
		// 絵文字第一バイト展開
		while(preg_match('/(\x1B\$[GEFOPQ])([\x21-\x7A])([\x21-\x7A]+)(\x0F)/', $text)){
			$text = preg_replace('/(\x1B\$[GEFOPQ])([\x21-\x7A])([\x21-\x7A]+)(\x0F)/', '\\1\\2\\4\\1\\3\\4', $text);
		}
		// 絵文字置換え
		while(preg_match('/(\x1B\$[GEFOPQ][\x21-\x7A]\x0F)/', $text, $match)){
			$pms = quotemeta($match[1]);
			$text = preg_replace('|'.$pms.'|', $this->decode[$match[1]], $text);
		}
		// SI消去
		return $text = preg_replace('/\x0F$/', '', $text);
	}
	
	
	/**
	 *  au絵文字コード変換
	 *
	 *  @access     public
	 *  @param
	 */
	function replace_emoji_au($text)
	{
		//検索用に正規表現を設定
		$sjis  = '[\x81-\x9F\xE0-\xF2\xF5\xFA-\xFC][\x40-\x7E\x80-\xFC]|[\x00-\x7F]|[\xA1-\xDF]';
		$e_emoji = '[\xF3-\xF4\xF6-\xF7][\x40-\xFC]';
		$au_emoji_regex = "/^((?:$sjis)*)($e_emoji)/";
		while(preg_match($au_emoji_regex, $text,$m)){
			$text = $m[1] . preg_replace_callback(
				$au_emoji_regex,
				create_function(
					'$match',
					'return is_array($a =unpack("n1int", $match[2])) ? "&#" . $a["int"] . ";" : "";'
				),
				$text
			);
		}
		// 絵文字コード置換え
		while(preg_match('/\&\#x*(.+?)\;/', $text, $match)){
			$pms = quotemeta($match[1]);
			$text = preg_replace('|\&\#x*'.$pms.';|', $this->decode[$match[1]], $text);
		}
		return $text;
	}
	
	
	/**
	 * 全角文字と絵文字を2文字としてカウントします。
	 */
	function strlen_emoji( $string )
	{
		$counter = 0;
		$length  = mb_strlen($string);
		$i	   = 0;
		
		while( $i < $length )
		{
			$c = mb_substr($string, $i, 1);
			if( strlen($c) == 2 ) {
				$counter += 2;
				$i++;
			} else {
				if( $c == '[' && $i+7 < $length && 
					mb_ereg_match("\[x:\d{4}\]",mb_substr($string,$i,8))
				) {
					$counter += 2;
					$i += 8;
				} else {
					$counter++;
					$i++;
				}
			}
		}
		return $counter;
	}
	
	
	/**
	 * 全角文字と絵文字を1文字としてカウントします。
	 */
	function mb_strlen_emoji( $string )
	{
		$counter = 0;
		$length  = mb_strlen($string);
		$i = 0;
		$j = 0;
		
		while( $j < $length )
		{
			$i = mb_strpos($string, "[x:", $j);
			if( $i === false || $i+7 >= $length ) {
				$counter += $length - $j;
				return $counter;
			} else {
				if( mb_ereg_match("\[x:\d{4}\]",mb_substr($string,$i,8)) ) {
					$counter += $i - $j + 1;
					$j = $i + 8;
				} else {
					$i += 3;
					$counter += $i - $j;
					$j = $i;
				}
			}
		}
		return $counter;
	}
}
?>
<?php
/**
 * Contents.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザフリーページビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserContents extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// データがセットされていない場合
		if(!$this->af->getAppNE('html')){
			$um = $this->backend->getManager('Util');
			
			// コンテンツIDが指定されている場合
			if($this->af->get('contents_id')){
				// オブジェクトを取得する
				$o = new Tv_Contents($this->backend, array('contents_id','contents_status'), array($this->af->get('contents_id'), 1));
				if(!$o->isValid()){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
			}else{
				// コードが存在するかどうか確認する
				$param = array(
					'sql_select'	=> '*',
					'sql_from'	=> 'contents',
					'sql_where'	=> 'contents_code = ?',
					'sql_values'	=> array($this->af->get('code')),
				);
				$r = $um->dataQuery($param);
				if(count($r) == 0){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
				// オブジェクトを取得する
				$o = new Tv_Contents($this->backend, array('contents_code','contents_status'), array($this->af->get('code'), 1));
				if(!$o->isValid()){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
			}
			// タグ変換
			$html = $o->get('contents_body');
			// 入会経路測定
			$search = "/##media_mailaddress\[(.*)\]##/";
			while(preg_match($search , $html, $match)){
				// メディア入会経路識別子の取得
				$media_access_hash = $this->session->get('media_access_hash');
				// メディア経由のアクセスか判断
				if($media_access_hash == ''){
					// メディア入会経路識別子の生成
					$mm = $this->backend->getManager('Media');
					$media_access_hash = $mm->addMediaAccess($match[1]);
					// セッションが始まっていない場合は開始
					if(!$this->session->isStart()){
						$this->session->start(0);
					} 
					// メディア経由でのアクセスの場合はパラメータをセッションに格納して引き継ぐ
					$this->session->set('media_access_hash', $media_access_hash); 
				}
				// [code]入会経路用メールアドレスタグ変換
				$mail_account = $this->config->get('mail_account');
				$mail_domain = $this->config->get('mail_domain');
				$replace = "{$mail_account['regist']['account']}_{$media_access_hash}@{$mail_domain}";
				$html = preg_replace($search, $replace, $html);
			}
			
			// ソフトバンクの場合の文字コード変換
			if($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
				$html = preg_replace('/Shift_JIS/i', 'UTF-8', $html);
			}
			$html = $um->convertHtml($html);
			
			// テンプレートにセット
			$this->af->setAppNE('html', $html);
		}
	}
}
?>
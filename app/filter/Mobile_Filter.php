<?php
class Mobile_Filter extends Ethna_Filter
{
	// 前処理フィルター
	function prefilter()
	{
		$GLOBALS['io_encoding'] = 'Shift_JIS';
		$GLOBALS['io_enc'] = 'SJIS';
		// 絵文字オブジェクト生成
		$GLOBALS['EMOJIOBJ'] =& new Tv_Emoji($this->config);
		// SoftBank 3Gに対してのみUTF-8でHTMLを送受する
		if ($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
			// POSTとGETに対してそれぞれ操作します
			if (count($_POST)) {
				$_POST = $this->softbank_3g_utf82sjis($_POST);
			}
			$GLOBALS['io_encoding'] = 'UTF-8';
			$GLOBALS['io_enc'] = 'UTF-8';
		}
		
		// POSTとGETに対してそれぞれ操作します
		if (count($_POST)) {
			// emoji_encode: 絵文字を[x:0000]型にエスケープします
			$_POST = $this->emoji_encode($_POST);
			mb_convert_variables('EUC-JP', 'SJIS', $_POST);
		}
		
		if (count($_GET)) {
//			$_GET = array_map("urldecode", $_GET);
			$_GET = $this->_urldecode($_GET);
			mb_convert_variables('EUC-JP', 'SJIS', $_GET);
		}
	}
	
	
	// 後処理フィルター
	function postFilter()
	{
	}
	
	// 再帰的urldecode
	function _urldecode($text)
	{
		if (is_array($text)) {
			$text = array_map(create_function('$d', 'return Mobile_Filter::_urldecode($d);'), $text);
		}else{
			$text = urldecode($text);
		}
		return $text;
	}
	
	// Vodafone3GUTF-8コード対応
	function softbank_3g_utf82sjis($text)
	{
		if (is_array($text)) {
			$text = array_map(create_function('$d', 'return Mobile_Filter::softbank_3g_utf82sjis($d);'), $text);
		}else{
			$text = $GLOBALS['EMOJIOBJ']->softbank_3g_utf82sjis($text);
		}
		return $text;
	}
	
	
	// 絵文字コードエンコード
	function emoji_encode($value)
	{
		if (is_array($value)) {
			$value = array_map(create_function('$d', 'return Mobile_Filter::emoji_encode($d);'), $value);
		}else{
			if ($GLOBALS['EMOJIOBJ']->carrier == "PC"){
				// PCの場合は[xf:xxxx]の形式にして編集できるように変換する
				$value = preg_replace('/\[xf:(\d{4})\]/','[x:\\1]',$value);
			}else{
				$value = $GLOBALS['EMOJIOBJ']->emoji_encode($value);
			}
		}
		return $value;
	}
}
?>
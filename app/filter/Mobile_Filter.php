<?php
class Mobile_Filter extends Ethna_Filter
{
	// �������ե��륿��
	function prefilter()
	{
		$GLOBALS['io_encoding'] = 'Shift_JIS';
		$GLOBALS['io_enc'] = 'SJIS';
		// ��ʸ�����֥�����������
		$GLOBALS['EMOJIOBJ'] =& new Tv_Emoji($this->config);
		// SoftBank 3G���Ф��ƤΤ�UTF-8��HTML����������
		if ($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
			// POST��GET���Ф��Ƥ��줾�����ޤ�
			if (count($_POST)) {
				$_POST = $this->softbank_3g_utf82sjis($_POST);
			}
			$GLOBALS['io_encoding'] = 'UTF-8';
			$GLOBALS['io_enc'] = 'UTF-8';
		}
		
		// POST��GET���Ф��Ƥ��줾�����ޤ�
		if (count($_POST)) {
			// emoji_encode: ��ʸ����[x:0000]���˥��������פ��ޤ�
			$_POST = $this->emoji_encode($_POST);
			mb_convert_variables('EUC-JP', 'SJIS', $_POST);
		}
		
		if (count($_GET)) {
//			$_GET = array_map("urldecode", $_GET);
			$_GET = $this->_urldecode($_GET);
			mb_convert_variables('EUC-JP', 'SJIS', $_GET);
		}
	}
	
	
	// ������ե��륿��
	function postFilter()
	{
	}
	
	// �Ƶ�Ūurldecode
	function _urldecode($text)
	{
		if (is_array($text)) {
			$text = array_map(create_function('$d', 'return Mobile_Filter::_urldecode($d);'), $text);
		}else{
			$text = urldecode($text);
		}
		return $text;
	}
	
	// Vodafone3GUTF-8�������б�
	function softbank_3g_utf82sjis($text)
	{
		if (is_array($text)) {
			$text = array_map(create_function('$d', 'return Mobile_Filter::softbank_3g_utf82sjis($d);'), $text);
		}else{
			$text = $GLOBALS['EMOJIOBJ']->softbank_3g_utf82sjis($text);
		}
		return $text;
	}
	
	
	// ��ʸ�������ɥ��󥳡���
	function emoji_encode($value)
	{
		if (is_array($value)) {
			$value = array_map(create_function('$d', 'return Mobile_Filter::emoji_encode($d);'), $value);
		}else{
			if ($GLOBALS['EMOJIOBJ']->carrier == "PC"){
				// PC�ξ���[xf:xxxx]�η����ˤ����Խ��Ǥ���褦���Ѵ�����
				$value = preg_replace('/\[xf:(\d{4})\]/','[x:\\1]',$value);
			}else{
				$value = $GLOBALS['EMOJIOBJ']->emoji_encode($value);
			}
		}
		return $value;
	}
}
?>
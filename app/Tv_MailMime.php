<?php
/**
 * Tv_MailMime.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �᡼��MIME�������饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MailMime extends Mail_Mime
{
	/**
	 * Constructor
	 */
	function Mail_Mime_Decomail($crlf = "\r\n")
	{
		parent::Mail_mime($crlf);
	}
	
	/**
	 * Override Mail_mime::_addHtmlImagePart
	 */
	function &_addHtmlImagePart(&$obj, $value)
	{
		// image/xxx; name=xxx ���ͤ� name=xxx ���դ��ʤ��Ȳ�����ɽ������ʤ�
		$l = explode('/', $value['name']);
		$name = $l[count($l)-1];
//		$params['content_type'] = $value['c_type']. ";\r\n name=\"{$name}\"";
//		$params['content_type'] = $value['c_type']. ";\r name=\"{$name}\"";
		$params['content_type'] = $value['c_type']. ";\n name=\"{$name}\"";
		$params['encoding']	 = 'base64';
		$params['cid']		  = $value['cid'];
		$ret = $obj->addSubpart($value['body'], $params);
		return $ret;
	}
	
	/**
	 * Override Mail_mime::get
	 *
	 * �ǥ���Υ���饤������ξ����б�
	 *
	 * multipart/related
	 * �� multipart/alternative
	 * �� �� text/plain
	 * �� �� text/html
	 * �� image/xxx (*n)
	 */
	function &get($build_params = null)
	{
		if (isset($build_params)) {
			while (list($key, $value) = each($build_params)) {
				$this->_build_params[$key] = $value;
			}
		}
		
		if (!empty($this->_html_images) AND isset($this->_htmlbody)) {
			foreach ($this->_html_images as $value) {
				$regex = '#(\s)((?i)src|background|href(?-i))\s*=\s*(["\']?)' . preg_quote($value['name'], '#') . '\3#';
				$rep = '\1\2=\3cid:' . $value['cid'] .'\3';
				$this->_htmlbody = preg_replace($regex, $rep, $this->_htmlbody);
			}
		}
		
		$null		= null;
		$attachments	= !empty($this->_parts)			? true : false;
		$html_images	= !empty($this->_html_images)			? true : false;
		$html		= !empty($this->_htmlbody)			? true : false;
		$text		= (!$html AND !empty($this->_txtbody))	? true : false;
		
		switch (true) {
		// �ƥ����ȤΤ�
		case $text AND !$attachments:
			$message =& $this->_addTextPart($null, $this->_txtbody);
			break;
		// ź�ղ����Τ�
		case !$text AND !$html AND $attachments:
			$message =& $this->_addMixedPart();
			for ($i = 0; $i < count($this->_parts); $i++) {
    				$this->_addAttachmentPart($message, $this->_parts[$i]);
			}
			break;
		// �ƥ����Ȥ�ź�եե�����Τ�
		case $text AND $attachments:
			$message =& $this->_addMixedPart();
			$this->_addTextPart($message, $this->_txtbody);
			for ($i = 0; $i < count($this->_parts); $i++) {
    				$this->_addAttachmentPart($message, $this->_parts[$i]);
			}
			break;
		// �ǥ��᡼����ʸ�Τ�
		case $html AND !$attachments AND !$html_images:
			if (isset($this->_txtbody)) {
				$message =& $this->_addAlternativePart($null);
				$this->_addTextPart($message, $this->_txtbody);
				$this->_addHtmlPart($message);
			} else {
				$message =& $this->_addHtmlPart($null);
			}
			break;
		// �ǥ��᡼����ʸ�ȥ���饤�����
		case $html AND !$attachments AND $html_images:
			if (isset($this->_txtbody)) {
				$message =& $this->_addRelatedPart($null);
				$alt =& $this->_addAlternativePart($message);
				$this->_addTextPart($alt, $this->_txtbody);
			} else {
				$message =& $this->_addRelatedPart($null);
				$related =& $message;
			}
			$this->_addHtmlPart($alt);
			for ($i = 0; $i < count($this->_html_images); $i++) {
				$this->_addHtmlImagePart($message, $this->_html_images[$i]);
			}
			break;
		// �ǥ��᡼����ʸ��ź�ղ���
		case $html AND $attachments AND !$html_images:
			$message =& $this->_addMixedPart();
			if (isset($this->_txtbody)) {
				$alt =& $this->_addAlternativePart($message);
				$this->_addTextPart($alt, $this->_txtbody);
				$this->_addHtmlPart($alt);
			} else {
				$this->_addHtmlPart($message);
			}
			for ($i = 0; $i < count($this->_parts); $i++) {
				$this->_addAttachmentPart($message, $this->_parts[$i]);
			}
			break;
		// �ǥ��᡼����ʸ��ź�ղ����ȥ���饤�����
		case $html AND $attachments AND $html_images:
			$message =& $this->_addMixedPart();
			if (isset($this->_txtbody)) {
				$message =& $this->_addRelatedPart($null);
				$alt =& $this->_addAlternativePart($message);
				$this->_addTextPart($alt, $this->_txtbody);
			} else {
				$rel =& $this->_addRelatedPart($message);
			}
			$this->_addHtmlPart($alt);
			for ($i = 0; $i < count($this->_html_images); $i++) {
				$this->_addHtmlImagePart($message, $this->_html_images[$i]);
			}
			for ($i = 0; $i < count($this->_parts); $i++) {
				$this->_addAttachmentPart($message, $this->_parts[$i]);
			}
			break;
		
		default:
			break;
		}
		
		if (isset($message)) {
			$output = $message->encode();
			$this->_headers = array_merge($this->_headers,$output['headers']);
			return $output['body'];
		} else {
			return false;
		}
	}
}
?>
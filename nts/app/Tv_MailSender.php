<?php
class Tv_MailSender extends Ethna_MailSender
{
	var $mail_dir = '../mail';
	var $def = array(
			'user_regist' 			=> 'user_regist.tpl' ,
			'user_already_member'		=> 'user_already_member.tpl' ,
			'user_remind' 			=> 'user_remind.tpl' ,
			'user_invite'	 		=> 'user_invite.tpl' ,
			'user_got_mail'			=> 'user_got_mail.tpl' ,
			'user_friend_apply'		=> 'user_friend_apply.tpl' ,
			'user_bbs'		=> 'user_bbs.tpl' ,
			3 		=> 'user_remind.tpl' ,
			4 		=> 'user_invite.tpl' ,
			5 		=> 'user_got_mail.tpl' ,
			6 		=> 'user_apply.tpl' ,
			7 		=> 'user_bbs.tpl' ,
			99 		=> 'alert.tpl' ,
		);
	
	function _setDefaultMacro($macro)
	{
		// �١���URL
		$macro['base_url'] = $this->config->get('base_url');
		// �᡼��ɥᥤ��
		$macro['mail_domain'] = $this->config->get('mail_domain');
		// �᡼���������᡼�륢�������
		$macro['from_mailaddress'] = $this->config->get('from_mailaddress');
		// ���ݡ����ѥ᡼�륢�������
		$macro['support_mailaddress'] = $this->config->get('support_mailaddress');
		// SNS̾
		$sns_info = $this->config->get('sns_info');
		$macro['sns_name'] = $sns_info['sns_name'];
		return $macro;
	}
	
	/**
	 *  �ƥ�ץ졼�ȥ᡼��Υإå�������������
	 *
	 *  @access private
	 *  @param  string  $mail   �᡼��ƥ�ץ졼��
	 *  @return array   �إå�, ��ʸ
	 */
	function _parse($mail)
	{
		list($header_line, $body) = preg_split('/\r?\n\r?\n/', $mail, 2);
		$header_line .= "\n";
		$header_lines = explode("\n", $header_line);
		$header = array();
		foreach ($header_lines as $h) {
			if (strstr($h, ':') == false) {
				continue;
			}
			list($key, $value) = preg_split('/\s*:\s*/', $h, 2);
			$i = strtolower($key);
			$header[$i] = array();
			$header[$i][] = $key;
			
			if(ereg("Subject", $key)){
				// ��ʸ�����饹�λ��Ѥ����ä����Τ߽�������
				if(array_key_exists('EMOJIOBJ', $GLOBALS)){
					if($GLOBALS['EMOJIOBJ']->to_carrier == "PC"){
						// PC�ξ��
						$value = "=?ISO-2022-JP?B?". base64_encode(mb_convert_encoding($GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($value, "SJIS", "EUC-JP"), $GLOBALS['EMOJIOBJ']->to_carrier),"JIS","SJIS"))."?=";
					}elseif($GLOBALS['EMOJIOBJ']->to_carrier == "SOFTBANK"){
						// SOFTBANK�ξ��
						$value = "=?Shift_JIS?B?". base64_encode($GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($value, "SJIS", "EUC-JP"), $GLOBALS['EMOJIOBJ']->to_carrier))."?=";
					}elseif( ($GLOBALS['EMOJIOBJ']->to_carrier == "DOCOMO") || ($GLOBALS['EMOJIOBJ']->to_carrier == "AU") ){
						// DOCOMO,AU�ξ��
						$value = "=?ISO-2022-JP?B?". base64_encode($GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($value, "SJIS", "EUC-JP"), $GLOBALS['EMOJIOBJ']->to_carrier))."?=";
					}else{
						$value = "=?Shift_JIS?B?". base64_encode(mb_convert_encoding($value, "SJIS", "EUC-JP"))."?=";
					}
				}
			}
			$header[$i][] = preg_replace('/([^\x00-\x7f]+)/e', "Ethna_Util::encode_MIME('$1')", $value);
		}
		// ��ʸ�����饹�λ��Ѥ����ä����Τ߽�������
		if(array_key_exists('EMOJIOBJ', $GLOBALS)){
			if($GLOBALS['EMOJIOBJ']->to_carrier == "PC"){
				// PC�ξ�硢��ʸ�ϡ�ISO-2022JP��JIS�ˡ�
				$body = mb_convert_encoding($GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($body, "SJIS", "EUC-JP"), $GLOBALS['EMOJIOBJ']->to_carrier),"JIS","SJIS");
			}else{
				// ���Ӥξ�硢��ʸ�ϡ�Shift_JIS��
				$body = $GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($body, "SJIS", "EUC-JP"),$GLOBALS['EMOJIOBJ']->to_carrier);
			}
		}else{
			$body = mb_convert_encoding($body, "JIS", "EUC-JP");
		}
		return array($header, $body);
	}
	
	/**
	 *  �᡼�����������
	 *
	 *  @access public
	 *  @param  string  $to	 �᡼�������襢�ɥ쥹
	 *  @param  string  $type   �᡼��ƥ�ץ졼�ȥ�����
	 *  @param  array   $macro  �ƥ�ץ졼�ȥޥ���($type��MAILSENDER_TYPE_DIRECT�ξ��ϥ᡼����������)
	 *  @param  array   $attach ź�եե�����(array('content-type' => ..., 'content' => ...))
	 *  @return string  $to��null�ξ��ƥ�ץ졼�ȥޥ���Ŭ�Ѹ�Υ᡼������
	 */
	function send($to, $type, $macro, $attach = null)
	{
		if(array_key_exists('EMOJIOBJ', $GLOBALS)){
			// ������Υ���ꥢ�ˤ�äƥ᡼����ʸ��ʸ�������ɻ�����ѹ�����
			if($GLOBALS['EMOJIOBJ']->to_carrier == "PC"){
				// PC�ξ��
				$mail_io = "ISO-2022-JP";
			}else{
				// ���Ӥξ��
				$mail_io = "Shift_JIS";
			}
		}else{
			$mail_io = "ISO-2022-JP";
		}
		// ����ƥ�ĺ���
		if ($type !== MAILSENDER_TYPE_DIRECT) {
			$renderer =& $this->getTemplateEngine();
			
			// ���ܾ�������
			$renderer->setProp("env_datetime", strftime('%Yǯ%m��%d�� %H��%Mʬ%S��'));
			$renderer->setProp("env_useragent", $_SERVER["HTTP_USER_AGENT"]);
			$renderer->setProp("env_remoteaddr", $_SERVER["REMOTE_ADDR"]);
			
			// �ǥե���ȥޥ�������
			$macro = $this->_setDefaultMacro($macro);
			
			// �桼�������������
			if (is_array($macro)) {
				foreach ($macro as $key => $value) {
					$renderer->setProp($key, $value);
				}
			}
			
			$template = $this->def[$type];
			//ob_start();
			//$renderer->display(sprintf('%s/%s', $this->mail_dir, $template));
			//$mail = ob_get_contents();
			//ob_end_clean();
			// �Хåե������������ΤǤϤʤ����ƥ�ץ졼�ȥ��󥸥󤫤��������
			$mail = $renderer->fetch(sprintf('%s/%s', $this->mail_dir, $template));
		} else {
			$mail = $macro;
		}
		
		if (is_null($to)) return $mail;
		
		// ����
		foreach (to_array($to) as $rcpt) {
			list($header, $body) = $this->_parse($mail);
			// multipart�б�
			if ($attach != null) {
				$boundary = Ethna_Util::getRandom(); 
				$body = "This is a multi-part message in MIME format.\n\n" .
					"--$boundary\n" .
					"Content-Type: text/plain; charset=".$mail_io."\n\n" .
					"$body\n" .
					"--$boundary\n" .
					"Content-Type: " . $attach['content-type'] . "; name=\"" . $attach['name'] . "\"\n" .
					"Content-Transfer-Encoding: base64\n" . 
					"Content-Disposition: attachment; filename=\"" . $attach['name'] . "\"\n\n";
				$body .= chunk_split(base64_encode($attach['content']));
				$body .= "--$boundary--";
			}
			$body = str_replace("\r\n", "\n", $body);
			// �����ɬ�פʥإå����ɲ�
			if (array_key_exists('mime-version', $header) == false) {
				$header['mime-version'] = array('Mime-Version', '1.0');
			}
			if (array_key_exists('subject', $header) == false) {
				$header['subject'] = array('Subject', 'no subject in original');
			}
			if (array_key_exists('content-type', $header) == false) {
				if ($attach == null) {
					$header['content-type'] = array('Content-Type', 'text/plain; charset='.$mail_io);
				} else {
					$header['content-type'] = array('Content-Type', "multipart/mixed; boundary=\"$boundary\"");
				}
			}
			
			$header_line = "";
			foreach ($header as $key => $value) {
				if ($key == 'subject') {
					// should be added by mail()
					continue;
				}
				if ($header_line != "") {
					$header_line = "$header_line\n";
				}
				$header_line .= $value[0] . ": " . trim($value[1]);
			}
			if (is_string($this->option)) {
				mail($rcpt, $header['subject'][1], $body, $header_line, $this->option);
			} else {
				mail($rcpt, $header['subject'][1], $body, $header_line);
			}
		}
	}
}
?>
<?php
/**
 * Tv_Mail
 */
class Tv_Mail extends Mail
{
	/* �᡼�륨�󥳡�������*/
	var $mail_enc= array();
	/* �᡼�륪�֥������� */
	var $mail;
	/* �Хå�����ɥ��֥������� */
	var $backend;
	/* ����ե������֥������� */
	var $config;
	/* �᡼��ɥ饤�� */
	var $driver;
	
	/**
	 * Tv_Mail���饹�Υ��󥹥ȥ饯��
	 */
	function Tv_Mail($backend, $driver='mail', $params=array())
	{
		// �᡼��ɥ饤��
		$this->driver = $driver;
		// �Хå�����ɥ��֥������Ȥ����
		$this->backend = $backend;
		// ����ե������֥������Ȥ����
		$this->config = $backend->getConfig();
		// �ɥ饤�С��̤˥١����Υ��֥������Ȥ�����
		$driver = 'smtp';
		$params = $this->config->get('mail_smtp');
		$obj = parent::factory($driver, $params);
		$this->mail = $obj;
		// �᡼��إå����Υ��ѥ졼��ʸ������ѹ��ʥ١����ϡ�\r\n�ס�
		$this->sep = "\n";
		
		// �᡼���ѥ��󥳡�������򥻥å�
		$this->setMailEnc();
	}
	
	/**
	 * �᡼���ѥ��󥳡�������򥻥å�
	 */
	 function setMailEnc()
	 {
		$this->mail_enc = array(
			// DOCOMO�ѥ��󥳡�������
			'DOCOMO' => array(
				'head_charset'	=> 'ISO-2022-JP',
				'text_charset'	=> 'Shift_JIS',
				'html_charset'	=> 'Shift_JIS',
				'html_encoding'	=> 'quoted-printable',
				'head_enc'	=> 'SJIS',
				'text_enc'	=> 'SJIS',
				'html_enc'	=> 'SJIS',
			),
			// AU�ѥ��󥳡�������
			'AU' => array(
				'head_charset'	=> 'ISO-2022-JP',
				'text_charset'	=> 'Shift_JIS',
				'html_charset'	=> 'Shift_JIS',
				'html_encoding'	=> 'quoted-printable',
				'head_enc'	=> 'SJIS',
				'text_enc'	=> 'SJIS',
				'html_enc'	=> 'SJIS',
			),
			// SOFTBANK�ѥ��󥳡�������
			'SOFTBANK' => array(
				'head_charset'	=> 'Shift_JIS',
				'text_charset'	=> 'Shift_JIS',
				'html_charset'	=> 'Shift_JIS',
				'html_encoding'	=> 'quoted-printable',
				'head_enc'	=> 'SJIS',
				'text_enc'	=> 'SJIS',
				'html_enc'	=> 'SJIS',
			),
			// PC�ѥ��󥳡�������
			'PC' => array(
				'head_charset'	=> 'ISO-2022-JP',
				'text_charset'	=> 'ISO-2022-JP',
				'html_charset'	=> 'ISO-2022-JP',
				'html_encoding'	=> 'quoted-printable',
				'head_enc'	=> 'JIS',
				'text_enc'	=> 'JIS',
				'html_enc'	=> 'JIS',
			),
		);
		return true;
	 }
	 
	/**
	 * ��̾�դ��᡼�륢�ɥ쥹����������
	 */
	function getSignature($signature, $from)
	{
		return '=?ISO-2022-JP?B?' . base64_encode(mb_convert_encoding($signature, 'ISO-2022-JP', 'EUC-JP')) . '?=<' . $from . '>';
	}
	
	/**
	 * ��̾����������
	 */
	function getSubject($subject, $carrier, $enc)
	{
		// ����ޤ���ʸ��Ʊ�����󥳡��ɤʤΤǶ��̲�
		$subject = $this->getBody($subject, $carrier, $enc);
		
		// ������mime_header���Ƥ��ޤ��ȳ�ʸ���򤳤蘆��Ƥ��ޤ����ᡢ�ȼ���MIME���󥳡��ǥ��󥰤���
		$subject = '=?' . $enc['head_charset'] . '?B?' . base64_encode($subject) . '?=';
		
		return $subject;
	}
	
	/**
	 * ��ʸ����������
	 */
	function getBody($body, $carrier, $enc)
	{
	 	 // ����ꥢ�̥᡼�볨ʸ���Ѵ���Ԥ�
		$body = $GLOBALS['EMOJIOBJ']->emoji_decode_mail(mb_convert_encoding($body,'SJIS','EUC-JP'), $carrier);
		// ����ʸ�������ɤ�SJIS�Ǥʤ����Τߤ���˥��󥳡��ɤ���
		if($enc['head_enc'] != 'SJIS'){
			$body = mb_convert_encoding($body, $enc['head_enc'], 'SJIS');
		}
		
		return $body;
	}
	
	/**
	 * HTML����ƥ����ȥ᡼����ʸ����������
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
	 * ���������Ѵؿ�
	 * @param
	 *	mailaddress ������᡼�륢�ɥ쥹
	 *	template �᡼��ƥ�ץ졼��̾
	 *	value �ƥ�ץ졼�Ȥ˳�����Ƥ��ѿ�����
	 */
	function sendOne($to, $template_name='', $value=array())
	{
		// �ƥ�ץ졼�ȥ⡼�ɤξ��
		if($template_name != ''){
			// �᡼��ƥ�ץ졼�ȼ���
			$mt = new Tv_MailTemplate($this->backend, array('mail_template_code','mail_template_status'), array($template_name, 1));
			// ���֥�������
			$subject = $mt->get('mail_template_title');
			// ��ʸ
			$body = $mt->get('mail_template_body');
		}
		// ľ���ۿ��⡼�ɤξ��
		else{
			// ���֥�������
			$subject = $value['Subject'];
			// ��ʸ
			$body = $value['Body'];
		}
		// �᡼���������᡼�륢�ɥ쥹
		$from = $this->config->get('from_mailaddress');
		// ��̾�����������Ϳ����
		if(array_key_exists('Signature', $value)){
			$from = $this->getSignature($value['Signature'], $from);
		}
		
		// �᡼��ʸ������
		$carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($to);
		// �᡼����������ꥢ�Υ᡼�륨�󥳡�������μ���
		$enc = $this->mail_enc[$carrier];
		
		// �Ѵ����륿���ν���
		$select = array();
		$replace = array();
		$cut = $this->config->get('tag_cut');
		$um = $this->backend->getManager('Util');
		$tags = $um->getBaseTags();
		$tags = array_merge($tags, $value);
		// �����Ͽ��URL
		$select[] = $cut . 'regist_url' . $cut;
		$replace[] = $this->config->get('regist_url') . "&user_hash=" . $value['user_hash'];
		// ����¾�Υ���
		foreach($tags as $k => $v){
			if(!$k) continue;
			$select[] = $cut . $k . $cut;
			$replace[] = $v;
		}
		
		// �������Ѵ�
		$subject = str_replace($select, $replace, $subject);
		$body = str_replace($select, $replace, $body);
		
		// ���𥿥����Ѵ�
		$body = $um->replaceAdTag($body, $value['user_hash']);
		
		// ���֥������ȡ���ʸ�Ѵ�
		$subject = $this->getSubject($subject, $carrier, $enc);
		$body = $this->getBody($body, $carrier, $enc);
		
		// MIME
		$mimeObject = new Tv_MailMime("\n");
		// ��ʸ�����
		$mimeObject->setTXTBody($body);
		$body = $mimeObject->get($enc);
		// ���ԥ����ɤ�������
		$body = str_replace("\r\n", "\n", $body);
		// �إå��������
		$header_params = array(
//			'To'		=> $to,
			'From'		=> $from,
			'Subject'	=> $subject,
		);
		$headers = $mimeObject->headers($header_params);
		
		// �᡼������
		return parent::send($to, $headers, $body);
	}
	
	/**
	 * ʣ���������Ѵؿ�
	 * @param
	 *	user_list �桼���ꥹ��
	 		user_mailaddress �᡼�륢�ɥ쥹
	 		user_hash �桼���ϥå���
	 		user_nickname �˥å��͡���
	 		user_point �桼���ݥ����
	 *	magazine ���ޥ�����
	 		subject ��̾
	 		signature ��̾
	 		body_text �ƥ�������ʸ
			body_html_status HTML�᡼����ѥ��ơ�������0:̵����1:ͭ����
	 		body_html HTML��ʸ
	 */
	function sendAll($user_list=array(), $m=array())
	{
		// ���ܾ���ν���
		$cut = $this->config->get('tag_cut');
		$um = $this->backend->getManager('Util');
		$error_mailaccount = $this->config->get('error_mailaccount');
		$mail_domain = $this->config->get('mail_domain');
		$mime_types = $this->config->get('mime_types');
		$admin_file_path = $this->config->get('admin_file_path');
		$ctl = $this->backend->getController();
		$tmp_path = $ctl->getDirectory('tmp');
		
		// ���ޥ����󥹥ȥ�
		$lock_file = $m['lock_file'];
		$subject = $m['subject'];
		$signature = $m['signature'];
		$body_text = $m['body_text'];
		$body_html = $m['body_html'];
		$body_html_status = $m['body_html_status'];
		
		// FROM�᡼�륢�ɥ쥹
		$from = $this->config->get('magazine_mailaddress');
		// ��̾�����������Ϳ����
		if($signature){
			$from = $this->getSignature($signature, $from);
		}
		
		// �᡼��ޥ��������
		$magazine = array();
		$carrier_list = array('DOCOMO', 'AU', 'SOFTBANK', 'PC');
		foreach($carrier_list as $carrier){
			// ���󥳡��ɼ���
			$enc = $this->mail_enc[$carrier];
			// ��̾����
			$magazine[$carrier]['Subject'] = $this->getSubject($subject, $carrier, $enc);
			// TEXT��ʸ����
			$magazine[$carrier]['BodyText'] = $this->getBody($body_text, $carrier, $enc);
			// HTML��ʸ����
			if($body_html_status){
				$magazine[$carrier]['BodyHtml'] = $this->getBody($body_html, $carrier, $enc);
			}
		}
		
		// ���٤ƤΥ桼�����Ф��ƥ᡼������
		foreach($user_list as $k => $u){
			// ������߿��椬�ʤ�����ǧ����
			if(is_file("{$tmp_path}/.{$lock_file}")){
				return $k;
			}
			
			// �����ƥ��ѥ᡼�륢�ɥ쥹����
			$error_mailaddress = $error_mailaccount . '_' . $u['user_hash'] . '@' . $mail_domain;
			
			// �᡼����������
			$user_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($u['user_mailaddress']);
			$enc = $this->mail_enc[$user_carrier];
			$send_subject = $magazine[$user_carrier]['Subject'];
			$send_body_text = $magazine[$user_carrier]['BodyText'];
			if($body_html_status){
				$send_body_html = $magazine[$user_carrier]['BodyHtml'];
			}
			
			// �Ѵ����륿���ν���
			$select = array();
			$replace = array();
			$tags = $um->getBaseTags();
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
			
			// �������Ѵ�
			$send_body_text = str_replace($select, $replace, $send_body_text);
			$send_body_html = str_replace($select, $replace, $send_body_html);
			
			// ���𥿥����Ѵ�
			$send_body_text = $um->replaceAdTag($send_body_text, $u['user_hash']);
			$send_body_html = $um->replaceAdTag($send_body_html, $u['user_hash']);
			
			// MIME
			$mimeObject = new Tv_MailMime("\n");
			
			// HTML�᡼�����Ѥ�����
			if($body_html_status){
				// ���������򸡽�
				$pattern = '/(src=")(.*?)(".*?>)/';
				$replace = '$1[tag_img]$2[/tag_img]$3';
				$send_body_html = preg_replace($pattern,$replace,$send_body_html);
				$img = $um->between('[tag_img]','[/tag_img]',$send_body_html);
				$img_pattern = array();
				$img_url = array();
				// ����URL������
				foreach($img as $k => $v){
					// �����Ѵ��ѥ����������
					$img_pattern[] = '[tag_img]' . $v . '[/tag_img]';
					// ��ĥ�Ҥμ���
					list($pre, $ext) = $um->extractName($v);
					// �ޥ��ॿ���פμ���
					$mime_type = $mime_types[$ext];
					// URL�ξ��
					if($f = file_get_contents($v)){
						$img_url[] = $v;
						// �ǡ���������
						$r = $mimeObject->addHTMLImage($f, $mime_type, $v, false);
					}
					// �������̾�Υե�����ξ��
					else{
						$img_url[] = $admin_file_path . preg_replace('/^\//', '', $v);
						// �ѥ�������
						$r = $mimeObject->addHTMLImage($img_path, $mime_type);
					}
				}
				$send_body_html = str_replace($img_pattern, $img_url, $send_body_html);
				$send_body_html = "<html><head><meta http-equiv='Content-Type' Content='text/html;charset=" . $enc['html_charset'] . "'></head>" . $send_body_html . "</html>";
				
				// MIME���֥������Ȥ�HTML��ʸ�򥻥å�
				$mimeObject->setHTMLBody($send_body_html);
				
				// HTML�᡼�������ɤ�TEXT���ʤ�����HTML���鼫ư��������
				// ���������ܤΥ᡼��ޥ�����ǡ����򻲾Ȥ���
				if($body_text == ""){
					$send_body_text = $this->getTextFromHtml($send_body_html);
				}
			}
			// MIME���֥������Ȥ�HTML��ʸ�򥻥å�
			$mimeObject->setTXTBody($send_body_text);
			
			// ��ʸ�����
			$send_body = $mimeObject->get($enc);
			// ���ԥ����ɤ�������ʤ�������ʤ���DOCOMO�ǥ���饤�������ɽ�����Ƥ���ʤ��ä���
			$send_body = str_replace("\r\n", "\n", $send_body);
			
			// �إå���������ɲ�
			$header_params = array(
//				'To'		=> $u['user_mailaddress'],
				'From'		=> $from,
				"Subject"	=> $send_subject,
				"Return-Path"	=> $error_mailaddress,
			);
			$headers = $mimeObject->headers($header_params);
			
			// �᡼������
			$this->mail->send($u['user_mailaddress'], $headers, $send_body);
			
			// SMTP�ʳ��ϥ��꡼��
			if($this->driver != 'smtp'){
				// 300mSec wait
				usleep(300000);
			}
		}
		
		// ������λ
		return count($user_list);
	}
}
?>
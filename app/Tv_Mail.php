<?php
/**
 * Tv_Mail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �᡼���������饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Mail extends Mail
{
	/* @var    array     �᡼�륨�󥳡�������*/
	var $mail_enc;
	/* @var    object    �᡼�륪�֥������� */
	var $mail;
	/* @var    object    �Хå�����ɥ��֥������� */
	var $backend;
	/* @var    object    ����ե������֥������� */
	var $config;
	/* @var    object    �桼�ƥ���ƥ��ޥ͡����㥪�֥������� */
	var $um;
	/* @var    string    �᡼��ɥ饤�� */
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
		
		// �桼�ƥ���ƥ��ޥ͡����㥪�֥������Ȥ����
		$this->um = $backend->getManager('Util');
		
		// �ɥ饤�С��̤˥١����Υ��֥������Ȥ�����
		// �ʸ��ߤ϶���Ū��SMTP�ؾ�����
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
				'head_charset'		=> 'ISO-2022-JP',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// AU�ѥ��󥳡�������
			'AU' => array(
				'head_charset'		=> 'ISO-2022-JP',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// SOFTBANK�ѥ��󥳡�������
			'SOFTBANK' => array(
				'head_charset'		=> 'Shift_JIS',
				'text_charset'		=> 'Shift_JIS',
				'html_charset'		=> 'Shift_JIS',
				'html_encoding'		=> 'quoted-printable',
				'head_enc'			=> 'SJIS',
				'text_enc'			=> 'SJIS',
				'html_enc'			=> 'SJIS',
			),
			// PC�ѥ��󥳡�������
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
	 *    mailaddress  ������᡼�륢�ɥ쥹
	 *    template     �᡼��ƥ�ץ졼��̾
	 *    values       �ƥ�ץ졼�Ȥ˳�����Ƥ��ѿ�����
	 */
	function sendOne($to, $template_name='', $values=array())
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
			$subject = $values['Subject'];
			// ��ʸ
			$body = $values['Body'];
		}
		// �᡼���������᡼�륢�ɥ쥹
		$from = $this->config->get('from_mailaddress');
		// ��̾�����������Ϳ����
		if(array_key_exists('Signature', $values)){
			$from = $this->getSignature($values['Signature'], $from);
		}
		
		// �᡼��ʸ������
		$carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($to);
		// �᡼����������ꥢ�Υ᡼�륨�󥳡�������μ���
		$enc = $this->mail_enc[$carrier];
		
		// ��̾�Υ����ִ�
		$subject = $this->replaceTags($subject, $values);
		// ��ʸ�Υ����ִ�
		$body = $this->replaceTags($body, $values);
		
		// ��̾MIME�����Ѵ�
		$subject = $this->getSubject($subject, $carrier, $enc);
		// ��ʸMIME�����Ѵ�
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
			'From'		=> $from,
			'Subject'	=> $subject,
			"To"		=> $to,
		);
		$headers = $mimeObject->headers($header_params);
		
		// �᡼������
		return parent::send($to, $headers, $body);
	}
	
	
	/**
	 * ʣ���������Ѵؿ�
	 * @param
	 *    user_list        �桼���ꥹ��
	 *    user_mailaddress �᡼�륢�ɥ쥹
	 *    user_hash        �桼���ϥå���
	 *    user_nickname    �˥å��͡���
	 *    user_point       �桼���ݥ����
	 *    magazine ���ޥ�����
	 *      subject           ��̾
	 *      signature         ��̾
	 *      body_text         �ƥ�������ʸ
	 *      body_html_status  HTML�᡼����ѥ��ơ�������0:̵����1:ͭ����
	 *      body_html         HTML��ʸ
	 */
	function sendAll($user_list=array(), $m=array())
	{
		// ���ܾ���ν���
		$cut = $this->config->get('tag_cut');
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
		
		$tags = array();
		// ����������󥿥����å�
		$o =& new Tv_Config($this->backend,'config_type','config');
		foreach($o->getNameObject() as $k => $v){
			$tags[$k] = mb_convert_encoding($v,$enc['html_enc'],'EUC-JP');
		}
		// �����ȥ������Ѵ����Ƥ���
		$subject = $this->replaceTags($subject,$tags);
			
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
			$tags = array();
			// ����������󥿥����å�
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
			
			// �������Ѵ�
			$send_body_text = str_replace($select, $replace, $send_body_text);
			$send_body_html = str_replace($select, $replace, $send_body_html);
			
			// ���𥿥����Ѵ�
			$send_body_text = $this->um->replaceAdTag($send_body_text, $u['user_hash']);
			$send_body_html = $this->um->replaceAdTag($send_body_html, $u['user_hash']);
			
			// MIME
			$mimeObject = new Tv_MailMime("\n");
			
			// HTML�᡼�����Ѥ�����
			if($body_html_status){
				// ���������򸡽�
				$pattern = '/(src=")(.*?)(".*?>)/';
				$replace = '$1[tag_img]$2[/tag_img]$3';
				$send_body_html = preg_replace($pattern,$replace,$send_body_html);
				$img = $this->um->between('[tag_img]','[/tag_img]',$send_body_html);
				$img_pattern = array();
				$img_url = array();
				// ����URL������
				foreach($img as $k => $v){
					// �����Ѵ��ѥ����������
					$img_pattern[] = '[tag_img]' . $v . '[/tag_img]';
					// ��ĥ�Ҥμ���
					list($pre, $ext) = $this->um->extractName($v);
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
				'From'		=> $from,
				"Subject"	=> $send_subject,
				"Return-Path"	=> $error_mailaddress,
				"To"		=> $u['user_mailaddress'],
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
	
	/**
	 * �������ִ���Ԥ�
	 * @param string  $string
	 * @param array   $values
	 * @return string $string (�����ִ����줿�ƥ�����)
	 */
	function replaceTags($string, $values=array())
	{
		// �Ѵ����륿���ν���
		$tags = array();
		$select = array();
		$replace = array();
		$cut = $this->config->get('tag_cut');
		
		// ����������󥿥����å�
		$o =& new Tv_Config($this->backend,'config_type','config');
		$tags = array_merge($tags, $o->getNameObject());
		
		// ����Υ᡼��ǻ��Ѥ�����󥻥å�
		$tags = array_merge($tags, $values);
		
		// ������URL
		$select[] = "{$cut}login_url{$cut}";
		$replace[] = $this->config->get('login_url');
		
		// ���䤤��碌�᡼�륢�ɥ쥹
		$select[] = "{$cut}support_mailaddress{$cut}";
		$replace[] = $this->config->get('support_mailaddress');
		
		// �����ҥ᡼�륢�ɥ쥹
		$select[] = "{$cut}admin_mailaddress{$cut}";
		$replace[] = $this->config->get('admin_mailaddress');
		
		// �桼��������URL
		$select[] = "{$cut}user_url{$cut}";
		$replace[] = $this->config->get('user_url');
		
		// �����Ͽ��URL
		$select[] = "{$cut}regist_url{$cut}";
		$replace[] = $this->config->get('regist_url') . "&user_hash=" . $value['user_hash'];
		
		// ����¾�Υ���
		foreach($tags as $k => $v){
			if(!$k) continue;
			$select[] = $cut . $k . $cut;
			$replace[] = $v;
		}
		
		//   ##foreach[����]##
		//   ##/foreach[����]##
		// �����֤�������Ԥ�ɬ�פ����뤫Ƚ��
		if(preg_match_all("/{$cut}\/foreach\[(.*)\]{$cut}/", $string, $r)){
			// ��̤�����ξ�������Ԥ��ʥ�����1���Ϥ˳�Ǽ����Ƥ����
			if(is_array($r) && count($r[1]) > 0){
				// ���٤ƤΥ������Ф��ƽ�����Ԥ�
				foreach($r[1] as $k => $v){
					// �ƹԤ�1���Ϥ���Ū�Υ���
					$_item = $v;
					// ��Ū�Υ��������Ф���ʤ��ä����ϼ���
					if(!$_item) continue;
					// �����֤��������ϤΥ���
					$_loop_start = "{$cut}foreach[{$_item}]{$cut}";
					// �����֤�������λ�Υ���
					$_loop_end = "{$cut}/foreach[{$_item}]{$cut}";
					// �ִ��оݤ��ͤ�¸�ߤ�����
					if(array_key_exists($_item, $values)){
						// �����֤��������ϥ������齪λ�����ޤǤ�ʸ������������
						$_strings = $this->um->between($_loop_start, $_loop_end, $string);
						// ���٤Ƥη����֤��ִ��о�ʸ������Ф��ƽ�����Ԥ�
						foreach($_strings as $_string){
							// �����֤�������Ԥ��оݤ�ʸ����¸�ߤ�����
							if($_string){
								// �ƹԤ��ͤ��ִ����줿ʸ�����Ҥ���­����ʸ����
								$__string = "";
								// ���٤Ƥ��ִ��оݤ��ͤ��Ф��ƽ�����Ԥ�
								foreach($values[$_item] as $j => $l){
									// �ƹԤ��ͤ��Ф����ִ����������Ԥ�
									$_select  = array();
									$_replace = array();
									// �ƹԤ��٤Ƥ��ͤ��Ф��ƽ�����Ԥ�
									foreach($l as $x => $y){
										// �ִ��о�
										$_select[]  = $cut . $x . $cut;
										// ������Ƥ���
										$_replace[] = $y;
										// �ǥХå���
										$this->um->trace($x . ' - '. $y );
									}
									// �ƹԤη����֤������о�ʸ������֤�����
									$__string .= str_replace($_select, $_replace, $_string);
								}
								// �������������֤������о�ʸ������ִ�����
								$string = str_replace($_string, $__string, $string);
							}
						}
					}
					// �����դ��η����֤����������ѥ�����ä�
					$string = str_replace(array("\n".$_loop_start, $_loop_end) ,array('', ''), $string);
					// �����֤����������ѥ�����ä�
					$string = str_replace(array($_loop_start, $_loop_end) ,array('', ''), $string);
				}
			}
		}
		
		//   ##if[����]##
		//   ##/if[����]##
		// ���������Ԥ�ɬ�פ����뤫Ƚ��
		if(preg_match_all("/{$cut}\/if\[(.*)\]{$cut}/", $string, $r)){
			// ��̤�����ξ�������Ԥ��ʥ�����1���Ϥ˳�Ǽ����Ƥ����
			if(is_array($r) && count($r[1]) > 0){
				// ���٤ƤΥ������Ф��ƽ�����Ԥ�
				foreach($r[1] as $k => $v){
					// �ƹԤ�1���Ϥ���Ū�Υ���
					$_item = $v;
					// ��Ū�Υ��������Ф���ʤ��ä����ϼ���
					if(!$_item) continue;
					// ����������ϤΥ���
					$_if_start = "{$cut}if[{$_item}]{$cut}";
					// ���������λ�Υ���
					$_if_end = "{$cut}/if[{$_item}]{$cut}";
					// ����������ϥ������齪λ�����ޤǤ�ʸ������������
					$_strings = $this->um->between($_if_start, $_if_end, $string);
					// �ִ��оݤ��ͤ�¸�ߤ��ʤ����
					if(!$values[$_item]){
						// ���٤Ƥβ����ִ��о�ʸ������Ф��ƽ�����Ԥ�
						foreach($_strings as $_string){
							// ���������Ԥ��оݤ�ʸ����¸�ߤ�����
							if($_string){
								// ��������о�ʸ������ʸ������ִ�����
								$string = str_replace($_string, '', $string);
							}
						}
					}
					// �����դ��β�����������ѥ�����ä�
					$string = str_replace(array("\n".$_if_start, $_if_end) ,array('', ''), $string);
					// ������������ѥ�����ä�
					$string = str_replace(array($_if_start, $_if_end) ,array('', ''), $string);
				}
			}
		}
		
		// �������Ѵ�
		$string = str_replace($select, $replace, $string);
		
		// ���𥿥����Ѵ�
		$string = $this->um->replaceAdTag($string, $values['user_hash']);
		
		return $string;
	}
}
?>
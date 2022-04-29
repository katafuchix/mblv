<?php
/**
 * Send.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �᡼��������������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Cli_Action_MailSend extends Tv_ActionClass
{
	function perform()
	{
		// �᡼���������������
//		$mailObject = new Tv_Mail($this->backend, 'smtp', $this->config->get('smtp_params'));
		$mailObject = new Tv_Mail($this->backend);
		$um = $this->backend->getManager('Util');
		$sm = $this->backend->getManager('Segment');
		$db = $this->backend->getDB();
		$mime_types = $this->config->get('mime_types');
		
		// ���ޥ��ꥹ�Ȥμ���
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'magazine',
			'sql_where'	=> 'magazine_reserve_time <= now() AND magazine_status = 1 ',
			'sql_values'	=> array(),
		);
		$magazine_list = $um->dataQuery($param);
		
		foreach($magazine_list as $m){
			// ���ޥ�ID
			$magazine_id = $m['magazine_id'];
			
			// �ۿ��оݥ桼���ꥹ�Ȥμ���
			$user_list = $sm->getSegmentUser($m['segment_id']);
			
// �ǥХå�
//$user_list = array(array('user_hash' => 1, 'user_mailaddress' => 'kazuya.ch@docomo.ne.jp'));
//$user_list = array(
//	array('user_hash' => 1, 'user_mailaddress' => 'kazuya.ch@docomo.ne.jp','user_nickname' => '������','user_point' => 100),
//	array('user_hash' => 2, 'user_mailaddress' => 'fujimori@technovarth.co.jp','user_nickname' => '�դ����','user_point' => 10),
//	array('user_hash' => 3, 'user_mailaddress' => 'kazuya.fujimori@gmail.com','user_nickname' => '�����᡼��','user_point' => 1),
//	array('user_hash' => 4, 'user_mailaddress' => 'technovarth@docomo.ne.jp','user_nickname' => '�ɤ���','user_point' => 1),
//	array('user_hash' => 5, 'user_mailaddress' => 'technovarth@ezweb.ne.jp','user_nickname' => '�����桼','user_point' => 1),
//	array('user_hash' => 6, 'user_mailaddress' => 'loadfoo@softbank.ne.jp','user_nickname' => '���դȤФ�','user_point' => 1),
//	array('user_hash' => 7, 'user_mailaddress' => 'yukiadgj@softbank.ne.jp','user_nickname' => '���դȤФ�','user_point' => 1),
//	array('user_hash' => 8, 'user_mailaddress' => 'bunyoh.@docomo.ne.jp','user_nickname' => '�֤�褦','user_point' => 1),
//);
			// ���ޥ����󹹿�
			$mg = new Tv_Magazine($this->backend, 'magazine_id', $magazine_id);
			$mg->set('magazine_start_time', date("Y-m-d H:i:s"));
			$mg->set('magazine_status', 2);
			$mg->update();
			
			// ���ޥ���������
			$send_magazine = array(
				'lock_file'		=> 'magazine' . $m['magazine_id'],
				'subject'		=> $m['magazine_title'],
				'signature'		=> $m['magazine_signature'],
				'body_text'		=> $m['magazine_body_text'],
				'body_html'		=> $m['magazine_body_html'],
				'body_html_status'	=> $m['magazine_body_html_status'],
			);
			// �᡼������
			$send_count = $mailObject->sendAll($user_list, $send_magazine);
			
			// magazine�ơ��֥빹���������Ѥߤ�
			$mg->set('magazine_sent_num', $send_count);
			$mg->set('magazine_end_time', date("Y-m-d H:i:s"));
			// ������λ�����ä����
			$mg->set('magazine_status', 3);
			if($send_count != count($user_list)) $mg->set('magazine_status', 4);
			$mg->update();
		}
	}
}
?>

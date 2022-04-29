<?php
/**
 * Review.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Cron]��ӥ塼������������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
/*
 * �ܥ�����ץȤ�����12:00�˼¹Ԥ��졢���ʹ����桼���˥�ӥ塼��ƿ����᡼����������ޤ�
 */
class Tv_Cli_Action_CronReview extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		//ʸ��������
		mb_http_output("SJIS");
		mb_internal_encoding("EUC-JP");
		
		/*
		// ���ϥ᡼������
		$ms = new Tv_Mail($this->backend);
		$value = array (
			'alert_subject' => '��ӥ塼����᡼���ۿ�����',
			'alert_date' 	=> date('Y-m-d H:i:s'),
			'alert_file' 	=> __FILE__,
			'alert_body' 	=> '��ӥ塼����᡼���ۿ��򳫻Ϥ��ޤ�',
		);
		$ms->sendOne($this->config->get('admin_mailaddress'), 'alert', $value);
		*/
		
		// �����Υ�ӥ塼 cron�Ԥ��ꥹ�Ȥμ���
		// review_status 0:���,1:cron�Ԥ�,2:����Ԥ�,3:ͭ�� 
		
		$um = & $this->backend->getManager('Util');
		
		$param = array(
			'sql_select'	=> ' * ',
			'sql_from'		=> 'review as r, user as u, item i ',
			'sql_where'		=> 'u.user_id = r.user_id AND i.item_id = r.item_id AND review_status = ? AND review_created_time <= now() ',
			'sql_order'		=> 'review_id ASC ',
			'sql_values'	=> array(1,),
		);
		$review_list = $um->dataQuery($param);
		
		//$c = & new Tv_Config($this->backend,'config_id',1);
		$c =& new Tv_Config($this->backend,'config_type','mall');
		$mall_name 			= $c->get('site_name');
		$company_name 		= $c->get('site_company_name');
		$tel_no				= $c->get('site_phone');
		
		//�ꥹ��ʬ���꤫����
		foreach($review_list as $l){
			$review_id 			= $l["review_id"];
			$cart_id			= $l["cart_id"];
			$user_id 			= $l["user_id"];
			$item_id 			= $l["item_id"];
			$item_name  		= $l["item_name"];
			$user_name			= $l["user_name"];
			$user_mailaddress 	= $l["user_mailaddress"];
			$review_hash		= $l["review_hash"];
			$value = array (
				'mall_url' 				=> $this->config->get('user_url'),
				'mall_name' 			=> $mall_name,
				'mall_meta_author'		=> $mall_meta_author,
				'review_id'				=> $review_id,
				'cart_id'				=> $cart_id,
				'user_id'				=> $user_id,
				'item_id'				=> $item_id,
				'item_name'				=> $item_name,
				'user_name'			 	=> $user_name,
				//'review_mailaddress' 	=> $this->config->get('review_mailaccount').'@'.$this->config->get('mail_domain'),
				'review_hash'			=> $review_hash,
				'admin_mailaddress'		=> $this->config->get('support_mailaddress'),
				'company_name'			=> $company_name,
				'tel_no'				=> $tel_no,
				'point_name'			=> $this->config->get('point_unit'),
			);
			// �᡼�����������
			$GLOBALS['EMOJIOBJ']->to_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($user_mailaddress);
			
			$m = new Tv_Mail($this->backend);
			$m->sendOne($user_mailaddress , 'user_review' , $value );
			
			// ��ӥ塼����
			$reviewObject =& new Tv_Review($this->backend,'review_id',$review_id);
			$reviewObject->set('review_status',2);							//�桼��������Ԥ�
			$reviewObject->set('review_updated_time',date('Y-m-d H:i:s'));
			// ����
			$r = $reviewObject->update();
			
			//�¹Ԥ���SQL
			foreach($this->backend->db_list as $a){
				$aaa.= $a->db->last_query."\n";
			}
		} //foreach
		
		sleep(1);
		
		// ��λ�᡼������
		$ms = new Tv_Mail($this->backend);
		$value = array (
			'alert_subject' => '��ӥ塼����᡼���ۿ���λ�����ｪλ��',
			'alert_date' 	=> date('Y-m-d H:i:s'),
			'alert_file' 	=> __FILE__,
			'alert_body' 	=> "��ӥ塼����᡼���ۿ���λ���ޤ�\n\n$aaa",
		);
		$ms->sendOne($this->config->get('admin_mailaddress'), 'alert', $value);
	}
}
?>
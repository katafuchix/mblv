<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ����ü¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityJoinDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ����ü¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityJoinDo extends Tv_ActionUserOnly
{
	/**
	 * ǧ��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		parent::authenticate();
		
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
			case 0:	// ���
				// ��ǡ�����õ�
				$communityMember->remove();
				return null;
				
			case 1:	// ���С�
			case 2:	// �����ʡ�
				$this->ae->add(null, '', E_USER_COMMUNITY_DUPLICATE);
				return 'user_error';
				
			case 3:	// �����Ѥ�
				$this->ae->add(null, '', E_USER_COMMUNITY_APPLIED);
				return 'user_error';
				
			}
		}
		
		return null;
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_home';
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember($this->backend);
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		
		$communityMember->set('community_id', $this->af->get('community_id'));
		$communityMember->set('user_id', $user['user_id']);
		
		if($community->get('community_join_condition') == 1){
			// ï�Ǥ⻲�äǤ���
			$communityMember->set('community_member_status', 1);
			$communityMember->add();
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
			
			return 'user_community_join_done';
		}else{
			// �����ͤε��Ĥ�ɬ��
			$communityMember->set('community_member_status', 3);
			
			/*/�᡼�륢�ɥ쥹,�桼����ID�����
			$address =& new Tv_User(
				$this->backend,
				array('user_mailaddress','user_id'),
				array($this->backend->get('user_mailaddress'),$this->backend->get('user_id'))
			);
			//�����ͤΥ᡼�륢�ɥ쥹�˾ȹ�
			$address = $communityMember->get('user_id');
			
			// �᡼���ۿ�
			$mail_to = array("{$address}");
			foreach($mail_to as $v){
				$title = '=?ISO-2022-JP?B?'.base64_encode(mb_convert_encoding(���ߥ�˥ƥ�����ǧ��,"JIS","EUC-JP")).'?=';;
				$body = mb_convert_encoding("[URL]\n".http://www/varth.jp/public_user
											."\n[��ʸ]\n".���ʤ��Υ��ߥ�˥ƥ��˻��ô�˾�οͤ����ޤ����嵭URL���饢����������ǧ�ڤ��Ʋ�����.
											$this->config->get('base_url')."_blog/","JIS","EUC-JP");
				mail($v,$title,$body,"From: info@varth.jp");
			}*/
			
			$communityMember->add();
			
			return 'user_community_join_sent';
		}
	}
}

?>
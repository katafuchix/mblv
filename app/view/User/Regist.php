<?php
/**
 * Regist.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Ͽ�ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserRegist extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���ץ������ܰ��������
		$configUserProf = &new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
				),
			array(),
			array('config_user_prof_order' => 'ASC')
			);
		foreach($configUserProfList[1] as $key => $item){
			if($item['config_user_prof_type'] >= 3){
				$configUserProfOption = &new Tv_ConfigUserProfOption($this->backend);
				$filter = array('config_user_prof_id' => new Ethna_AppSearchObject($item['config_user_prof_id'], OBJECT_CONDITION_EQ)
					);
				$configUserProfOptionList = $configUserProfOption->searchProp(
					array('config_user_prof_option_id',
						'config_user_prof_option_name',
						),
					$filter,
					array('config_user_prof_option_order' => 'ASC')
					);
				$configUserProfList[1][$key]['config_user_prof_option'] = $configUserProfOptionList[1];
			}
		}
		$this->af->setApp('config_user_prof_list', $configUserProfList[1]);
		
		// ͧã�Ҳ����׽����Υ���������
		$u = & new Tv_User($this->backend);
		// user_hash�ǥǡ�����õ��
		$userList =  $u->searchProp(
			array('user_id',
				'invite_id',
				),
			array('user_hash' => $this->af->get('user_hash')),
			array()
			);
		if($userList[0]>0){
			$in = & new Tv_Invite($this->backend,'invite_id',$userList[1][0]['invite_id']);
			if($in->isValid()){
				/* =============================================
				// ͧã�������ײ��Ͻ���
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// ���������INSERT 0:mail 1:access 2:reg
				$sm->addStats('invite', $in->get('from_user_id'), 0, 1);
			}
		}
	}
}
?>
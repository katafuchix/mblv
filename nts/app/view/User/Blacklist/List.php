<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * BL�������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlacklistList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user');
		$user_id = $user_session['user_id'];
		
		// �桼���Υ˥å��͡�������
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// BL���������
		$bl = &new Tv_BlackList($this->backend);
		$blList = &$bl->searchProp(
			array('black_list_id', 'black_list_deny_user_id'),
			array('black_list_user_id' => $user_id, 'black_list_status' => 1,)
		);
		foreach($blList[1] as $k => $v){
			$denyUser = &new Tv_User($this->backend, 'user_id', $v['black_list_deny_user_id']); 
			// �оݼԤ����Ǥ���񤷤Ƥ�����ϡ���������ä�
			if(!$denyUser->isValid() || $denyUser->get('user_status') != 2){
				unset($blList[1][$k]);
			}else{
				$blList[1][$k]['deny_user_nickname'] = $denyUser->getName('user_nickname');
			}
		}
		// BL���������
		$this->af->setApp('bl_list', $blList);
	}
}
?>
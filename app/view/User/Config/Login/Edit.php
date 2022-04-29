<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����ñ�����������Խ��ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserConfigLoginEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���å����������
		$sess = $this->session->get('user');
		
		// ���֥������ȼ���
		$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		// ��ñ��������UID������Ͽ
		if(!$user->get('user_uid')){
			$this->af->set('config_type',1);
		}
		// ��ñ��������UID�ѹ�(or ���)
		elseif($row[0] > 0){
			$this->af->set('config_type',0);
		}
	}
}
?>
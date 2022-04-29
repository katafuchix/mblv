<?php
/**
 * Prof.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ץ�ե�������ܴ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminConfigUserProf extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array(
				'config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
			),
			array(),
			array('config_user_prof_order' => 'ASC')
		);
		$this->af->setApp('configUserProfList', $configUserProfList[1]);
		
		$configUserProfTypeList = array(
			1 => '�ƥ�����',
			2 => '�ƥ����ȥ��ꥢ',
			3 => '���쥯�ȥܥå���',
			4 => '�饸���ܥ���',
			5 => '�����å��ܥå���',
		);
		$this->af->setApp('configUserProfTypeList', $configUserProfTypeList);
	}
}
?>
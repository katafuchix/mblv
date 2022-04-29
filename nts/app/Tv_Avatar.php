<?php
/**
 * Tv_Avatar.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���Х����ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_AvatarManager extends Ethna_AppManager
{
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
		case 'sex_type':
			$status_list = array(
				'0'	=> array('name' => '�˽�'),
				'1'	=> array('name' => '�ˤΤ�'),
				'2'	=> array('name' => '���Τ�'),
			);
			return $status_list;
		case 'image_status':
			$status_list = array(
				''	=> array('name' => '�ѹ����ʤ�'),
				'edit'	=> array('name' => '�ѹ�����'),
				'delete'	=> array('name' => '�������'),
			);
			return $status_list;
		default:
			return parent::getAttrList($attr_name);
		}
	}
}

/**
 * ���Х������֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Avatar extends Ethna_AppObject
{
}
?>
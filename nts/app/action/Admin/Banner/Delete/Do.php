<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ�����¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBannerDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'banner_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����Хʡ�����¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBannerDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// �Хʡ��������ʢ�ʪ���������
		$db = $this->backend->getDB();
		$sql = "DELETE FROM banner WHERE banner_id = " . $this->af->get('banner_id');
		// ���
		$res = $db->query($sql);
		// ������顼�ξ��
		if (PEAR::isError($res)) return 'admin_banner_list';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_DELETE_DONE);
		return 'admin_banner_list';
	}
}
?>
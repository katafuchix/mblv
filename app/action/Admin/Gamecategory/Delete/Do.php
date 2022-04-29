<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������५�ƥ������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminGamecategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'game_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * ���������५�ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminGamecategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ƥ���ʲ��˥��������Ͽ�����뤫�����å�����
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' game ',
			'sql_where'		=> 'game_category_id =  ? AND game_status = 1 ',
			'sql_values'	=> array( $this->af->get('game_category_id')),
		);
		$r = $um->dataQuery($param);
		// ������������
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_GAME_CATEGORY_DELETE_STOP);
			return 'admin_gamecategory_list';
		}
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
		// �����५�ƥ�������ʪ��������ʤ�
		$ac =& new Tv_GameCategory($this->backend, 'game_category_id', $this->af->get('game_category_id'));
		$ac->set('game_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_gamecategory_list';
		
		$this->ae->add(null, '', I_ADMIN_GAME_CATEGORY_DELETE_DONE);
		return 'admin_gamecategory_list';
	}
}
?>
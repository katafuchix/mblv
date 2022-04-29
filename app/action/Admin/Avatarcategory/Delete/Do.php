<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х������ƥ������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarcategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������Х������ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ƥ���ʲ��˥��Х�������Ͽ�����뤫�����å�����
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' avatar ',
			'sql_where'		=> 'avatar_category_id =  ? AND avatar_status = 1 ',
			'sql_values'	=> array( $this->af->get('avatar_category_id')),
		);
		$r = $um->dataQuery($param);
		// ������������
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_DELETE_STOP);
			return 'admin_avatarcategory_list';
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
		// ���Х������ƥ�������ʪ��������ʤ�
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $this->af->get('avatar_category_id'));
		$ac->set('avatar_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatarcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_DELETE_DONE);
		return 'admin_avatarcategory_list';
	}
}
?>
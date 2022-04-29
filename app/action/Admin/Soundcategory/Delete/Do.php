<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������ɥ��ƥ������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundcategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'sound_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * ����������ɥ��ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ƥ���ʲ��˥�����ɤ���Ͽ�����뤫�����å�����
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' sound ',
			'sql_where'		=> 'sound_category_id =  ? AND sound_status = 1 ',
			'sql_values'	=> array( $this->af->get('sound_category_id')),
		);
		$r = $um->dataQuery($param);
		// ������������
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_DELETE_STOP);
			return 'admin_soundcategory_list';
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
		$ac =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$ac->set('sound_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_soundcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_DELETE_DONE);
		return 'admin_soundcategory_list';
	}
}
?>
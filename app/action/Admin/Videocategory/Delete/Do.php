<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ����ƥ������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'video_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����ӥǥ����ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryDeleteDo extends Tv_ActionAdminOnly
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
			'sql_from'		=> ' video ',
			'sql_where'		=> 'video_category_id =  ? AND video_status = 1 ',
			'sql_values'	=> array( $this->af->get('video_category_id')),
		);
		$r = $um->dataQuery($param);
		// ������������
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_DELETE_STOP);
			return 'admin_videocategory_list';
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
		$ac =& new Tv_VideoCategory($this->backend, 'video_category_id', $this->af->get('video_category_id'));
		$ac->set('video_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_videocategory_list';
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_DELETE_DONE);
		return 'admin_videocategory_list';
	}
}
?>
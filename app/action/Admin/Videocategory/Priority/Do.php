<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ����ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'video_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * �����ӥǥ����ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryPriorityDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_videocategory_list';
		
		// ͥ���٤ν�ʣ
		$video_category_priority_id = $this->af->get('video_category_priority_id');
		if(count($video_category_priority_id)!=count(array_unique($video_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_PRIORITY_DUPLICATE);
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
		// ������ɥ��ƥ����Խ�
		$video_category_priority_id = $this->af->get('video_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($video_category_priority_id as $k => $v){
			if($k){
				$gc =& new Tv_VideoCategory($this->backend, 'video_category_id', $k);
				$gc->set('video_category_priority_id', $v);
				$r = $gc->update();
				if(Ethna::isError($r)) return 'admin_videocategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_PRIORITY_DONE);
		return 'admin_videocategory_list';
	}
}
?>
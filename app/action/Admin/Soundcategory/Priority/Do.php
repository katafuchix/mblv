<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������ɥ��ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundcategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'sound_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * ����������ɥ��ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_soundcategory_list';
		
		// ͥ���٤ν�ʣ
		$sound_category_priority_id = $this->af->get('sound_category_priority_id');
		if(count($sound_category_priority_id)!=count(array_unique($sound_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_PRIORITY_DUPLICATE);
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
		// ������ɥ��ƥ����Խ�
		$sound_category_priority_id = $this->af->get('sound_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($sound_category_priority_id as $k => $v){
			if($k){
				$gc =& new Tv_SoundCategory($this->backend, 'sound_category_id', $k);
				$gc->set('sound_category_priority_id', $v);
				$r = $gc->update();
				if(Ethna::isError($r)) return 'admin_soundcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_PRIORITY_DONE);
		return 'admin_soundcategory_list';
	}
}
?>
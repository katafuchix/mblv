<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х������ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarcategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> array(VAR_TYPE_INT),
			'required'	=> true,
		),
	);
}

/**
 * �������Х������ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarcategory_list';
		
		// ͥ���٤ν�ʣ
		$avatar_category_priority_id = $this->af->get('avatar_category_priority_id');
		if(count($avatar_category_priority_id)!=count(array_unique($avatar_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_PRIORITY_DUPLICATE);
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
		// ���Х������ƥ����Խ�
		$avatar_category_priority_id = $this->af->get('avatar_category_priority_id');
		foreach($avatar_category_priority_id as $k => $v){
			if($k){
				$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $k);
				$ac->set('avatar_category_priority_id', $v);
				$r = $ac->update();
				if(Ethna::isError($r)) return 'admin_avatarcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE);
		return 'admin_avatarcategory_list';
	}
}
?>
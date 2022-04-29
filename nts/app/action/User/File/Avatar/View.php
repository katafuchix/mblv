<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileAvatarView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'attr' => array(
			'type'  => VAR_TYPE_INT,
		),
		'width' => array(
			'type'  => VAR_TYPE_INT,
		),
		'height' => array(
			'type'  => VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�����Х����������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileAvatarView extends Tv_ActionUser //Only
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) exit;
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
		// ���Х����Υץ�ӥ塼������
		$avatar =& $this->backend->getManager('AvatarGenerator');
		
		// ���Х�����������
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		// ���Х�����¤η���
		$avatar_stand_id = $a->get('avatar_stand_id');
		$avatar_category_id = $a->get('avatar_category_id');
		// ���Х�������Υ��Х�����¾��󤬤ʤ���Х��Х������ƥ���Υ��Х�����¾�����������
		if(!$avatar_stand_id && $avatar_category_id){
			$ac = new Tv_AvatarCategory($this->backend, 'avatar_category_id', $avatar_category_id);
			if($ac->isValid()){
				$avatar_stand_id = $ac->get('avatar_stand_id');
			}
		}
		// ���Х������ID������Х��Х�����¾�����������
		$hit = false;
		if($avatar_stand_id){
			$as = new Tv_AvatarStand($this->backend, 'avatar_stand_id', $avatar_stand_id);
			if($as->isValid()){
				// �طʥ쥤�䡼���ɲ�
				$hit = true;
				// �طʥ쥤�䡼�Ϥʤ��Ƥ�褤
				if($as->get('avatar_stand_image')){
					$item[] = $as->get('avatar_stand_image');
				}
				// �ڤ�Ф��������η���
				$avatar->set_base(
					$as->get('avatar_stand_base_x'),
					$as->get('avatar_stand_base_y'),
					$as->get('avatar_stand_base_w'),
					$as->get('avatar_stand_base_h')
				);
				// �쥤�䡼���¤��ؤ��򤹤�
				if($a->get('avatar_image1_desc')){
					$item[] = $a->get('avatar_image1_desc');
					if($a->get('avatar_image2_desc')){
						// ����2������1�����㤤�쥤�䡼�ξ��
						if($a->get('avatar_image1_z') > $a->get('avatar_image2_z')){
							$item[2] = $item[1];// �쥤�䡼1
							$item[1] = $item[0];// ���
							$item[0] = $a->get('avatar_image2_desc');// �쥤�䡼2
						}
						// ����2������1����⤤�쥤�䡼�ξ��
						else{
							$item[0] = $item[1];// �쥤�䡼1
							$item[1] = $item[0];// ���
							$item[2] = $a->get('avatar_image2_desc');// �쥤�䡼2
						}
					}
				}
			}
		}
		// ���Х�����¾��󤬤ʤ����ϲ�����������ƽ��Ϥ���
		if(!$hit){
			// �쥤�䡼���¤��ؤ��򤹤�
			if($a->get('avatar_image1')){
				$item[0] = $a->get('avatar_image1');
				if($a->get('avatar_image2')){
					// ����2������1�����㤤�쥤�䡼�ξ��
					if($a->get('avatar_image1_z') > $a->get('avatar_image2_z')){
						$item[1] = $item[0];
						$item[0] = $a->get('avatar_image2');
					}else{
						$item[1] = $a->get('avatar_image2');
					}
				}
			}
		}
		
		// �ط�����
		$avatar->set_background("#ffffff");
		// �������η���
		if($this->af->get('width')) $avatar->set_width($this->af->get('width'));
		if($this->af->get('height')) $avatar->set_height($this->af->get('height'));
		// �쥤�䡼���ɲ�
		foreach($item as $k => $v){
			if($v) $avatar->add_layer($this->config->get('file_path') . 'avatar/' . $v);
		}
		// ����
		$avatar->build();
		exit;
	}
}

?>

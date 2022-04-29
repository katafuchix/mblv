<?php
/**
 * Edit.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �������ޥ��Խ����������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminMagazineEdit extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'magazine_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * �������ޥ��Խ����������¹ԥ��饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminMagazineEdit extends Tv_ActionAdminOnly
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
		// ���ޥ�����μ���
		$o = new Tv_Magazine($this->backend, 'magazine_id', $this->af->get('magazine_id'));
		$o->exportform();
		
		// ͽ��ǯ��������ʬ��
		$magazine_reserve_time = $o->get('magazine_reserve_time');
		preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):00:00/",$magazine_reserve_time,$match);
		$this->af->set('year',sprintf("%04d",$match[1]));
		$this->af->set('month',sprintf("%d",$match[2]));
		$this->af->set('day',sprintf("%d",$match[3]));
		$this->af->set('hour',sprintf("%d",$match[4]));
		return 'admin_magazine_edit';
	}
}
?>
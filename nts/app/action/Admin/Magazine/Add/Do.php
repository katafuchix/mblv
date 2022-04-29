<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �������ޥ���Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminMagazineAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'year' => array(
			'name'			=> 'ǯ',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'month' => array(
			'name'			=> '��',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'day' => array(
			'name'			=> '��',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
		'hour' => array(
			'name'			=> '��',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, hour',
		),
		'min' => array(
			'name'			=> 'ʬ',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, 10min',
		),
		'magazine_signature' => array(
			'name'			=> '��̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'magazine_title' => array(
			'name'			=> '��̾',
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'magazine_body_text' => array(
			'name'			=> '�ƥ�������ʸ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'magazine_body_html_status' => array(
			'name'			=> 'HTML�᡼�����Ѥ���',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(1 => 'HTML�᡼�����Ѥ���'),
		),
		'magazine_body_html' => array(
			'name'			=> 'HTML��ʸ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'magazine_user_num' => array(
			'name'			=> '�ۿ��оݲ����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'segment_id' => array(
			'name'			=> '��������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, segment',
		),
		'test_mailaddress' => array(
			'name'			=> '�ƥ��ȥ᡼�륢�ɥ쥹',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'custom'		=> 'checkMailaddress',
		),
		'magazine_test' => array(
			'name'			=> '�ƥ�������',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'			=> '���ᡡ�롡',
		),
	);
}

/**
 * �������ޥ���Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminMagazineAddDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'admin_magazine_add';
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_magazine_add';
		// �᡼��ޥ����������ƥ��Ȥξ��
		if($this->af->get('magazine_test')){
			$m = new Tv_Mail($this->backend);
			$user_params = array(
				array(
					'user_mailaddress'	=> $this->af->get('test_mailaddress'),
					'user_hash'			=> "test",
					'user_nickname'		=> "�ƥ��ȥ˥å��͡���",
					'user_point'		=> "100",
				)
			);
			$magazine_params = array(
				'subject'		=> $this->af->get('magazine_title'),
				'signature'		=> $this->af->get('magazine_signature'),
				'body_text'		=> $this->af->get('magazine_body_text'),
				'body_html'		=> $this->af->get('magazine_body_html'),
				'body_html_status'	=> $this->af->get('magazine_body_html_status'),
			);
			$m->sendAll($user_params, $magazine_params);
			$this->ae->add('errors', "����᡼�륢�ɥ쥹���˥ƥ��ȥ᡼��ޥ�������������ޤ���");
			return 'admin_magazine_add';
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
		// ���ޥ���Ͽ
		$m =& new Tv_Magazine($this->backend);
		$m->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$magazine_reserve_time = sprintf("%04d-%02d-%02d %02d:00:00",
										$this->af->get('year'),
										$this->af->get('month'),
										$this->af->get('day'),
										$this->af->get('hour')
									);
		$m->set('magazine_reserve_time',$magazine_reserve_time);
		$m->set('magazine_status',1);
		// HTML�᡼�����Ѥ���
		if(!$this->af->get('magazine_body_html_status')){
			$m->set('magazine_body_html_status', 0);
		}
		// �����оݥ桼������׻�
		$sm = $this->backend->getManager('Segment');
		$m->set('magazine_user_num', count($sm->getSegmentUser($this->af->get('segment_id'))));
		// ��Ͽ
		$r = $m->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_magazine_add';
		
		$this->ae->add("errors","���ޥ���Ͽ����λ���ޤ�����");
		return 'admin_magazine_list';
	}
}
?>
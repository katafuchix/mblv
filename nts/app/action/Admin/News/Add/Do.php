<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����˥塼����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminNewsAddDo extends Tv_ActionForm
{

	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'news_type' => array(
			// NAPATOWN
			// 'required'	=> true,
		),
		'news_title' => array(
			'required'	=> true,
		),
		'news_body' => array(
			'required'	=> true,
		),
		'news_time' => array(
		),
		'update' => array(
		),
		// �ۿ�����
		'news_start_status' => array(
			'name'		=> '�ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'news_start_year' => array(
			'name'		=> '�ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_year' => array(
			'name'		=> '�ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month' => array(
			'name'		=> '�ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day' => array(
			'name'		=> '�ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_start_hour' => array(
			'name'		=> '�ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'news_start_min' => array(
			'name'		=> '�ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'news_end_status' => array(
			'name'		=> '�ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'news_end_year' => array(
			'name'		=> '�ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_year' => array(
			'name'		=> '�ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month' => array(
			'name'		=> '�ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day' => array(
			'name'		=> '�ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_end_hour' => array(
			'name'		=> '�ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'news_end_min' => array(
			'name'		=> '�ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �����˥塼����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminNewsAddDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �����Ƥξ��
		if (Ethna_Util::isDuplicatePost()) return 'admin_news_list';
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_news_add';
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
		// �˥塼����Ͽ
		$o =& new Tv_News($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �ۿ�������������
		if(!$this->af->get('news_start_status')){
			$o->set('news_start_status', 0);
			$o->set('news_start_time', '');
		}else{
			$o->set('news_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('news_start_year' ),
					$this->af->get('news_start_month'),
					$this->af->get('news_start_day'),
					$this->af->get('news_start_hour'),
					$this->af->get('news_start_min')
				)
			);
		}
		// �ۿ���λ��������
		if(!$this->af->get('news_end_status')){
			$o->set('news_end_status', 0);
			$o->set('news_end_time', '');
		}else{
			$o->set('news_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('news_end_year' ),
					$this->af->get('news_end_month'),
					$this->af->get('news_end_day'),
					$this->af->get('news_end_hour'),
					$this->af->get('news_end_min')
				)
			);
		}
		// NAPATOWN
		$o->set('news_type', NEWS_TYPE_TOP);
		
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_news_list';
		
		$this->ae->add(null, '', I_ADMIN_NEWS_ADD_DONE);
		return 'admin_news_list';
	}
}
?>
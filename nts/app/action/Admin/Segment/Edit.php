<?php
/**
 * Edit.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �������������Խ����������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentEdit extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'segment_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * �������������Խ����������¹ԥ��饹
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentEdit extends Tv_ActionAdminOnly
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
		// �������Ⱦ���μ���
		$o = new Tv_Segment($this->backend, 'segment_id', $this->af->get('segment_id'));
		$o->exportform();
		
		// �������Ⱦ���Υ������ݡ���
		$sm = $this->backend->getManager('Segment');
		$segment_keys = $sm->getSegmentKeys();
		foreach($segment_keys as $v){
			$this->af = $sm->setDivSegment($this->af, $v);
		}
		// �ݥ���ȡʥ������ݡ��ȺѤߡ�
		// ǯ��ʥ������ݡ��ȺѤߡ�
		// ��Ͽ����
		$start_date = $o->get('user_created_date_start');
		$end_date = $o->get('user_created_date_end');
		if($start_date && $end_date){
			preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):00:00/",$start_date,$match);
			$this->af->set('user_created_year_start',sprintf("%04d",$match[1]));
			$this->af->set('user_created_month_start',sprintf("%d",$match[2]));
			$this->af->set('user_created_day_start',sprintf("%d",$match[3]));
			preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):59:59/",$end_date,$match);
			$this->af->set('user_created_year_end',sprintf("%04d",$match[1]));
			$this->af->set('user_created_month_end',sprintf("%d",$match[2]));
			$this->af->set('user_created_day_end',sprintf("%d",$match[3]));
		}
		return 'admin_segment_edit';
	}
}
?>
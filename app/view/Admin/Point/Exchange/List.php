<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ݥ���ȸ򴹰������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminPointExchangeList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(
				'column' => 'u.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// �ݥ���ȥ�����
			'point_type' => array(
				'column' => 'p.point_type',
			),
			// �ݥ����ID
			'point_id' => array(
				'column' => 'p.point_id',
			),
			// �ݥ���ȥ���ID
			'point_sub_id' => array(
				'column' => 'p.point_sub_id',
			),
			// �桼������ID
			'user_sub_id' => array(
				'column' => 'p.user_sub_id',
			),
			// �ݥ��������
			'point_memo' => array(
				'type'	=> 'LIKE',
				'column' => 'p.point_memo',
			),
			// �ݥ���ȥ��ơ�����
			'point_status' => array(
				'column' => 'p.point_status',
			),
			// �ݥ���ȼ�����������
			'point_exchange_created' => array(
				'type' => 'PERIOD',
				'column' => 'pe.point_exchange_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ��������Ϳ
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= 'pe.point_id = p.point_id AND p.user_id = u.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u, point as p, point_exchange as pe',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'pe.point_exchange_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
	
	/**
	 * CSV����Ϥ���
	 */
	 /*
	function forward()
	{
		// CSV��������ɤξ��
		if($this->af->get('csv')){
			$file_name = date('Ymd_His') . ".csv";
			header("Content-Disposition: inline ; filename=$file_name" );
			header("Content-type: text/octet-stream");
			header("Content-Length: ". strlen($result));
			
			if($this->af->get('point_type') ==10){
				$template = 'ebank';
			}elseif($this->af->get('point_type') ==11){
				$template = 'edy';
			}else{
				$template = 'normal';
			}
		}
		if($template){
			$renderer =& $this->_getRenderer();
			$this->_setDefault($renderer);
			$html = $renderer->engine->fetch('admin/csv/' . $template . '.tpl');
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
		}else{
			parent::forward();
		}
	}
	*/
}
?>
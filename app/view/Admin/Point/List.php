<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ݥ���Ȱ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminPointList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
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
			// ������������
			'point_created' => array(
				'type' => 'PERIOD',
				'column' => 'p.point_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = p.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u,point as p',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'p.point_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
	
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  @access public
	 */
	function forward()
	{
		// ��������ɤξ��
		if($this->af->get('download')){
			// �������
			$this->listview['data_only'] = true;
			// listview�¹�
			$this->build();
			// �ե�����̾�η���
			$file_name = date('Ymd_His') . ".csv";
			// �ե�����̾�إå�����
			header("Content-Disposition: inline ; filename={$file_name}" );
			// MIME�����ץإå�����
			header("Content-type: text/octet-stream");
			// �����饪�֥������Ȥ����
			$renderer =& $this->_getRenderer();
			// �ǥե���ȥޥ����¹�
			$this->_setDefault($renderer);
			// HTML�����
			$html = $renderer->engine->fetch('admin/csv/point.tpl');
			// �������إå�����
			header("Content-Length: ". strlen($html));
			// ʸ�������ɤ��Ѵ����ƽ���
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
			// ��λ
			exit;
		}
		// ����¾�ξ��
		else{
			parent::forward();
		}
	}
}
?>
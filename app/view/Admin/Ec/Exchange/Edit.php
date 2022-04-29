<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcExchangeEdit extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ����μ���
		$o =& new Tv_Exchange($this->backend,'exchange_id',$this->af->get('exchange_id'));
		$o->exportform();
		
		// ����ϰϤ������������������μ���
		$o =& new Tv_ExchangeRange($this->backend);
		$filter = array(
			'exchange_id' => new Ethna_AppSearchObject($this->af->get('exchange_id'), OBJECT_CONDITION_EQ),
		);
 		$list = $o->searchProp(
			array('exchange_range_id','exchange_id','exchange_range_start','exchange_range_end','exchange_range_price'),
			$filter,
			array('exchange_range_id'=>'ASC'),
			null,
			null
		);
		$this->af->setApp('exchange_range_list',$list[1]);
		$this->af->setApp('count',count($list[1]));
	}
}
?>
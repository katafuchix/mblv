<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemEdit extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'item_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
		),
	);
}

/**
 * ���������Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemEdit extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_item_list';
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
		
		// ���ʾ���μ���
		$itemObject =& new Tv_Item($this->backend,'item_id',$this->af->get('item_id'));
		$itemObject->exportform();
		
		// ����޶��ڤ�Υ��ƥ���������
		$category = explode(",", $itemObject->get('item_category_id'));
		$this->af->set('item_category_id', $category);
		
		// ���ȥå�����μ���
		$stockObject =& new Tv_Stock($this->backend);
		$filter = array(
			'stock_status' => new Ethna_AppSearchObject(1, OBJECT_CONDITION_EQ),
			'item_id' => new Ethna_AppSearchObject($this->af->get('item_id'), OBJECT_CONDITION_EQ),
		);
		$stockList = $stockObject->searchProp(
			array('stock_id','item_type','stock_num','stock_priority_id','stock_one_type_status'),
			$filter,
			array('stock_priority_id'=>'ASC'),
			null,
			null
		);
		$this->af->setApp('stock_list',$stockList[1]);
		
		// �ꥹ������
		$um =& $this->backend->getManager('Util');
		
		// ���ȥå�ͥ���ٽ�̥��ץ����
		for($i=1;$i<=$stockList[0];$i++){
			$stock_priority_id_list[$i]['name'] = $i;
		}
		$this->af->setApp('stock_priority_id_list',$stock_priority_id_list);
		
		// ����ץ��������μ���
		$sampleObject =& new Tv_Sample($this->backend);
		$filter = array(
			'sample_status' => new Ethna_AppSearchObject(1, OBJECT_CONDITION_EQ),
			'item_id' => new Ethna_AppSearchObject($this->af->get('item_id'), OBJECT_CONDITION_EQ),
		);
		$sampleList = $sampleObject->searchProp(array('sample_id','sample_name','sample_image','sample_priority_id'),$filter,array('sample_priority_id'=>'ASC'),null,null);
		$this->af->setApp('sample_list',$sampleList[1]);
		foreach($sampleList[1] as $k => $v){
			$sample_image_array[$k] = $v['sample_image'];
		}
		$this->af->set('sample_image', $sample_image_array);
		
		// ����ץ�ͥ���ٽ�̥��ץ����
		for($i=1;$i<=$sampleList[0];$i++){
			$sample_priority_id_list[$i]['name'] = $i;
		}
		$this->af->setApp('sample_priority_id_list',$sample_priority_id_list);
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $itemObject->get('item_start_time'), 'item_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $itemObject->get('item_end_time'), 'item_end');
		
		// ����å�̾�����
		$s =& new Tv_Shop($this->backend, 'shop_id', $this->af->get('shop_id'));
		$s->exportForm();
		
		return 'admin_ec_item_edit';
	}
}
?>
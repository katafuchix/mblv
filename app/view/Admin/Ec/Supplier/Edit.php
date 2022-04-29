<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcSupplierEdit extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ����μ���
		$o =& new Tv_Supplier($this->backend,'supplier_id',$this->af->get('supplier_id'));
		$o->exportform();
		$this->af->setApp("supplier_id",$this->af->get('supplier_id'));

		// Ʊ���оݰ���
		$um =& $this->backend->getManager('Util');
		$list = $um->getAttrList('supplier');
		$this->af->setApp('supplier_list', $list);
		
		// Ʊ�����Ĥ���Ƥ���ID
		$o =& new Tv_Supplier($this->backend, 'supplier_id', $this->af->get('supplier_id'));
		$o->exportform();
		$ids = $o->get('supplier_bundle_allow_id');
		$ids = explode(':', $ids);
		unset($ids[0]);
		$this->af->setApp('supplier_bundle_allow_id', $ids);
		
		//�����å��ܥå����Ѥ˥ꥹ������
		foreach($list as $k => $v){
			$supplier_allow_list[$k]['id'] = $k;
			$supplier_allow_list[$k]['name'] = $v['name'];
			if(in_array($k, $ids)){
				$supplier_allow_list[$k]['checked'] = true;
			}else{
				$supplier_allow_list[$k]['checked'] = false;
			}
			
		}
		$this->af->setApp('supplier_allow_list', $supplier_allow_list);
	}
}
?>
<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������������Ͽ�¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcSupplierAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'supplier_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'supplier_shipping_type' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_RADIO,
			'option'		=> array(1 => 'ľ�ܥ桼���ؽв�', 2 => 'Ǽ�ʸ�˽в�',),
		),
		'postage_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, postage',
		),
		'exchange_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, exchange',
		),
		'supplier_bundle_allow_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> 'Util, supplier',
		),
		'supplier_use_credit_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '���쥸�å�'),
		),
		'supplier_use_conveni_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '����ӥ�'),
		),
		'supplier_use_exchange_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '������'),
		),
		'supplier_use_transfer_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '��Կ���'),
		),
		'add' => array(
		),
	);
}

/**
 * ������������Ͽ�¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcSupplierAddDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_supplier_add';
		
		// 2��POST�ξ��
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_supplier_list';
		
		// ��� ���꤬��Ĥ�ʤ����
		if ( !$this->af->get('supplier_use_credit_status') 
			&& !$this->af->get('supplier_use_conveni_status') 
			&& !$this->af->get('supplier_use_exchange_status') 
			&& !$this->af->get('supplier_use_transfer_status') )
		{
			$this->ae->add(null, '', E_ADMIN_SUPPLIER_SETTLEMENT);
			return 'admin_ec_supplier_add';
		}
		
		// ����̾�ν�ʣ��ǧ
		$um =& $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'supplier',
			'sql_where'		=> 'supplier_name = ?',
			'sql_values'	=> array($this->af->get('supplier_name')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_SUPPLIER_NAME_ALREADY_USED);
			return 'admin_ec_supplier_add';
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
		// �ɲý���
		$o = new Tv_Supplier($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('supplier_status',1);
		$o->set('supplier_shipping_type',$this->af->get('supplier_shipping_type'));
		// Ʊ������
		if($this->af->get('supplier_bundle_allow_id')){
			foreach($this->af->get('supplier_bundle_allow_id') as $v){
				$supplier_bundle_allow_id.= ":$v";
			}
			$o->set('supplier_bundle_allow_id', $supplier_bundle_allow_id);
		}
		$timestamp = date('Y-m-d H:i:s');
		$o->set('supplier_created_time', $timestamp);
		$o->set('supplier_updated_time', $timestamp);
		
		// �����ɲ�
		$r = $o->add();
		if(Ethna::isError($r)) return 'master_supplier_add';
		$id = $o->getId();//��ʬ��ID
		
		//Ʊ������˼�ʬ��ID���ɲä��Ƥ��� start
		$o = new Tv_Supplier($this->backend, 'supplier_id', $id);
		$o->set('supplier_bundle_allow_id', ':'.$id.$o->get('supplier_bundle_allow_id'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'master_supplier_add';
		//Ʊ������˼�ʬ��ID���ɲä��Ƥ��� end


		//��Ӥ��뤿���supplier_id���������ʸ��ߤ�supplier_id������
		$o =& new Tv_Supplier($this->backend);
		$o_list = $o->searchProp(array('supplier_id',),array());
		foreach($o_list[1] as $v){
			$all_supplier_id_array[] = $v['supplier_id'];
		}
		$supplierObject =& new Tv_Supplier($this->backend,'supplier_id',$id);
		$supplier_bundle_allow_id = explode(':', $supplierObject->get('supplier_bundle_allow_id'));
		
		foreach($all_supplier_id_array as $k => $v){
			//��ʬ��ID�Ϲ����ѤߤʤΤ�continue
			if($id == $v){
				continue;
			}
			$eachObject =& new Tv_Supplier($this->backend,'supplier_id',$v);
			$each_supplier_bundle_allow_id = explode(':', $eachObject->get('supplier_bundle_allow_id'));
			
			if( array_search($id, $each_supplier_bundle_allow_id)
				&& 	array_search($v, $supplier_bundle_allow_id)){
			}else if( !(array_search($id, $each_supplier_bundle_allow_id))
				&& 	array_search($v, $supplier_bundle_allow_id)){
				$each_supplier_bundle_allow_id[] = $id;
				$eachObject->set('supplier_bundle_allow_id', implode(':', $each_supplier_bundle_allow_id));
				$eachObject->update();
			}else if( array_search($id, $each_supplier_bundle_allow_id)
				&& 	!(array_search($v, $supplier_bundle_allow_id))){
				//������뤿��Υ��������
				$delete_id_key = "";
				$delete_id_value = "";
				foreach($each_supplier_bundle_allow_id as $k2 => $v2){
					if($id == $v2){
						 $delete_id_key   = $k2;
						 $delete_id_value = $v2;
					}
				}
				if($delete_id_key != ''){		
					unset($each_supplier_bundle_allow_id[$delete_id_key]);		
					$eachObject->set('supplier_bundle_allow_id', implode(':', $each_supplier_bundle_allow_id));
					$eachObject->update();
				}
			}
		}
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SUPPLIER_ADD_DONE);
		return 'admin_ec_supplier_list';
	}
}
?>
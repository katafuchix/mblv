<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������������Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcExchangeEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'exchange_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'exchange_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'exchange_same_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'exchange_same_price' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_type' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'exchange_total_price_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_price_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_price_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_range_start' => array(
			'type'			=> array(VAR_TYPE_STRING),
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'exchange_range_end' => array(
			'type'			=> array(VAR_TYPE_STRING),
			'min' 			=> 0,
		),
		'exchange_range_price' => array(
			'type'			=> array(VAR_TYPE_INT),
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'exchange_range_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'new_exchange_range_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'new_exchange_range_start' => array(
			'type'			=> array(VAR_TYPE_INT),
			'min' 			=> 0,
		),
		'new_exchange_range_end' => array(
			'type'			=> array(VAR_TYPE_INT),
			'min' 			=> 0,
		),
		'new_exchange_range_price' => array(
			'type'			=> array(VAR_TYPE_INT),
			'min' 			=> 0,
		),
		'edit' => array(
		),
	);
}

/**
 * ���������������Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcExchangeEditDo extends Tv_ActionAdminOnly
{
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_exchange_edit';
		// ��Χ��������å�ON�ǡ���Χ�������⤬����ξ��
		if ( ($this->af->get('exchange_same_status')) && (!$this->af->get('exchange_same_price')) ) {
			$this->ae->add(null, '', E_ADMIN_EXCHANGE_SAME_PRICE);
			return 'admin_ec_exchange_edit';
		}
		// ����̾�ν�ʣ��ǧ
		$um =& $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'exchange',
			'sql_where'		=> 'exchange_id <> ? AND exchange_name = ?',
			'sql_values'	=> array($this->af->get('exchange_id'),$this->af->get('exchange_name')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_EXCHANGE_NAME_ALREADY_USED);
			return 'admin_ec_exchange_edit';
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
		
		// ���󹹿�����
		$exchangeObject =& new Tv_Exchange($this->backend,'exchange_id',$this->af->get('exchange_id'));
		$exchangeObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$exchangeObject->set('exchange_same_status', $this->af->get('exchange_same_status'));
		$exchangeObject->set('exchange_updated_time', date('Y-m-d H:i:s') );
		
		// ���󹹿�
		$r = $exchangeObject->update();
		if(Ethna::isError($r)) return 'admin_ec_exchange_edit';
		
		//�������������꥿���פ�2������ϰϤ�����������������ξ���exchange_range�ơ��֥��update����
		if($this->af->get('exchange_type') == 2){
			$exchange_range_id 		= $this->af->get('exchange_range_id');
			$exchange_range_start 	= $this->af->get('exchange_range_start');
			$exchange_range_end 	= $this->af->get('exchange_range_end');
			$exchange_range_price 	= $this->af->get('exchange_range_price');
			foreach($exchange_range_id as $k => $v){
				$o =& new Tv_ExchangeRange($this->backend, 'exchange_range_id', $v);
				$o->set('exchange_range_start',$exchange_range_start[$k]);
				$o->set('exchange_range_end',$exchange_range_end[$k]);
				$o->set('exchange_range_price',$exchange_range_price[$k]);
				if($exchange_range_start[$k] >= $exchange_range_end[$k]) continue;
				$r = $o->update();
				
				if(Ethna::isError($r)) return 'admin_ec_exchange_edit';
			}
			
			//�������ե������ɲä��줿���
			if($this->af->get('new_exchange_range_start')){
				$new_exchange_range_start 	= $this->af->get('new_exchange_range_start');
				$new_exchange_range_end 	= $this->af->get('new_exchange_range_end');
				$new_exchange_range_price 	= $this->af->get('new_exchange_range_price');
				foreach($new_exchange_range_start as $k => $v){
					$o =& new Tv_ExchangeRange($this->backend);
					$o->set('exchange_id',$this->af->get('exchange_id'));
					$o->set('exchange_range_start',$v);
					$o->set('exchange_range_end',$new_exchange_range_end[$k]);
					$o->set('exchange_range_price',$new_exchange_range_price[$k]);
					if($v >= $new_exchange_range_end[$k]) continue;
					$r = $o->add();
					if(Ethna::isError($r)) return 'admin_ec_exchange_edit';
				}
			}
		}
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_EXCHANGE_EDIT_DONE);
		return 'admin_ec_exchange_list';
	}
}
?>
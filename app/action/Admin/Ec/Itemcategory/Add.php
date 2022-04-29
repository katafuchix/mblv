<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ƥ����ɲå��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryAdd extends Tv_ActionForm
{
}

/**
 * �������ƥ����ɲå��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryAdd extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ޤ�����åפ��ʤ����ϥ��ƥ������ʤ�
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' count(shop_id)as cnt ',
			'sql_from'		=> ' shop ',
			'sql_where'		=> ' shop_status = ? ',
			'sql_values'	=> array(1,),
		);
		$rows = $um->dataQuery($param);
		if( $rows[0]['cnt'] == 0 ){
			$this->ae->add('errors',"���ƥ�����ɲä���ˤϡ��ޤ�����åפ�������Ƥ���������");
			return 'admin_ec_shop_list';
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
		return 'admin_ec_itemcategory_add';
	}
}
?>
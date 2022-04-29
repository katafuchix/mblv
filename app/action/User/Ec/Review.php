<?php
/**
 * Review.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ӥ塼ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReview extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'page' => array(
			'type'        => VAR_TYPE_INT,
		),
		'start' => array(
			'type'			=> VAR_TYPE_INT,
		),
	);
}

/**
 * ��ӥ塼ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReview extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$um = $this->backend->getManager('Util');
		
		// ��ӥ塼�����뤫Ƚ��
		$sqlWhere = 'u.user_id = a.user_id AND a.item_id = i.item_id AND a.review_status = 3 AND a.item_id = ?';
		$sqlValues = array();
		$sqlValues[] = $this->af->get('item_id');
		$param = array(
			'sql_select'	=> 'u.user_id,u.user_name,a.review_id,a.review_created_time,a.review_title,a.review_body,a.review_status, i.item_id, i.item_category_id, i.item_name ,i.item_image, i.item_price, i.item_text1, i.shop_id',
			'sql_from'		=> 'user as u, review as a,item as i',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		
		$r = $um->dataQuery($param);
		if(count($r) == 0){
			$this->ae->add(null, '', E_USER_ITEM_NOT_FOUND);
			return 'user_error';
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
		return 'user_ec_review';
	}
}
?>
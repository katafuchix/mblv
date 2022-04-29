<?php
/**
 * Cart.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �㤤ʪ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcCart extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		//�㤤ʪ������Ȥμ��������å�
		$cart = $this->backend->getManager('Cart');
		$cart_list = $cart->getCartList($this->session->get('cart_hash'), 0);
		$this->af->setApp('cart_list', $cart_list);
		//��̤��ʤ����
		if(count($cart_list)==0 || $cart_list == false){
			$this->ae->add(null, '', E_USER_CART_EMPTY);
		}
		//��̤�������
		else{
			//�ǹ��ξ�������פ���������å�
			$this->af->setApp('total_price', $cart->getTotalPriceTaxin($cart_list));
		}
		
		//�㤤ʪ�ƥڡ����ˤ����ᾦ�ʤ�ɽ������ start
		//�����᤹�뾦�ʤϡ����ֺǶ��㤤ʪ��������Ͽ���줿���ʤΥ���åפ������᤹�뾦��
		$values = array($this->session->get('cart_hash'));
		$param = array(
			'sql_select'	=> 'c.item_id, s.shop_new_arrivals',
			'sql_from'		=> 'cart c join item i on c.item_id = i.item_id and i.item_status = 1 join shop s on i.shop_id = s.shop_id and s.shop_status = 1',
			'sql_where'		=> 'c.cart_hash = ?',
			'sql_values'	=> $values,
		);
		$c = $um->dataQuery($param);
		
		//����åפΤ������������ͭ���ʾ��ʤΣɣĤ�������
		if(count($rows) > 0) {
			$newArrivalsId = explode(',', $rows[0]['shop_new_arrivals']);
			// �����ᾦ�ʾ���μ���
			if(is_array($newArrivalsId)){
				$j = 0;
				$now = date('Y-m-d H:i:s');
				for($i=0;$i<count($newArrivalsId);$i++){
					$itemObject =& new Tv_Item($this->backend,'item_id',$newArrivalsId[$i]);
					// ͭ���ʤ�ΤΤ�ɽ������
					if(
						$itemObject->get('item_status') == 1
						&&
						// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
						(
							$itemObject->get('item_start_status') == 0
							||
							$itemObject->get('item_start_status') == 1 && $itemObject->get('item_start_time') < $now
						)
						&&
						// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
						(
							$itemObject->get('item_end_status') == 0
							||
							$itemObject->get('item_end_status') == 1 && $itemObject->get('item_start_time') > $now
						)
					){
						$newArrivals[$i]['item_id'] = $newArrivalsId[$i];
						$newArrivals[$i]['item_name'] = $itemObject->get('item_name');
						$newArrivals[$i]['item_image'] = $itemObject->get('item_image');
						$newArrivals[$i]['item_text1'] = $itemObject->get('item_text1');
						if($j == 0){
							$newArrivals[$i]['ranking'] = "1st";
						}elseif($j == 1){
							$newArrivals[$i]['ranking'] = "2nd";
						}elseif($j == 2){
							$newArrivals[$i]['ranking'] = "3rd";
						}elseif($j == 3){
							$newArrivals[$i]['ranking'] = "4th";
						}elseif($j == 4){
							$newArrivals[$i]['ranking'] = "5th";
						}
						if($j >= 4 ) break;//5��Τ߼���
						$j++;
					}
				}
				$this->af->setAppNE('shop_recommend_list',$newArrivals);
			}
		}else{
			//����åפΤ������������ͭ���ʾ��ʤΣɣĤ��ʤ����
		}
		if(count($c) > 0) {
			$newArrivalsId = explode(',', $c[0]['shop_new_arrivals']);
			// �����ᾦ�ʾ���μ���
			if(is_array($newArrivalsId)){
				$j = 0;
				for($i=0;$i<count($newArrivalsId);$i++){
					$itemObject =& new Tv_Item($this->backend,'item_id',$newArrivalsId[$i]);
					if( (( $itemObject->get('item_start_status') == '1' && 
						  	$itemObject->get('item_start_time') <= date('Y-m-d H:i:s') && 
						  	$itemObject->get('item_end_time') >= date('Y-m-d H:i:s') )
						  	|| $itemObject->get('item_start_status') == '2')
						  && $itemObject->get('item_status') == '1' )
						{
							$newArrivals[$i]['item_id'] = $newArrivalsId[$i];
							$newArrivals[$i]['item_name'] = $itemObject->get('item_name');
							$newArrivals[$i]['item_image'] = $itemObject->get('item_image');
							$newArrivals[$i]['item_text1'] = $itemObject->get('item_text1');
							if($j == 0){
								$newArrivals[$i]['ranking'] = "1st";
							}elseif($j == 1){
								$newArrivals[$i]['ranking'] = "2nd";
							}elseif($j == 2){
								$newArrivals[$i]['ranking'] = "3rd";
							}elseif($j == 3){
								$newArrivals[$i]['ranking'] = "4th";
							}elseif($j == 4){
								$newArrivals[$i]['ranking'] = "5th";
							}
							if($j >= 4 ) break;//5��Τ߼���
							$j++;
						}
				}
				$this->af->setAppNE('shop_recommend_list',$newArrivals);
			}
		}else{
			//����åפΤ������������ͭ���ʾ��ʤΣɣĤ��ʤ����
		}
		
		//�㤤ʪ�ƥڡ����ˤ����ᾦ�ʤ�ɽ������ end
	}
}
?>
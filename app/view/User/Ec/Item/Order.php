<?php
/**
 * Order.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʧ����ˡ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemOrder extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		//���ξ��ʤλ�ʧ����ǽ�����סʥ��쥸�åȡ�����ӥˡ������ǽ����Կ��� �ˤ����
		$um = $this->backend->getManager('Util');
		$this->af->setApp('item_use_credit_status',   $um->getItemUseCreditStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_conveni_status',  $um->getItemUseConveniStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_exchange_status',  $um->getItemUseExchangeStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_transfer_status', $um->getItemUseTransferStatus($this->af->get('item_id')));
	}
}
?>
<?php
/**
 * Order.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 支払い方法説明画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemOrder extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		//この商品の支払い可能タイプ（クレジット、コンビニ、代引可能、銀行振込 ）を取得
		$um = $this->backend->getManager('Util');
		$this->af->setApp('item_use_credit_status',   $um->getItemUseCreditStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_conveni_status',  $um->getItemUseConveniStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_exchange_status',  $um->getItemUseExchangeStatus($this->af->get('item_id')));
		$this->af->setApp('item_use_transfer_status', $um->getItemUseTransferStatus($this->af->get('item_id')));
	}
}
?>
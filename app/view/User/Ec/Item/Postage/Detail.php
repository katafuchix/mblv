<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 送料詳細画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemPostageDetail extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// コンフィグ情報の取得
		$this->af->setApp('from_mailaddress', $this->config->get('from_mailaddress'));
		
		//この商品の送料設定ＩＤを取得
		$postage_id = $um->getPostageId($this->af->get('item_id'));
		$this->af->setApp('postage_id', $postage_id);
		
		//この商品の送料タイプ（ 1:全国,2:地域,3:合計金額,4:合計個数）を取得
		$um = $this->backend->getManager('Util');
		$postage_type = $um->getPostageType($this->af->get('item_id'));
		$this->af->setApp('postage_type', $postage_type);
		
		//送料設定名取得してセット
		$p = new Tv_Postage($this->backend, 'postage_id', $postage_id);
		$this->af->setApp('postage_name', $p->get('postage_name'));
		$this->af->setApp('postage_total_price_set', $p->get('postage_total_price_set'));
		$this->af->setApp('postage_total_piece_set', $p->get('postage_total_piece_set'));
		$p->exportForm(OBJECT_IMPORT_IGNORE_NULL);
		//postage_type == 2地域ごとの送料の場合
		if($postage_id && $postage_type == 2){
			//都道府県とその送料のリストを取得、セット
			$u = $this->backend->getManager('Util');
			$pref_list = $this->config->get('delivery_pref');
			foreach($pref_list as $k => $v){
				if(!is_numeric($k)) continue;
				$postage_list[$k]['name'] = $v['name'];
				$postage_list[$k]['fee'] = $p->get('postage_pref_'.$k);
			}
			$this->af->setApp('postage_list', $postage_list);
		}
	}
}
?>
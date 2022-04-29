<?php
/**
 * Tv_MediaAccess.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * メディアマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaAccessManager extends Ethna_AppManager
{
}

/**
 * メディアアクセスオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaAccess extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		// オブジェクトの追加
		$this->set('media_access_status',0);// status:0（アクセス済み）
		parent::add();
		
		// media_access_hashを生成する
		$um = $this->backend->getManager('Util');
		$this->set('media_access_hash', $um->getUniqId());
		$o = new Tv_MediaAccess($this->backend, 'media_access_id', $this->getId());
		$o->set('media_access_hash', $this->get('media_access_hash'));
		return $o->update();
	}
}
?>
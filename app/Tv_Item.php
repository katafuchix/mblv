<?php
/**
 * Tv_Item.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ItemManager extends Ethna_AppManager
{
}

/**
 * 商品オブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Item extends Ethna_AppObject
{
    // {{{ clear
    /**
     *  オブジェクトプロパティのクリア
     *
     *  @access public
     *  @param  string  $key    プロパティ名
     */
    function clear($key)
    {
        if (isset($this->prop[$key])) {
            unset($this->prop[$key]);
        }
    }
    // }}}
}
?>
<?php
/**
 * Tv_Item.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���i�}�l�[�W��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ItemManager extends Ethna_AppManager
{
}

/**
 * ���i�I�u�W�F�N�g
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Item extends Ethna_AppObject
{
    // {{{ clear
    /**
     *  �I�u�W�F�N�g�v���p�e�B�̃N���A
     *
     *  @access public
     *  @param  string  $key    �v���p�e�B��
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
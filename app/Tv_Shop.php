<?php
/**
 * Tv_Shop.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����åץޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ShopManager extends Ethna_AppManager
{
}

/**
 * ����åץ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Shop extends Ethna_AppObject
{
	/**
	 *  ���֥������ȥץ�ѥƥ�ɽ��̾�ؤΥ�������
	 *
	 *  @access     public
	 *  @param  string  $key	�ץ�ѥƥ�̾
	 *  @return string  �ץ�ѥƥ���ɽ��̾
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}
?>
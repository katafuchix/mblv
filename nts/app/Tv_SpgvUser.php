<?php
/**
 * Tv_SpgvUser.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * SPGV�桼���ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvUserManager extends Ethna_AppManager
{
}

/**
 * SPGV�桼�����֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvUser extends Ethna_AppObject
{
	/**#@+
	 *  @access private
	 */
	/** @var	string  DB����ץ�ե����� */
//	var $db_prefix = DB_SPGV;
	var $db_prefix = 'spgv';
	
	/**
	 *  @var	 array	�ơ��֥�
	 */
	var $table_def = array(
		'user' => array(
			'primary' => true,
		),
	);
}

?>
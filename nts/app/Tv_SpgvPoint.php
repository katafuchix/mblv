<?php
/**
 * Tv_SpgvPoint.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * SPGV�ݥ���ȥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvPointManager extends Ethna_AppManager
{
}

/**
 * SPGV�ݥ���ȥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvPoint extends Ethna_AppObject
{
	/**#@+
	 *  @access private
	 */
	/** @var	string  DB����ץ�ե����� */
	var $db_prefix = 'spgv';
	
	/**
	 *  @var	 array	�ơ��֥�
	 */
	var $table_def = array(
		'point' => array(
			'primary' => true,
		),
	);
}

?>
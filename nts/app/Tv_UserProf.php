<?php
/**
 *  Tv_UserProf.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  �桼���ץ�ե����륪�ץ��������ͥޥ͡�����
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package SNSV
 */
class Tv_UserProfManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υץ�դ�������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	function status_off($user_id)
	{ 
		// DB����³����
		$db = & $this->backend->getDB();
		// ���
		$sql = "DELETE FROM user_prof WHERE user_id =" . $user_id;
		$db->db->query($sql);
	} 
}

/**
 *  �桼���ץ�ե����륪�ץ��������ͥ��֥�������
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package SNSV
 */
class Tv_UserProf extends Ethna_AppObject
{
	/**
	 *  ���֥������ȥץ�ѥƥ�ɽ��̾�ؤΥ�������
	 *
	 *  @access public
	 *  @param  string  $key	�ץ�ѥƥ�̾
	 *  @return string  �ץ�ѥƥ���ɽ��̾
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}

?>

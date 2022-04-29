<?php
/**
 * Tv_ActionError.php
 *
 *  @author	 Tachnovarth
 *  @package	SNSV
 */

/**
 *  ���ץꥱ������󥨥顼�������饹
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package	SNSV
 */
class Tv_ActionError extends Ethna_ActionError
{
	/**
	 *  ���顼���֥������Ȥ�����/�ɲä���
	 *
	 *  @access public
	 *  @param  string  $name       ���顼��ȯ�������ե��������̾(���פʤ�null)
	 *  @param  string  $message    ���顼��å�����
	 *  @param  int     $code       ���顼������
	 *  @return Ethna_Error ���顼���֥�������
	 */
	function &add($name, $message, $code = null)
	{
		global $errorMessage;
		
		// ��å����������ɤ����å��������������
		if(isset($errorMessage[$code])){
			$message = $errorMessage[$code];
		}
		// ���顼�򥢥����󤹤�
		$error = parent::add($name, $message, $code);
		
		return $error;
	}
}
?>

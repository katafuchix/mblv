<?php
class Tv_Session extends Ethna_Session
{
	/**
	 *  Ethna_Session���饹�Υ��󥹥ȥ饯��
	 *
	 *  @access public
	 *  @param  string  $appid	  ���ץꥱ�������ID(���å����̾�Ȥ��ƻ���)
	 *  @param  string  $save_dir   ���å����ǡ�������¸����ǥ��쥯�ȥ�
	 */
	function Tv_Session($appid, $save_dir, $logger)
	{
//		$this->Ethna_Session('', $save_dir, $logger) ;
		$this->Ethna_Session('', '', $logger) ;
	}

	/**
	 *  ���å�������������
	 *
	 *  @access public
	 */
	function restore()
	{
		if (
			!empty($_COOKIE[$this->session_name])
			||
			(
				ini_get("session.use_trans_sid") == 1
				&&
				!empty($_REQUEST[$this->session_name])
			)
		){
			session_start();
			$this->session_start = true;
			
			// check session
//			if ($this->isValid() == false) {
//				setcookie($this->session_name, "", 0, "/");
//				$this->session_start = false;
//			}
			
			// check anonymous
			if ($this->get('__anonymous__')) {
				$this->anonymous = true;
			}
		}
	}

	/**
	 *  ���å����������������å�
	 *
	 *  @access public
	 *  @return bool	true:�����ʥ��å���� false:�����ʥ��å����
	 */
	function isValid()
	{
		if (!$this->session_start) {
			if (!empty($_COOKIE[$this->session_name]) || session_id() != null) {
				setcookie($this->session_name, "", 0, "/");
			}
			return false;
		}

		// check remote address
		if (!isset($_SESSION['REMOTE_ADDR'])
			|| $this->_validateRemoteAddr($_SESSION['REMOTE_ADDR'],
										  $_SERVER['REMOTE_ADDR']) == false) {
			// we do not allow this
			setcookie($this->session_name, "", 0, "/");
			session_destroy();
			$this->session_start = false;
			return false;
		}
		return true;
	}

	/**
	 *  ���å�������¸���줿IP���ɥ쥹�ȥ�����������IP���ɥ쥹��
	 *  Ʊ��ͥåȥ���ϰϤ��ɤ�����Ƚ�̤���(16bit mask)
	 *
	 *  @access private
	 *  @param  string  $src_ip	 ���å���󳫻ϻ��Υ���������IP���ɥ쥹
	 *  @param  string  $dst_ip	 ���ߤΥ���������IP���ɥ쥹
	 *  @return bool	true:���ｪλ false:������IP���ɥ쥹
	 */
	function _validateRemoteAddr($src_ip, $dst_ip)
	{
		return true;
	}


}

?>

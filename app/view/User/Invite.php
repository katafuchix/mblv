<?php
/**
 * Invite.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達招待ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserInvite extends Tv_ViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// セッション情報取得
		$sess = $this->session->get('user');
		
		//現在招待中メールアドレス一覧取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'invite',
			'sql_where'	=> 'from_user_id = ? AND invite_status = 1',
			'sql_values'	=> array($sess['user_id']),
		);
		$um = $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		$this->af->setApp('now_inviting_list', $r);
	}
}
?>
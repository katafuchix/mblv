<?php
/**
 * T1.php
 * 
 * @author	Technovarth 
 * @package	SPGV
 */

/**
 * リカバリ
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SPGV
 */
class Tv_Form_T1 extends Tv_ActionForm
{
}

/**
 * リカバリアクション
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SPGV
 */
class Tv_Action_T1 extends Tv_ActionClass
{
	function prepare()
	{
		return null;
	}
	function perform()
	{
/*
		//2-1 SNSのアドレス全取得する
		$db = $this->backend->getDB();
*/

/*
$sql = "select * from user";
$conn = mysql_connect('localhost', 'snsv', 'snsvpasu80');
mysql_select_db('napatownsns');
$res = mysql_query($sql,$conn);
while($re = mysql_fetch_array($res)){
	$ro = array(
		'user_id'			=> $re['user_id'],
		'user_mailaddress'	=> $re['user_mailaddress'],
		'spgv_user_id'		=> $re['spgv_user_id'],
		'user_point'		=> $re['user_point'],
	);
		$rows[] = $ro;
}

//define('DSN', 'mysql://snsv:snsvpasu80@localhost/'.DB_SNSV);
*/
/*
		$sql = "select * from user";
		$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);

		if (PEAR::isError($rows)){
			echo "2-1 error";
			exit;
		}

		$i=0;
		foreach($rows as $k => $v){
			//2-2 アドレスでECDB　存在確認
			$u =& new Tv_SpgvUser($this->backend, 'user_mailaddress', $v['user_mailaddress']);
			
			//2-3 アドレスでECDB　存在確認 あればECDB.user.snsv_user_id SNSDB.user.user_id update
			if($u->isValid()){
				$u->set('snsv_user_id', $v['user_id']);
				
				// ポイントが異なる場合はSNSのポイントの値で上書き
				if($v['user_point'] != $u->get('user_point')){
					$user_point = $v['user_point'];
					//print "[user]:" . $v['user_id'] . "=>" . $v['user_point'] . "+" . $u->get('user_point') . " = " . $user_point . "<br>";
					$u->set('user_point', $user_point);
				}
				
				$r = $u->update();
				if(Ethna::isError($r)) echo "2-3 update error user_id:".$v['user_id']."<br>";
			}
			
			//2-4 アドレスでECDB　存在確認 なければinsert ECDB.user insert ECDB.user.snsv_userid = SNSDB.user.user_id , SNSDB.user.spgv_user_id = getId update
			else{
				$u =& new Tv_SpgvUser($this->backend);
				$u->set('snsv_user_id', $v['user_id']);
				$u->set('user_mailaddress', $v['user_mailaddress']);
				$u->set('user_point', $v['user_point']);
				$u->set('user_status', 1);
				$r = $u->add();
				if(Ethna::isError($r)) echo "2-4 insert error user_id:".$v['user_id']."<br>";
				
				$_user_id = $u->getId();
				$u =& new Tv_User($this->backend, 'user_id', $v['user_id']);
				$u->set('spgv_user_id', $_user_id);
				$r = $u->update();
				if(Ethna::isError($r)) echo "2-4 update error user_id:".$v['user_id']."<br>";
			}
			$i++;
//			echo "2 user_id:" . $v['user_id']."<br>";
		}
		print "[r]:" . $i;
*/
	}
}
?>
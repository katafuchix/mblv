<?php
/**
 * T1.php
 * 
 * @author	Technovarth 
 * @package	SPGV
 */

/**
 * �ꥫ�Х�
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SPGV
 */
class Tv_Form_T1 extends Tv_ActionForm
{
}

/**
 * �ꥫ�Хꥢ�������
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
		//2-1 SNS�Υ��ɥ쥹����������
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
			//2-2 ���ɥ쥹��ECDB��¸�߳�ǧ
			$u =& new Tv_SpgvUser($this->backend, 'user_mailaddress', $v['user_mailaddress']);
			
			//2-3 ���ɥ쥹��ECDB��¸�߳�ǧ �����ECDB.user.snsv_user_id SNSDB.user.user_id update
			if($u->isValid()){
				$u->set('snsv_user_id', $v['user_id']);
				
				// �ݥ���Ȥ��ۤʤ����SNS�Υݥ���Ȥ��ͤǾ��
				if($v['user_point'] != $u->get('user_point')){
					$user_point = $v['user_point'];
					//print "[user]:" . $v['user_id'] . "=>" . $v['user_point'] . "+" . $u->get('user_point') . " = " . $user_point . "<br>";
					$u->set('user_point', $user_point);
				}
				
				$r = $u->update();
				if(Ethna::isError($r)) echo "2-3 update error user_id:".$v['user_id']."<br>";
			}
			
			//2-4 ���ɥ쥹��ECDB��¸�߳�ǧ �ʤ����insert ECDB.user insert ECDB.user.snsv_userid = SNSDB.user.user_id , SNSDB.user.spgv_user_id = getId update
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
<?php
/**
 * Tv_Media.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ǥ����ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaManager extends Ethna_AppManager
{
	/**
	 * �����ϩ�����Ͽ����
	 * ��ǥ�����ͳ�ǤΥ��������ξ��
	 * media_access�ơ��֥�˥ǡ������ɲä���
	 * �ɲä����ǡ�����key(media_access_hash)���֤�
	*/
	function addMediaAccess($code='')
	{
		// code�η���
		if(!$code){
			//�ꥯ������URL��'code'��������
			if (array_key_exists('code', $_REQUEST)){
				$code = $_REQUEST['code'];
			}
			// ����¾�ξ��
			else{
				return false;
			}
		}
		// media_setting�����ǥ��������μ���
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media',
			'sql_where'		=> 'media_status > 0 AND media_code = ?',
			'sql_values'	=> array($code),
		);
		$um =& $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		
		// media_access�ɲ�
		if(count($r) > 0){
			$o = new Tv_MediaAccess($this->backend);
			$o->set('media_id', $r[0]['media_id']);
			$o->set('media_access_param1',addslashes($_REQUEST[$r[0]['media_param1']]));
			$o->set('media_access_param2',addslashes($_REQUEST[$r[0]['media_param2']]));
			$o->set('media_access_param3',addslashes($_REQUEST[$r[0]['media_param3']]));
			$o->set('access_time', date('Y-m-d H:i:s'));
			// �����С��饤��
			$o->add();
			$media_access_hash = $o->get('media_access_hash');
			
			$sm = $this->backend->getManager('Stats');
			// ����å������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $o->get('media_id'), 0, 0);
			
			// media_access_hash���֤�
			return $media_access_hash;
		}
		
		return false;
	}
	
	/**
	 * �����ϩ�����̤���������
	 */
	function mediaResponse($media_access_hash, $no_point=false)
	{
		/* =============================================
		// �����ϩ��������
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// ����������
		$buf = "start ".date('Y-m-d H:i:s')."\n";
		
		
		// �����Υ�ǥ�����������ID�����뤫�ɤ�����ǧ����
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media_access as ma, media as m',
			'sql_where'		=> 'ma.media_access_hash = ? AND ma.media_access_status = 1 AND ma.media_id = m.media_id',
			'sql_values'	=> array($media_access_hash),
		);
		$r = $um->dataQuery($param);
		//status:1�ʥ桼������Υ᡼������ѡˤ�����Ǥ������update
		if(count($r) > 0){
			// ��ǥ���������������򥹥ȥ�
			$media_access_id		= $r[0]['media_access_id'];
			$media_id				= $r[0]['media_id'];
			$media_name				= $r[0]['media_name'];
			$media_access_param1	= $r[0]['media_access_param1'];
			$media_access_param2	= $r[0]['media_access_param2'];
			$media_access_param3	= $r[0]['media_access_param3'];
			$user_id				= $r[0]['user_id'];
			$community_id			= $r[0]['community_id'];
			$media_point			= $r[0]['media_point'];
			
			// ��ǥ���������������򹹿�����
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('user_id',$user_id);
			$ma->set('media_access_status',2);
			$ma->set('regist_time',date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// �����ϩ���ײ��Ͻ���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// ���������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 2);
			
		}else{
			// ������
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: no data\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		
		
		/* =============================================
		// ���ߥ�˥ƥ�����
		 ============================================= */
		if($community_id){
			$cmm = $this->backend->getManager('CommunityMember');
			$param = array(
				'user_id'		=> $user_id,
				'community_id'	=> $community_id,
			);
			$cmm->addCommunityMember($param);
		}
		
		
		
		/* =============================================
		// �ݥ�����ɲ÷Ͻ���
		 ============================================= */
		if($media_point){
			// �ݥ������Ϳ�Τ�����
			if(!$no_point){
				$point_type_search = $this->config->get('point_type_search');
				$pm = $this->backend->getManager('Point');
				$param = array(
					'user_id'		=> $user_id,
					'point'			=> $media_point,
					'point_type'	=> $point_type_search['media_regist'],
					'point_status'	=> 2,// ��ǧ�Ѥ�
					'user_sub_id'	=> $media_access_id,
					'point_sub_id'	=> $media_id,
					'point_memo'	=> $media_name,
				);
				$pm->addPoint($param);
			}
		}
		
		/* =============================================
		// �桼����������
		 ============================================= */
		$u = new Tv_User($this->backend, 'user_id', $user_id);
		$user_hash = $u->get('user_hash');
		
		// �����ѤΥ�����
		$buf.= "media_access_id		: {$media_access_id}\n";
		$buf.= "media_id			: {$media_id}\n";
		$buf.= "media_access_hash	: {$media_access_hash}\n";
		$buf.= "media_access_param1	: {$media_access_param1}\n";
		$buf.= "media_access_param2	: {$media_access_param2}\n";
		$buf.= "media_access_param3	: {$media_access_param3}\n";
		$buf.= "user_id				: {$user_id}\n";
		$buf.= "user_hash			: {$user_hash}\n";
		$buf.= "community_id		: {$community_id}\n";
		$buf.= "media_point			: {$media_point}\n";
		
		//�ꥯ������URL����
		if($media_id){
			$m = new Tv_Media($this->backend, 'media_id', $media_id);
			$media_res_url = $m->get('media_res_url');
		}
		// �����ϩID���ʤ����
		else{
			// ������
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: URL get error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		// �����ѥ����ɲ�
		$buf.= "media_res_url		: {$media_res_url}\n";
		
		
		
		/* =============================================
		// �����ϩ�����̤�����
		 ============================================= */
		//�ִ�ʸ������
		$cut = $this->config->get('tag_cut');
		$r_url = $media_res_url;
		$params = array(
			'user_hash'	=> $user_hash,
			1		=> $media_access_param1,
			2		=> $media_access_param2,
			3		=> $media_access_param3
		);
		$select = array();
		$replace = array();
		foreach($params as $k => $v){
			$select[] = $cut . $k . $cut;
			$replace[] = $v;
		}
		$res_url = str_replace($select, $replace,$media_res_url);
		
		// �����ѥ����ɲ�
		$buf.= "res_url			: $res_url\n";
		
		//URL��ɥᥤ��ȥѥ���
		$pattern = "/^(http:\/\/)([^\/]+)(\/.*$)/i";
		if(preg_match($pattern,$res_url,$match)){
			$domain = $match[2];
			$path = $match[3];
		}else{
			//���곰��URL�ϥ����餺��false���֤�
			return false;
		}
		
		// �����ѥ����ɲ�
		$buf.= "domain			: {$domain}\n";
		$buf.= "path			: {$path}\n";
		
		// socket��³ port:80 timeout:60
		$fp = fsockopen($domain,80,$errno,$errstr,60);
		if(!$fp){
			// ������
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: fsockopen error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		
		//�ꥯ������ ��media���̾����������
		$request = "GET {$path} HTTP/1.1\r\n";
		$request.= "Host:{$domain}\r\n\r\n";
		//$request.= "\n";
		$byte = fputs($fp,$request);
		if($byte === false){
			// ������
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: fputs error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		fclose($fp);
		
		// �����ѥ����ɲ�
		$buf.= "request			: {$request}\n";
		$buf.= "byte			: {$byte}\n";
		
		
		
		/* =============================================
		// �����ϩ����򹹿�
		 ============================================= */
		$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
		$ma->set('media_access_status',3);
		$ma->set('send_time',date('Y-m-d H:i:s'));
		$r = $ma->update();
		if(Ethna::isError($r)){
			// ������
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: media_access update error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		/* =============================================
		// �����ϩ���ײ��Ͻ���
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// ��������INSERT access:0, mail:1, regist:2, send:3, resign:4
		$sm->addStats('media', $ma->get('media_id'), 0, 3);
		
		// ������
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','media');
		$o->set('log_body',$buf);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		return true;
	}
}

/**
 * ��ǥ������֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Media extends Ethna_AppObject
{
}
?>
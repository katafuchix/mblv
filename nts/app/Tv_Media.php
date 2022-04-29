<?php
/**
 * Tv_Media.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���f�B�A�}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_MediaManager extends Ethna_AppManager
{
	/**
	 * ����o�H�����L�^����
	 * ���f�B�A�o�R�ł̃A�N�Z�X�̏ꍇ
	 * media_access�e�[�u���Ƀf�[�^��ǉ�����
	 * �ǉ������f�[�^��key(media_access_hash)��Ԃ�
	*/
	function addMediaAccess($code='')
	{
		// code�̌���
		if(!$code){
			//���N�G�X�gURL��'code'������ꍇ
			if (array_key_exists('code', $_REQUEST)){
				$code = $_REQUEST['code'];
			}
			// ���̑��̏ꍇ
			else{
				return false;
			}
		}
		// media_setting���烁�f�B�A�ꗗ�̎擾
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media',
			'sql_where'		=> 'media_status > 0 AND media_code = ?',
			'sql_values'	=> array($code),
		);
		$um =& $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		
		// media_access�ǉ�
		if(count($r) > 0){
			$o = new Tv_MediaAccess($this->backend);
			$o->set('media_id', $r[0]['media_id']);
			$o->set('media_access_param1',addslashes($_REQUEST[$r[0]['media_param1']]));
			$o->set('media_access_param2',addslashes($_REQUEST[$r[0]['media_param2']]));
			$o->set('media_access_param3',addslashes($_REQUEST[$r[0]['media_param3']]));
			$o->set('access_time', date('Y-m-d H:i:s'));
			// �I�[�o�[���C�h
			$o->add();
			$media_access_hash = $o->get('media_access_hash');
			
			/* =============================================
			// ����o�H���v��͏���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// �N���b�N������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $o->get('media_id'), 0, 0);
		
			// media_access_hash��Ԃ�
			return $media_access_hash;
		}
		
		return false;
	}
	
	/**
	 * ����o�H�ɐ��ʂ𑗐M����
	 */
	function mediaResponse($media_access_hash, $no_point=false)
	{
		/* =============================================
		// ����o�H�����擾
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// ���O�f�B���N�g��
		$media_access_log_path = $this->config->get('media_log_path');
		$buf = "\nstart ".date('Y-m-d H:i:s')."\n";
		
		
		// �Y���̃��f�B�A�A�N�Z�XID�����邩�ǂ����m�F����
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media_access as ma, media as m',
			'sql_where'		=> 'ma.media_access_hash = ? AND ma.media_access_status = 1 AND ma.media_id = m.media_id',
			'sql_values'	=> array($media_access_hash),
		);
		$r = $um->dataQuery($param);
		//status:1�i���[�U����̃��[����M�ρj���擾�ł����ꍇupdate
		if(count($r) > 0){
			// ���f�B�A�A�N�Z�X�����X�g�A
			$media_access_id		= $r[0]['media_access_id'];
			$media_id				= $r[0]['media_id'];
			$media_name				= $r[0]['media_name'];
			$media_access_param1	= $r[0]['media_access_param1'];
			$media_access_param2	= $r[0]['media_access_param2'];
			$media_access_param3	= $r[0]['media_access_param3'];
			$user_id				= $r[0]['user_id'];
			$community_id			= $r[0]['community_id'];
			$media_point			= $r[0]['media_point'];
			
			// ���f�B�A�A�N�Z�X�����X�V����
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('user_id',$user_id);
			$ma->set('media_access_status',2);
			$ma->set('regist_time',date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// ����o�H���v��͏���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// �������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 2);
			
		}else{
			@error_log(__FILE__.__LINE__."\nno data {$media_access_hash} \n",3,$media_access_log_path.date('Ymd').'.err');
			return false;
		}
		
		
		
		/* =============================================
		// �R�~���j�e�B�Q��
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
		// �|�C���g�ǉ��n����
		 ============================================= */
		if($media_point){
			// �|�C���g�t�^�̂���ꍇ
			if(!$no_point){
				$point_type_search = $this->config->get('point_type_search');
				$pm = $this->backend->getManager('Point');
				$param = array(
					'user_id'		=> $user_id,
					'point'			=> $media_point,
					'point_type'	=> $point_type_search['media_regist'],
					'point_status'	=> 2,// ���F�ς�
					'user_sub_id'	=> $media_access_id,
					'point_sub_id'	=> $media_id,
					'point_memo'	=> $media_name,
				);
				$pm->addPoint($param);
			}
		}
		
		/* =============================================
		// ���[�U�����擾
		 ============================================= */
		$u = new Tv_User($this->backend, 'user_id', $user_id);
		$user_hash = $u->get('user_hash');
		$user_uid = $u->get('user_uid');
		
		// �o�͗p�̃��O����
		$buf.= "media_access_id		= {$media_access_id}\n";
		$buf.= "media_id			= {$media_id}\n";
		$buf.= "media_access_hash	= {$media_access_hash}\n";
		$buf.= "media_access_param1	= {$media_access_param1}\n";
		$buf.= "media_access_param2	= {$media_access_param2}\n";
		$buf.= "media_access_param3	= {$media_access_param3}\n";
		$buf.= "user_id				= {$user_id}\n";
		$buf.= "user_hash			= {$user_hash}\n";
		$buf.= "user_uid			= {$user_uid}\n";
		$buf.= "community_id		= {$community_id}\n";
		$buf.= "media_point			= {$media_point}\n";
		
		//���N�G�X�gURL�擾
		if($media_id){
			$m = new Tv_Media($this->backend, 'media_id', $media_id);
			$media_res_url = $m->get('media_res_url');
		}
		// ����o�HID���Ȃ��ꍇ
		else{
			@error_log(__FILE__.__LINE__."\nURL get error\n".$buf,3,$media_access_log_path.date('Ymd').'.err');
			return false;
		}
		
		// �o�͗p���O�ɒǉ�
		$buf.= "media_res_url		= {$media_res_url}\n";
		
		
		
		/* =============================================
		// ����o�H�ɐ��ʂ𑗐M
		 ============================================= */
		//�u����������
		$cut = $this->config->get('tag_cut');
		$r_url = $media_res_url;
		$params = array(
			'user_hash'	=> $user_hash,
			'user_uid'	=> $user_uid,
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
		
		// �o�͗p���O�ɒǉ�
		$buf.= "res_url			= $res_url\n";
		
		//URL���h���C���ƃp�X��
		$pattern = "/^(http:\/\/)([^\/]+)(\/.*$)/i";
		if(preg_match($pattern,$res_url,$match)){
			$domain = $match[2];
			$path = $match[3];
		}else{
			@error_log(__FILE__.__LINE__."\nURL match error\n".$buf,3,$media_access_log_path.date('Ymd').'.err');
			return false;
		}
		
		// �o�͗p���O�ɒǉ�
		$buf.= "domain			= {$domain}\n";
		$buf.= "path			= {$path}\n";
		
		// socket�ڑ� port:80 timeout:60
		$fp = fsockopen($domain,80,$errno,$errstr,60);
		if(!$fp){
			@error_log(__FILE__.__LINE__."\nfsockopen error\n".$buf."\n\n".$errno."\n\n".$errstr,3,$media_access_log_path.date('Ymd').'.err');
			return false;
		}
		
		
		//���N�G�X�g �imedia���ʏ��̑��M�j
		$request = "GET {$path} HTTP/1.0\n";
		$request.= "Host: {$domain}\n";
		$request.= "\n";
		$byte = fputs($fp,$request);
		if($byte === false){
			@error_log(__FILE__.__LINE__."\nfputs error\n".$buf,3,$media_access_log_path.date('Ymd').'.err');
		}
		fclose($fp);
		
		// �o�͗p���O�ɒǉ�
		$buf.= "request			= {$request}\n";
		$buf.= "byte			= {$byte}\n";
		
		
		
		/* =============================================
		// ����o�H�������X�V
		 ============================================= */
		$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
		$ma->set('media_access_status',3);
		$ma->set('send_time',date('Y-m-d H:i:s'));
		$r = $ma->update();
		if(Ethna::isError($r)){
			@error_log(__FILE__.__LINE__."\n media_access update error\n".$buf,3,$media_access_log_path.date('Ymd').'.err');
			return false;
		}
		
		/* =============================================
		// ����o�H���v��͏���
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// �މ����INSERT access:0, mail:1, regist:2, send:3, resign:4
		$sm->addStats('media', $ma->get('media_id'), 0, 3);
		
		// �o�͗p���O�ɒǉ�
		$buf.= "media_access updated\n";
		
		
		// ���O�o��
		$buf.= "\nend ".date('Y-m-d H:i:s')."\n";
		@error_log($buf,3,$media_access_log_path.date('Ymd').'.log');
		
		return true;
	}
}

/**
 * ���f�B�A�I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Media extends Ethna_AppObject
{
}
?>
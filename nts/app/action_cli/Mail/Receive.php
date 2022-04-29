<?php
/**
 * Receive.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �᡼�������������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
// SNS�����������뤿��ActionUser��Ѿ�
//class Tv_Cli_Action_MailReceive extends Tv_ActionClass
class Tv_Cli_Action_MailReceive extends Tv_ActionUser
{
	/* �᡼�륽���� */
	var $mail_source;
	/* �᡼����ʸ */
	var $mail_body;
	/* �᡼��إå� */
	var $mail_headers;
	/* �������᡼�륢�ɥ쥹 */
	var $mail_from;
	/* �����᡼�륢�ɥ쥹 */
	var $mail_to;
	/* �᡼�륿���� */
	var $mail_type;
	/* �᡼��ϥå��� */
	var $mail_hash;
	/* �᡼���������֥������� */
	var $ms;
	/* �桼�����֥������� */
	var $user;
	
	/**
	 * �����¹�
	 */
	function perform()
	{
		require_once 'Mail_Mime/mimeDecode.php';
		// �᡼��ǡ����μ���
		$this->getMailData();
		
		// �ʲ�DB���䤤��碌
		$this->ms = new Tv_Mail($this->backend);
		
		// user�˥᡼�륢�ɥ쥹����Ͽ�����뤫�ɤ��������å�
		$this->user =& new Tv_User($this->backend, 'user_mailaddress', $this->mail_from);
		
		// �᡼�륿���פˤ�äƽ����򿶤�ʬ��
		$mail_account = $this->config->get('mail_account');
		switch($this->mail_type)
		{
			/*
			 * ���������
			 */
			// ���顼�᡼��ξ��
			case $mail_account['error']['account']:
				$this->error_mail();
				break;
			// �����Ͽ�ξ��
			case $mail_account['regist']['account']:
				$this->regist_mail();
				break;
			// �᡼�륢�ɥ쥹�ѹ��ξ��
			case $mail_account['change']['account']:
				$this->change_mail();
				break;
			// �����ϩ���Υ᡼��ξ��
			case $mail_account['media']['account']:
				$this->media_mail();
				break;
			
			/*
			* ������Ʒ�
			*/
			// �ޥ������ѹ��ξ��
			case $mail_account['my_image']['account']:
				$this->my_image_mail();
				break;
			// ��������������Ƥξ��
			case $mail_account['blog_article_image']['account']:
				$this->blog_article_image_mail();
				break;
			// ���������Ȳ�����Ƥξ��
			case $mail_account['blog_comment_image']['account']:
				$this->blog_comment_image();
				break;
			// ���ߥ�˥ƥ�������Ƥξ��
			case $mail_account['community_image']['account']:
				$this->community_image_mail();
				break;
			// ���ߥ�˥ƥ��ȥԥå�������Ƥξ��
			case $mail_account['community_article_image']['account']:
				$this->community_article_image_mail();
				break;
			// ���ߥ�˥ƥ������Ȳ�����Ƥξ��
			case $mail_account['community_comment_image']['account']:
				$this->community_comment_image_mail();
				break;
			// ��å�����������Ƥξ��
			case $mail_account['message_image']['account']:
				$this->message_image_mail();
				break;
			// �����Ĳ�����Ƥξ��
			case $mail_account['bbs_image']['account']:
				$this->bbs_image_mail();
				break;
			
			/*
			* ư����Ʒ�
			*/
			// ��������ư����Ƥξ��
			case $mail_account['blog_article_movie']['account']:
				$this->blog_article_movie_mail();
				break;
			// ����������ư����Ƥξ��
			case $mail_account['blog_comment_movie']['account']:
				$this->blog_comment_movie();
				break;
			// ���ߥ�˥ƥ�ư����Ƥξ��
			case $mail_account['community_movie']['account']:
				$this->community_movie_mail();
				break;
			// ���ߥ�˥ƥ��ȥԥå�ư����Ƥξ��
			case $mail_account['community_article_movie']['account']:
				$this->community_article_movie_mail();
				break;
			// ���ߥ�˥ƥ�������ư����Ƥξ��
			case $mail_account['community_comment_movie']['account']:
				$this->community_comment_movie_mail();
				break;
			// ��å�����ư����Ƥξ��
			case $mail_account['message_movie']['account']:
				$this->message_movie_mail();
				break;
			// ������ư����Ƥξ��
			case $mail_account['bbs_movie']['account']:
				$this->bbs_movie_mail();
				break;
			
			default:
				exit;
		}
	}
	
	/**
	 * �᡼�뤫��β������åץ���
	 */
	function uploadImageFromMail()
	{
		// �ե���������å�
		if(!$this->mail_body['files'][0]['body']) return false;
		
		// ��ĥ�ҥ����å�
		if(!preg_match('/(\.gif|\.jpeg|\.jpg)/i',$this->mail_body['files'][0]['name'])) return false;
		
		// ���åץ���
		$ctl = $this->backend->getController();
		// ���ܸ�ե�����̾�к�
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($this->mail_body['files'][0]['name']);
		$token = time() . substr(md5(microtime()), 0, rand(5, 12));
		$filename = $token . '.' . strtolower($ext);
		$tmpPath = $ctl->getDirectory('tmp') . '/' . $filename;
//		$tmpPath = $ctl->getDirectory('tmp') . '/' . $this->mail_body['files'][0]['name'];
		
		$this->save($tmpPath, $this->mail_body['files'][0]['body']);
		$im =& $this->backend->getManager('Image');
		$fileId = $im->uploadImageFromMail($tmpPath, $this->mail_body['files'][0]['type'], $this->user->get('user_id'));
		@unlink($tmpPath);
		if(!$fileId) return false;
		
		return $fileId;
	}
	
	/**
	 * �᡼�뤫���ư�襢�åץ���
	 */
	function uploadMovieFromMail()
	{
		// ���åץ���
		$ctl = $this->backend->getController();
		$tmpPath = $ctl->getDirectory('tmp') . '/' . $this->mail_body['files'][0]['name'];
		$this->save($tmpPath, $this->mail_body['files'][0]['body']);
		$mm =& $this->backend->getManager('Movie');
		$fileId = $mm->uploadMovieFromMail($tmpPath, $this->mail_body['files'][0]['type'], $this->user->get('user_id'));
		@unlink($tmpPath);
		if(!$fileId) return false;
		
		return $fileId;
	}
	
	/**
	 * �����򥪥֥������Ȥ���Ͽ
	 */
	function addImageToObject($object_name, $fileId)
	{
		// ưŪ�˥��饹���֥������Ȥ�����
		$primary_key = $object_name . '_id';
		$hash_column = $object_name . '_hash';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		
		$o =& new $class_name($this->backend, $hash_column, $this->mail_hash);
		if(!$o->isValid()) return false;
		
		// �������
		$o->deleteImage();
		$o->set('image_id', $fileId);
		$o->update();
		
		return true;
	}
	
	/**
	 * ư��򥪥֥������Ȥ���Ͽ
	 */
	function addMovieToObject($object_name, $fileId)
	{
		// ưŪ�˥��饹���֥������Ȥ�����
		$primary_key = $object_name . '_id';
		$hash_column = $object_name . '_hash';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		
		$o =& new $class_name($this->backend, $hash_column, $this->mail_hash);
		if(!$o->isValid()) return false;
		
		// ư����
		$o->deleteMovie();
		$o->set('movie_id', $fileId);
		$o->update();
		
		return true;
	}
	
	/**
	 * ���顼�᡼��ξ��ν���
	 */
	function error_mail()
	{
		// �桼������˳����Τ�����
		if($this->user->user_status){
			// ��Ͽ�Τ���᡼�륢�ɥ쥹�ξ�����ã�᡼�륫����ȥ��å�
			$cnt = $this->user->get('user_magazine_error_num');
			$eu =& new Tv_User($this->backend, 'user_hash', $this->mail_hash);
			$eu->set('user_magazine_error_num',intval($cnt)+1);
			$r = $eu->update();
		}
		exit;
	}
	
	/**
	 * �����Ͽ�᡼��ν���
	 */
	function regist_mail()
	{
		// ���˥��С���Ͽ����Ƥ���Х��顼�᡼������
		if($this->user->get('user_status') == 2){
			// �᡼�뼫ư�ֿ�
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_already_member_error' , $value );
		}
		// �������桼���ξ�票�顼�᡼������
		elseif($this->user->get('user_status') == 4){
			// �᡼�뼫ư�ֿ�
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_forbidden_member_error' , $value );
		}
		// �����Υ桼���ξ��
		else{
			$_user_id = 0;
			$user_point = 0;
			
			// ���˲���Ͽ����񡢶�����񤷤��桼���ξ��
			if($this->user->get('user_status') == 1 || $this->user->get('user_status') == 3){
				// �⤷SPGV�桼���ξ��
				$_user_id = $this->user->get('spgv_user_id');
				if($_user_id){
					// SPGV�Υ桼�����ơ��������ǧ
					$su = new Tv_SpgvUser($this->backend, 'user_id', $_user_id);
					if($su->isValid()){
						// ͭ������ξ��
						if($su->get('user_status') == 2){
							// ���Υݥ���Ȥ�����Ѥ�����Ͽ��SNSV¦��SPGV¦�Υݥ���Ȥ�Ʊ�����Ƥ��������
							$user_point = $su->get('user_point');
						}
					}
				}
				// ��ǡ�����õ�
				$this->user->remove();
			}
			
			// �桼���������Ͽ
			$u =& new Tv_User($this->backend);
			$u->set('user_mailaddress',$this->mail_from);
			// ����ꥢȽ��
			switch($GLOBALS['EMOJIOBJ']->to_carrier)
			{
				case 'DOCOMO':
					$user_carrier = 1;
					break;
				case 'AU':
					$user_carrier = 2;
					break;
				case 'SOFTBANK':
					$user_carrier = 3;
					break;
				default:
					$user_carrier = 0;
					break;
			}
			// ����ꥢ�򥻥å�
			$u->set('user_carrier',$user_carrier);
			// SPGV�桼��ID�򥻥å�
			if($_user_id){
				$u->set('spgv_user_id', $_user_id);
			}
			// ���ݥ���Ȥ򥻥å�
			if($user_point){
				$u->set('user_point', $user_point);
			}
			
			// �����С��饤��
			$r = $u->add();
			if(Ethna::isError($r)) return false;
			// �桼��ID�η���
			$user_id = $u->getId();
			
			// SPGV�ز���������Ͽ
			if(!$_user_id){
				// �᡼�륢�ɥ쥹��¸�߳�ǧ
				$su = new Tv_SpgvUser($this->backend, 'user_mailaddress', $this->mail_from);
				// ¸�ߤ��ʤ������Ͽ������Ԥ�
				if(!$su->isValid()){
					$su = new Tv_SpgvUser($this->backend);
					$su->set('user_mailaddress', $this->mail_from);
					$su->set('snsv_user_id', $user_id);
					$su->set('user_status', 1);
					$r = $su->add();
//					if(Ethna::isError($r)) return false;
					// SPGV�桼��ID�η���
					$_user_id = $su->getId();
				}
			}
			// ����SPGV������󤬤�����
			else{
				$su = new Tv_SpgvUser($this->backend, 'user_id', $_user_id);
				// �쥳���ɤ�¸�߳�ǧ
				if($su->isValid()){
					$su->set('snsv_user_id',$user_id);
					$r = $su->update();
//					if(Ethna::isError($r)) return false;
				}
			}
			
			// �桼������򹹿�
			$u = new Tv_User($this->backend, 'user_id', $user_id);
			// SPGV�桼��ID�򥻥å�
			$u->set('spgv_user_id', $_user_id);
			// �桼�����֥������Ȥ���Ф˥��å�
			$this->user = $u;
			// ��ǥ�����������������Ȥ���
			$media_id = $this->media_access();
			if($media_id){
				$u->set('media_id',$media_id);
				$u->set('media_access_hash',$this->mail_hash);
			}
			// ����
			$u->update();
			
			// �桼���������Ͽ
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $user_id);
			$uh->set('user_mailaddress', $this->mail_from);
			$uh->set('spgv_user_id', $_user_id);
			$uh->set('user_status', 1);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			
			// �����������ݡ���
			$an = $this->backend->getManager('Analytics');
			$param = array(
				'pre_regist'	=> true,
				'regist'		=> false,
				'invite'		=> false,
				'media'			=> false,
				'resign'		=> false,
			);
			$an->addAnalytics($param);
			
			// �桼�����̻Ҥ����
			$this->user_hash = $u->get('user_hash');
			// �᡼�뼫ư�ֿ�
			$value = array (
				'user_hash'		=> $this->user_hash,
				'media_hash'	=> $this->mail_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_regist' , $value );
		}
		
		return true;
	}
	
	/**
	 * �᡼�륢�ɥ쥹�ѹ��᡼��ν���
	 */
	function change_mail()
	{
		// �桼�����̻Ҥ˳������ʤ����ϲ�������򤷤ʤ�
		// �㳰Ū�˥᡼����ʸ��Hash�����ܤ���Ƥ���
		// $user = new Tv_User($this->backend, 'user_hash', $this->mail_hash);
		$user_hash = str_replace("\n", "", $this->mail_body['body']);
		$user_hash = str_replace("\r\n", "", $user_hash);
		$user_hash = str_replace("\r", "", $user_hash);
		
		$user = new Tv_User($this->backend, 'user_hash', $user_hash);
		
		if(!$user->isValid()) return false;
		if($user->get('user_status') != 2) return false;
		
		// �����������Υ᡼�륢�ɥ쥹����Ͽ�ѤߤΥ᡼�륢�ɥ쥹���ۤʤ���Τ߰ʲ��ν�����Ԥ�
		if($user->get('user_mailaddress') != $this->mail_from){
			// �᡼�륢�ɥ쥹�ν�ʣ��ǧ
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'user',
				'sql_where'		=> 'user_status = 2 AND user_mailaddress = ?',
				'sql_values'	=> array($this->mail_from),
			);
			$um = $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			// ͭ���ʥ᡼�륢�ɥ쥹�Ȥ��Ƥ���Ͽ��0��ʤ�аʲ��ν�����Ԥ�
			if(count($r) == 0){
				// �᡼�륢�ɥ쥹���󹹿�
				$user->set('user_mailaddress', $this->mail_from);
				$r = $user->update();
				// �����������
				if(!Ethna::isError($r)){
					// �᡼�뼫ư�ֿ�
					$value = array (
						'user_hash' => $user->get('user_hash'),
					);
					$this->ms->sendOne($this->mail_from , 'user_change_mailaddress_done' , $value );
					
					return true;
				}
			}
		}
		// ���Ԥ������
		// �᡼�뼫ư�ֿ�
		$value = array(
			'user_hash' => $user->get('user_hash'),
		);
		$this->ms->sendOne($this->mail_from , 'user_change_mailaddress_error' , $value );
		
		return false;
	}
	
	/**
	 * �����ϩ���Υ᡼��ν���
	 */
	function media_mail()
	{
		// ���˥��С���Ͽ����Ƥ���Х��顼�᡼������
		if($this->user->get('user_status') == 2){
			// �᡼�뼫ư�ֿ�
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_already_member_error' , $value );
		}
		// �����Ǥʤ����
		else{
			// �����ϩ������������
			$m = new Tv_Media($this->backend, 'media_code', $this->mail_hash);
			// �����쥳���ɤ����ä����
			if($m->isValid()){
				// �᡼�뼫ư�ֿ�
				$value = array (
					'Subject'	=> $m->get('media_mail_title'),
					'Body'		=> $m->get('media_mail_body'),
				);
				$this->ms->sendOne($this->mail_from , '' , $value );
			}
		}
		return true;
	}
	
	/**
	 * �ޥ������ѹ��᡼��ξ��ν���
	 */
	function my_image_mail()
	{
		// �ޥ��������
		$fileId = $this->uploadFileFromMail();
		// �������
		$this->user->deleteImage();
		// ��������
		$this->user->set('image_id', $fileId);
		$r = $this->user->update();
		
		// �᡼�뼫ư�ֿ�
		if($fileId || !Ethna::isError($r)){
			// �������
			$value = array(
				'user_hash' => $this->user_hash,
			);
			$ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash' => $this->user_hash,
				'image_mailaddress' => $this->mail_to,
			);
			$ms->sendOne($this->mail_from , 'user_image_success_error' , $value );
		}
		
		return true;
	}
	
	/**
	 * ��������������ƥ᡼��ξ��ν���
	 */
	function blog_article_image_mail()
	{
		// ���������β������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('blog_article', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���������Ȳ�����ƥ᡼��ξ��ν���
	 */
	function blog_comment_image_mail()
	{
		// ���������Ȥβ������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('blog_comment', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ�������ƥ᡼��ξ��ν���
	 */
	function community_image_mail()
	{
		// ���ߥ�˥ƥ��β������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ��ȥԥå�������ƥ᡼��ξ��ν���
	 */
	function community_article_image_mail()
	{
		// ���ߥ�˥ƥ��ȥԥå��β������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community_article', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ������Ȳ�����ƥ᡼��ξ��ν���
	 */
	function community_comment_image_mail()
	{
		// ���ߥ�˥ƥ������Ȥβ������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community_comment', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ��å�����������ƥ᡼��ξ��ν���
	 */
	function message_image_mail()
	{
		// ��å������β������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('message', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * �����Ĳ�����ƥ᡼��ξ��ν���
	 */
	function bbs_image_mail()
	{
		// �����Ĥβ������
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('bbs', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * ��������ư����ƥ᡼��ξ��ν���
	 */
	function blog_article_movie_mail()
	{
		// ����������ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('blog_article', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ����������ư����ƥ᡼��ξ��ν���
	 */
	function blog_comment_movie_mail()
	{
		// ���������Ȥ�ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('blog_comment', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ�ư����ƥ᡼��ξ��ν���
	 */
	function community_movie_mail()
	{
		// ���ߥ�˥ƥ���ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ��ȥԥå�ư����ƥ᡼��ξ��ν���
	 */
	function community_article_movie_mail()
	{
		// ���ߥ�˥ƥ��ȥԥå���ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community_article', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ���ߥ�˥ƥ�������ư����ƥ᡼��ξ��ν���
	 */
	function community_comment_movie_mail()
	{
		// ���ߥ�˥ƥ������Ȥ�ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community_comment', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ��å�����ư����ƥ᡼��ξ��ν���
	 */
	function message_movie_mail()
	{
		// ��å�������ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('message', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ������ư����ƥ᡼��ξ��ν���
	 */
	function bbs_movie_mail()
	{
		// �����Ĥ�ư�����
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('bbs', $fileId);
		// �᡼�뼫ư�ֿ�
		if($fileId || $r){
			// �������
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// ��Ƽ���
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * ��ǥ������������Ԥη�¬
	 */
	function media_access()
	{
		// �᡼��ϥå��夬������Τ߼¹�
		if($this->mail_hash){
			//status:0�ʥ��������ѡˤ����
			$param = array(
				'sql_select'	=> 'media_access_hash',
				'sql_from'	=> 'media_access',
				'sql_where'	=> 'media_access_status = 0 AND media_access_hash = ?',
				'sql_values'	=> array($this->mail_hash),
			);
			$um =& $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			if($r > 0){
				// media_access�򹹿�
				$media_access =& new Tv_MediaAccess($this->backend, 'media_access_hash', $this->mail_hash);
				$media_access->set('user_id', $this->user->get('user_id'));
				$media_access->set('media_access_status',1);
				$media_access->set('mail_time',date('Y-m-d H:i:s'));
				$res = $media_access->update();
				
				/* =============================================
				// �����ϩ���ײ��Ͻ���
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// �᡼�������INSERT access:0, mail:1, regist:2, send:3, resign:4
				$sm->addStats('media', $media_access->get('media_id'), 0, 1);
		
				return $media_access->get('media_id');
			}
		}
		
		return 0;
	}
	
	/**
	 * �᡼��ǡ����μ���
	 */
	function getMailData()
	{
		//�᡼�륽������ɸ�����Ϥ����ɤ߹���
		$source = "";
		if (php_sapi_name()=="cli") {
			while(!feof(STDIN)) {
				$source .= fread(STDIN, 4096);
			}
		} elseif (php_sapi_name()=="cgi") {
			$fp = fopen('php://stdin', 'r');//ɸ�����Ϥ��ʤ���祹�ȡ��뤹��Τ����
			while(!feof($fp)) {
				$source .= fread($fp, 4096);
			}
		}
		
		//�᡼�륽�����β���
		if($source == "") exit();
		
		//ʸ�������ɸ��н���
		mb_detect_order("ASCII, JIS, UTF-8, EUC-JP, SJIS");
		
		//����
		$decoder = new Mail_mimeDecode($source);
		$params['include_bodies'] = true; //�ܥǥ�����Ϥ���
		$params['decode_bodies']  = true; //�ܥǥ��򥳡����Ѵ�����
		$params['decode_headers'] = true; //�إå��򥳡����Ѵ�����
		$structure = $decoder->decode($params);
		
		//�᡼��إå�����μ���
		$headers['date'] = date("Y-m-d H:i:s", strtotime($structure->headers['date']));
		$headers['from'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['from']), mb_internal_encoding(), mb_detect_order());
		$headers['to'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['to']), mb_internal_encoding(), mb_detect_order());
		$headers['subject'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['subject']), mb_internal_encoding(), mb_detect_order());
		
		//�᡼��ܥǥ��μ���
		$body = $this->getMailBody($structure);
		
		// �᡼�륢�ɥ쥹�������顼�ξ��Ͻ�����λ
		if(!$headers['from'] || !$headers['to']) exit;
		
		// �����ԥ᡼�륢�ɥ쥹��ʬ��
		if (mb_eregi('^.*<([^>]+)>', $headers['from'], $senderArray)) {
			$mail_from = trim($senderArray[1]);
		}else{
			$mail_from = trim($headers['from']);
		}
		
		// ���ӥ᡼�륢�ɥ쥹����ꥢ�μ���
		$GLOBALS['EMOJIOBJ']->to_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($mail_from);
		
		// PC���ӽ�������
		if($this->config->get('mobile_only') && $GLOBALS['EMOJIOBJ']->to_carrier == 'PC'){ exit; }
		
		// �����᡼�륢�ɥ쥹��ʬ��
		if (mb_eregi('^.*<([^>]+)>', $headers['to'], $receiverArray)) {
			$mail_to = trim($receiverArray[1]);
		}else{
			$mail_to = trim($headers['to']);
		}
		
		// �����᡼�륢�ɥ쥹�Υ����å�
		$m = split('@',$mail_to);
		$mail_type = $m[0];
		
		// �᡼�륢������Ȥ�ʬ��
		$m = explode('_', $mail_type);
		// ��Ƭ��ʸ�����᡼�륿���פȤ��Ƽ�갷��
		$mail_type = $m[0];
		// �᡼�륢����������󤫤���Ƭ��ʸ�����õ��
		array_shift($m);
		// �Ĥ�Υ᡼�륢������Ȥˤϡ�_�פ��ޤޤ�Ƥ����ǽ��������Τǡ�_�פ�ʬ�䤷�����_�פǷ�礷�Ƥ���
		$mail_hash = implode('_', $m);
		
		// ���Ф򥻥å�
		$this->mail_source = $source;
		$this->mail_body = $body;
		$this->mail_headers = $headers;
		$this->mail_from = $mail_from;
		$this->mail_to = $mail_to;
		$this->mail_type = $mail_type;
		$this->mail_hash = $mail_hash;
		
		return true;
	}
	
	// ���� �᡼��ܥǥ��μ���
	// ���� $structure: Mail_mimeDecode���饹�ǲ��Ϥ�����¤
	// ���� ��Ф�����ʸ��ź�եե����롢������Ϣ������
	//	  $ary['body'] : �᡼����ʸ�ʥƥ����ȡ�
	//	  $ary['html'] : �᡼����ʸ��HTML��
	//	  $ary['files'][n] : ź�եե�����ޤ�����ʸ��(HTML)�β����ե����� n��0����Ϣ��
	//	  $ary['files'][n]['type'] : �ե����륿���ס�image/jpeg �ʤ�
	//	  $ary['files'][n]['name'] : �ե�����Υ��ꥸ�ʥ�̾��xxx.jpg �ʤ� 
	//	  $ary['files'][n]['body'] : �ե��������Ρ��Х��ʥꥹ�ȥ꡼�ࡣ
	function getMailBody($structure)
	{
		static $i = 0, $ary = array();
		
		if (strtolower($structure->ctype_primary) == "multipart") {
			//ʣ����ʸ������᡼�����ʸ�򣱷�ŤĽ��������
			foreach ($structure->parts as $part) {
				//������
				if ($part->disposition=="attachment") {
					//ź�եե�����
					$ary['files'][$i]['type'] = strtolower($part->ctype_primary)."/".strtolower($part->ctype_secondary);
					$ary['files'][$i]['name'] = $part->ctype_parameters['name'];
					$ary['files'][$i]['body'] = $part->body;
					$i++;
				} else {
					switch (strtolower($part->ctype_primary)) {
					case "image": //HTML��ʸ��β���
						$ary['files'][$i]['type'] = strtolower($part->ctype_primary)."/".strtolower($part->ctype_secondary);
						$ary['files'][$i]['name'] = $part->ctype_parameters['name'];
						$ary['files'][$i]['cid'] = trim($part->headers['content-id'], "<>");
						$ary['files'][$i]['body'] = $part->body;
						$i++;
						break;
					case "text": //�ƥ�������ʸ�����
						if ($part->ctype_secondary=="plain") {
							$ary['body'] = trim(mb_convert_encoding($part->body, mb_internal_encoding(), mb_detect_order()));
						} else { //HTML��ʸ
							$ary[$part->ctype_secondary] = trim(mb_convert_encoding($part->body, mb_internal_encoding(), mb_detect_order()));
						}
						break;
					case "multipart": //�ޥ���ѡ��Ȥ���˥ޥ���ѡ��Ȥ��������HTML�᡼���
						getbody($part);
						break;
					}
				}
			}
		} elseif (strtolower($structure->ctype_primary) == "text") {
			//�ƥ�������ʸ�ΤߤΥ᡼��
			//$ary['body'] = trim(mb_convert_encoding($structure->body, mb_internal_encoding(), mb_detect_order()));
			$ary['body'] = $structure->body;
		}
		
		return $ary;
	}
	
	// ��ǽ �ե��������¸
	// ���� $file: �ե�����̾
	//	  $str: �ե���������
	// ���� �񤭹�����ե����륵����
	function save($file, $str)
	{
		$fp = fopen($file, "w");
		$size = fwrite($fp, $str);
		fclose($fp);
//		chmod($file, 0777);
		chmod($file, 0755);
		return $size;
	}
	
}
?>
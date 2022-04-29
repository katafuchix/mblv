<?php
/**
 * Tv_ResignManager.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ResignManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υǡ�����������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	 function deleteData($user_id)
	 {
		// �Ǽ��ĥǡ���
		$bm = $this->backend->getManager('Bbs');
		$bm->status_off($user_id);
		
		// �֥�����
		$ba = $this->backend->getManager('BlogArticle');
		$ba->status_off($user_id);
		
		// �֥�������
		$bc = $this->backend->getManager('BlogComment');
		$bc->status_off($user_id);
		
		// ���ߥ�˥ƥ��ȥԥå�
		$ca = $this->backend->getManager('CommunityArticle');
		$ca->status_off($user_id);
		
		// ���ߥ�˥ƥ�������
		$cc = $this->backend->getManager('CommunityComment');
		$cc->status_off($user_id);
		
		// ��������
		$fm = $this->backend->getManager('Footprint');
		$fm->status_off($user_id);
		
		// ��å�����
		$mm = $this->backend->getManager('Message');
		$mm->status_off($user_id);
		
		// �ץ��
		$up = $this->backend->getManager('UserProf');
		$up->status_off($user_id);
		
		// ���ץ��������ꤵ��Ƥ�����ܤ��������
		$option = $this->config->get('option');
		
		// ���Х���
		if($option['avatar']){
			$bm = $this->backend->getManager('UserAvatar');
			$bm->status_off($user_id);
		}
		// �ݥ����
		if($option['point']){
			$pm = $this->backend->getManager('Point');
			$pm->status_off($user_id);
		}
		// �ǥ��᡼��
		if($option['decomail']){
			$ud = $this->backend->getManager('UserDecomail');
			$ud->status_off($user_id);
		}
		// ������
		if($option['game']){
			$ug = $this->backend->getManager('UserGame');
			$ug->status_off($user_id);
		}
		// �������
		if($option['sound']){
			$us = $this->backend->getManager('UserSound');
			$us->status_off($user_id);
		}
		
	 }
	 
	 
	 
	 
	
	/**
	 * �ǡ��������Ԥ�
	 */
	function afterResign($type, $user_id)
	{
		// ��ư����ؿ�̾�����
//		$um = $this->backend->getManager('Util');
//		$Term = $um->camelize($term);
//		$function = "_rotateStats{$Term}";
		$function = "_afterResign";
		if(!method_exists($this, $function)) return false;
		
		// [type]�̤˽�����ʬ������
		switch($type)
		{
			case 'all':
				$resign_type = $this->getResignType();
				foreach($resign_type as $k => $v){
					echo $k;
					
					
					if($k){
						$this->$function($k, $user_id);
					}
				}
				break;
			default:
				$this->$function($type, $user_id);
		}
	}
	
	/**
	 * ��rotateStats�������ؿ��˥��Υ��ơ�������Ԥ�
	 */
	function _afterResign($type, $user_id)
	{
		$resign_type 	= $this->getStatsType();
		$sql_array 		= $resign_type[$type];
		$updateValues 	= array();
		$sqlWhere	  	= "";
		$time 			= date('Y-m-d H:i:s');
		
		/* =============================================
		// ��������ɲ�
		 ============================================= */
		if($sql_array['user_column']){
			$sqlWhere	  =  "{$sql_array['user_column']} = {$user_id}";
		}
		if($sql_array['status_column']){
			$updateValues[] = array($sql_array['status_column'] => 0);
		}
		if($sql_array['updated_column']){
			$updateValues[] = array($sql_array['status_column'] => $time);
		}
		if($sql_array['status_column']){
			$updateValues[] = array($sql_array['status_column'] => $time);
		}
		
		// DB����³����
		$db = & $this->backend->getDB();
	/*
		// �ơ��֥빹���ʾ��ʸĿ���0�ˤ����
		$res = $db->db->autoExecute(	
										$type, 
										$updateValues,
										DB_AUTOQUERY_UPDATE,
										$sqlWhere,
									);
	*/
foreach($this->backend->db_list as $a)echo($a->db->last_query)."\n";

		if(PEAR::isError($res)) exit;
		
		return true;
	}
	
	/*
	 * �����Υǡ�������������������
	 *
	 */
	function getResignType()
	{
		// �ǡ����������
		$regisn_type = array(
			/* =============================================
			// 1. bbs
			 ============================================= */
			'bbs' => array(
				'name'				=> '������',
				'user_column'		=> 'to_user_id',
				'status_column'		=> 'bbs_status',
				'updated_column'	=> 'bbs_updated_time',
				'deleted_column'	=> 'bbs_deleted_time',
			),
			
			/* =============================================
			// 2. blog_article
			 ============================================= */
			'blog_article'	=> array(
				'name'				=> '��������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'blog_article_status',
				'updated_column'	=> 'blog_article_updated_time',
				'deleted_column'	=> 'blog_article_deleted_time',
			),
			/* =============================================
			// 3. blog_comment 
			 ============================================= */
			'blog_comment '	=> array(
				'name'				=> '����������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'blog_comment_status',
				'updated_column'	=> 'blog_comment_updated_time',
				'deleted_column'	=> 'blog_comment_deleted_time',
			),
			/* =============================================
			// 4. community
			 ============================================= */
			 /*
			'community'	=> array(
				'name'	=> '���ߥ�˥ƥ�',
				'user_column'		=> 'user_id',
				'status_column'		=> 'community_status',
				'updated_column'	=> 'community_updated_time',
				'deleted_column'	=> 'community_deleted_time',
			),
			*/
			/* =============================================
			// 5. community_article
			 ============================================= */
			'community_article'	=> array(
				'name'	=> '���ߥ�˥ƥ��ȥԥå�',
				'user_column'		=> 'user_id',
				'status_column'		=> 'community_article_status',
				'updated_column'	=> 'community_article_updated_time',
				'deleted_column'	=> 'community_article_deleted_time',
			),
			/* =============================================
			// 6. community_comment
			 ============================================= */
			'community_comment'	=> array(
				'name'	=> '���ߥ�˥ƥ�������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'community_comment_status',
				'updated_column'	=> 'community_comment_updated_time',
				'deleted_column'	=> 'community_comment_deleted_time',
			),
			/* =============================================
			// 6. footprint
			 ============================================= */
			'footprint'	=> array(
				'name'	=> '��������',
				'user_column'		=> 'to_user_id',
				'status_column'		=> 'footprint_status',
				'updated_column'	=> '',
				'deleted_column'	=> '',
			),
			/* =============================================
			// 7. friend from_user_id ��
			 ============================================= */
			'friend'	=> array(
				'name'				=> 'ͧã',
				'user_column'		=> 'from_user_id',
				'status_column'		=> 'friend_status',
				'updated_column'	=> '',
				'deleted_column'	=> '',
			),
			/* =============================================
			// 8. message 
			 ============================================= */
			'message'	=> array(
				'name'				=> '��å�����',
				'user_column'		=> 'to_user_id',
				'status_column'		=> 'message_status',
				'updated_column'	=> 'message_updated_time',
				'deleted_column'	=> 'messages_deleted_time',
			),
			/* =============================================
			// 9. user_ad 
			 ============================================= */
			'user_ad'	=> array(
				'name'				=> '�桼������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_ad_status',
				'updated_column'	=> 'user_ad_updated_time',
				'deleted_column'	=> 'user_ad_deleted_time',
			),
			/* =============================================
			// 10. user_avatar
			 ============================================= */
			'user_avatar'	=> array(
				'name'				=> '�桼�����Х���',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_avatar_status',
				'updated_column'	=> 'user_ad_updated_time',
				'deleted_column'	=> 'user_ad_deleted_time',
			),
			/* =============================================
			// 11. user_decomail
			 ============================================= */
			'user_decomail'	=> array(
				'name'				=> '�桼���ǥ��᡼��',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_decomail_status',
				'updated_column'	=> 'user_decomail_updated_time',
				'deleted_column'	=> 'user_decomail_deleted_time',
			),
			/* =============================================
			// 12. user_game
			 ============================================= */
			'user_game'	=> array(
				'name'				=> '�桼��������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_game_status',
				'updated_column'	=> 'user_game_updated_time',
				'deleted_column'	=> 'user_game_deleted_time',
			),
			/* =============================================
			// 13. user_game_score
			 ============================================= */
			 /*
			'user_game'	=> array(
				'name'				=> '�桼�������ॹ����',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_game_score_status',
				'updated_column'	=> '',
				'deleted_column'	=> '',
			),
			*/
			/* =============================================
			// 14. user_prof
			 ============================================= */
			 /*
			'user_prof'	=> array(
				'name'				=> '�桼��������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_prof_status',
				'updated_column'	=> '',
				'deleted_column'	=> '',
			),
			*/
			/* =============================================
			// 15. user_sound
			 ============================================= */
			'user_sound'	=> array(
				'name'				=> '�桼���������',
				'user_column'		=> 'user_id',
				'status_column'		=> 'user_sound_status',
				'updated_column'	=> 'user_sound_updated_time',
				'deleted_column'	=> 'user_sound_deleted_time',
			),
		);
		return $regisn_type;
	}
}
?>

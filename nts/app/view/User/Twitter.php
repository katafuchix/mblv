<?php
/**
 * Twitter.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �ȥ����å����񤭹���ɽ�����̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserTwitter extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		
		$tm = $this->backend->getManager('Thema');
		$this->af->setApp('thema_title', $tm->getThemaTitle());
		
		
		// ����ID
		if($this->af->get('thema_id'))	$thema_id = $this->af->get('thema_id');
		else							$thema_id = 0;
		
		// Twitter�����ΰ��������
		$bl_id_array = array();
		// �֥�å��ꥹ�Ȥ��θ
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ���Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'bl.black_list_deny_user_id = ? AND u.user_id = bl.black_list_user_id AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ����Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_deny_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'u.user_id = bl.black_list_deny_user_id AND bl.black_list_user_id = ? AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		$whereStr = ' u.user_id = b.user_id ';
		if(count($bl_id_array)){
			$whereStr .= ' AND u.user_id not in ('.implode(',',$bl_id_array).')';
		}
		$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 ';
		//$whereStr .= ' AND b.thema_id = '. $thema_id .' AND twitter_status = 1';
		$whereStr .= ' AND twitter_status = 1';
		
		$this->listview = array(
				'action_name'	=> 'user_twitter',
				'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_body, b.blog_article_comment_num, u.user_id, u.user_nickname, b.blog_article_comment_time ',
				'sql_from'		=> 'user u, blog_article b ',
				'sql_where'		=> $whereStr,
				'sql_values'	=> array(),
				'sql_order'		=> 'b.blog_article_comment_time DESC',
				'sql_num'		=> 20,
				'sql_limit'		=> 200,
		);
		// SQL�¹�
		$this->build();
		
		$listview_data = $this->af->getApp('listview_data');
		foreach($listview_data as $k=>$v){
			// Ĺ����8ʸ���ޤǤ�Ĵ������
			// ��ʸ�������뤿��ˤ�������
			// Ĺ�����ѹ�����Value
			$str = $v[blog_article_title];
			// ʸ�����Ĺ��
			$len = 8;
			// ��ʸ��������Ǽ�Ѥ��������������
			$match = array();
			// ��ʸ�������ִ�����ʸ����
			$_tmp = '#';
			// �񤭹��ߤ���˳�ʸ���������
			if(preg_match_all( '/\[x:(\d{4})\]/', $str, $match )){
				// ��ʸ��������ɽ���ǰ��ʸ������ִ�����
				$_replace_str =  preg_replace( '/\[x:(\d{4})\]/', $_tmp, $str );
				// ���ꤵ�줿Ĺ�����ڤ�Ф�
				$_replace_str = mb_substr( $_replace_str, 0, $len);
				// ��ʸ�����Ǽ��������Υ���
				$j=0;
				// ��ʸ�����֤������ƺǽ�Ū��ʸ������������
				$_str = "";
				// ʸ�����ʬ������
				for($i=0;$i<$len;$i++){
					// ��ʸ�����ä���
					if(mb_substr( $_replace_str, $i, 1) == $_tmp){
						// ��ʸ�����֤��֤�������
						$_str .= $match[0][$j];
						$j++;
					// �̾��ʸ����
					}else{
						// ���Τޤ�
						$_str .= mb_substr( $_replace_str, $i, 1);
					}
				}
				// �ƥ�ץ졼�Ȥ��Ϥ����������ʤ���
				$listview_data[$k][blog_article_title] = $_str;
				
			// ��ʸ�����ʤ���л���ʸ�����ˤ������������ʤ���
			}else{
				$listview_data[$k][blog_article_title] = mb_substr( $str, 0, $len);
			}
		}
		$this->af->setApp('listview_data',$listview_data);
	}
}

?>

<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���������ΰ������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
//class Tv_View_UserBlogArticleWhole extends Tv_ListViewClass
class Tv_View_UserBlogArticleWhole extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ꥹ�ȥӥ塼
		$sqlValues = array();
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		
		$um = $this->backend->getManager('Util');
		
		// ����ɽ������ڡ����Ǥϲ����ܤ���ɽ������Τ�
		$page = $this->af->get('page') == null ? 1 : $this->af->get('page');
		// ���ڡ������ɽ��������
		$count = 20;
		$start = 5 + $count * ($page-1);
			
		// �����ȥ桼�����������ξ��
		if($this->af->get('guest')){
			
			// �����ȥ桼���������ΰ��������
			// status: 1 �����Τ�
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1 AND b.twitter_status = 0',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
					"sql_num"		=> strval($start .",". $count),
			);
			
		}
		// ���Τ�����
		else{
			// ���Τ������ΰ��������
			$whereArray = array();
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
			$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 AND b.twitter_status = 0';
			
			// ���Τ������ΰ��������
			$param = array( 
					"sql_select"	=> "distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ",
					"sql_from"		=> "user u, blog_article b ",
					"sql_where"		=> $whereStr,
					"sql_values"	=> array(),
					"sql_order"	=> "b.blog_article_id DESC",
					"sql_num"		=> strval($start .",". $count),
			);
			
		}
		
		$r = $um->dataQuery($param);
		
		$listview_data = array();
		foreach($r as $k=>$v){
			$listview_data[] = $v;
		}
		// ���Υڡ�����ɽ������ʬ��ƥ�ץ졼�Ȥ��Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		
		
		// �ʲ��ڡ����󥰤�����
		$extraVars['action_user_blog_article_whole' ] = 'true';
		// �����ȥ桼�����������ξ��
		if($this->af->get('guest')) $extraVars['guest' ] = 'true';
		
		// �ڡ����󥰥��ץ�������
		if($GLOBALS['type'] == 'admin'){
			$prevImg = '&#171; Previous';
			$nextImg = 'Next &#187;';
		}else{
			$prevImg = '��(��)����';
			$nextImg = '����(#)��';
		}
		
		// �����ȥ桼�����������ξ��
		if($this->af->get('guest')){
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1 AND b.twitter_status = 0',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
			);
		}
		// ���Τ������ΰ����η��
		else{
			$param = array( 
					"sql_select"	=> "distinct b.blog_article_id ",
					"sql_from"		=> "user u, blog_article b ",
					"sql_where"		=> $whereStr,
					"sql_values"	=> array(),
					"sql_order"	=> "b.blog_article_id DESC",
			);
		}
		$r = $um->dataQuery($param);
		// �ȡ�����η�� max:100
		if(count($r)-5>100){
			$total = 100;
		}else{
			$total = count($r)-5;
		}
		
		// 1�ڡ�����ɽ��������
		$sqlNum = $count;
		$options = array(
			'delta'						=> 5,
			'totalItems'				=> $total,
			'perPage'					=> $sqlNum,
			'mode'						=> 'Sliding',
			'httpMethod'				=> 'GET',	// POST�ˤ�����硢PEAR::Pager��Javascript�ǥڡ����󥰥�󥯤���Ϥ��뤿����դ�ɬ��
			'importQuery'				=> false,
			'extraVars'					=> $extraVars,
			'currentPage'				=> $page,
			'curPageLinkClassName'		=> 'current',
			'expanded'					=> false,
			'urlVar'					=> 'page',
			'prevImg'					=> $prevImg,
			'nextImg'					=> $nextImg,
			'separator'					=> '',
			'spacesBeforeSeparator'		=> 0,
			'spacesAfterSeparator' 		=> 0,
			'clearIfVoid'				=> false,
			'firstPagePre'				=> '',
			'firstPagePost'				=> '',
			'lastPagePre'				=> '',
			'lastPagePost'				=> '',
			'altFirst'					=> 'Go to page 1',
			'altPrev'					=> 'Go to Previous Page',
			'altNext'					=> 'Go to Next Page',
			'altLast'					=> 'Go to Last Page',
			'altPage'					=> 'Go to page',
		);
		// �ڡ���������
		$pager = Pager::factory($options);
		$links = $pager->getLinks();
		$page_range = $pager->getPageRangeByPageId();
		$page_range = range($page_range[0], $page_range[1]);
		
		// ��󥯤Υ�饤��
		if($links['pages'] != ''){
			// �������̤ξ��
			if($GLOBALS['type'] == 'admin'){
				// ���Υڡ���
				if($links['back'] != ''){
					// ���饹���դ���
					$links['back'] = str_replace('<a href', '<a class="nextprev" href', $links['back']);
				}else{
					$links['back'] = '<span class="nextprev">' . $pager->getOption('prevImg') . '</span>';
				}
				// �ǽ�Υڡ���
				if($links['first'] != '' && !in_array(1, $page_range)){
					$links['first'] = $links['first'] . '<span>....</span>';
				}else{
					$links['first'] = '';
				}
				// �Ǹ�Υڡ���
				if($links['last'] != '' && !in_array($pager->numPages(), $page_range)){
					$links['last'] = '<span>....</span>' . $links['last'];
				}else{
					$links['last'] = '';
				}
				// ���Υڡ���
				if($links['next'] != ''){
					// ���饹���դ���
					$links['next'] = str_replace('<a href', '<a class="nextprev" href', $links['next']);
				}else{
					$links['next'] = '<span class="nextprev">' . $pager->getOption('nextImg') . '</span>';
				}
			}
			// �桼�����̤ξ��
			elseif($GLOBALS['type'] == 'user'){
				// ���Υڡ���
				if($links['back'] != ''){
					// ���������������դ���
					$links['back'] = str_replace('<a href', '<a accesskey="*" href', $links['back']);
				}
				// ���Υڡ���
				if($links['next'] != ''){
					// ���������������դ���
					$links['next'] = str_replace('<a href', '<a accesskey="#" href', $links['next']);
				}
			}
		}
		
		// ����μ�����̤�View�˳�����Ƥ�
		$this->af->setApp('listview_total', $total);
		//$this->af->setApp('listview_data', $pageData);
		$this->af->setApp('listview_current', $page);
		if($total == 0 || $sqlNum == 0){
			$this->af->setApp('listview_last', 1);
		}else{
			$this->af->setApp('listview_last', @ceil($total / $sqlNum));
		}
		$this->af->setAppNE('listview_links', $links);
	}
}
?>
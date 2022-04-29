<?php
// vim: foldmethod=marker
/**
 *  Tv_ListViewClass.php
 *
 *  @author     Technovarth
 *  @package    MBLV
 *  @version $Id: app.viewclass.php 323 2006-08-22 15:52:26Z fujimoto $
 */

// {{{ Tv_ListViewClass
/**
 *  view���饹
 *
 *  @author  {$author}
 *  @package Tv
 *  @access  public
 */
require_once 'Pager/Pager.php';
class Tv_ListViewClass extends Tv_ViewClass
{
	/* @var array �ڡ����󥰽����ѤΥ��� */
	var $listview = array();
	
	var $rlist	  = array();
	/**
	 * �ڡ����󥰽����Ѿ������
	 */
	 function getCondition($condition)
	 {
	 	 // �����
	 	 $sqlWhere = "";
	 	 $sqlValues = array();
	 	// ����
	 	foreach($condition as $key => $value){
	 		// ���̤��ʤ����ϥ������밷���ǽ���
			if(!array_key_exists('type', $value)){
				$type = 'EQ';
			}else{
				$type = $value['type'];
			}
			// ������ά
			if(!array_key_exists('column', $value)){
				$column = $key;
			}else{
				$column = $value['column'];
			}
		 	// �����̤�����
		 	switch($type){
		 		// ��������ξ��
		 		case 'EQ':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' = ?';
						$sqlValues[] = $this->af->get($key);
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// �饤���ξ��
		 		case 'LIKE':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' LIKE ?';
						$sqlValues[] = "%%" . $this->af->get($key) . "%%";
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ���֤ξ��
		 		case 'PERIOD':
		 			// ����
					if($this->af->get($key . '_year_start') != '' && $this->af->get($key . '_month_start') != '' && $this->af->get($key . '_day_start') != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_start = sprintf("%04d-%02d-%02d 00:00:00", $this->af->get($key . '_year_start'), $this->af->get($key . '_month_start'), $this->af->get($key . '_day_start'));
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $date_start;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ��λ
					if($this->af->get($key . '_year_end') != '' && $this->af->get($key . '_month_end') != '' && $this->af->get($key . '_day_end') != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_end = sprintf("%04d-%02d-%02d 23:59:59", $this->af->get($key . '_year_end'),$this->af->get($key . '_month_end'), $this->af->get($key . '_day_end'));
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $date_end;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ���Ϥޤ��Ͻ�λ��ͭ��������Ƥ�����
					if($this->af->get($key . '_active')){
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		/**
		 		 * �ϰϤξ��
		 		 * @param [����]_min, [����]_min���б�����ե������ͤ򸵤�SQL������
		 		 */
		 		case 'RANGE':
					// �Ǿ�
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $this->af->get($key . '_min');
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ����
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $this->af->get($key . '_max');
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ���Ϥޤ��Ͻ�λ��ͭ��������Ƥ�����
					if($this->af->get($key . '_active')){
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ǯ��ξ��
				case 'AGE':
					$today = getdate(); // ���ռ���
					// ǯ��ʺǾ���
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$um = $this->backend->getManager('Util');
						$start_age = $um->getBirthday($this->af->get($key . '_min'));
						$maxBirthDate = $start_age['over'];
						//$maxBirthDate = sprintf(
						//	"%04d-%02d-%02d",
						//	$today['year'] - $this->af->get($key . '_min'),
						//	$today['mon'],
						//	$today['mday']
						//);
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $maxBirthDate;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ǯ��ʺ����
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$um = $this->backend->getManager('Util');
						$end_age = $um->getBirthday($this->af->get($key . '_max'));
						$minBirthDate = $end_age['under'];
						//$minBirthDate = sprintf(
						//	"%d-%02d-%02d",
						//	$today['year'] - $this->af->get($key . '_max') - 1,
						//	$today['mon'],
						//	$today['mday']
						//);
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $minBirthDate;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ���Ϥޤ��Ͻ�λ��ͭ��������Ƥ�����
					if($this->af->get($key . '_active')){
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ����ɽ���ξ��
		 		case 'REGEXP':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' (' .$column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?)';
						
						$sqlValues[] = $this->af->get($key);
						$sqlValues[] = '^' . $this->af->get($key) . ',';
						$sqlValues[] = ',' . $this->af->get($key) . '$';
						$sqlValues[] = ',' . $this->af->get($key) . ',';
						
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ʣ������ξ��
		 		case 'IN':
		 			// �㤨������ͤ���ĤǤ���������ǻ��ꤹ�뤳�Ȥ����
					if(is_array($this->af->get($key))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' ( ';
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
						foreach($this->af->get($key) as $k => $v){
							// �ǽ���ͤǤʤ����
							if($k!=0) $sqlWhere.= ' OR ';
							
							$sqlWhere .= $key . '=?';
							$sqlValues[] = $v;
						}
						if($sqlWhere) $sqlWhere .= ' )';
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ʣ������ɽ���ξ��
		 		case 'REGEXP_IN':
		 			// �㤨������ͤ���ĤǤ���������ǻ��ꤹ�뤳�Ȥ����
					if(is_array($this->af->get($key))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' ( ';
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
						foreach($this->af->get($key) as $k => $v){
							// �ǽ���ͤǤʤ����
							if($k!=0) $sqlWhere.= ' OR ';
							
							$sqlWhere .= $column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?';
							$sqlValues[] = $v;
							$sqlValues[] = '^' . $v . ',';
							$sqlValues[] = ',' . $v . '$';
							$sqlValues[] = ',' . $v . ',';
						}
						if($sqlWhere) $sqlWhere .= ' )';
						// ���������ͭ����
						if(array_key_exists('public', $value)){
							// ��������Ϳ
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 	}
		}
		return array($sqlWhere, $sqlValues);
	 }
	
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  �ü�ʲ��̤�ɽ���������������ä˥����С��饤�ɤ���ɬ�פ�̵��
	 *  (preforward()�Τߥ����С��饤�ɤ�����ɤ�)
	 *
	 *  @access     public
	 */
	function forward()
	{
		// �ڡ����󥰽���
		if(!$this->af->getApp('listview_data')){
			$this->build();
		}
		// ���֥��饹��forward()
		return parent::forward();
	}
	
	/**
	 * �ڡ����󥰽���
	@param
		array listview
			db_key				dsn�μ���
			data_only			SQL�μ����ǡ����Τ�
			sql_select			������ǻ��ꤹ��select�֥�å�
			sql_from			������ǻ��ꤹ��from�֥�å�
			sql_where			������ǻ��ꤹ��where�֥�å�
			sql_values			������ǻ��ꤹ��ץ졼����
			sql_order			������ǻ��ꤹ��order�֥�å�
			sql_num			���ڡ����˲���Υǡ�����ɽ�������뤫
			action_name			�ڡ����󥰤˰����Ϥ����������̾
		string page				[_REQUEST]���ߤΥڡ�����
	@return
		string listview_total			[af->setApp]�ȡ�������
		array listview_data			[af->setApp]ɽ���ǡ���
		string listview_current			[af->setApp]����ɽ���ڡ�����
		string listview_last			[af->setApp]�ǽ��ڡ�����
		array listview_links			[af->setAppNE]�ڡ����󥰥�󥯡�PEAR::Pager������
	*/
	function build()
	{
		$listview = $this->listview;
		// �¹Ԥ���Τ˽�ʬ���ѿ�������м¹�
		if(array_key_exists('sql_select', $listview) && array_key_exists('sql_from', $listview)){
			// �ѥ�᥿���������
			// ɬ�ܤǤʤ��ѥ�᥿
			$db_key = "";
			$dataOnly = false;
			$actionName = "";
			$sqlNum = 50;
			$sqlOrder = "";
			$sqlWhere = "";
			$sqlGroup = "";
			$sqlDistinct = "";
			$sqlValues = array();
			if(array_key_exists('db_key', $listview)) $db_key = $listview['db_key'];
			if(array_key_exists('data_only', $listview)) $dataOnly = $listview['data_only'];
			if(array_key_exists('action_name', $listview)) $actionName = $listview['action_name'];
			if(array_key_exists('sql_num', $listview)) $sqlNum = $listview['sql_num'];
			if(array_key_exists('sql_order', $listview)) $sqlOrder = $listview['sql_order'];
			if(array_key_exists('sql_group', $listview)) $sqlGroup = $listview['sql_group'];
			if(array_key_exists('sql_where', $listview)) $sqlWhere = $listview['sql_where'];
			if(array_key_exists('sql_values', $listview)) $sqlValues = $listview['sql_values'];
			if(array_key_exists('sql_distinct', $listview)) $sqlDistinct = $listview['sql_distinct'];
			// ɬ�ܤΥѥ�᥿
			$sqlSelect		= $listview['sql_select'];
			$sqlFrom		= $listview['sql_from'];
			
			$controller =& $this->backend->getController();
			$db	=& $this->backend->getDB($db_key);
			
			// �����������
			if($sqlDistinct){
				$countQuery = "SELECT count(distinct {$sqlDistinct}) FROM {$sqlFrom}";
			}else{
				$countQuery = "SELECT count(*) FROM {$sqlFrom}";
			}
			$dataQuery = "SELECT {$sqlSelect} FROM {$sqlFrom}";
			if($sqlWhere){
				$countQuery .= " WHERE {$sqlWhere}";
				$dataQuery .= " WHERE {$sqlWhere}";
			}
			// group�֥�å��λ���
			if($sqlGroup){
				//$countQuery .=  " GROUP by {$sqlGroup}";
				$dataQuery .=  " GROUP by {$sqlGroup}";
			}
			// order�֥�å��λ���
			if($sqlOrder){
				//$countQuery .=  " ORDER by {$sqlOrder}";
				$dataQuery .=  " ORDER by {$sqlOrder}";
			}
			
			// �ڡ����׻�
			$page = 1;
			if(array_key_exists('page', $_REQUEST)) $page = $_REQUEST['page'];
			
			// ���ե��åȷ׻�
			$offset = ($page - 1) * $sqlNum;
			
			// ������Υ�ߥåȷ׻�
			// �ǡ����Τߤξ�����������
			if(!$dataOnly) $dataQuery .= " LIMIT $offset,$sqlNum";
			
			// �ڡ����󥰤ǰ����Ѥ��ʤ��ͤ����
			$unset_param = array('start', 'page', 'add', 'update', 'delete', 'submit', 'search');
			// �ڡ����󥰤ǰ����Ѥ��ͤ����
			$param = &$this->af->getArray();
			foreach($param as $k => $v){
				// ����ξ��
				if(is_array($v)){
					foreach($v as $j => $l){
						if($l != ''){
							$extraVars["{$k}[{$j}]"] = urlencode(mb_convert_encoding($l, $GLOBALS['io_enc'], 'EUC-JP'));
						}
					}
				}
				// �����顼�ξ��
				else{
					if($v != ''){
						if(!in_array($k, $unset_param)) $extraVars[$k] = urlencode(mb_convert_encoding($v, $GLOBALS['io_enc'], 'EUC-JP'));
					}
				}
			}
			
			// ���������̾����
			if($actionName == ''){
				$currentActionName = $controller->getCurrentActionName();
				$extraVars['action_' . $currentActionName] = 'true';
			} else {
				$extraVars['action_' . $actionName] = 'true';
			}
			
			// ɽ���ǡ��������
			$pageData = $db->db->getAll($dataQuery, $sqlValues, DB_FETCHMODE_ASSOC);
			//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//foreach($this->backend->db_list as $a)echo($a->db->last_query).'<br />';
//foreach($this->backend->db_list as $a) $um->trace($a->db->last_query);
//print $dataQuery;
//if(Ethna::isError($pageData)) print $pageData->getDebugInfo();
			$um = $this->backend->getManager('Util');
			// �ǡ����Τߤξ��Ͻ�λ
			if($dataOnly){
				$this->af->setApp('listview_data', $pageData);
				return true;
			}
			
			// �ȡ���������
			$total = $db->db->getOne($countQuery, $sqlValues);
//foreach($this->backend->db_list as $a)echo($a->db->last_query).'<br />';
//if(Ethna::isError($total)) print $total->getDebugInfo();
			// �ڡ����󥰥��ץ�������
			if($GLOBALS['type'] == 'admin'){
				$prevImg = '&#171; ����';
				$nextImg = '���� &#187;';
			}else{
				$prevImg = '��(��)����';
				$nextImg = '����(��)��';
			}
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
				'altFirst'					=> '�ǽ�Υڡ�����',
				'altPrev'					=> '���Υڡ�����',
				'altNext'					=> '���Υڡ�����',
				'altLast'					=> '�Ǹ�Υڡ���',
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
			$this->af->setApp('listview_data', $pageData);
			$this->af->setApp('listview_current', $page);
			if($total == 0 || $sqlNum == 0){
				$this->af->setApp('listview_last', 1);
			}else{
				$this->af->setApp('listview_last', @ceil($total / $sqlNum));
			}
			$this->af->setAppNE('listview_links', $links);
			
			// ���߰����Ѥ��Ǥ���ѥ�᥿����URL�����������ʣ�������å��ܥå����ΰ����Ѥ��ˤ��б����Ƥ��ʤ��Ϥ���
			// �����ȷϤΥѥ�᥿�ϰ����Ѥ��ʤ�
			$uri = "";
			if(is_array($extraVars)){
				$sort_param = array('sort_key', 'sort_order');
				foreach($extraVars as $k => $v){
					if(in_array($k, $sort_param)) continue;
					if($uri){
						$uri .= "&{$k}={$v}";
					}else{
						$uri .= "?{$k}={$v}";
					}
				}
			}
			$this->af->setApp('listview_uri', $uri);
		}
	}
}
// }}}
?>
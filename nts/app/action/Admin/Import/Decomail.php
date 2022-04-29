<?php
/**
 * Decomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼�륤��ݡ��ȼ¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminImportDecomail extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
	);
}

/**
 * �����ǥ��᡼�륤��ݡ��ȼ¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminImportDecomail extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// �ե������ɤ߹���
		$base = BASE . "/import/decomail/";
		$f = file("{$base}data.txt");
		// ���٤ƤΥ쥳���ɤ��Ф��ƽ�����Ԥ�
		foreach($f as $v){
			$d = explode("\t", $v);
			// �ǥ��᡼����Ͽ
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_Decomail($this->backend);
			// �ǥ��᡼��̾�η���
			if($d[5]){
				$o->set('decomail_name', "{$d[5]}");
			}
			// �ǥ��᡼�������η���
			if($d[6]){
				$o->set('decomail_desc', "{$d[6]}");
			}
			// �ǥ��᡼�륫�ƥ���ID�η���
			if($d[6]){
				$o->set('decomail_category_id', "{$d[7]}");
			}
			// �ǥ��᡼��ե�����1�Υ��åץ���
			$o->set('decomail_file1', "{$d[0]}");
			// �ǥ��᡼��ե�����2�Υ��åץ���
			$o->set('decomail_file2', "{$d[1]}");
			// DOCOMO�ѥǥ��᡼��ե�����Υ��åץ���
			$o->set('decomail_file_d', "{$d[2]}");
			// AU�ѥǥ��᡼��ե�����Υ��åץ���
			$o->set('decomail_file_a', "{$d[3]}");
			// SOFTBANK�ѥǥ��᡼��ե�����Υ��åץ���
			$o->set('decomail_file_s', "{$d[4]}");
			
//			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('decomail_status', 1);
			$o->set('decomail_created_time', $timestamp);
			$o->set('decomail_updated_time', $timestamp);
/*			// �ǥ��᡼���ۿ���λ������
//			if(!$this->af->get('decomail_stock_status')){
//				$o->set('decomail_stock_status', 0);
//				$o->set('decomail_stock_num', '');
//			}
//			// �ǥ��᡼���ۿ�������������
//			if(!$this->af->get('decomail_start_status')){
//				$o->set('decomail_start_status', 0);
//				$o->set('decomail_start_time', '');
//			}else{
//				$o->set('decomail_start_time', 
//					sprintf(
//						"%04d-%02d-%02d %02d:%02d:00",
//						$this->af->get('decomail_start_year' ),
//						$this->af->get('decomail_start_month'),
//						$this->af->get('decomail_start_day'),
//						$this->af->get('decomail_start_hour'),
//						$this->af->get('decomail_start_min')
//					)
//				);
//			}
//			// �ǥ��᡼���ۿ���λ��������
//			if(!$this->af->get('decomail_end_status')){
//				$o->set('decomail_end_status', 0);
//				$o->set('decomail_end_time', '');
			}else{
				$o->set('decomail_end_time', 
					sprintf(
						"%04d-%02d-%02d %02d:%02d:00",
						$this->af->get('decomail_end_year' ),
						$this->af->get('decomail_end_month'),
						$this->af->get('decomail_end_day'),
						$this->af->get('decomail_end_hour'),
						$this->af->get('decomail_end_min')
					)
				);
			}
			// �ǥ��᡼��ե�����1�Υ��åץ���
			if($this->af->get('decomail_file1')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file1', $um->uploadFile($this->af->get('decomail_file1'),'decomail'));
			}
			// �ǥ��᡼��ե�����2�Υ��åץ���
			if($this->af->get('decomail_file2')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file2', $um->uploadFile($this->af->get('decomail_file2'),'decomail'));
			}
			// DOCOMO�ѥǥ��᡼��ե�����Υ��åץ���
			if($this->af->get('decomail_file_d')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_d', $um->uploadFile($this->af->get('decomail_file_d'),'decomail'));
			}
			// AU�ѥǥ��᡼��ե�����Υ��åץ���
			if($this->af->get('decomail_file_a')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_a', $um->uploadFile($this->af->get('decomail_file_a'),'decomail'));
			}
			// SOFTBANK�ѥǥ��᡼��ե�����Υ��åץ���
			if($this->af->get('decomail_file_s')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_s', $um->uploadFile($this->af->get('decomail_file_s'),'decomail'));
			}
*/			// ��Ͽ
			$r = $o->add();
			// ��Ͽ���顼�ξ��
			if(Ethna::isError($r)){
				print "ERROR:{$v}";
			}else{
				print "SUCCESS:{$v}";
			}
			print "<br />";
		}
	}
}
?>
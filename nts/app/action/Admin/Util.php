<?php
/**
 * Util.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �����桼�ƥ���ƥ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUtil extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'page' => array(
			'name'		=> '�͎ߎ�����',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �����桼�ƥ���ƥ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUtil extends Tv_ActionUser
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
		// ɽ������ڡ���̾���������
		$page = $this->af->get('page');
		// �ڡ���̾�����ξ��ϥ�����ڡ�����ɽ��������
		if($page == '') return 'admin_index';
		
		// FAQ�ξ��ϥǡ������������
		if(preg_match('/faq_/', $page) && !in_array($page, array('faq_index'))){
			$ctl = $this->backend->getController();
			$template = $ctl->getTemplatedir();
			$filename = preg_replace('/^faq/', '', $page);
			$filepath = $template . '/admin/util/faq/'.$filename . '.txt';
			// �ե������¸�߳�ǧ
			if(is_file($filepath)){
				// �ե�����ǡ��������
				$file = file_get_contents($filepath);
				// �饤��ǡ�����ʬ��
				$l = explode("\n", $file);
				// ɽ���ѥǡ���������
				$f = array();
				// �ƥ�ݥ�����������
				$t = array();
				foreach($l as $k => $v){
					// �����ȥ�˥ޥå��������
					if(preg_match('/^[\+]/', $v)){
						// ���˥����ȥ뤬�������ɽ���ѥǡ����ˤޤ路���ƥ�ݥ�����������
						if(array_key_exists('title', $t)){
							$f[] = $t;
							$t = array();
						}
						// �ƥ�ݥ������˥ǡ�������Ͽ
						$t['title'] = preg_replace('/^[\+]/', '', $v);
					}
					// ����¾�Ϥ��٤���ʸ
					else{
						if(array_key_exists('body', $t)){
							$t['body'] .= "\n" . $v;
						}else{
							$t['body'] = $v;
						}
					}
				}
				// �Ǹ�Υǡ�����Ĥ餺��Ͽ
				$f[] = $t;
				$this->af->setAppNE('faq', $f);
				return 'admin_util_faq_data';
			}
		}
		
		// ���줾��Υڡ���̾���б������ӥ塼���ֵѤ���
		return 'admin_util_'.$page;
	}
}
?>

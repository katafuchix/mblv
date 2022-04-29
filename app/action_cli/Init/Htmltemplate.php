<?php
/**
 * Htmltemplate.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]HTML�ƥ�ץ졼�Ƚ������������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitHtmltemplate extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// HTML�ƥ�ץ졼�ȥޥ͡������ư
		$html_template = $this->backend->getManager('HtmlTemplate');
		// HTML�ƥ�ץ졼�ȥꥹ�Ȥ����
		$html_template_list = $html_template->getHtmlTemplateList();
		// �ڥ桼���ۥƥ�ץ졼�ȥǥ��쥯�ȥ������
		$user_template_dir = BASE . '/template/' . TEMPLATE . '/user/';
		// ���٤ƤΥƥ�ץ졼�Ȥ��Ф��ƽ�����Ԥ�
		foreach($html_template_list as $k => $v){
			// �ƥ�ץ졼�ȥѥ�������
			$_template = $user_template_dir . $k . '.tpl';
			// �ƥ�ץ졼�����Τ����
			$template = file_get_contents($_template);
			// �ƥ�ץ졼�Ⱦ�����ɲ�
			$t = new Tv_Htmltemplate($this->backend);
			$t->set('html_template_code', $k);
			$t->set('html_template_body', $template);
			$t->set('html_template_status', 1);
			$r = $t->add();
			if(Ethna::isError($r)){
				echo '\nERROR:' . $k . '\n';
			}else{
				echo $k . ' ';
			}
		}
		echo '\nDONE!';
		
		exit;
	}
}
?>
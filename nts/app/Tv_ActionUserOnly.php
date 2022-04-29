<?php
/**
 * Tv_ActionUserOnly.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/** */
require_once 'Tv_ActionUser.php';

/**
 * ����Ͽ�桼���Τߤ����������Ǥ��륢�������δ��쥯�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionUserOnly extends Tv_ActionUser
{
	/**
	 * ǧ��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// ���ܾ�����������
		parent::setSnsInfo();
		
		// ���å���󤬳��Ϥ��Ƥ��뤳�Ȥ�����
		if (!$this->session->isValid()) {
			// ��ǥ�����ϩ��¬�Ѥ˥��å����Ͼ��Ÿ�����Ƥ���Τǡ��ܲ���⡼�ɤ��ɤ�����ǧ
			$s = $this->session->get('user');
			if(!$s){
				// ini�ե���������Ф��褬�����
				if($this->config->get('redirect_url')){
					header("Location: ".$this->config->get('redirect_url'));
					exit;
				}else{
					return 'user_index';
				}
			}
		}
		
		return parent::authenticate();
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return parent::perform();
	}
}
?>
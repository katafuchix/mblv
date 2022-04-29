<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
require_once('Do.php');
/**
 * �����⡼����ܾ����Խ���ǧ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcConfigEditConfirm extends Tv_Form_AdminEcConfigEditDo
{
}
/**
 * �����⡼����ܾ����Խ���ǧ���������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcConfigEditConfirm extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'admin_ec_config_edit';
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
		// ��˥ե�����򥢥åץ��ɤ��Ƥ������Ȥǥ��åפ����ե�����̾��HIDDEN����������
		// �ե�����򥢥åץ���
		$um = $this->backend->getManager('Util');
		for($i=1;$i<=10;$i++){
			if($this->af->get('file_' . $i) && $this->af->get('file_' . $i . '_status') == 2){
				$filename = $um->uploadFile($this->af->get('file_' . $i));
				$this->af->set('filename_' . $i, $filename);
			}elseif($this->af->get('file_' . $i . '_status') == 3){
				$this->af->set('filename_' . $i, "");
			}
		}
		
		// ����ƥ����ʸ�ι���
		$um = $this->backend->getManager('Util');
		//$body = $um->convertHtmlPreview();
		$body = $um->convertHtml($this->af->get('mall_contents_body'));
		$this->af->setAppNe('mall_contents_body' ,$body);
		
		// HIDDEN�ե���������
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		return 'admin_ec_config_edit_confirm';
	}
}
?>
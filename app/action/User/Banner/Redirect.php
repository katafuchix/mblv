<?php
/**
 * Redirect.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���Хʡ�������쥯�ȥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBannerRedirect extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'banner_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * �桼���Хʡ�������쥯�ȥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBannerRedirect extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
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
		$banner_id = $this->af->get('banner_id');
		// �Хʡ�����μ���
		$db = $this->backend->getDB();
		$values = array($banner_id);
		$sql = "SELECT * FROM banner WHERE banner_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if(PEAR::isError($rows)){
			return 'user_error';
		}
		$banner_url = $rows[0]["banner_url"];
		$banner_id = $rows[0]["banner_id"];
		
		if(count($rows)>0){
			/* =============================================
			// �Хʡ����ײ��Ͻ���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// ����å������INSERT
			$sm->addStats('banner', $banner_id, 0, 2);
			
			// ������쥯��
			header("Location:$banner_url");
			exit;
		}else{
			return 'user_error';
		}
	}
}
?>
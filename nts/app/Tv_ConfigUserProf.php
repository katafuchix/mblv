<?php
/**
 * Tv_ConfigUserProf.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �ץ�ե����륪�ץ������ܥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ConfigUserProfManager extends Ethna_AppManager
{
	/**
	 * ���ܤ�ɽ�����1�ľ�ذ�ư����
	 * 
	 * @access public
	 * @param string $configUserProfId ��ư����ץ�ե����륪�ץ������ܤ�ID
	 * @return boolean �����ʤ�true�����Ԥʤ�false
	 */
	function moveUp($configUserProfId)
	{
		// �оݤΥ����ƥ�����
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfId
		);
		if(!$configUserProf->isValid()) return false;
		
		// 1�ľ�Υ����ƥ�򸡺�
		$configUserProfSearch =& new Tv_ConfigUserProf($this->backend);
		$filter = array(
			'config_user_prof_order' => new Ethna_AppSearchObject(
				$configUserProf->get('config_user_prof_order'),
				OBJECT_CONDITION_LT
			),
		);
		$configUserProfSearchResult = $configUserProfSearch->searchProp(
			array('config_user_prof_id'),
			$filter,
			array('config_user_prof_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfSearchResult[0] == 0) return false;
		
		// 1�ľ�Υ����ƥ�����
		$configUserProfUpper =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfSearchResult[1][0]['config_user_prof_id']
		);
		if(!$configUserProfUpper->isValid()) return false;
		
		// config_user_prof_order���ͤ��
		$tmp = $configUserProf->get('config_user_prof_order');
		$configUserProf->set(
			'config_user_prof_order',
			$configUserProfUpper->get('config_user_prof_order')
		);
		$configUserProfUpper->set('config_user_prof_order', $tmp);
		
		// DB�򹹿�
		$configUserProf->update();
		$configUserProfUpper->update();
		
		return true;
	}
	
	/**
	 * ���ܤ�ɽ�����1�Ĳ��ذ�ư����
	 * 
	 * @access public
	 * @param string $configUserProfId ��ư����ץ�ե����륪�ץ������ܤ�ID
	 * @return boolean �����ʤ�true�����Ԥʤ�false
	 */	
	function moveDown($configUserProfId)
	{
		// �оݤΥ����ƥ�����
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfId
		);
		if(!$configUserProf->isValid()) return false;
		
		// 1�Ĳ��Υ����ƥ�򸡺�
		$configUserProfSearch =& new Tv_ConfigUserProf($this->backend);
		$filter = array(
			'config_user_prof_order' => new Ethna_AppSearchObject(
				$configUserProf->get('config_user_prof_order'),
				OBJECT_CONDITION_GT
			),
		);
		$configUserProfSearchResult = $configUserProfSearch->searchProp(
			array('config_user_prof_id'),
			$filter,
			array('config_user_prof_order' => OBJECT_SORT_ASC),
			0,
			1
		);
		if($configUserProfSearchResult[0] == 0) return false;
		
		// 1�Ĳ��Υ����ƥ�����
		$configUserProfLower =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfSearchResult[1][0]['config_user_prof_id']
		);
		if(!$configUserProfLower->isValid()) return false;
		
		// config_user_prof_order���ͤ��
		$tmp = $configUserProf->get('config_user_prof_order');
		$configUserProf->set(
			'config_user_prof_order',
			$configUserProfLower->get('config_user_prof_order')
		);
		$configUserProfLower->set('config_user_prof_order', $tmp);
		
		// DB�򹹿�
		$configUserProf->update();
		$configUserProfLower->update();
		
		return true;
	}
}

/**
 * �ץ�ե����륪�ץ������ܥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ConfigUserProf extends Ethna_AppObject
{
}
?>
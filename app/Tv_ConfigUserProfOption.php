<?php
/**
 * Tv_ConfigUserProfOption.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �ץ�ե����륪�ץ�����������ޥޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ConfigUserProfOptionManager extends Ethna_AppManager
{
	/**
	 * ����ޤ�ɽ�����1�ľ�ذ�ư����
	 * 
	 * @access     public
	 * @param string $configUserProfOptionId ��ư����ץ�ե����륪�ץ�����������ޤ�ID
	 * @return boolean �����ʤ�true�����Ԥʤ�false
	 */
	function moveUp($configUserProfOptionId)
	{
		// �оݤΥ����ƥ�����
		$configUserProfOption =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionId
		);
		if(!$configUserProfOption->isValid()) return false;
		
		// 1�ľ�Υ����ƥ�򸡺�
		$configUserProfOptionSearch =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id'	=> new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_id'),
				OBJECT_CONDITION_EQ
			),
			'config_user_prof_option_order' => new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_option_order'),
				OBJECT_CONDITION_LT
			),
		);
		$configUserProfOptionSearchResult = $configUserProfOptionSearch->searchProp(
			array('config_user_prof_option_id'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfOptionSearchResult[0] == 0) return false;
		
		// 1�ľ�Υ����ƥ�����
		$configUserProfOptionUpper =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionSearchResult[1][0]['config_user_prof_option_id']
		);
		if(!$configUserProfOptionUpper->isValid()) return false;
		
		// config_user_prof_option_order���ͤ��
		$tmp = $configUserProfOption->get('config_user_prof_option_order');
		$configUserProfOption->set(
			'config_user_prof_option_order',
			$configUserProfOptionUpper->get('config_user_prof_option_order')
		);
		$configUserProfOptionUpper->set('config_user_prof_option_order', $tmp);
		
		// DB�򹹿�
		$configUserProfOption->update();
		$configUserProfOptionUpper->update();
		
		return true;
	}
	
	/**
	 * ���ܤ�ɽ�����1�Ĳ��ذ�ư����
	 * 
	 * @access     public
	 * @param string $configUserProfOptionId ��ư����ץ�ե����륪�ץ�����������ޤ�ID
	 * @return boolean �����ʤ�true�����Ԥʤ�false
	 */
	function moveDown($configUserProfOptionId)
	{
		// �оݤΥ����ƥ�����
		$configUserProfOption =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionId
		);
		if(!$configUserProfOption->isValid()) return false;
		
		// 1�Ĳ��Υ����ƥ�򸡺�
		$configUserProfOptionSearch =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id'	=> new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_id'),
				OBJECT_CONDITION_EQ
			),
			'config_user_prof_option_order' => new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_option_order'),
				OBJECT_CONDITION_GT
			),
		);
		$configUserProfOptionSearchResult = $configUserProfOptionSearch->searchProp(
			array('config_user_prof_option_id'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_ASC),
			0,
			1
		);
		if($configUserProfOptionSearchResult[0] == 0) return false;
		
		// 1�Ĳ��Υ����ƥ�����
		$configUserProfOptionLower =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionSearchResult[1][0]['config_user_prof_option_id']
		);
		if(!$configUserProfOptionLower->isValid()) return false;
		
		// config_user_prof_option_order���ͤ��
		$tmp = $configUserProfOption->get('config_user_prof_option_order');
		$configUserProfOption->set(
			'config_user_prof_option_order',
			$configUserProfOptionLower->get('config_user_prof_option_order')
		);
		$configUserProfOptionLower->set('config_user_prof_option_order', $tmp);
		
		// DB�򹹿�
		$configUserProfOption->update();
		$configUserProfOptionLower->update();
		
		return true;
	}
}

/**
 * �ץ�ե����륪�ץ�����������ޥ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ConfigUserProfOption extends Ethna_AppObject
{
}
?>
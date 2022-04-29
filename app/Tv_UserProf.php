<?php
/**
 *  Tv_UserProf.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  �桼���ץ�ե����륪�ץ��������ͥޥ͡�����
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package    MBLV
 */
class Tv_UserProfManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υץ�դ�������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOff($user_id)
	{
		// ���֥������Ȥ����
		/*
		$o = new Tv_UserProf($this->backend, 'user_id', $user_id);
		// ͭ���ʾ��
		if($o->isValid()){
			// ���֥������Ⱥ��
			$o->remove();
		}
		*/
		// �桼�����Υץ�դ����
		$o = & new Tv_UserProf($this->backend);
		$result = $o->searchProp(
			array('user_prof_id'),
			array('user_id' => $user_id),
			array('user_prof_id' => OBJECT_SORT_ASC)
		);
		foreach($result[1] as $item){
			// ���֥������Ȥ����
			$p = & new Tv_UserProf($this->backend, 'user_prof_id', $item['user_prof_id']);
			// ͭ���ʾ��
			if($p->isValid()){
				// ���֥������Ⱥ��
				$p->remove();
			}
		}
	}
}

/**
 *  �桼���ץ�ե����륪�ץ��������ͥ��֥�������
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package    MBLV
 */
class Tv_UserProf extends Ethna_AppObject
{
}
?>
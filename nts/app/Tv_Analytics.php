<?php
/**
 * Tv_Analytics.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * ���v��̓}�l�[�W��
 * 
 * @author Technovarth 
 * @analytics public 
 * @package SNSV
 */
class Tv_AnalyticsManager extends Ethna_AppManager
{
	/**
	 * ���v��͗p�Ƀf�[�^�����Z����
	 * $param = array(
	 *	'pre_regist',
	 *	'regist',
	 *	'invite',
	 *	'media',
	 *	'resign',
	 * );
	 */
	function addAnalytics($param)
	{
		// �����̓��t�ŁA���̃��N�G�X�g���Ńf�[�^�����邩
		$analytics =& new Tv_Analytics($this->backend);
		$row = &$analytics->searchProp(
			array('analytics_id', 'analytics_date', 'pre_regist_num', 'regist_num', 'friend_num', 'natural_num', 'resign_num'),
			array(
				'analytics_date' => new Ethna_AppSearchObject(date('Y-m-d'), OBJECT_CONDITION_EQ),
				)
			);
		// �Ȃ����add
		if ($row[0] == 0) {
			$analytics->set('analytics_date', date('Y-m-d'));
			// pre_regist_num		���o�^�Ґ�
			if($param['pre_regist']){
				$analytics->set('pre_regist_num', 1);
			}
			// regist_num		�{�o�^�Ґ�
			if($param['regist']){
				$analytics->set('regist_num', 1);
			}
			// friend_num		�F�B���ғo�^��
			if($param['invite']){
				$analytics->set('friend_num', 1);
			}
			// natural_num		���R�o�^��
			if($param['regist'] && !$param['invite'] && !$param['media']){
				$analytics->set('natural_num', 1);
			}
			// resign_num		�މ�Ґ�
			if($param['resign']){
				$analytics->set('resign_num', 1);
			}
			$analytics->add();
		}
		// �����update
		elseif ($row[0] > 0) {
			// ID�擾
			$analytics_id = $row[1][0]['analytics_id']; 
			$analytics = &new Tv_Analytics($this->backend, 'analytics_id', $analytics_id);
			// pre_regist_num		���o�^�Ґ�
			if($param['pre_regist']){
				$analytics->set('pre_regist_num', $row[1][0]['pre_regist_num'] + 1);
			}
			// regist_num		�{�o�^�Ґ�
			if($param['regist']){
				$analytics->set('regist_num', $row[1][0]['regist_num'] + 1);
			}
			// friend_num		�F�B���ғo�^��
			if($param['invite']){
				$analytics->set('friend_num', $row[1][0]['friend_num'] + 1);
			}
			// natural_num		���R�o�^��
			if($param['regist'] && !$param['invite'] && !$param['media']){
				$analytics->set('natural_num', $row[1][0]['natural_num'] + 1);
			}
			// resign_num		�މ�Ґ�
			if($param['resign']){
				$analytics->set('resign_num', $row[1][0]['resign_num'] + 1);
			}
			$r = $analytics->update();
		}
	}
}
/**
 * ���v��̓I�u�W�F�N�g
 * 
 * @author Technovarth 
 * @analytics public 
 * @package SNSV
 */
class Tv_Analytics extends Ethna_AppObject
{
	/**
	 * �I�u�W�F�N�g�v���p�e�B�\�����ւ̃A�N�Z�T
	 * 
	 * @analytics public 
	 * @param string $key �v���p�e�B��
	 * @return string �v���p�e�B�̕\����
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}
?>
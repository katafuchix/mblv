<?php
/**
 * Tv_Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ­�ץޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_FootprintManager extends Ethna_AppManager
{
	/**
	 * ­�פ��դ���
	 * 
	 * @access     public
	 */
	function leave()
	{
		// ­�פ��դ��륢��������ActionForm��
		// user_id��­�פ��դ�����桼���ˤ��������Ƥ���ɬ�פ�����ޤ���
		// �ޤ����桼���������󤷤Ƥ��뤳�Ȥ�����Ǥ���
		if (!$this->session->isValid() || $this->af->get('user_id') == '') return;
		
		$timestamp = date('Y-m-d H:i:s');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		if ($user['user_id'] != $this->af->get('user_id')) {
			// ��ʬ�ʳ��Υ桼���Υڡ����򸫤Ƥ������­�פ�Ĥ���
			// ����'user_id'���Ф����դ���­�פ�õ��
			$footprint = &new Tv_Footprint($this->backend);
			$filter = array('to_user_id' => $this->af->get('user_id'),
				'from_user_id' => $user['user_id'],
				'footprint_created_time' => new Ethna_AppSearchObject(
					date('Y-m-d 00:00:00'), OBJECT_CONDITION_GT
					),
				);
			$todaysFootprint = $footprint->searchProp(
				array('footprint_id'),
				$filter
				);
			if ($todaysFootprint[0] > 0) {
				// ����'user_id'���Ф����դ���­�פ�ͭ����
				// ­�פ��դ������֤򸽺ߤλ��֤˹�������
				$footprint = &new Tv_Footprint($this->backend,
					'footprint_id',
					$todaysFootprint[1][0]['footprint_id']
					);
				$footprint->set('footprint_created_time', $timestamp);
				$footprint->update();
			} else {
				// ����'user_id'���Ф����դ���­�פ�̵�����
				// ­�פ򿷵���������
				$footprint = &new Tv_Footprint($this->backend);
				$footprint->set('to_user_id', $this->af->get('user_id'));
				$footprint->set('from_user_id', $user['user_id']);
				$footprint->set('footprint_created_time', $timestamp);
				$footprint->add(); 
				// 'user_id'��­�פ�30���Ķ�������ϸŤ�­�פ�������
				$footprint = &new Tv_Footprint($this->backend);
				$oldFootprint = $footprint->searchProp(
					array('footprint_id'),
					array('to_user_id' => $this->af->get('user_id')),
					array('footprint_created_time' => OBJECT_SORT_DESC),
					30, 1
					);
				if (count($oldFootprint[1]) > 0) {
					foreach($oldFootprint[1] as $item) {
						$footprint = &new Tv_Footprint($this->backend, 'footprint_id', $item['footprint_id']);
						$footprint->remove();
					} 
				} 
			} 
		}
	}
	
	/**
	 * ���ꤷ���桼���Τ������Ȥ�������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOff($user_id)
	{
		// �桼�����Τ������Ȥ����
		$o = & new Tv_Footprint($this->backend);
		$result = $o->searchProp(
			array('footprint_id'),
			array('to_user_id' => $user_id),
			array('footprint_id' => OBJECT_SORT_ASC)
		);
		foreach($result[1] as $item){
			// ���֥������Ȥ����
			$f = & new Tv_Footprint($this->backend, 'footprint_id', $item['footprint_id']);
			// ͭ���ʾ��
			if($f->isValid()){
				// ���֥������Ⱥ��
				$f->remove();
			}
		}
	}
}

/**
 * ­�ץ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Footprint extends Ethna_AppObject
{
}
?>
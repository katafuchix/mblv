<?php
/**
 * Sound.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������ɥ�󥭥󥰥ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSoundRanking extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ������ɥ�󥭥�
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'sound s, ranking r',
			'sql_where'		=> 'r.type = ? AND s.sound_id = r.id AND sound_status = 1',
			'sql_values'	=> array('sound'),
			'sql_order'		=> 'r.ranking_order LIMIT 3,7'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
	}
}
?>
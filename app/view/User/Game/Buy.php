<?php
/**
 * Buy.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameBuy extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ������������
		$a =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$a->exportForm();
		
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'c.comment_type=2 AND c.comment_subid=? AND c.comment_status=1' .
			' AND u.user_id=c.user_id AND u.user_status = ? ';
		$sqlValues = array($this->af->get('game_id'),2);
		$this->listview = array(
			'action_name'	=> 'user_game_buy',
			'sql_select'	=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,c.comment_id,c.comment_created_time,c.comment_body',
			'sql_from'		=> 'user as u, comment as c',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
		
		// ����ü�����ɤ���Ƚ�̳���
		$o =& new Tv_Config($this->backend, 'config_type', 'game');
		
		// �ե��������̼���
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('site_low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('site_low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('site_low_term_s');
				break;
			default:
				break;
		}
		// ����ü�����ɤ���Ƚ��
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$term = $um->getModel();
			$model = strtolower($model);
			foreach($term_list as $v){
				if($v){
					if($device == strtolower(trim($v))){
						$low_term = true;
					}
				}
			}
		}
		$this->af->setApp('low_term', $low_term);
	}
}
?>
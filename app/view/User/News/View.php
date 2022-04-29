<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���˥塼���������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserNewsView extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$news =& new Tv_News(
			$this->backend,
			'news_id',
			$this->af->get('news_id')
		);
		$this->af->setApp('news', $news->getNameObject());
		$this->af->setAppNE('news', $news->getNameObject());
		
		switch($this->af->get('return'))
		{
		case 'avatar':
			$this->af->setApp('return_href', '?action_user_avatar=true');
			$this->af->setApp('return_name', '���ʎގ���');
			break;
		case 'decomail':
			$this->af->setApp('return_href', '?action_user_decomail=true');
			$this->af->setApp('return_name', '�Îގ��Ҏ���');
			break;
		case 'game':
			$this->af->setApp('return_href', '?action_user_game=true');
			$this->af->setApp('return_name', '���ގ���');
			break;
		case 'sound':
			$this->af->setApp('return_href', '?action_user_sound=true');
			$this->af->setApp('return_name', '�����ݎĎ�');
			break;
		default:
			$this->af->setApp('return_href', '?action_user_top=true');
			$this->af->setApp('return_name', '�Ύߎ�����');
			break;
		}
	}
}
?>
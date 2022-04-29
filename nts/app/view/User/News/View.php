<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザニュース閲覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserNewsView extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
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
			$this->af->setApp('return_name', 'ｱﾊﾞﾀｰ');
			break;
		case 'decomail':
			$this->af->setApp('return_href', '?action_user_decomail=true');
			$this->af->setApp('return_name', 'ﾃﾞｺﾒｰﾙ');
			break;
		case 'game':
			$this->af->setApp('return_href', '?action_user_game=true');
			$this->af->setApp('return_name', 'ｹﾞｰﾑ');
			break;
		case 'sound':
			$this->af->setApp('return_href', '?action_user_sound=true');
			$this->af->setApp('return_name', 'ｻｳﾝﾄﾞ');
			break;
		default:
			$this->af->setApp('return_href', '?action_user_top=true');
			$this->af->setApp('return_name', 'ﾎﾟｰﾀﾙ');
			break;
		}
		
		/*
		switch($news->get('news_type'))
		{
		case NEWS_TYPE_TOP:
			$this->af->setApp('return_href', '?action_user_top=true');
			$this->af->setApp('return_name', 'ﾎﾟｰﾀﾙ');
			break;
		case NEWS_TYPE_AVATAR:
			$this->af->setApp('return_href', '?action_user_avatar=true');
			$this->af->setApp('return_name', 'ｱﾊﾞﾀｰ');
			break;
		case NEWS_TYPE_DECOMAIL:
			$this->af->setApp('return_href', '?action_user_decomail=true');
			$this->af->setApp('return_name', 'ﾃﾞｺﾒｰﾙ');
			break;
		case NEWS_TYPE_GAME:
			$this->af->setApp('return_href', '?action_user_game=true');
			$this->af->setApp('return_name', 'ｹﾞｰﾑ');
			break;
		case NEWS_TYPE_SOUND:
			$this->af->setApp('return_href', '?action_user_sound=true');
			$this->af->setApp('return_name', 'ｻｳﾝﾄﾞ');
			break;
		}
		*/
	}
}
?>

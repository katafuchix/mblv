<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理メールテンプレート編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminMailtemplateEdit extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 使用可能なタグを生成
		$cut = $this->config->get('tag_cut');
		$tag = "[共通タグ]\n";
		$t = $this->config->get('tag');
		foreach($t as $k => $v){
			$tag .= "・" . $v['name'] . "の挿入：「{$cut}" . $k;
			if(array_key_exists('option', $v)) $tag .= ":" . $v['option'];
			$tag .=  "{$cut}」\n";
		}
		$tag .= "[専用タグ]\n";
		$mtt = $this->config->get('mail_template');
		foreach($mtt as $k => $v){
			if(array_key_exists('tag', $v)){
				foreach($v['tag'] as $j => $l){
					$tag .= "・" . $l['name'] . "の挿入：「{$cut}" . $j;
					if(array_key_exists('option', $l)) $tag .= ":" . $l['option'];
					$tag .=  "{$cut}」\n";
				}
			}
		}
		$this->af->setApp('tag', $tag);
	}
}
?>

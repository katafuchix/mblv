<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����᡼��ƥ�ץ졼����Ͽ���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMailtemplateAdd extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���Ѳ�ǽ�ʥ���������
		$cut = $this->config->get('tag_cut');
		$tag = "[���̥���]\n";
		$t = $this->config->get('tag');
		foreach($t as $k => $v){
			$tag .= "��" . $v['name'] . "����������{$cut}" . $k;
			if(array_key_exists('option', $v)) $tag .= ":" . $v['option'];
			$tag .=  "{$cut}��\n";
		}
		$tag .= "[���ѥ���]\n";
		$mtt = $this->config->get('mail_template');
		foreach($mtt as $k => $v){
			if(array_key_exists('tag', $v)){
				foreach($v['tag'] as $j => $l){
					$tag .= "��" . $l['name'] . "����������{$cut}" . $j;
					if(array_key_exists('option', $l)) $tag .= ":" . $l['option'];
					$tag .=  "{$cut}��\n";
				}
			}
		}
		$this->af->setApp('tag', $tag);
	}
}
?>
<?php
/**
 * Dl.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������ɥ�������ɲ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserSoundDl extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������ɾ������
		$s =& new Tv_Sound($this->backend, 'sound_id', $this->af->get('sound_id'));
		$s->exportForm();
		
		// ������ɥ��ƥ���������
		$sc =& new Tv_SoundCategory($this->backend, 'sound_category_id', $s->get('sound_category_id'));
		$sc->exportForm();
		
		// ����ü�����ɤ���Ƚ�̳���
		$o =& new Tv_Cms($this->backend, 'cms_type', 5);
		
		// �ե��������̼���
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$filename = $s->get('sound_file_d');
				$term_list = $o->get('low_term_d');
				break;
			case 'AU':
				$filename = $s->get('sound_file_a');
				$term_list = $o->get('low_term_a');
				break;
			case 'SOFTBANK':
				$filename = $s->get('sound_file_s');
				$term_list = $o->get('low_term_s');
				break;
			default:
				$filename = $s->get('sound_file_d');
				break;
		}
		$file_path = $this->config->get('file_path') . "sound/{$filename}";
		// �ե��������̤�����
		$file_size = array_reduce (
				array (" B", " KB", " MB"), create_function (
//					'$a,$b', 'return is_numeric($a)?($a>=1024?$a/1024:number_format($a,2).$b):$a;'
					'$a,$b', 'return is_numeric($a)?($a>=1024?$a/1024:number_format($a,0).$b):$a;'
				), filesize ($file_path)
			);
		$this->af->set('file_size', $file_size);
		$this->af->set('file_size_row', filesize ($file_path));
		
		// ����ü�����ɤ���Ƚ��
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$term = $um->getTermInfo();
			$device = strtolower($term[1]);
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

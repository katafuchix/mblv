<?php
/**
 * Get.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ե�����������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFileGet extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'id' => array(
			'type' => VAR_TYPE_INT,
		),
		'type' => array(
			'type' => VAR_TYPE_STRING,
		),
		'attr' => array(
			'type' => VAR_TYPE_STRING,
		),
		'file' => array(
			'type' => VAR_TYPE_STRING,
		),
		
		// EC�ѤΥѥ�᡼�� EC�β������åץ��ɷ������ѹ������ޤǤ�������
		'contents' => array(
			'type' => VAR_TYPE_STRING,
		),
		'file_name' => array(
			'type' => VAR_TYPE_STRING,
		),
	);
}
/**
 * �桼���ե�����������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
//class Tv_Action_UserFileGet extends Tv_ActionUserOnly
// �����ΰ�
class Tv_Action_UserFileGet extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// �ե����륪�֥������ȼ���
		switch($this->af->get('type'))
		{
			// �����ξ��ν���
			case 'image':
				$file = new Tv_Image($this->backend,'image_id',$this->af->get('id'));
				// �ե����뤬̵���ʾ��
				// �ե����뤬¸�ߤ��ʤ����
				if(!$file->isValid() || $file->get('image_status') != 1 || !is_file($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')))){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage'));
					$mime_types = $this->config->get('mime_types');
					// attr���֤������ƺ�Ŭ��������noimage��������Ϥ���
					$attr = $this->af->get('attr');
					// �������λ��̵꤬�����ϥ���ͥ��륵����ɽ��
					if(!$attr) $attr = 't';
					// ���ꥸ�ʥ륵�����ξ���������ɽ��
					if($attr == 'o') $attr = 'a';
					$noimage = str_replace('%attr%', $attr, $this->config->get('noimage'));
					header('Content-Type: ' . $mime_types[$ext]);
					readfile($this->config->get('file_path') . $noimage);
				}
				// �ե����뤬¸�ߤ�����
				else{
					// ����°���β�����ɽ��
					header('Content-Type: ' . $file->get('image_mime_type'));
					readfile($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')));
				}
				break;
			// ư��ξ��ν���
			case 'movie':
				$file = new Tv_Movie($this->backend,'movie_id',$this->af->get('id'));
				// �ե����뤬̵���ʾ��
				// �ե����뤬¸�ߤ��ʤ����
				if(!$file->isValid() || $file->get('movie_status') != 1 || !@file_exists($this->config->get('file_path') . $file->get('image_' . $this->af->get('attr')))){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage_path'));
					$mime_types = $this->config->get('mime_types');
					header('Content-type: ' . $mime_types[$ext]);
					readfile($this->config->get('noimage_path'));
				}
				// �ե����뤬¸�ߤ�����
				else{
					// ����°���β�����ɽ��
					header('Content-type: ' . $file->get('movie_mime_type'));
					readfile($this->config->get('file_path') . 'movie/'.$file->get('movie_path_' . $this->af->get('attr')));					
				}
				break;
			// �ǥ��᡼��ե�����ν���
			case 'decomail':
				// �ǥ��᡼�����μ���
				$o = new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// �ե�����̾�η���
				if($GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
					$filename = $o->get('decomail_file_d');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
					$filename = $o->get('decomail_file_a');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
					$filename = $o->get('decomail_file_s');
				}else{
					// ����Ū��DOCOMO���б�������
					$filename = $o->get('decomail_file_d');
				}
				// MIME-TYPE�η���
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// �ǡ����ν���
				$file_path = $this->config->get('file_path') . "/decomail/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// ������ե�����ν���
			case 'game':
				// ���������μ���
				$o = new Tv_Game($this->backend, 'game_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// �ե�����̾�η���
				$filename = $o->get('game_file3');
				// MIME-TYPE�η���
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// �ǡ����ν���
				$file_path = $this->config->get('file_path') . "/game/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// ������ɥե�����ν���
			case 'sound':
				// ������ɾ���μ���
				$o = new Tv_Sound($this->backend, 'sound_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// �ե�����̾�η���
				if($GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
					$filename = $o->get('sound_file_d');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
					$filename = $o->get('sound_file_a');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
					$filename = $o->get('sound_file_s');
				}else{
					// ����Ū��DOCOMO���б�������
					$filename = $o->get('sound_file_d');
				}
				// MIME-TYPE�η���
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// �ǡ����ν���
				$file_path = $this->config->get('file_path') . "/sound/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// �ե���������ϥե�����ν���
			case 'file':
				// �ե��������μ���
				$o = new Tv_File($this->backend, 'file_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				$filename = $o->get('file_name');
				// MIME-TYPE�η���
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// �ǡ����ν���
				$file_path = $this->config->get('file_path') . "/file/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// ����¾�ե�����ν���
			default:
				if($this->af->get('contents') && $this->af->get('file_name')){
					$file = $this->config->get('file_path').'/'.$this->af->get('contents').'/'.$this->af->get('file_name');
					if(is_file($file)){
						// MIME-TYPE�η���
						$mime_types = $this->config->get('mime_types');
						$um = $this->backend->getManager('Util');
						list($pre, $ext) = $um->extractName($filename);
						$mime_type = $mime_types[$ext];
						header('Content-Type: ' . $mime_type);
						readfile($file);
					}
					break;
				}else{
					// �ե�����̾�η���
					$file = $this->af->get('file');
					// MIME-TYPE�η���
					$mime_types = $this->config->get('mime_types');
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($file);
					$mime_type = $mime_types[$ext];
					// �ǡ����ν���
					$file_path = $this->config->get('file_path') . $file;
					if(is_file($file_path)){
						$file_size = filesize($file_path);
						header("Content-Type: {$mime_type}");
						header("Content-Length: {$file_size}");
						readfile($file_path);
					}
					break;
				}
		}
		exit;
	}
}
?>
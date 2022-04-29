<?php
/**
 * Get.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ե�����������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminFileGet extends Tv_ActionForm
{
	/** @var bool   �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
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
	);
}

/**
 * �����ե�����������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminFileGet extends Tv_ActionAdminOnly
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
				
				if(!$file->isValid() ||  !@file_exists($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')))
				){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage'));
					$mime_types = $this->config->get('mime_types');
					// attr���֤������ƺ�Ŭ��������noimage��������Ϥ���
					$noimage = str_replace('%attr%', $this->af->get('attr'), $this->config->get('noimage'));
					header('Content-Type: ' . $mime_types[$ext]);
					readfile($this->config->get('file_path') . $noimage);
				}
				// �ե����뤬¸�ߤ�����
				else{
					// ����°���β�����ɽ��
					header('Content-type: ' . $file->get('image_mime_type'));
					readfile($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')));
				}
				break;
			// ư��ξ��ν���
			case 'movie':
				$file = new Tv_Movie($this->backend,'movie_id',$this->af->get('id'));
/*
				// �ե����뤬̵���ʾ��
				// �ե����뤬¸�ߤ��ʤ����
				if(!$file->isValid() || $file->get('movie_status') != 1 || !@file_exists($this->config->get('file_path') . $file->get('image_' . $this->af->get('attr'))){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage_path'));
					$mime_types = $this->config->get('mime_types');
					header('Content-type: ' . $mime_types[$ext]);
					readfile($this->config->get('noimage_path'));
				}
				// �ե����뤬¸�ߤ�����
				else{
					// ����°���β�����ɽ��
					header('Content-type: ' . $file->get('file_mime_type'));
					readfile($this->config->get('file_path') . $file->get('image_path_' . $this->af->get('attr')));
				}
*/
				break;
			// ����¾�ե�����ν���
			default:
				$file = $this->af->get('file');
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($file);
				$mime_type = $mime_types[$ext];
				header("Content-type: {$mime_type}");
				readfile($this->config->get('file_path') . $file);
				break;
		}
		exit;
	}
}
?>
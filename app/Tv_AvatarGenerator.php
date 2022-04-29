<?php
/**
 * Tv_AvatarGenerator.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���Х��������ͥ졼���ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_AvatarGeneratorManager extends Ethna_AppManager
{
	/* @var integer���Х������ڤ�Ф����� */
	var $base = 0;
	/* @var integer���Х������ڤ�Ф�����X��ɸ */
	var $base_x = 0;
	/* @var integer ���Х������ڤ�Ф�����Y��ɸ */
	var $base_y = 0;
	/* @var integer���Х������ڤ�Ф��� */
	var $base_w = 100;
	/* @var integer ���Х������ڤ�Ф��⤵ */
	var $base_h = 160;
	/* @var integer���Х����β��� */
	var $width = 100;
	/* @var integer ���Х����ν��� */
	var $height = 160;
	/* @var array ���Х����˾褻��ѡ��ĥꥹ�� */
	var $parts  = array();
	/* @var array MIME-TYPE */
	var $mime_types = array();
	
	/**
	 * ���������ڤ�Ф��ͤ�����
	 * 
	 * @access     public
	 * @param integer $base_x ���Х������ڤ�Ф�����X��ɸ
	 * @param integer $base_y ���Х������ڤ�Ф�����Y��ɸ
	 * @param integer $base_w ���Х������ڤ�Ф���
	 * @param integer $base_h ���Х������ڤ�Ф��⤵
	 */
	function setBase($base_x, $base_y, $base_w, $base_h)
	{
		// �ڤ�Ф��ͤ򥻥åȤ���
		$this->base = 1;
		$this->base_x = $base_x;
		$this->base_y = $base_y;
		$this->base_w = $base_w;
		$this->base_h = $base_h;
	}
	
	/**
	 * ����������
	 * 
	 * @access     public
	 * @param integer $width ���Х����β���
	 */
	function setWidth($width)
	{
		// ���Х����β��������ꤹ��
		$this->width  = $width;
	}
	
	/**
	 * ����������
	 * 
	 * @access     public
	 * @param integer $height ���Х����ν���
	 */
	function setHeight($height)
	{
		// ���Х����ν��������ꤹ��
		$this->height  = $height;
	}
	
	/**
	 * �ե�����̾������
	 * 
	 * @access     public
	 * @param string $filename ���Х����Υե�����̾
	 */
	function setFilename($filename)
	{
		$this->filename = $filename;
	}
	
	/**
	 * �쥤�䡼���ɲ�
	 * 
	 * @access     public
	 * @param string $filename �ɲä���쥤�䡼����̾
	 */
	function addLayer($filename)
	{
		$this->parts[] = $filename;
	}
	
	/**
	 * ���Х��������
	 * 
	 * @access     public
	 */
	function buildComposition($id)
	{
		// �쥤�䡼�˴ؤ������
		$files = "";
		for($i=0; $i<count($this->parts); $i++){
			// ������¸�ߤ��ʤ����ϼ��Υ롼�פ�
			if(!is_file($this->parts[$i])) continue;
			
			$files[] = $this->parts[$i];
		}
		
		// ����ȥ��餫��[avatar_generator.pl]�Υѥ�������
		$ctl = $this->backend->getController();
		$cmd = $this->config->get('perl_path') . " " . $ctl->getDirectory('bin') . "/avatar_generator.pl ";
		// ����������
		$files = implode(',', $files);
		$cmd = "{$cmd} {$this->width} {$this->height} {$this->base} {$this->base_x} {$this->base_y} {$this->base_w} {$this->base_h} {$files}";
		
		// ID���꤬����Х���å��������
		if($id){
			// ����å���ե���������
			$path = $this->getCacheFolder($id);
			if(!is_dir($path)){
				// �ե������¸�ߤ��ʤ����Ϻ���
				mkdir($path);
				chmod($path, 0777);
			}
			
			// ����å���ե�����̾�η���
			$filename = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
			
			// ���ޥ�ɤ��ɲ�
			$cmd .= " > {$filename}";
		}
		// ����å����̵����Хإå��������
		else{
			header('Content-Type: image/gif');
		}
		
		// ��������
		passthru($cmd);
		
		// ������������ϥѡ��ߥå����򹹿�
		if($id){
			chmod($filename, 0777);
		}
	}
	
	/**
	 * ���Х�������å���Υե��������
	 * 
	 * @access     public
	 */
	function getCacheFolder($id)
	{
		$folderName = floor(floatval($id) / 100000) + 1;
		return $this->config->get('file_path') . 'avatar_cache/' . $folderName;
	}
	
	/**
	 * ���Х�������å���Υե�����̾����
	 * 
	 * @access     public
	 */
	function getCacheFilename($id)
	{
		return $id . '_' . $this->width . 'x' . $this->height . '.gif';
	}
	
	/**
	 * ���Х�������å����¸�߳�ǧ
	 * 
	 * @access     public
	 */
	function isCache($id)
	{
		// ����å���ե�����̾������
		$path = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
		// �ե������¸�߳�ǧ
		if(is_file($path)){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * ���Х�������å���ν���
	 * 
	 * @access     public
	 */
	function buildCache($id)
	{
		// ����å���ե�����̾������
		$path = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
		// ����°���β�����ɽ��
		header('Content-Type: image/gif');
		readfile($path);
	}
	
	/**
	 * ���Х���������
	 * 
	 * @access     public
	 */
	 function build($id = 0)
	{
		$this->mime_types = $this->config->get('mime_types');
		$this->um = $this->backend->getManager('Util');
		$this->buildComposition($id);
	}
}
?>
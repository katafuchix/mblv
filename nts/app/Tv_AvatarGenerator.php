<?php
/**
 * Tv_AvatarGenerator.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���Х��������ͥ졼���ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_AvatarGeneratorManager extends Ethna_AppManager
{
	/* @var string ���ϥ��Х����Υե�����̾ */
	var $filename;
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
	 * @access public
	 * @param integer $base_x ���Х������ڤ�Ф�����X��ɸ
	 * @param integer $base_y ���Х������ڤ�Ф�����Y��ɸ
	 * @param integer $base_w ���Х������ڤ�Ф���
	 * @param integer $base_h ���Х������ڤ�Ф��⤵
	 */
	function set_base($base_x, $base_y, $base_w, $base_h)
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
	 * @access public
	 * @param integer $width ���Х����β���
	 */
	function set_width($width)
	{
		// ���Х����β��������ꤹ��
		$this->width  = $width;
	}

	/**
	 * ����������
	 * 
	 * @access public
	 * @param integer $height ���Х����ν���
	 */
	function set_height($height)
	{
		// ���Х����ν��������ꤹ��
		$this->height  = $height;
	}

	/**
	 * �ե�����̾������
	 * 
	 * @access public
	 * @param string $filename ���Х����Υե�����̾
	 */
	function set_filename($filename)
	{
		$this->filename = $filename; 
	}

	/**
	 * �طʤ�����
	 * 
	 * @access public
	 * @param string $background �طʤΥ�����
	 */
	function set_background($background)
	{ 
		$this->background_source = $background;
	}
 
	/**
	 * �쥤�䡼���ɲ�
	 * 
	 * @access public
	 * @param string $filename �ɲä���쥤�䡼����̾
	 */
	function add_layer($filename)
	{
		$this->parts[] = $filename;
	}

	/**
	 * �طʤ�����
	 * 
	 * @access public
	 */
	function build_background()
	{
/*
		// ���������������
		if(empty($this->height)){
			$first_image = $this->parts[0];
			list($width, $height) = getimagesize($first_image);
			$this->height = ($this->width/$width)*$height;
		}
		
		// �����ο���������
		$this->background = imagecreatetruecolor($this->width, $this->height);
		if(substr_count($this->background_source, "#")>0){
			// �طʲ���������
			$int = hexdec(str_replace("#", "", $this->background_source));
			$background_color = imagecolorallocate ($this->background, 0xFF & ($int >> 0x10), 0xFF & ($int >> 0x8), 0xFF & $int);
			imagefill($this->background, 0, 0, $background_color);
		}else{
			// �طʲ�������
			list($bg_w, $bg_h) = getimagesize($this->background_source);
			list($pre, $ext) = $this->um->extractName($this->background_source);
			switch($ext)
			{
				case 'gif':
					$img = imagecreatefromgif($this->background_source);
					break;
				case 'png':
					$img = imagecreatefrompng($this->background_source);
					break;
				case 'jpg':
					$img = imagecreatefromjpeg($this->background_source);
					break;
				default:
					break;
			}
			// �������ڤ�Ф����꤬������
			if($this->base){
				imagecopyresampled($this->background, $img, $this->base_x, $this->base_y, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
			}else{
				imagecopyresampled($this->background, $img, 0, 0, 0, 0, $this->width, $this->height, $bg_w, $bg_h);
			}
		}
*/
	}

	/**
	 * ���Х��������
	 * 
	 * @access public
	 */
	function build_composition()
	{
/*
		// �����Х�������
		$this->canvas = imagecreatetruecolor($this->width, $this->height);
		// �طʤ�����
		if($this->background){
			imagecopyresampled($this->canvas, $this->background, 0,0,0,0,$this->width, $this->height, $this->width, $this->height);
		}
		
*/
		// �쥤�䡼�˴ؤ������
		$files = "";
		for($i=0; $i<count($this->parts); $i++){
			// ������¸�ߤ��ʤ����ϼ��Υ롼�פ�
			if(!is_file($this->parts[$i])) continue;
			
			$files[] = $this->parts[$i];
/*
			// �����Υ����������
			list($part_w, $part_h) = getimagesize($this->parts[$i]);
			// MIME-TYPE�ˤ�äƽ�����ʬ��
			list($pre, $ext) = $this->um->extractName($this->parts[$i]);
			switch($ext)
			{
				case 'gif':
					$body_part = imagecreatefromgif($this->parts[$i]);
					break;
				case 'png':
					$body_part = imagecreatefrompng($this->parts[$i]);
					break;
				case 'jpg':
					$body_part = imagecreatefromjpeg($this->parts[$i]);
					break;
				default:
					continue;
					break;
			}
			imageAlphaBlending($body_part, true);
			imageSaveAlpha($body_part, true);
			// �������ڤ�Ф����꤬������
			if($this->base){
//				imagecopyresampled($this->canvas, $body_part, $this->base_x, $this->base_y, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
				imagecopyresampled($this->canvas, $body_part, 0, 0, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
			}else{
				imagecopyresampled($this->canvas, $body_part, 0,0,0,0,$this->width, $this->height, $part_w, $part_h);
			}
*/
		}
		
		header("content-type: image/gif");
		$ctl = $this->backend->getController();
		$cmd = $this->config->get('perl_path') . " " . $ctl->getDirectory('bin') . "/avatar_generator.pl ";
		$files = implode(',', $files);
		$cmd = "{$cmd} {$this->width} {$this->height} {$this->base} {$this->base_x} {$this->base_y} {$this->base_w} {$this->base_h} {$files}";
//print $cmd;
		passthru($cmd);
//		system($cmd);
	}

	/**
	 * ���Х��������
	 * 
	 * @access public
	 */
	function output()
	{
		if(!empty($this->filename)){
			// �ե�����̾�����ꤵ��Ƥ���Хե��������¸
			imagegif($this->canvas, $this->filename,100);
		}else{
			// �ե�����̾�����ꤵ��Ƥ��ʤ���в��������
			header("content-type: image/gif"); 
			imagegif($this->canvas, "", 100); 
		}
		// ���꡼����
		imagedestroy($this->canvas);
	}

	/**
	 * ���Х���������
	 * 
	 * @access public
	 */
	 function build()
	{
	 	$this->mime_types = $this->config->get('mime_types');
	 	$this->um = $this->backend->getManager('Util');
		$this->build_background();
		$this->build_composition();
//		$this->output();
	}
}

?>

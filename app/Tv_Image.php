<?php
/**
 * Tv_Image.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ImageManager extends Ethna_AppManager
{
	/**
	 * ��������
	 * 
	 * @access     public
	 * @param integer $imageId ������������Id
	 * @param integer $imageStatus ���������β������֡ʥǥե����0��
	 * @return boolean ����������������������ʤ�true��
	 */
	function remove($imageId, $typeName = "", $typeId = 0, $imageStatus = 0)
	{
		// �������֥������Ȥ��������
		$image = new Tv_Image($this->backend,'image_id',$imageId);
		if (!$image->isValid()) return false;
		
		// DB����
		$image->set('image_status', $imageStatus);
		$image->set('type', $typeName);
		$image->set('id', $typeId);
		$image->set('image_deleted_time', date('Y-m-d H:i:s'));
		$image->update();
		
		return true;
	}
	
	/**
	 * �������Ѵ�
	 * 
	 * @access     public
	 * @param array
	 	image_path1	�Ѵ��������ѥ�
	 	image_path2	�Ѵ�������ѥ�
	 	w		�Ѵ���
	 	h		�Ѵ���
	 * @return ture/false
	 */
	function convert($param)
	{
		// �ѥ�᥿������å�
		$args = array('image_path1', 'image_path2', 'w', 'h');
		foreach($args as $v){
			if(!array_key_exists($v, $param)) return false;
		}
		// �Ѵ�
		$cmd = $this->config->get('imagemagick_path') . ' ' . $param['image_path1'] . ' -resize ' . $param['w'] . 'x' . $param['h'] . ' ' . $param['image_path2'];
		system($cmd);
		// �ѡ��ߥå������ѹ�
		chmod($param['image_path2'], 0755);
		
		return true;
	}
	
	/**
	 * ������ꥵ�������ƥ��åץ���
	 * 
	 * @access     public
	 * @param string $tmpPath ��������ѥ�
	 * @param string $mime �ޥ��ॿ����
	 * @param integer $userId ��ͭ�ԤΥ桼��ID
	 * @return integer ����ID�ʼ��Ԥʤ�0��
	 */
	function uploadImageFromMail($tmpPath, $mimeType, $userId)
	{
		// image_id���ߤ����Τ����DB���ɲä��Ƥ���
		$image = new Tv_Image($this->backend);
		$image->set('user_id', $userId);
		$image->set('image_mime_type', $mimeType);
		$image->set('image_size', filesize($tmpPath));
		$image->set('image_created_time', date('Y-m-d H:i:s'));
		$image->set('image_status', 1);
		$image->set('image_checked', 0);
		
		$image->add();
		
		// ����������ϥ��֥������Ȥ����������
		$image = new Tv_Image($this->backend, 'image_id', $image->getId());
		
		// �ե����̾������
		// ̿̾��§:image_id/100000�򾮿����ʲ��ڼΤƤ�����+1
		$folderName = floor(floatval($image->getId()) / 100000) + 1;
		if(!is_dir($this->config->get('image_path') . $folderName)){
			// �ե������¸�ߤ��ʤ����Ϻ���
			mkdir($this->config->get('image_path') . $folderName);
			chmod($this->config->get('image_path') . $folderName, 0777);
		}
		
		// ����̾�β���
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($tmpPath);
		// ���ꥸ�ʥ�
		$image->set('image_o', $folderName . '/' . $image->getId() . 'o.' . $ext);
		$oImageFullPath = $this->config->get('image_path') . $image->get('image_o');
		// ������
		$image->set('image_a', $folderName . '/' . $image->getId() . 'a.' . $ext);
		$aImageFullPath = $this->config->get('image_path') . $image->get('image_a');
		// ��
		$image->set('image_s', $folderName . '/' . $image->getId() . 's.' . $ext);
		$sImageFullPath = $this->config->get('image_path') . $image->get('image_s');
		// ����ͥ���
		$image->set('image_t', $folderName . '/' . $image->getId() . 't.' . $ext);
		$tImageFullPath = $this->config->get('image_path') . $image->get('image_t');
		// ����ͥ���
		$image->set('image_i', $folderName . '/' . $image->getId() . 'i.' . $ext);
		$iImageFullPath = $this->config->get('image_path') . $image->get('image_i');
		
		// ���ꥸ�ʥ�����򥳥ԡ�
		copy($tmpPath, $oImageFullPath);
		chmod($oImageFullPath, 0755); 
		// �������Ѳ���������
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $aImageFullPath,
			'w'		=> $this->config->get('image_a_width'),
			'h'		=> $this->config->get('image_a_height')
		);
		$this->convert($values);
		// ������������
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $sImageFullPath,
			'w'		=> $this->config->get('image_s_width'),
			'h'		=> $this->config->get('image_s_height')
		);
		$this->convert($values);
		// ����ͥ����Ѳ���������
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $tImageFullPath,
			'w'		=> $this->config->get('image_t_width'),
			'h'		=> $this->config->get('image_t_height')
		);
		$this->convert($values);
		// ���������Ѳ���������
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $iImageFullPath,
			'w'		=> $this->config->get('image_i_width'),
			'h'		=> $this->config->get('image_i_height')
		);
		$this->convert($values);
		
		// DB�˲���������ɲ�
		$image->update();
		
		return $image->getId();
	}
}

/**
 * �������֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Image extends Ethna_AppObject
{
}
?>
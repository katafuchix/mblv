<?php
/**
 * Tv_Movie.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ư��ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MovieManager extends Ethna_AppManager
{
	/**
	 * �ե��������
	 * 
	 * @access     public
	 * @param integer $movieId �������ե������Id
	 * @param integer $movieStatus ���������Υե�������֡ʥǥե����0��
	 * @return boolean ����������������������ʤ�true��
	 */
	function remove($movieId, $typeName = "", $typeId = 0, $imageStatus = 0)
	{
		// �ե����륪�֥������Ȥ��������
		$movie = new Tv_Movie($this->backend,'movie_id',$movieId);
		if (!$movie->isValid()) return false;
		
		// DB����
		
		// DB����
		$movie->set('movie_status', $imageStatus);
		$movie->set('type', $typeName);
		$movie->set('id', $typeId);
		$movie->set('movie_deleted_time', date('Y-m-d H:i:s'));
		$movie->update();
		
		return true;
	}
	
	/**
	 * ư����Ѵ�
	 * 
	 * @access     public
	 * @param array
	 	movie_path1	�Ѵ����ե�����ѥ�
	 	movie_path2	�Ѵ���ե�����ѥ�
	 * @return ture/false
	 */
	function convert($param)
	{
		$um =& $this->backend->getManager('Util');
		
		// �ѥ�᥿������å�
		$args = array('movie_path1', 'movie_path2');
		foreach($args as $v){
			if(!array_key_exists($v, $param)) return false;
		}
	//	if( !is_movie($det) ){
			$com = $this->config->get('ffmpeg_path') . " -i {$param[movie_path1]} -an -f flv {$param[movie_path2]}"; //-an
			system( $com );
			$um->trace($com);
			$com = $this->config->get('flvtool2_path') . " -U {$param[movie_path2]}";
			system( $com );
			$um->trace($com);
	//	}
//		// �ѡ��ߥå������ѹ�
//		chmod($param['movie_path2'], 0755);
		
		return true;
	}
	
	/**
	 * �᡼�뤫��ư��򥢥åץ���
	 * 
	 * @access     public
	 * @param string $tmpPath ����ե�����ѥ�
	 * @param string $mime �ޥ��ॿ����
	 * @param integer $userId ��ͭ�ԤΥ桼��ID
	 * @return integer �ե�����ID�ʼ��Ԥʤ�0��
	 */
	//function uploadResizeImage($tmpPath, $mimeType, $userId)
	function uploadMovieFromMail($tmpPath, $mimeType, $userId)
	{
		// movie_id���ߤ����Τ����DB���ɲä��Ƥ���
		$movie = new Tv_Movie($this->backend);
		$movie->set('user_id', $userId);
//		$movie->set('movie_status', 4); // ���åץ����Ԥ�
		$movie->set('movie_mime_type', $mimeType);
		$movie->set('movie_size', filesize($tmpPath));
		$movie->set('movie_created_time', date('Y-m-d H:i:s'));
		$movie->set('movie_status', 1);
		
		$movie->add();
		
		// ����������ϥ��֥������Ȥ����������
		$movie = new Tv_Movie($this->backend, 'movie_id', $movie->getId());
		
		// �ե����̾������
		// ̿̾��§:movie_id/100000�򾮿����ʲ��ڼΤƤ�����+1
		$folderName = floor(floatval($movie->getId()) / 100000) + 1;
		if(!is_dir($this->config->get('movie_path') . $folderName)){
			// �ե������¸�ߤ��ʤ����Ϻ���
			mkdir($this->config->get('movie_path') . $folderName);
			chmod($this->config->get('movie_path') . $folderName, 0777);
		}
		
		// �ե�����̾�β���
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($tmpPath);
		// ���ꥸ�ʥ�
		$movie->set('movie_path_o', $folderName . '/' . $movie->getId() . 'o.' . $ext);
		$oFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_o');
		// ������
		$movie->set('movie_path_a', $folderName . '/' . $movie->getId() . 'a.' . $ext);
		$aFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_a');
		// ��
		$movie->set('movie_path_s', $folderName . '/' . $movie->getId() . 's.' . $ext);
		$aFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_s');
		// ����ͥ���
		$movie->set('movie_path_t', $folderName . '/' . $movie->getId() . 't.' . $ext);
		$tFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_t');
		// ����ͥ���
		$movie->set('movie_path_i', $folderName . '/' . $movie->getId() . 'i.' . $ext);
		$iFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_i');
		
		// ���ꥸ�ʥ�����򥳥ԡ�
		copy($tmpPath, $oFileFullPath);
		chmod($oFileFullPath, 0755); 
		// �������Ѳ���������
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $aFileFullPath,
			'w'		=> $this->config->get('movie_width_a'),
			'h'		=> $this->config->get('movie_height_a')
		);
		$this->convert($values);
		// ������������
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $sFileFullPath,
			'w'		=> $this->config->get('movie_width_s'),
			'h'		=> $this->config->get('movie_height_s')
		);
		$this->convert($values);
		// ����ͥ����Ѳ���������
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $tFileFullPath,
			'w'		=> $this->config->get('movie_width_t'),
			'h'		=> $this->config->get('movie_height_t')
		);
		$this->convert($values);
		// ���������Ѳ���������
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $iFileFullPath,
			'w'		=> $this->config->get('movie_width_i'),
			'h'		=> $this->config->get('movie_height_i')
		);
		$this->convert($values);
		
		// DB�˥ե����������ɲ�
		$movie->update();
		
		return $movie->getId();
	}
} 

/**
 * ư�襪�֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Movie extends Ethna_AppObject {
} 
?>
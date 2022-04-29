<?php
/**
 * Contents.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ե꡼�ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserContents extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// �ǡ��������åȤ���Ƥ��ʤ����
		if(!$this->af->getAppNE('html')){
			$um = $this->backend->getManager('Util');
			
			// ����ƥ��ID�����ꤵ��Ƥ�����
			if($this->af->get('contents_id')){
				// ���֥������Ȥ��������
				$o = new Tv_Contents($this->backend, array('contents_id','contents_status'), array($this->af->get('contents_id'), 1));
				if(!$o->isValid()){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
			}else{
				// �����ɤ�¸�ߤ��뤫�ɤ�����ǧ����
				$param = array(
					'sql_select'	=> '*',
					'sql_from'	=> 'contents',
					'sql_where'	=> 'contents_code = ?',
					'sql_values'	=> array($this->af->get('code')),
				);
				$r = $um->dataQuery($param);
				if(count($r) == 0){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
				// ���֥������Ȥ��������
				$o = new Tv_Contents($this->backend, array('contents_code','contents_status'), array($this->af->get('code'), 1));
				if(!$o->isValid()){
					$this->ae->add(null, '', E_USER_CONTENTS_NOT_FOUND);
					return 'user_error';
				}
			}
			// �����Ѵ�
			$html = $o->get('contents_body');
			// �����ϩ¬��
			$search = "/##media_mailaddress\[(.*)\]##/";
			while(preg_match($search , $html, $match)){
				// ��ǥ��������ϩ���̻Ҥμ���
				$media_access_hash = $this->session->get('media_access_hash');
				// ��ǥ�����ͳ�Υ���������Ƚ��
				if($media_access_hash == ''){
					// ��ǥ��������ϩ���̻Ҥ�����
					$mm = $this->backend->getManager('Media');
					$media_access_hash = $mm->addMediaAccess($match[1]);
					// ���å���󤬻ϤޤäƤ��ʤ����ϳ���
					if(!$this->session->isStart()){
						$this->session->start(0);
					} 
					// ��ǥ�����ͳ�ǤΥ��������ξ��ϥѥ�᡼���򥻥å����˳�Ǽ���ư����Ѥ�
					$this->session->set('media_access_hash', $media_access_hash); 
				}
				// [code]�����ϩ�ѥ᡼�륢�ɥ쥹�����Ѵ�
				$mail_account = $this->config->get('mail_account');
				$mail_domain = $this->config->get('mail_domain');
				$replace = "{$mail_account['regist']['account']}_{$media_access_hash}@{$mail_domain}";
				$html = preg_replace($search, $replace, $html);
			}
			
			// ���եȥХ󥯤ξ���ʸ���������Ѵ�
			if($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
				$html = preg_replace('/Shift_JIS/i', 'UTF-8', $html);
			}
			$html = $um->convertHtml($html);
			
			// �ƥ�ץ졼�Ȥ˥��å�
			$this->af->setAppNE('html', $html);
		}
	}
}
?>
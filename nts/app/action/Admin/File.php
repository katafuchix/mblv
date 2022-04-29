<?php
/**
 * File.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �����ե�����������̥��������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminFile extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'file_id' => array(
			'name'		=> '�ե�����ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'file' => array(
			'name'		=> '�ե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
		'upload' => array(
			'name'		=> '���åץ���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'edit' => array(
			'name'		=> '�Խ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'delete' => array(
			'name'		=> '���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �����ե�����������̥��������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFile extends Tv_ActionAdminOnly
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
		// �ե�����ID��������Ϲ���
		if($this->af->get('edit') && $this->af->get('file') && $this->af->get('file_id')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend, 'file_id', $this->af->get('file_id'));
			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('file_updated_time', $timestamp);
			// �����Υ��åץ���
			if($this->af->get('file')){
				$um = $this->backend->getManager('Util');
				$o->set('file_name', $um->uploadFile($this->af->get('file'), 'file'));
				// ���åץ��ɤ����������饪�ꥸ�ʥ�Υե�����̾����¸����
				if($o->get('file_name')){
					$file = $this->af->get('file');
					$o->set('file_name_o', $file['name']);
				}
			}
			// ����
			$r = $o->update();
			// �������顼�ξ��
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_UPLOAD);
			}
			// ���������ξ��
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_UPLOAD);
			}
			// �ե������ͤ򥯥ꥢ
			$this->af->clearFormVars();
		}
		// ���åץ���
		elseif($this->af->get('upload') && $this->af->get('file')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend);
			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('file_status', 1);
			$o->set('file_created_time', $timestamp);
			$o->set('file_updated_time', $timestamp);
			// �����Υ��åץ���
			if($this->af->get('file')){
				$um = $this->backend->getManager('Util');
				$o->set('file_name', $um->uploadFile($this->af->get('file'), 'file'));
				// ���åץ��ɤ����������饪�ꥸ�ʥ�Υե�����̾����¸����
				if($o->get('file_name')){
					$file = $this->af->get('file');
					$o->set('file_name_o', $file['name']);
				}
			}
			// ��Ͽ
			$r = $o->add();
			// ��Ͽ���顼�ξ��
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_UPLOAD);
			}
			// ��Ͽ�����ξ��
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_UPLOAD);
			}
			// �ե������ͤ򥯥ꥢ
			$this->af->clearFormVars();
		}
		// ���
		elseif($this->af->get('delete') && $this->af->get('file_id')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend, 'file_id', $this->af->get('file_id'));
			$o->set('file_status', 0);
			$o->set('file_updated_time', $timestamp);
			$o->set('file_deleted_time', $timestamp);
			// ���
			$r = $o->update();
			// ������顼�ξ��
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_DELETE);
			}
			// ��������ξ��
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_DELETE);
			}
			// �ե������ͤ򥯥ꥢ
			$this->af->clearFormVars();
		}
		// ����ɽ��
		
		return 'admin_file';
	}
}
?>
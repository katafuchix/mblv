<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ܺٲ��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemPostageDetail extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ����ե�������μ���
		$this->af->setApp('from_mailaddress', $this->config->get('from_mailaddress'));
		
		//���ξ��ʤ���������ɣĤ����
		$postage_id = $um->getPostageId($this->af->get('item_id'));
		$this->af->setApp('postage_id', $postage_id);
		
		//���ξ��ʤ����������ס� 1:����,2:�ϰ�,3:��׶��,4:��׸Ŀ��ˤ����
		$um = $this->backend->getManager('Util');
		$postage_type = $um->getPostageType($this->af->get('item_id'));
		$this->af->setApp('postage_type', $postage_type);
		
		//��������̾�������ƥ��å�
		$p = new Tv_Postage($this->backend, 'postage_id', $postage_id);
		$this->af->setApp('postage_name', $p->get('postage_name'));
		$this->af->setApp('postage_total_price_set', $p->get('postage_total_price_set'));
		$this->af->setApp('postage_total_piece_set', $p->get('postage_total_piece_set'));
		$p->exportForm(OBJECT_IMPORT_IGNORE_NULL);
		//postage_type == 2�ϰ褴�Ȥ������ξ��
		if($postage_id && $postage_type == 2){
			//��ƻ�ܸ��Ȥ��������Υꥹ�Ȥ���������å�
			$u = $this->backend->getManager('Util');
			$pref_list = $this->config->get('delivery_pref');
			foreach($pref_list as $k => $v){
				if(!is_numeric($k)) continue;
				$postage_list[$k]['name'] = $v['name'];
				$postage_list[$k]['fee'] = $p->get('postage_pref_'.$k);
			}
			$this->af->setApp('postage_list', $postage_list);
		}
	}
}
?>
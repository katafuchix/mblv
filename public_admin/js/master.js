/**
 * �w�肳�ꂽ�d����̑����ݒ�A
 * @param
	$supplier_id
		supplier_id �d����ID
*/
function settlementSearch( supplier_id ){
	beginsettlementSearch( supplier_id );
}


/*
	�T�[�o�[��supplier_id��n����
	���ώ�ʁA�����ݒ�A������萔���ݒ�̒�`���ꂽXML���󂯎��
	XML�����߂���֐����ԕ���
*/
function beginsettlementSearch( supplier_id ){
	
	// �d����ID���Ȃ���ΏI������
	if( supplier_id == 0 ){
		return '';
	}
	
	queryId = 0;
	requestId = (new Date()).getTime();
	var currentRequestId = requestId;
	
	// ���N�G�X�g���M��
	url = "index.php?action_admin_ec_supplier_detail=true&supplier_id=" + supplier_id;
	// Ajax.Request�N���X���g���ă��N�G�X�g�𓊂���
	new Ajax.Request(url, 
	{
		method: 'get',
		onSuccess: function(oReq){
			// �s���ȏꍇ�̏���
			if(requestId != currentRequestId){
				return;
			}
			// �ԋp���ꂽXML�����߂���֐����Ăяo��
			var r = analyzeSettlementResult(currentRequestId, oReq );
		},
		// ���s�����ꍇ�̏���
		onFailure: function(oReq){
		}
	}
	);

}


/*
	// XML�����߂���֐�
	// ���̂悤��XML�����߂���
	<supplier>
		<supplier_id>1</supplier_id>
		<supplier_use_credit_status>1</supplier_use_credit_status>
		<supplier_use_conveni_status>1</supplier_use_conveni_status>
		<supplier_use_transfer_status>1</supplier_use_transfer_status>
		<supplier_use_exchange_status>1</supplier_use_exchange_status>
		<postage_id>2</postage_id>
		<exchange_id>1</exchange_id>
	</supplier>
*/
function analyzeSettlementResult(currentRequestId, oReq){
	
	// supplier�^�O�̃G�������g���擾����
	var resElms = oReq.responseXML.getElementsByTagName('supplier');
	
	// �N���W�b�g���ς��g�p�\�ł���΃`�F�b�N������
	if(resElms[0].getElementsByTagName('supplier_use_credit_status')[0].firstChild.nodeValue==1){
		$('item_use_credit_status_1').checked = "true";
	}else{
		$('item_use_credit_status_1').checked = "";
	}
	
	// �R���r�j���ς��g�p�\�ł���΃`�F�b�N������
	if(resElms[0].getElementsByTagName('supplier_use_conveni_status')[0].firstChild.nodeValue==1){
		$('item_use_conveni_status_1').checked = "true";
	}else{
		$('item_use_conveni_status_1').checked = "";
	}
	
	// ��������ς��g�p�\�ł���΃`�F�b�N������
	if(resElms[0].getElementsByTagName('supplier_use_transfer_status')[0].firstChild.nodeValue==1){
		$('item_use_transfer_status_1').checked = "true";
	}else{
		$('item_use_transfer_status_1').checked = "";
	}
	
	// ��s�U���݂��g�p�\�ł���΃`�F�b�N������
	if(resElms[0].getElementsByTagName('supplier_use_exchange_status')[0].firstChild.nodeValue==1){
		$('item_use_exchange_status_1').checked = "true";
	}else{
		$('item_use_exchange_status_1').checked = "";
	}
	
	// �����ݒ�̒l���擾���đI������
	$('postage_list').value  = resElms[0].getElementsByTagName('postage_id')[0].firstChild.nodeValue;
	
	// ������萔���ݒ�̒l���擾���đI������
	$('exchange_list').value  = resElms[0].getElementsByTagName('exchange_id')[0].firstChild.nodeValue;
	
}

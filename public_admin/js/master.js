/**
 * 指定された仕入先の送料設定、
 * @param
	$supplier_id
		supplier_id 仕入先ID
*/
function settlementSearch( supplier_id ){
	beginsettlementSearch( supplier_id );
}


/*
	サーバーにsupplier_idを渡して
	決済種別、送料設定、代引き手数料設定の定義されたXMLを受け取り
	XMLを解釈する関数実態部分
*/
function beginsettlementSearch( supplier_id ){
	
	// 仕入先IDがなければ終了する
	if( supplier_id == 0 ){
		return '';
	}
	
	queryId = 0;
	requestId = (new Date()).getTime();
	var currentRequestId = requestId;
	
	// リクエスト送信先
	url = "index.php?action_admin_ec_supplier_detail=true&supplier_id=" + supplier_id;
	// Ajax.Requestクラスを使ってリクエストを投げる
	new Ajax.Request(url, 
	{
		method: 'get',
		onSuccess: function(oReq){
			// 不正な場合の処理
			if(requestId != currentRequestId){
				return;
			}
			// 返却されたXMLを解釈する関数を呼び出す
			var r = analyzeSettlementResult(currentRequestId, oReq );
		},
		// 失敗した場合の処理
		onFailure: function(oReq){
		}
	}
	);

}


/*
	// XMLを解釈する関数
	// このようなXMLを解釈する
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
	
	// supplierタグのエレメントを取得する
	var resElms = oReq.responseXML.getElementsByTagName('supplier');
	
	// クレジット決済が使用可能であればチェックを入れる
	if(resElms[0].getElementsByTagName('supplier_use_credit_status')[0].firstChild.nodeValue==1){
		$('item_use_credit_status_1').checked = "true";
	}else{
		$('item_use_credit_status_1').checked = "";
	}
	
	// コンビニ決済が使用可能であればチェックを入れる
	if(resElms[0].getElementsByTagName('supplier_use_conveni_status')[0].firstChild.nodeValue==1){
		$('item_use_conveni_status_1').checked = "true";
	}else{
		$('item_use_conveni_status_1').checked = "";
	}
	
	// 代引き決済が使用可能であればチェックを入れる
	if(resElms[0].getElementsByTagName('supplier_use_transfer_status')[0].firstChild.nodeValue==1){
		$('item_use_transfer_status_1').checked = "true";
	}else{
		$('item_use_transfer_status_1').checked = "";
	}
	
	// 銀行振込みが使用可能であればチェックを入れる
	if(resElms[0].getElementsByTagName('supplier_use_exchange_status')[0].firstChild.nodeValue==1){
		$('item_use_exchange_status_1').checked = "true";
	}else{
		$('item_use_exchange_status_1').checked = "";
	}
	
	// 送料設定の値を取得して選択する
	$('postage_list').value  = resElms[0].getElementsByTagName('postage_id')[0].firstChild.nodeValue;
	
	// 代引き手数料設定の値を取得して選択する
	$('exchange_list').value  = resElms[0].getElementsByTagName('exchange_id')[0].firstChild.nodeValue;
	
}

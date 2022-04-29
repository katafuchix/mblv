<?php
// POINTON SAMPLE MODULE ver1.00

// GMT日時の取得
function GET_GMT() {
	return Date("Y/m/d H:i:s",mktime(date("H")-9,date("i"),date("s"),date("m"),date("d"),date("Y"))) . " +0000";
}

// htmlentitiesでデコードされたエンコードのデコード処理
function unhtmlentities( $String ) {
	$trans_tbl	=  get_html_translation_table(HTML_ENTITIES);
	$trans_tbl	=  array_flip($trans_tbl);
	return	strtr($String,$trans_tbl);
}

// 交換サイト登録リクエスト電文の複号化
function ID_Request_GET( $PENParam, $RegistKey ) {
	$PENBody	=  "";
	$RegisterType	=  "";
	$SiteID		=  "";
	$PENAccount	=  "";
	$Account	=  "";
	$ReturnURL	=  "";
	$MD		=  "";
	$PENParam	=  base64_decode(unhtmlentities(urldecode($PENParam)));
	$PENArray	=  split("\r\n",$PENParam);
	foreach ($PENArray as $line) {
  		if (strlen($line) > 0) {
			if (strstr($line,"=") != false) {
				$lineArray	=  split("=",$line,2);
				$label		=  $lineArray[0];
				$value		=  $lineArray[1];
				switch (strtoupper($label)) {
					case "REGISTERTYPE":
						$RegisterType	=  $value;
						break;
					case "SITEID":
						$SiteID		=  $value;
						break;
					case "PENACCOUNT":
						$PENAccount	=  $value;
						break;
					case "ACCOUNT":
						$Account	=  $value;
						break;
					case "RETURNURL":
						$ReturnURL	=  $value;
						break;
					case "MD":
						$MD		=  $value;
						break;
				}
				if (strtoupper($label) != "MD") {
					$PENBody		.= $line . "\r\n";
				}
			}
		}
	}
	if ($MD == md5($PENBody . $RegistKey)) {
		if ( $RegisterType != "" && $SiteID != "" && $PENAccount != "" && $ReturnURL != "" && $MD != "" ) {
			$LocalState	= "success";
		} else {
			$LocalState	= "reject";
		}
	} else {
		$LocalState	= "cert_fail";
	}
	
	$ReturnArray = Array (	"RegisterType"		=> $RegisterType,
				"PENAccount"		=> $PENAccount,
				"Account"		=> $Account,
				"SiteID"		=> $SiteID,
				"ReturnURL"		=> $ReturnURL,
				"LocalState"		=> $LocalState		);
	return	$ReturnArray;
}

// 交換サイト登録レスポンス電文の生成
function ID_Response_MAKE( $SiteID, $Account , $PENAccount , $State , $RegistKey ) {
	$PENBody	=  "SiteID=$SiteID\r\n"
			.  "Account=$Account\r\n"
			.  "PENAccount=$PENAccount\r\n"
			.  "State=$State\r\n";
	$PENParam	=  $PENBody . "MD=" . md5($PENBody . $RegistKey) . "\r\n";
	$PENParam	=  urlencode(htmlentities(base64_encode($PENParam)));
	return		$PENParam;
}

// 交換サイト登録リクエスト電文の生成
function ID_Request_MAKE( $RegisterType, $SiteID , $Account , $ReturnURL , $RegistKey ) {
	$PENBody	=  "RegisterType=$RegisterType\r\n"
			.  "SiteID=$SiteID\r\n"
			.  "Account=$Account\r\n"
			.  "ReturnURL=$ReturnURL\r\n";
	$PENParam	=  $PENBody . "MD=" . md5($PENBody . $RegistKey) . "\r\n";
	$PENParam	=  urlencode(htmlentities(base64_encode($PENParam)));
	return		$PENParam;
}

// 交換サイト登録レスポンス電文の復号化
function ID_Response_GET( $PENParam , $RegistKey ) {
	$PENBody	=  "";
	$RegisterType	=  "";
	$SiteID		=  "";
	$PENAccount	=  "";
	$Account	=  "";
	$State		=  "";
	$MD		=  "";
	$PENParam	=  base64_decode(unhtmlentities(urldecode($PENParam)));
	$PENArray	=  split("\r\n",$PENParam);
	foreach ($PENArray as $line) {
  		if (strlen($line) > 0) {
			if (strstr($line,"=") != false) {
				$lineArray	=  split("=",$line,2);
				$label		=  $lineArray[0];
				$value		=  $lineArray[1];
				switch (strtoupper($label)) {
					case "REGISTERTYPE":
						$RegisterType	=  $value;
						break;
					case "SITEID":
						$SiteID		=  $value;
						break;
					case "ACCOUNT":
						$Account	=  $value;
						break;
					case "PENACCOUNT":
						$PENAccount	=  $value;
						break;
					case "STATE":
						$State		=  $value;
						break;
					case "MD":
						$MD		=  $value;
						break;
				}
				if (strtoupper($label) != "MD") {
					$PENBody		.= $line . "\r\n";
				}
			}
		}
	}
	if ($MD == md5($PENBody . $RegistKey)) {
		if ( $RegisterType != "" && $SiteID != "" && $PENAccount != "" && $State != "" && $MD != "" ) {
			$LocalState	=  "success";
		} else {
			$LocalState	=  "reject";
		}
	} else {
		$LocalState	=  "cert_fail";
	}
	$ReturnArray	=  Array(	"RegisterType"		=> $RegisterType,
					"SiteID"		=> $SiteID,
					"PENAccount"		=> $PENAccount,
					"Account"		=> $Account,
					"State"			=> $State,
					"LocalState"		=> $LocalState		);
	return		$ReturnArray;
}

// ポイント交換リクエスト電文の生成
function Point_Trans_Request_MAKE( $TransactionID , $ProcessID , $SiteID , $Account , $Point , $RegistKey ) {
	$RequestDate	=  GET_GMT();
	$PENBody	=  "MessageType=TransPointReq\r\n"
			.  "TransactionID=$TransactionID\r\n"
			.  "ProcessID=$ProcessID\r\n"
			.  "SiteID=$SiteID\r\n"
			.  "Account=$Account\r\n"
			.  "Date=$RequestDate\r\n"
			.  "Point=$Point\r\n"
			.  "PENAccount=\r\n";
	$PENParam	=  $PENBody . "MD=" . md5($PENBody . $RegistKey) . "\r\n";
	return		$PENParam;
}

// ポイント交換確認リクエスト電文の生成
function Point_Confirm_Request_MAKE( $TransactionID , $ProcessID , $SiteID , $RegistKey ) {
	$RequestDate	= GET_GMT();
	$PENBody	=  "MessageType=ConfirmStateReq\r\n"
			.  "TransactionID=$TransactionID\r\n"
			.  "ProcessID=$ProcessID\r\n"
			.  "SiteID=$SiteID\r\n"
			.  "Date=$RequestDate\r\n";
	$PENParam	=  $PENBody . "MD=" . md5($PENBody . $RegistKey) . "\r\n";
	return		$PENParam;
}

// ポイント交換ならびにポイント交換確認リクエスト電文の送信とレスポンス電文の受信
function Point_Request_POST( $PENParam , $PostURL , $RegistKey) {
	$PENBody	=  "";
	$MessageType	=  "";
	$TransactionID	=  "";
	$ProcessID	=  "";
	$SiteID		=  "";
	$ResponseDate	=  "";
	$RetryDate	=  "";
	$State		=  "";
	$MD		=  "";
	ob_start();
	$ch		=  curl_init($PostURL);
	if (!$ch) {
		$LocalState	=  "socket_error";
	} else {
		curl_setopt($ch,CURLOPT_TIMEOUT,300);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$PENParam);
		$ReturnParam	=  curl_exec($ch);
		curl_close($ch);
		ob_end_clean();
		if (strlen($ReturnParam) > 0) {
			$ReturnParamA	=  split("\r\n",$ReturnParam);
			foreach ($ReturnParamA as $line) {
				if (strlen($line) > 0) {
					if (strstr($line,"=") != false) {
						$lineArray	=  split("=",$line,2);
						$label		=  $lineArray[0];
						$value		=  $lineArray[1];
						switch(strtoupper($label)) {
							case "MESSAGETYPE":
								$MessageType	=  $value;
								break;
							case "TRANSACTIONID":
								$TransactionID	=  $value;
								break;
							case "PROCESSID":
								$ProcessID	=  $value;
								break;
							case "SITEID":
								$SiteID		=  $value;
								break;
							case "DATE":
								$ResponseDate	=  $value;
								break;
							case "RETRYDATE":
								$RetryDate	=  $value;
								break;
							case "STATE":
								$State		=  $value;
								break;
							case "MD":
								$MD		=  $value;
								break;
						}
						if (strtoupper($label) != "MD") {
							$PENBody	.=  $line . "\r\n";
						}
					}
				}
			}
			if ($MD == md5($PENBody . $RegistKey)) {
				if ($MessageType != "" && $TransactionID != "" && $ProcessID != "" && $SiteID != "" && $ResponseDate != "" && $State != "") {
					$LocalState	=  "accept";
				} else {
					$LocalState	=  "reject";
				}
			} else {
				$LocalState	=  "cert_fail";
			}
		} else {
			$LocalState	=  "socket_timeout";
		}
	}
	$ReturnArray	=  Array(	"MessageType"		=> $MessageType,
					"TransactionID"		=> $TransactionID,
					"ProcessID"		=> $ProcessID,
					"SiteID"		=> $SiteID,
					"Date"			=> $ResponseDate,
					"RetryDate"		=> $RetryDate,
					"State"			=> $State,
					"LocalState"		=> $LocalState		);
	return		$ReturnArray;
}

// ポイント交換ならびにポイント交換確認リクエスト電文からのデータ取得
function Point_Request_GET( $PENParam , $RegistKey ) {
	$PENBody	=  "";
	$MessageType	=  "";
	$TransactionID	=  "";
	$ProcessID	=  "";
	$SiteID		=  "";
	$Account	=  "";
	$RequestDate	=  "";
	$RetryDate	=  "";
	$Point		=  "";
	$PENAccount	=  "";
	$MD		=  "";

	$PENArray	=  split("\r\n",$PENParam);
	foreach ($PENArray as $line) {
		if (strlen($line) > 0) {
			if (strstr($line,"=") != false) {
				$lineArray	=  split("=",$line,2);
				$label		=  $lineArray[0];
				$value		=  $lineArray[1];
				switch (strtoupper($label)) {
					case "MESSAGETYPE":
						$MessageType	=  $value;
						break;
					case "TRANSACTIONID":
						$TransactionID	=  $value;
						break;
					case "PROCESSID":
						$ProcessID	=  $value;
						break;
					case "SITEID":
						$SiteID		=  $value;
						break;
					case "ACCOUNT":
						$Account	=  $value;
						break;
					case "DATE":
						$RequestDate	=  $value;
						break;
					case "RETRYDATE":
						$RetryDate	=  $value;
						break;
					case "POINT":
						$Point		=  $value;
						break;
					case "PENACCOUNT":
						$PENAccount	=  $value;
						break;
					case "MD":
						$MD		=  $value;
						break;
				}
				if (strtoupper($label) != "MD") {
					$PENBody	.= $line . "\r\n";
				}
			}
		}
	}
	if ($MD == md5($PENBody . $RegistKey)) {
		if (strtoupper($MessageType) == "TRANSPOINTREQ" && $TransactionID != "" && $ProcessID != "" && $SiteID != "" && $Point != ""
		&& $Account != "" && $RequestDate != "") {
			$LocalState	=  "accept";
		} else if (strtoupper($MessageType) == "CONFIRMSTATEREQ" && $TransactionID != "" && $ProcessID != "" && $SiteID != ""
		&& $RequestDate != "") {
			$LocalState	=  "accept";
		} else {
			$LocalState	=  "invalid_param";
		}
	} else {
		$LocalState		=  "cert_fail";
	}
	$ReturnArray	=  Array(	"MessageType"		=> $MessageType,
					"TransactionID"		=> $TransactionID,
					"ProcessID"		=> $ProcessID,
					"SiteID"		=> $SiteID,
					"Account"		=> $Account,
					"Point"			=> $Point,
					"PENAccount"		=> $PENAccount,
					"Date"			=> $RequestDate,
					"RetryDate"		=> $RetryDate,
					"LocalState"		=> $LocalState		);
	return		$ReturnArray;
}

// ポイント交換ならびにポイント交換確認レスポンス電文の生成
function Point_Response_MAKE( $MessageType , $TransactionID , $ProcessID , $SiteID , $Account , $PENAccount , $State , $RegistKey ) {
	$ResponseDate	=  GET_GMT();
	if (strtoupper($MessageType) == "TRANSPOINTREQ") {
		$MessageType	=  "TransPointRes";
	} else if (strtoupper($MessageType) == "CONFIRMSTATEREQ") {
		$MessageType	=  "ConfirmStateRes";
	}
	$PENBody	=  "MessageType=$MessageType\r\n"
			.  "TransactionID=$TransactionID\r\n"
			.  "ProcessID=$ProcessID\r\n"
			.  "SiteID=$SiteID\r\n"
			.  "Date=$ResponseDate\r\n"
			.  "State=$State\r\n"
			.  "PENAccount=$PENAccount\r\n";
	$PENParam	=  $PENBody . "MD=" . md5($PENBody . $RegistKey) . "\r\n";
	return		$PENParam;
}

// ポイント交換ならびにポイント交換確認レスポンス電文の返送
function Point_Response_POST( $PENParam ) {
	echo $PENParam . "\r\n\r\n";
}
?>

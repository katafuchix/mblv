<?php
	function getXuid()
	{
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		// DOCOMO
		if ($user_agent[0] == 'DoCoMo'){
			$uid = $_SERVER['HTTP_X_DCMGUID'];
		}
		// AU
		elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){
			$uid = $_SERVER['HTTP_X_UP_SUBNO'];
		}
		// SOFTBANK
		elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){
			$uid = $_SERVER['HTTP_X_JPHONE_UID'];
		}
		return $uid;
	}
	
	mail("snsvml@ml.technovarth.jp", "xuid", getXuid());
?>
<html>
<head></head>
<body>
‚²‹¦—Í‚ ‚è‚ª‚Æ‚¤‚²‚´‚¢‚Ü‚·B
</body>
</html>

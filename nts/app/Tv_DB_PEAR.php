<?php
include_once('Ethna/class/DB/Ethna_DB_PEAR.php');

// EUC-JP用DBクラス
class Tv_DB_PEAR extends Ethna_DB_PEAR
{
	function connect()
	{
		$ret = parent::connect();
		if ($ret == 0) {
			$this->query("SET CHARACTER SET ujis");
		}
		return $ret;
	}
}

?>
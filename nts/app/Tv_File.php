<?php
class Tv_FileManager extends Ethna_AppManager
{
}
class Tv_File extends Ethna_AppObject
{
	function getName($key)
	{
		return $this->get($key);
	}
}
?>
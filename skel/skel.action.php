<?php

class {$action_form} extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
	);
}

class {$action_class} extends Tv_ActionClass
{
	function prepare()
	{
		return null;
	}

	function perform()
	{
		return '{$action_name}';
	}
}

?>

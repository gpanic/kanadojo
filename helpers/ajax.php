<?php
	$request = $_SERVER['QUERY_STRING'];
    $parsed = explode('&', $request);
    $getVars = array();
    foreach ($parsed as $argument)
    {
        list($variable, $value) = explode('=', $argument);
        $getVars[$variable] = $value;
    }
    if (isset($getVars['ajax']))
    {
    	if ($getVars['ajax'] == "getRandomKana")
    	{
    		return getRandomKana();
    	}
    }

	function getRandomKana()
	{
		include "kana.php";
		echo array_rand($kana);
	}
?>
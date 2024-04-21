<?php

function dd($var) : void
{
	if (is_array($var)) 
	{
		print_r($var);
	}
	else
	{
		var_dump($var);
	}
	die();
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	function cek_array($string)
	{
		if(strpos($string,","))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
?>
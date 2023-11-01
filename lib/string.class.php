<?php
class Strings extends db
{
		function sql_safe($var = "")
	{
		if( ! isset($var) )
		{
			$var = "";
		}
		
		$var = trim($var);
		$var = str_replace("'","'",$var);
		$var = stripslashes($var);
		$var = addslashes($var);
		return $var;
	}

	function js_encode($val)
	{
		$val = $val . "";
		$tmp = str_replace(chr(92), "\\", $tmp);
		$tmp = str_replace(chr(39), "\'", $val);
		$tmp = str_replace(chr(34), "&quot;", $tmp);
		$tmp = str_replace(chr(13), "<br>", $tmp);
		$tmp = str_replace(chr(10), " ", $tmp);
		return $tmp;
	}

	
	function grid_safe($val)
	{
		$output = '';
		$val = addslashes($val);
		$output = htmlspecialchars($val . "");
		$output = str_replace("'", "&#39;",$output);
		$output = $this->js_encode($output);
		return $output;
	}

}
?>
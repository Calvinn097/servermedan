<?php
function vd($info,$var,$die=false){
	echo "INI ADALAH $info <br>";
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	if($die){
		die();
	}
}
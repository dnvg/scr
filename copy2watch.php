<?php

require "functions.php";

const OLD_DIRECTORY = "/arc/tor/";
const NEW_DIRECTORY = "/arc/watch/";

$new_array=array();
$old_array = dir_to_array (OLD_DIRECTORY);
sort($old_array);

$i=0;
$file="";

while($i < count($old_array)-1)
{

	$division = (strlen($old_array[$i])/5)*3;
	
	$file_1 = substr($old_array[$i], 0, $division);
	$file_2 = substr($old_array[$i+1], 0, $division);

	if( $i==0 )
	{
		$new_array[]=$old_array[$i];
		$i++;
		continue;
	}
	
	if ($file_1 != $file_2) $new_array[]=$old_array[$i+1];
	$i++;

	echo $file_1;
}

sort($new_array);

foreach($new_array as $file)
{
	echo OLD_DIRECTORY . $file . "\n" . NEW_DIRECTORY . $file . "\n\n";
	copy(OLD_DIRECTORY . $file, NEW_DIRECTORY . $file );
}



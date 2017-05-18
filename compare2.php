<?php

function getCounter($c)
{
	if ($c<10) $sc="000" . ($c);
			elseif ($c<100) $sc="00" . ($c);
				elseif ($c<1000) $sc="0" . ($c);

	return $sc;
}


function insertMissingRows($filesArray)
{
	
	$i=0;
	$newArray=array();
	$newArrayCounter = 0;

	while($i < count($filesArray))
	{
		$missingRows=array();
			
		$firstStr=$filesArray[$i];
		$secondStr=$filesArray[$i+1];
		$num1=$num2=0;
	
		$counter="";
	
		for($j=1; $j<=500; $j++)
		{
			$counter=getCounter($j);
			if (strpos($firstStr, $counter . "_") !== false) $num1 = (int)$counter;
		}

		$counter="";
	
		for($j=1; $j<=500; $j++)
		{
			$counter=getCounter($j);
			if (strpos($secondStr, $counter . "_") !== false) $num2 = (int)$counter;
		}

		$newArray[] = $firstStr;
	
		$y=$num2-$num1;
		
		if ($y>1)	
			for($j=$num1+1; $j<$num2; $j++)
				$newArray[]="";		
		$i++;
	}

	if((int)$newArray[0]!=1)
	{
		echo (int)$newArray[0];//array_unshift($newArray, var)
	}

	return $newArray;
}

$fls = file('/arc/upl/inf/titles.txt', FILE_IGNORE_NEW_LINES);
file_put_contents("/arc/upl/inf/_titles.txt", implode("\n", insertMissingRows($fls)));

$pimpstr=file_get_contents("/arc/upl/inf/pimpandhost.txt");
$pimpstr = preg_replace("/\[\/URL\] /i", "[/URL]\n", $pimpstr);
$pimpstr = preg_replace("/medium/i", "original", $pimpstr);
$pimpstr = preg_replace("/_0\.jpg/i", ".jpg", $pimpstr);

file_put_contents("/arc/upl/inf/pimpandhost.txt", $pimpstr);
$fls = file('/arc/upl/inf/pimpandhost.txt', FILE_IGNORE_NEW_LINES);
file_put_contents("/arc/upl/inf/_pimpandhost.txt", implode("\n", insertMissingRows($fls)));

$fls = file('/arc/upl/inf/imagebam.txt', FILE_IGNORE_NEW_LINES);
file_put_contents("/arc/upl/inf/_imagebam.txt", implode("\n", insertMissingRows($fls)));

$fls = file('/arc/upl/inf/filesinfo.txt', FILE_IGNORE_NEW_LINES);
file_put_contents("/arc/upl/inf/_filesinfo.txt", implode("\n", insertMissingRows($fls)));

// First FO

$urls = file('/arc/upl/inf/urls.txt', FILE_IGNORE_NEW_LINES);
$new_urls="";
$new_urls_array=array();

for ($pos=0; $pos<count($urls); $pos++)
{

	$new_line="\n";
	if( strpos($urls[$pos], "rar") && strpos($urls[$pos+1], "rar") ) 
		if(( $urls[$pos][ strlen($urls[$pos])-11 ] ) < ( $urls[$pos+1][ strlen($urls[$pos+1])-11 ] )) $new_line="<BR>";

	$new_urls.= $urls[$pos] . $new_line;	
}

$new_urls_array = explode("\n", $new_urls);
file_put_contents("/arc/upl/inf/_urls.txt", implode("\n", insertMissingRows($new_urls_array)));



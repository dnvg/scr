<?php

include "functions.php";
xdebug_break();
$torrentsAsocArray = dir_to_asoc_array ("/arc/tor/");
$torrents_array = dir_to_array ("/arc/tor/");
$filesArray = dir_to_array("/arc/vids/");


//var_dump($torrentsAsocArray);
//var_dump($torrents_array);
//var_dump($filesArray);
//die();


$genre = file("/arc/scr/upldir", FILE_IGNORE_NEW_LINES)[0];
	
set_time_limit(3600);

$newFileNamesArray = array();

	foreach ($filesArray as $filename)
	{
		$counter = 1;

		foreach ($torrentsAsocArray as $torrentFileName => $torrentContentString )
		{
			$searchResult = strpos($torrentContentString, $filename);

			if ($searchResult)
			{
				$newFileNamesArray[$filename] = $counter++ . '_' . 
						clean_new_filename( str_replace('.torrent', '', $torrentFileName ));

			//	$newFileNamesArray[$filename] = clean_new_filename($filename);

				continue 2;		
			}	
		}		
	}

	asort($newFileNamesArray);
	
	//var_dump($newFileNamesArray); die();

	$counter="";
	$i=0;


	foreach ($newFileNamesArray as $key => $value)
	{

		$i++;

		if ($i<10) $counter="000".$i;
			elseif ($i<100) $counter="00".$i;
				elseif ($i<1000) $counter="0".$i;

	//	$newFileNamesArray[$key] = $counter. "_" . $genre . "_xxx_video_". substr($value, strlen($value)-5);

	$extention = explode( '.', $key );
//var_dump( $extention );
	$newFileNamesArray[$key] = $counter . "_" . $value . '.' . $extention[1];
	
		$titles .= $counter . "_ " . substr($value, 0, strlen($value)-5) . "\n";
	}
	
	//var_dump($newFileNamesArray);
	
	file_put_contents("/arc/upl/inf/titles.txt", $titles);
	
	//var_dump($newFileNamesArray); die();

	foreach ($newFileNamesArray as $key => $value)
	{
		rename(SOURCE_PATH . $key, DEST_PATH . $value);
		echo DEST_PATH . $key . "----->\n";
		echo DEST_PATH . $value . "\n\n";
	}



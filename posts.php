<?php

include 'functions.php';


//
// Creating posts.txt 
//

$posts_bbcode_path = '/arc/posts/' . $genre = file("/arc/scr/upldir", FILE_IGNORE_NEW_LINES)[0] . "_" . date("Y-m-d__H-i") . '.csv';
$bbcode_posts_handle = fopen($posts_bbcode_path, 'w');


//
// Reading images.txt to array
//

$images = file('/arc/upl/inf/_images.txt', FILE_IGNORE_NEW_LINES);


//
// Reading and cleaning info.txt from "_"
//

$info = file('/arc/upl/inf/_filesinfo.txt', FILE_IGNORE_NEW_LINES);
$infoNew=array();
$regexp_template = array( "/_/i" => " " );
foreach ($info as $string)
{
  foreach($regexp_template as $match=>$replacement)
  {
    $infoNew[] = preg_replace($match, $replacement, $string);
  }
}


//
// Readind _urls.txt to array
//

$urls = file('/arc/upl/inf/_urls.txt', FILE_IGNORE_NEW_LINES);


//
// Creating titles, we take a string from _fileinfo.txt, SUBSTR() a part with filename
// and clear it from "_"
//

$titles=array();
$regexp_template = array( "/\[\/b\].*/i" => "", "/_/i" => " ", "/,/i" => "" );

foreach ($info as $string)
{
  
  foreach($regexp_template as $match=>$replacement)
  {
    $string = preg_replace($match, $replacement, $string);
  }

  $titles[]=substr($string, 21, 59);
 
}


//
// Creating a post, joining alltogether
//

$i=0;
$posts_bbcode="";

foreach ($images as $img)
{
	$posts_bbcode .='"' . 
	$titles[$i] . '","' . 
	substr($img, 5) . '<BR><BR><BR>' . 
	$infoNew[$i] . 
	'<BR><BR>[b]DOWNLOAD VIDEO:<BR>' . 
	'[IMG]http://ist2-2.filesor.com/pimpandhost.com/1/_/_/_/1/2/v/O/R/2vORV/datafile_download_button_5.gif[/IMG]<BR>' .
	//'[img]http://rapidgator.net/images/pics/409_6.gif[/img]<BR>' . 
  $urls[$i] . '[/b]<BR><BR><BR>","' . rand(900, 1080) . '"' . PHP_EOL;
	$i++;
}

fwrite($bbcode_posts_handle, $posts_bbcode );
fclose($bbcode_posts_handle);

?>
<?php

include 'functions.php';

$tags="German sex, amateur, homemade";

//
// Creating posts.txt 
//

$posts_bbcode_path = '/arc/posts/' . $genre = file("/arc/scr/upldir", FILE_IGNORE_NEW_LINES)[0] . "_" . date("Y-m-d__H-i") . '.csv';
$bbcode_posts_handle = fopen($posts_bbcode_path, 'w');


//
// Reading images to array
//

$largeImages = file('/arc/upl/inf/_pimpandhost.txt', FILE_IGNORE_NEW_LINES);
$smallImages = file('/arc/upl/inf/_imagebam.txt', FILE_IGNORE_NEW_LINES);


//
// Reading and cleaning info.txt from "_"
//

$info = file('/arc/upl/inf/_filesinfo.txt', FILE_IGNORE_NEW_LINES);

//
// Readind _urls.txt to array
//

$urls = file('/arc/upl/inf/_urls.txt', FILE_IGNORE_NEW_LINES);
$urls2 = file('/arc/upl/inf/_urls2.txt', FILE_IGNORE_NEW_LINES);


//
// Creating titles
//

$titles = file('/arc/upl/inf/_titles.txt', FILE_IGNORE_NEW_LINES);

//
// Creating titles, we take a string from _fileinfo.txt, SUBSTR() a part with filename
// and clear it from "_"
//

//$titles=array();
//$regexp_template = array( "/\[\/b\].*/i" => "", "/_/i" => " ", "/,/i" => "" );
//
//foreach ($info as $string)
//{
//  
//  foreach($regexp_template as $match=>$replacement)
//  {
//    $string = preg_replace($match, $replacement, $string);
//  }
//
//  $titles[]=substr($string, 21, 59);
// 
//}


//
// Creating a post, joining alltogether
//

$i=0;
$posts_bbcode="";
$preview = "";

foreach ($smallImages as $img)
{
	$posts_bbcode.='"'. 
	substr($titles[$i], 5, 59).'","'. 
	$largeImages[$i].'<BR><BR>[b]'.$tags.'[/b]<BR>'.$titles[$i].'<BR><BR>'.$info[$i]. 
	'<BR><BR>[b]~> Download video from KEEP2SHARE <~<BR>'.$urls[$i].
  '[/b]<BR><BR>More screenshots:<BR>'.substr($img, 5).'<BR><BR><BR>","'.
  rand(1300, 1400) . '","'. //Unlim
  rand(1500, 2400).'","'.	//BB
  rand(3500, 3700).'","'.	//Philia
  rand(1300, 1400).'"'. 	//Suzy
  PHP_EOL;

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  	
  	$preview.=
	$largeImages[$i].'<BR><BR>[b]'.$tags.'[/b]<BR>'.$titles[$i].'<BR><BR>'.$info[$i]. 
	'<BR><BR>[b]~> Download video from KEEP2SHARE <~<BR>'.$urls[$i].
  	'[/b]<BR><BR>More screenshots:<BR>'.substr($img, 5).'<BR><BR><BR><BR><BR><BR>'.PHP_EOL;

	$i++;
}

fwrite($bbcode_posts_handle, $posts_bbcode );
fclose($bbcode_posts_handle);

$preview = preg_replace("/<BR>/", "\n", $preview);
file_put_contents($posts_bbcode_path."_preview", $preview);

?>

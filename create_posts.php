<?php

ini_set("display_errors", 1);


//======================== START OF FUNCTION ==========================//
// FUNCTION: bbcode_to_html                                            //
//=====================================================================//
function bbcode_to_html($bbtext){
  $bbtags = array(
    '[heading1]' => '<h1>','[/heading1]' => '</h1>',
    '[heading2]' => '<h2>','[/heading2]' => '</h2>',
    '[heading3]' => '<h3>','[/heading3]' => '</h3>',
    '[h1]' => '<h1>','[/h1]' => '</h1>',
    '[h2]' => '<h2>','[/h2]' => '</h2>',
    '[h3]' => '<h3>','[/h3]' => '</h3>',

    '[paragraph]' => '<p>','[/paragraph]' => '</p>',
    '[para]' => '<p>','[/para]' => '</p>',
    '[p]' => '<p>','[/p]' => '</p>',
    '[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
    '[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
    '[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
    '[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

    '[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
    '[italic]' => '<span style="font-weight:bold;">','[/italic]' => '</span>',
    '[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
    '[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
    '[i]' => '<span style="font-weight:bold;">','[/i]' => '</span>',
    '[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
    '[break]' => '<br>',
    '[br]' => '<br>',
    '[newline]' => '<br>',
    '[nl]' => '<br>',
    
    '[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
    '[list]' => '<ul>','[/list]' => '</ul>',
    '[ul]' => '<ul>','[/ul]' => '</ul>',

    '[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
    '[ol]' => '<ol>','[/ol]' => '</ol>',
    '[list_item]' => '<li>','[/list_item]' => '</li>',
    '[li]' => '<li>','[/li]' => '</li>',
    
    '[*]' => '<li>','[/*]' => '</li>',
    '[code]' => '<code>','[/code]' => '</code>',
    '[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
    '[pre]' => '<pre>','[/pre]' => '</pre>',	    
  );

  $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

  $bbextended = array(
    "/\[url](.*?)\[\/url]/i" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
    "/\[url=(.*?)\](.*?)\[\/url\]/i" => "<a href=\"$1\" title=\"$1\">$2</a>",
    "/\[email=(.*?)\](.*?)\[\/email\]/i" => "<a href=\"mailto:$1\">$2</a>",
    "/\[mail=(.*?)\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$2</a>",
    "/\[img\]([^[]*)\[\/img\]/i" => "<img src=\"$1\" alt=\" \" />",
    "/\[image\]([^[]*)\[\/image\]/i" => "<img src=\"$1\" alt=\" \" />",
    "/\[image_left\]([^[]*)\[\/image_left\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_left\" />",
    "/\[image_right\]([^[]*)\[\/image_right\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_right\" />",
  );

  foreach($bbextended as $match=>$replacement){
    $bbtext = preg_replace($match, $replacement, $bbtext);
  }
  return $bbtext;
}
//=====================================================================//
//  FUNCTION: bbcode_to_html                                           //
//========================= END OF FUNCTION ===========================//



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


	if ( strpos($filesArray[0], "0001_") === false )
	{
		array_unshift($filesArray, "0001_");
	}


	while($i < count($filesArray))
	{
		$missingRows=array();
			
		$firstStr  = $filesArray[$i];
		$secondStr = $filesArray[$i+1];
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

	return $newArray;
}



$tags			=$_POST['tags'];
$genre			=$_POST['genre'];
$pimpandhost	=$_POST['pimpandhost'];
$imagebam		=$_POST['imagebam'];
$filesinfo		=$_POST['fileinfo'];
$urls			=$_POST['urls'];
$titles			=$_POST['titles'];


$pimpandhost = preg_replace("/\[\/URL\] /i", "[/URL]\n", $pimpandhost);
$pimpandhost = preg_replace("/medium/i", "original", $pimpandhost);
$pimpandhost = preg_replace("/_0\.jpg/i", ".jpg", $pimpandhost);
$pimpandhost = explode("\n", $pimpandhost);
$pimpandhost = insertMissingRows($pimpandhost);



$titles	= explode("\n", $titles);
$titles = insertMissingRows($titles);



$filesinfo = explode("\n", $filesinfo);
$filesinfo = insertMissingRows($filesinfo);



$urls = explode("\n", $urls);
$new_urls="";
for ($pos=0; $pos<count($urls); $pos++)
{
	
	$new_line="\n";

	if( strpos($urls[$pos], "rar") && strpos($urls[$pos+1], "rar") )
	{ 
		
		$rarPartX = substr($urls[$pos], -12, 1);
		$rarPartY = substr($urls[$pos+1], -12, 1);

		if($rarPartX < $rarPartY) $new_line="<BR>";
				
	}

	$new_urls.= $urls[$pos] . $new_line;	
}


$new_urls = explode("\n", $new_urls);
$new_urls = insertMissingRows($new_urls);



$imagebam	= explode("\n", $imagebam);
$imagebam = insertMissingRows($imagebam);



//
// Creating a post, joining alltogether
//

$i=0;
$all_posts="";
$curent_post="";
$preview = "";
$breaks=array("\r\n", "\n", "\r");

foreach ($new_urls as $url)
{
	if($url==""){$i++;continue;}
	if($pimpandhost[$i]==""){$i++;continue;}
	if($titles[$i]==""){$i++;continue;}
	if($filesinfo[$i]==""){$i++;continue;}
	if($imagebam[$i]==""){$i++;continue;}
	
	
	$current_post = '"'. 
	substr($titles[$i], 5, 59).
	'","'. 
	$pimpandhost[$i].'<BR><BR>[b]'.$genre.', '.$tags.'[/b]<BR>'.$titles[$i].'<BR><BR>'.$filesinfo[$i]. 
	'<BR><BR>[b]~> Download video from KEEP2SHARE <~<BR>'.$url.
    '[/b]<BR><BR>More screenshots:<BR>'.substr($imagebam[$i], 5).'<BR><BR><BR>","'.
    rand(1300, 1400) .'","'.//Unlim
    rand(1500, 2400).'","'.	//BB
    rand(3500, 3700).'","'.	//Philia
    rand(1300, 1400).'"'; 	//Suzy
  
    $current_post = str_replace($breaks, "", $current_post)."\n";
    $all_posts .= $current_post;

  	
  	$preview.=
  	$pimpandhost[$i].'<BR><BR>[b]'.$genre.', '.$tags.'[/b]<BR>'.$titles[$i].'<BR><BR>'.$filesinfo[$i]. 
  	'<BR><BR>[b]~> Download video from KEEP2SHARE <~<BR>'.$url.
  	'[/b]<BR><BR>More screenshots:<BR>'.substr($imagebam[$i], 5).'<BR><BR><BR><BR><BR><BR><BR><BR><BR>';

	$i++;
}

$posts_bbcode_path = '/var/www/' . $genre . "_" . date("Y-m-d__H-i") . '.csv';
file_put_contents($posts_bbcode_path, $all_posts);

echo bbcode_to_html($preview);

?>
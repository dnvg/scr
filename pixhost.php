<?php
function image_upload($img_path)
{
    // populate an array with parameters
    $pvars   = array("content_type" => 1, "img" => "@".$img_path);

    // initialize curl and set parameters
    $curl    = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://www.pixhost.org/api');
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // execute, get information and close connection
    $response = curl_exec($curl);
    $info = curl_getinfo($curl);
    curl_close ($curl);

    // check if the http-code is 200
    if($info['http_code'] != 200) {
        exit("OAuth error: ".$response);
    }

    // decode the json-encoded response
    $response_array = json_decode($response);

    return $response_array;
}


function read_dir_to_array_recursive($path)
{
    
    $d = dir($path);
    
    while (false !== ($entry = $d->read())) {
    
      if($entry!='.' && $entry!='..'){ 

        if(is_dir($path . "/" . $entry)){
                
                echo $path ."/". $entry . " is directory\n";
                read_dir_to_array($path . "/" . $entry);

            } else echo $path . "/" .$entry."\n";
        }
    
    }
    
   // $d->close();
}


function read_dir_to_array($path)
{
    
    $a=array();
    $d = dir($path);
    
    while (false !== ($entry = $d->read())) {
    
      if($entry!='.' && $entry!='..'){ 
        if(is_file($path ."/". $entry)) $a[] = $path ."/". $entry;
       }
    }

   $d->close();
   sort($a);
   return $a;    
}




$images_dir_array = read_dir_to_array("/arc/upl/rars");
sort($images_dir_array);

$images_array=array();


foreach ($images_dir_array as $path)
{
   echo "Uploading image" . $path . "\n";
   $images_array[] = image_upload($path);
}


foreach ($images_array as $image) {

    $new_images_array[]="[url=http://www.pixhost.org/show/".$image->dir.
                        "/".$image->file."][img]http://".$image->t_host.
                        "/thumbs/".$image->dir."/".$image->file."[/img][/url]";
}


var_dump($new_images_array);


/*


$linksArray = array("");
$i = 0;
$is_first = true;
$line_start = "";

foreach ($images_array as $p)
{
    $thumbnail = $p->rsp->image->thumbnail;
    $image_url = $p->rsp->image->URL;
    $filename = $p->rsp->image->filename;

    $line_break = "";
    
    $is_last = false;
    $is_last = strpos($filename, "_s.jpg");


    if($is_first)
    {
        $line_start = $filename[0] . $filename[1] . $filename[2] . $filename[3] . "_";
        $is_first = false;
    }

    if($is_last == true)
    {
        $line_start = "<BR>";
        $line_break = "\n";
     
        $currentLink = $line_start . "[URL=" . $image_url . 
                    "][IMG]" . $thumbnail . "[/IMG][/URL]" . $line_break;

        $linksArray[$i].= $currentLink;
        
        $linksArray[] = "";
        $is_first = true;
        $i++;

        continue;
    }
    
    $currentLink = $line_start . "[URL=" . $image_url . 
                    "][IMG]" . $thumbnail . "[/IMG][/URL]" . $line_break;

    $linksArray[$i].= $currentLink;
    $line_start = "";
}

var_dump($linksArray);



//Writing links to file
$images_handle = fopen("/arc/upl/inf/images.txt", 'w');

for ($i=0; $i<count($linksArray); $i++ )
{
    fwrite( $images_handle, $linksArray[$i] );    
}

fclose( $images_handle );

*/
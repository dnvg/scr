<?php
function image_upload($img_path)
{
    // required parameters for the OAuth-authentication
    // replace all parameters!
    $API_key = "NDU1CK1ALVNAEXDG";
    $API_secret = "U7KGPKPQVU7EFET2QN2383DSYZ2CWERR";
    $oauth_nonce = "123456";
    $oauth_token = "zirY5O7Q9GaEziPGLGoj52EXmrffx4f6";
    $oauth_token_secret = "nMnTbVaFB5mfygdZ";
    $oauth_timestamp = time();
    $oauth_signature_method = "MD5";

    // build the signature string
    $oauth_signature_string = "";
    $oauth_signature_string .= $API_key;
    $oauth_signature_string .= $API_secret;
    $oauth_signature_string .= $oauth_timestamp;
    $oauth_signature_string .= $oauth_nonce;
    $oauth_signature_string .= $oauth_token;
    $oauth_signature_string .= $oauth_token_secret;

    // calculate the MD5-checksum of the signature string
    $oauth_signature = md5($oauth_signature_string);

    // populate an array with parameters
    $pvars   = array(
            // parameters required by OAuth
            "oauth_consumer_key" => $API_key,
            "oauth_signature_method" => $oauth_signature_method,
            "oauth_signature" => $oauth_signature,
            "oauth_timestamp" => $oauth_timestamp,
            "oauth_nonce" => $oauth_nonce,
            "oauth_token" => $oauth_token,
            
            // optional parameters
            "content_type" => "adult",
            "thumb_format" => "JPG",
            "thumb_size" => "350x350",
            "thumb_cropping" => 0,
            "thumb_info" => 0,
            //"gallery_id" => "asdfasdfasdfasdfasdfasdfasdfasdf",
            "response_format" => "JSON",
            "image" => "@".$img_path // ATTENTION - note the @ infront of the filename!
    );

    // initialize curl and set parameters
    $curl    = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://www.imagebam.com/sys/API/resource/upload_image');
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




$images_dir_array = read_dir_to_array("/arc/upl/img");
sort($images_dir_array);

$images_array=array();


foreach ($images_dir_array as $path)
{
   echo "Uploading image" . $path . "\n";
   $images_array[] = image_upload($path);
}




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


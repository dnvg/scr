<?php
//const SCREENSHOTS_LARGE_FOLDER = '/arc/upl/img_large';
const SCREENSHOTS_SMALL_FOLDER = '/arc/upl/img_small';
//const SCREENSHOTS_FOR_UPLOAD_TO_PIMPANDHOST_PATH = '/arc/upl/inf/pimpandhost.txt';
const SCREENSHOTS_BBCODE_IMAGEBAM_PATH = '/arc/upl/inf/imagebam.txt';


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
        //exit("OAuth error: ".$response);
    }

    // decode the json-encoded response
    $response_array = json_decode($response);

    return $response_array;
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

function cutImageName($path)
{
    $newNames="";
    $ai = read_dir_to_array($path);
    foreach ($ai as $i)
        {
          $newName = substr($i, 0, 71) . ".jpg";  
          rename($i, $newName);   
          $newNames.= "http://212.83.40.253/images/". substr($newName, 19, strlen($newName)) . "\n";
        }

    return $newNames;
}

include "timer.php";

$timer = new myTimer(1);

//cutImageName(SCREENSHOTS_SMALL_FOLDER);

$images_dir_array = read_dir_to_array(SCREENSHOTS_SMALL_FOLDER);
sort($images_dir_array);

$imgBBcode="";

foreach ($images_dir_array as $path)
{
   echo "Uploading image" . $path . "\n";
   $img = image_upload($path);

   $thumbnail = $img->rsp->image->thumbnail;
   $image_url = $img->rsp->image->URL;
   $filename  = $img->rsp->image->filename;

   $imgBBcode .= substr($filename, 0, 5) . "[URL=" . $image_url . "][IMG]" . $thumbnail . "[/IMG][/URL]\n";
}

//echo "\n\n\n" . $imgBBcode;

$images_handle = fopen(SCREENSHOTS_BBCODE_IMAGEBAM_PATH, 'w');
fwrite( $images_handle, $imgBBcode );
fclose( $images_handle );

//$images_handle = fopen(SCREENSHOTS_FOR_UPLOAD_TO_PIMPANDHOST_PATH, 'w');
//fwrite($images_handle, cutImageName(SCREENSHOTS_LARGE_FOLDER));
//fclose($images_handle);
?>

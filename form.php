<?php

$fileinfo=file_get_contents("/arc/upl/inf/filesinfo.txt");
$imagebam=file_get_contents("/arc/upl/inf/imagebam.txt");
$titles=file_get_contents("/arc/upl/inf/titles.txt");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		body{padding:10px;}

		ul{list-style-type: none;}

		li{float:left; margin-right: 20px;}

		textarea{width:100%;height:140px;}

		input[type="text"]{width: 100%;}
		
		#test{margin-left: auto;margin-right: auto; width: 3em;}

		#left{float: left;}
	
		#right{float: left; margin-left: 10px; width: 1000px;}

		#clearfix {overflow: auto;}

	</style>


</head>
<body>
	
	<div>
		
		<form method="post" action="create_posts.php" target="_blank" >
			<div id="clearfix">
				<div id="left">
					<input type="submit" name="posts" value="Make posts">
				</div>
				<div id="right">
					<input type="text" name="tags" >
				</div>
			</div>
			
			<ul>
				<li><input type="radio" name="genre" value = "German sex, german porn videos">German</li>
				<li><input type="radio" name="genre" value = "Cuckold, Amateur, Sex wife, MILFs, Cheating house-wife">Cuckold</li>
				<li><input type="radio" name="genre" value = "Shemale, Transsexual, Ladyboy, Tranny">Shemale</li>
				<li><input type="radio" name="genre" value = "Webcam, amateur, homemade">Webcam</li>
				<li><input type="radio" name="genre" value = "Voyeur, Candid">Voyeur</li>
				<li><input type="radio" name="genre" value = "Spanking, Ass worship">Spanking</li>
				<li><input type="radio" name="genre" value = "Painal, Painful anal sex">Painal</li>
				<li><input type="radio" name="genre" value = "Jerkoff encouragement, Masturbation instructions, POV, Teasing">Jerkoff</li>
			</ul><br><br>
						
			<label for="pimpandhost">Pimpandhost</label><br>
			<textarea name="pimpandhost"></textarea><br>

			<label for="imagebam">Imagebam</label><br>
			<textarea name="imagebam"><?php echo $imagebam; ?></textarea><br>

			<label for="titles">Titles</label><br>
			<textarea name="titles"><?php echo $titles; ?></textarea><br>
			
			<label for="fileinfo">File info</label><br>
			<textarea name="fileinfo"><?php echo $fileinfo; ?></textarea><br>

			<label for="urls">URLs</label><br>
			<textarea name="urls"></textarea><br>
		</form>
	</div>
</body>
</html>

<?php

function playVideo($id){

/**
Credit to https://gist.github.com/sheharyarn/3a6a94b277968ad13d27 
for the following code on how to get the original video
**/
parse_str(file_get_contents('http://www.youtube.com/get_video_info?video_id='.$id), $video_data);
$streams = $video_data['url_encoded_fmt_stream_map'];
$streams = explode(',',$streams);
$counter = 1;
foreach ($streams as $streamdata) {
	parse_str($streamdata,$streamdata);
	foreach ($streamdata as $key => $value) {
		if ($key == "url") {
			$value = urldecode($value);
		
			$item[] = "$s". $keu. $value;
		} else {
			
		}
	}
	return $item;
}

}

$set == false;


if (isset($_GET['id'])){
$id = $_GET['id'];
$item = playVideo($id);
$set = true;
}

if(isset($_POST['submit'])){
$id = $_POST['id'];
$item = playVideo($id);
$set = true;
}

if(isset($error)){
unset($error);
}


if (isset($item[0])){
header("Location: ".$item[0]);
exit();
}else if  ($set == true){
$error = '<h1>No stream found! Sorry :(</h1>';
}


?>
<head>
<link href="css/styles.css" type="text/css" rel="stylesheet"/>
</head>
<div class="login">
	<h1>Youtube me up!</h1>
	<? if (isset($error)){
	echo $error;
	}
	?>
    <form method="post">
    	<input type="text" name="id" placeholder="Video ID" required="required" />
        <button type="submit" name = "submit" class="btn btn-primary btn-block btn-large" value= "1">Show me my video.</button>
    </form>
</div>
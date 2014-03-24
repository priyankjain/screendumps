<?php
$num="";
$file=fopen("wrong".$num.".txt","r");
while(!feof($file))
{	
	$line=fgets($file);
	$names=explode("/",$line);
	$dots=$names[1];
	$dot=explode(".",$dots);
	$name=$dot[0];
	$curl_handle=curl_init();
	// curl_setopt($curl_handle, CURLOPT_URL,'http://'.$line);
	// curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 30);
	// curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5');
	// $query = curl_exec($curl_handle);
	// curl_close($curl_handle);
	// file_put_contents("index".$num.".html",$query);
	// $cmd="xvfb-run -a /usr/bin/wkhtmltopdf /opt/lampp/htdocs/screendumps/index".$num.".html /opt/lampp/htdocs/screendumps/pdf/".$name.".pdf";
	// $out=array();
	// exec($cmd,$out);
	// var_dump($out);
	if(!file_exists("/opt/lampp/htdocs/screendumps/pdf/".$name.".pdf")) continue;
	$cmd="xvfb-run -a /usr/bin/convert /opt/lampp/htdocs/screendumps/pdf/".$name.".pdf /opt/lampp/htdocs/screendumps/jpg/".$name.".jpg";
	$out=array();
	exec($cmd,$out);
	var_dump($out);
	if(file_exists("/opt/lampp/htdocs/screendumps/jpg/".$name.".jpg")) $nameold=$name;
	else $nameold=$name."-0";
	$cmd="xvfb-run -a /usr/bin/convert -resize 200x200! /opt/lampp/htdocs/screendumps/jpg/".$nameold.".jpg /opt/lampp/htdocs/screendumps/resizedjpg/".$name.".jpg";
	$out=array();
	exec($cmd,$out);
	var_dump($out);
}
fclose($file);
?>
<?php
error_reporting(0);
 
$type = $_POST['type'];
$jsonexist = file_get_contents('database/database.json');
$jsonexist  = json_decode($jsonexist);
if($type =='galleryname')
{
	$name = $_POST['name']; 
	foreach($jsonexist as $each)
	{
		$each = (object)$each; 
		$eachnames[] = $each->name;
	}
	if(in_array($name,$eachnames))
	{
		echo "error";
	}
	else
	{
		echo "success";
	}
	exit; 
}

if($type =='edit_galleryname')
{
	$name = $_POST['name']; 
	foreach($jsonexist as $each)
	{
		$each = (object)$each; 
		if($name!=$each->name)
		{
			$eachnames[] = $each->name;
		}
	}
	if(in_array($name,$eachnames))
	{
		echo "error";
	}
	else
	{
		echo "success";
	}
	exit; 
}

if($type =='delete')
{
	$id =  $_POST['id'];
	unset($jsonexist[$id]);
	$array_values = array_values($jsonexist);
	$fp = fopen('database/database.json', 'w');
	fwrite($fp, json_encode($array_values));
	fclose($fp);
}
?>

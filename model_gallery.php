<?php
error_reporting(0);
if($_POST['id']!='')
{
		$files = $_FILES['files'];
		$files_count = $_FILES['files']['name'];
		$count = count($files_count);
		$uploads_dir = 'images/orginal_images'; 
		$nameoflist['name'] =  $_POST['gallery_name']; 
		$jsonexist = file_get_contents('database/database.json');
		$jsonexist  = json_decode($jsonexist);

		
		for($i=0;$i<$count;$i++)
		{
			$newid = rand(10000,500000000);
			$name = $files['name'][$i];
			if($files['name'][$i]!='')
			{
				$ext = pathinfo($name, PATHINFO_EXTENSION);
				$newname = $newid.date("ymdhis").'.'.$ext;
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $uploads_dir."/$newname");
			}
			else
			{
				$newname = $_POST['filesh'][$i];
			}
			
			$nameoflist['images'][] = $newname; 
		}
		 
		$nameoflistfull = $nameoflist; 
		$id = $_POST['id']; 
		$jsonexist[$id] = $nameoflistfull;
		$fp = fopen('database/database.json', 'w');
		fwrite($fp, json_encode($jsonexist));
		fclose($fp);

		header('location:listofnames.php');
}
else{
	$files = $_FILES['files'];
	$files_count = $_FILES['files']['name'];
	$count = count($files_count);
	$uploads_dir = 'images/orginal_images'; 
	$nameoflist['name'] =  $_POST['gallery_name']; 
	$jsonexist = file_get_contents('database/database.json');
	$jsonexist  = json_decode($jsonexist);
	for($i=0;$i<$count;$i++)
	{
		$newid = rand(10000,500000000);
		$name = $files['name'][$i];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		$newname = $newid.date("ymdhis").'.'.$ext;
		$tmp_name = $files['tmp_name'][$i];
		move_uploaded_file($tmp_name, $uploads_dir."/$newname");
		
		$nameoflist['images'][] = $newname; 
	}
	$nameoflistfull = $nameoflist; 


	if(count($jsonexist)<=0 || $jsonexist=='')
	{
		$addedArray[] = $nameoflistfull; 
	}
	else
	{
		array_push($jsonexist,$nameoflistfull);
		$addedArray = $jsonexist;
	}
	$fp = fopen('database/database.json', 'w');
	fwrite($fp, json_encode($addedArray));
	fclose($fp);

	header('location:listofnames.php');
}
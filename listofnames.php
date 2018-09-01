<?php
include('header.php');?>
<?php
error_reporting(0);
$jsonexist = file_get_contents('database/database.json');
$jsonexist  = json_decode($jsonexist);
$i =1;
foreach($jsonexist as $key=>$each)
{
	$each = (object)$each; 
	$out.= '<tr><td>'.$i.'</td><td>'.$each->name.'</td><td>'.count($each->images).'</td><td> <a href="view.php?id='.$key.'">View</a> <a href="edit.php?id='.$key.'">Edit</a> <span id="'.$key.'" class="clickdelete"  >Delete</span></td></tr>'; 
	$i++;
}
?>

<div class="container gallery-container">
<h4 style="margin-top: 26px;">List of gallery</h4>
<div class="row">
<table class="listing" border="1">
<tr><td>ID</td><td>Gallery name</td><td>Images count</td><td>Action</td></tr>
<?=$out; ?></table>
</div>
</div>


<?php
include('footer.php');?>

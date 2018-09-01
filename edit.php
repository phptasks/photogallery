<?php
include('header.php');
$jsonexist = file_get_contents('database/database.json');
$jsonexist  = json_decode($jsonexist);
$id = $_GET['id'];
$full = $jsonexist[$id];
?>

<div class="container gallery-container">
<form method="POST" action ="model_gallery.php" class="galary_form" enctype='multipart/form-data' />
<table>
<h4>Edit gallery</h4>
<tr><td>Gallery name : </td>
	<td><input type="text" name="gallery_name" value="<?=$full->name; ?>" class="gallery_name"/>
		<input type="hidden" name="id" value="<?=$id; ?>" /><span class="gallery_error"></span>
	</td></tr>
<tr><td>Upload and edit Your Pictures here : </td><td>
<?php
foreach($full->images as $each)
{
	$newid = "claass".rand(10000,500000000);?>
<p class="<?=$newid; ?>"><input type="file" name="files[]" class="files_need_to" value="<?php echo $each; ?>" multiple />
<img src="images/orginal_images/<?=$each; ?>" style="width:50px;height:50px"/>
<span class="innerClass" id="<?=$newid;?>">Remove</span>
<input type="hidden" name="filesh[]"  class="filesh" value="<?php echo $each; ?>" /></p>
<?php
}?><div class="mydivappend"></div>
<span class="addmore">Add more</span></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td><input type="button" name="mybutton" class="edit_gallery mybutton" value="Edit Gallery" /></td></tr>
</form> 
</div>
<?php
include('footer.php');?>
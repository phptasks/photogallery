<?php
include('header.php');?>

<div class="container gallery-container">
<form method="POST" action ="model_gallery.php" class="galary_form" enctype='multipart/form-data' />
<table>
<h4>Create a gallery</h4>
<tr><td>Gallery name : </td><td><input type="text" name="gallery_name" value="" class="gallery_name"/><span class="gallery_error"></span></td></tr>
<tr><td>Upload Your Pictures here : </td><td><input type="file" name="files[]" class="files_need_to" value="" multiple /> <span class="addmore">Add more</span></td></tr>
<tr><td></td><td><div class="mydivappend"></div></td></tr>
<tr><td></td><td><input type="button" name="mybutton" class="add_gallery mybutton" value="Add Gallery" /></td></tr>
</form> 
</div>
<?php
include('footer.php');?>
<?php 
include('header.php'); 
$jsonexist = file_get_contents('database/database.json');
$jsonexist  = json_decode($jsonexist); 
$id =$_GET['id'];
$json = $jsonexist[$id];
?>
<div class="container gallery-container">

    <h1><?=$json->name; ?></h1>

    <p class="page-description text-center">Click to see each</p>
    
    <div class="tz-gallery">

        <div class="row">
		<?php
		foreach($json->images as $each)
		{?>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="images/orginal_images/<?=$each; ?>">
                    <img src="images/orginal_images/<?=$each; ?>" style="width:300px;height:300px" alt="Park">
                </a>
            </div><?php
	    }?>
            
        </div>

    </div>

</div>
<?php include('footer.php'); ?>


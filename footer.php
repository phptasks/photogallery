<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

//edit_gallery


$(document).on('click','.edit_gallery',function(){
	var gallery_name = $('.gallery_name').val();
	var files_need_to = $('.files_need_to').val();
	var files_need_toh = $('.filesh').val();
	var flag = 1;
	if(gallery_name=='')
	{
		$('.gallery_name').css('border','1px solid red');
		flag = 0;
	}
	else
	{
		$('.gallery_name').css('border','');
	}
	
	if(files_need_to.length<=0 && files_need_toh.length<=0)
	{
		$('.files_need_to').css('border','1px solid red');
		flag = 0;
	}
	else
	{
		$('.files_need_to').css('border','');
	}
	if(flag==1)
	{
		$('.gallery_error').html('');
		$.ajax({
			method:'POST',
			data:{'name':gallery_name,'type':'edit_galleryname'},
			url: 'ajax.php',
			success:function(data){
				var res = data.trim();
				if(res=='success')
				{
					$('.galary_form').submit();
				}
				else
				{
					$('.gallery_error').html('Gallery name already exists');
				}
			}
			});		
	}
return false; 
	
});


$(document).on('click','.add_gallery',function(){
	var gallery_name = $('.gallery_name').val();
	var files_need_to = $('.files_need_to').val();
	var flag = 1;
	if(gallery_name=='')
	{
		$('.gallery_name').css('border','1px solid red');
		flag = 0;
	}
	else
	{
		$('.gallery_name').css('border','');
	}
	
	if(files_need_to.length<=0)
	{
		$('.files_need_to').css('border','1px solid red');
		flag = 0;
	}
	else
	{
		$('.files_need_to').css('border','');
	}
	if(flag==1)
	{
		$('.gallery_error').html('');
		$.ajax({
			method:'POST',
			data:{'name':gallery_name,'type':'galleryname'},
			url: 'ajax.php',
			success:function(data){
				var res = data.trim();
				if(res=='success')
				{
					$('.galary_form').submit();
				}
				else
				{
					$('.gallery_error').html('Gallery name already exists');
				}
			}
			});		
	}
return false; 
	
});
$(document).on('click','.addmore',function(){
	var newid = makeid();
	$('.mydivappend').append(' <p class="'+newid+'"><input type="file" name="files[]" class="files_need_to" value="" multiple /> <span class="innerClass" id="'+newid+'">Remove</span><p>');
});


$(document).on('click','.clickdelete',function(){
	
	var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        var id = $(this).attr('id');
		$.ajax({
			method:'POST',
			data:{'del_id':id,'type':'delete'},
			url: 'ajax.php',
			success:function(data){
				location.reload();
			}
			});		
    }
	else{
		return false;
	}
	
});

function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
$(document).on('click','.innerClass',function(){
	var id = $(this).attr('id');
	$('.'+id).remove();
});
</script>
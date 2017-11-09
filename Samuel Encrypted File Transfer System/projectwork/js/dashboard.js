$('#user1').blur(function(){
   input=$('#user1').val();
   $.post('data.php',{input:input},function(data){
       $('#erroruser').html(data);
   });
});

$('#elects').on('change','#file',function(){
	var f=document.getElementById('file').files[0];
	var image_name=f.name;
	image_extension=image_name.split('.').pop().toLowerCase();

	
	var image_size=f.size;
	if (image_size>2000000){
		alert ("image size  is very big");
		$('#file').val("");
	}
	else{
		var form_data= new FormData();
		form_data.append("file",f);
		$.ajax({
			url:"upload.php",
			method:"POST",
			data:form_data,
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function(){
				$('#uploaded').html("<label>image uploading...</label>");
			},
			success:function(data){
				$('#uploaded').html(data);
			}
		});
	}
});

$('.key').click(function(){
	b=$(this).attr('id');
	$.post('keys.php',{b:b},function(data){
		$('#showkey').append(data);
	});
});

$('#secsubmit').click(function(){
	b=$('#sec').val();
	c=$('#valve').val();
	$.post('key.php',{b:b,c:c},function(data){
		$('#collect').html(data);
	});
});


$('.mess').click(function(){
	b=$(this).attr('id');
	$.post('enter.php',{b:b},function(data){
		$('#messagepart1').html(data);
	});
	
	

	
});
$('#open').click(function(){
	b=$('#key').val();	
	c=$('#keyid').val();
	$.post('showmg.php',{b:b,c:c},function(data){
		$('#messagepart').html(data);
	});
	
});





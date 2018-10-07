$(document).ready(function(){
	
	/* $('input[name=stazh]').click(function(e){
        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]);
		formData.append('add_section', 1);
        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            url: "/ap-main-work/",
            data: formData,
            success: function(data){
                var $obj = jQuery.parseJSON(data);
				if($obj.ok){
					$('header').prepend("<div class='blackout'><div class='blackout_window'><h6 class='blackout_title'>" + $obj.title + "</h6><p class='blackout_paragraph'>" + $obj.text + "</p><img class='blackout_img_ok' src='admin/icon/ok.png'></div><!--.blackout_window--></div><!--.blackout-->");
                }
            } 
        });
    }); */
	
	/* $('p').click(function(e){
        e.preventDefault();
		var formData = new FormData();
		formData.append('add_section', 1);
		formData.append('add_section', 2);
		//alert(formData.getAll('add_section'));return;
		$.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            url: "/test.php/",
            data: formData,
            success: function(data){
                alert(data);
                //alert(24);
            } 
        });
    }); */
	
	$('p').click(function(e){
		$("#result").load(
			"/test.php/",
			{
				param1: "param1",
				param2: 2
			}
		);
    }); 
	
});// конец ready
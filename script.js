$(document).ready(function(){
	//Определяем данные
	var banner = null;
	var email = null;
	var password = null;
	var info = null;
	


	//Активируем фото
	$(document).on("click",".banner-item", function(){
		var fileName = $(this).find("img").attr("src");
        banner = baseName(fileName);
        $("#banner").val(banner);
        $(".banner-item").removeClass("active-banner");
        $(this).addClass("active-banner");
	});
	//Удаляем
	$(document).on("click", ".banner-rem-btn", function(){
		var fileName = $(this).data("filename");
		var item = $(this);
		$.ajax({
			  url: 'delete.php',
			  type: 'POST',
			  cache:false,
			  data: {fileName:fileName},
	          type: 'post',
		      success: function(data){
		    	  item.parent().remove();
		      }
		});
	});
	//Сохраняем
	$(".btn-save").click(function(e){
		 e.preventDefault();
		 
		 //Получаем данные
		 email = $("#email").val();
		 password = $("#password").val();
		 banner = $("#banner").val();
		 info = $("#info").val();
		 
		 var data = {email:email, info:info, banner:banner};
		 $.ajax({
		        url: "./save.php",
		        type: "post",
		        data: data ,
		        success: function (response) {
		           // you will get response from your php page (what you echo or print)                 
		        	alert("Данные сохранены!");
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
	});
	//Входим
	$(".btn-enter").click(function(e){
		 e.preventDefault();
		 
		 //Получаем данные
		 email = $("#enterEmail").val();
		 password = $("#enterPassword").val();
		 
         
		 $.ajax({
		        url: "./user.php",
		        type: "post",
		        data: {email:email} ,
		        success: function (response) {
		        	var data = JSON.parse(response);
					console.log(data);
		           if(email==data.email && password == data.password)   
				   {
					 $.ajax({
								url: "./enter.php",
								type: "post", data: {email:data.email},
								success: function (response) {
									document.location.reload(true);
								}
							});
				   }
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
	});
	//Выходим
	$(".btn-exit").click(function(e){
		 e.preventDefault();
  		 $.ajax({
		        url: "exit.php",
		        type: "post", data: {},
		        success: function (response) {
		        	document.location.reload(true);
		        }
	 		});
	});
	//Грузим фото
	$(document).on('change','#file',function(event){
		event.preventDefault();
		
        var property = document.getElementById('file').files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(image_extension,['gif','jpg','jpeg','png']) == -1){
          alert("Неправильный формат");
        }

        var form_data = new FormData();
        form_data.append("file",property);
        console.log(form_data);
        $.ajax({
          url:'upload.php',
          method:'POST',
          data:form_data,
          cache:false,
          processData: false,
          contentType: false,
          beforeSend:function(){
            //$('#msg').html('Loading......');
          },
          success:function(data){
	    	  data = JSON.parse(data);
        	  var photo = `
          	  	<div class="banner-item">
  			  		<span class="banner-rem-btn" data-filename="`+data.fileName+`">x</span>
  			  		<div>
  			  		<img src='./uploads/`+data.fileName+`'/>
  			  		</div>
  		  		</div>
          	  `;
          	  $("#photo-content").append(photo);
          }
        });
      });
	
	
	//Вспомогательные функции
    function baseName (url)
    {   
        if(url != null && url !== undefined)
            return url.substring(url.lastIndexOf('/')+1);
        else
            return url;
    }
});
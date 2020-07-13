

   	$(document).ready(function($) {
   

     	$('.addteam').css('color','orange');
     	$('#isel').change(function() {
        if($("#isel option:selected").val() =='addteam'){
  
			
					$('.popup-fade').fadeIn();
				
					 $('#isel').val('default');
            }
  		 });
    $('.addBut').click(function(){

      $('#formaddnew').submit(function(){return false;});
      if(  $('.addInput').val() =='' ){
      	  alert('input are empty');
      }
      else{
      
                var tname = $('.addInput').val();
      	    	$.ajax({
				url: './newteam',         
				method: 'post',            
				dataType: 'html',         
				data: {team_name:tname },    
				success: function(data){   
					  
                    var lastId = data;
					
					$( ".popup-close" ).trigger( "click" );
      	    	    $('.addInput').val('');

					 
					
                 var opt = "<option value='"+lastId+"'>"+tname+"</option>";
                 $(opt).insertBefore('.addteam');
	             }
              });
      }


    });




});
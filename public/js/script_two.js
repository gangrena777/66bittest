	function mOver(obj) {
			obj.children[5].style.display = "block";
	}
	function mOut(obj) {
			obj.children[5].style.display ="none";
	   }
	function edit(obj) {
		console.log(obj);
	} 
	function del(obj) {
          
				var request = new XMLHttpRequest();
				var  url = "./delete";
 
				request.open("POST", url, true);
				var id = obj.getAttribute("iid");
                var params = "id="+id;
				
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				 
				request.addEventListener("readystatechange", () => {

				    if(request.readyState === 4 && request.status === 200) {       
						
						window.location.href = "./";
				    }
				});
				 
			 
				request.send(params);
	} 
    var edit_id = '';
	function edit(obj) {
	
	   edit_id = obj.getAttribute("iid");

       $('.popup-fade').fadeIn();

        document.querySelector('.edit_name').value = obj.parentElement.parentElement.children[0].innerHTML;
        document.querySelector('.edit_surname').value = obj.parentElement.parentElement.children[1].innerHTML;
        document.querySelector('.edit_birthday').value = obj.parentElement.parentElement.children[2].innerHTML;
       
        var team_item = document.querySelector('#edit_isel').getElementsByTagName('option');
        for(var i= 0; i<team_item.length; i++){
        	 if (team_item[i].textContent === obj.parentElement.parentElement.children[3].innerHTML){
        	  team_item[i].selected = true;
        	}
        	
        }

        document.querySelector('.edit_country').value = obj.parentElement.parentElement.children[4].innerHTML;



	}

	$('.editBut').click(function(){

            $('#editform').submit(function(){return false;});
                var new_name = document.querySelector('.edit_name').value;
                var new_surname = document.querySelector('.edit_surname').value;
                var new_birthday = document.querySelector('.edit_birthday').value;
                var new_team_id = document.querySelector('#edit_isel').value;
                var new_country = document.querySelector('.edit_country').value;
            
            $.ajax({
				url: './edit', 
				method: 'post', 
				dataType: 'html', 
				data: {id:edit_id,name:new_name, surname:new_surname, birthday:new_birthday, team_id:new_team_id, country:new_country },    /*  Параметры передаваемые в запросе. */
				success: function(data){ 

					$( ".popup-close" ).trigger( "click" );
					window.location.href = "./";
                }
              });
      });


    

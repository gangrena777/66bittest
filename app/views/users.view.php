	<?php require('partials/head.php'); ?>


	<h1>Submit NEW PLAYER</h1>
	<div class="form_box">
	<form method="POST"  >
		<input type="text" name="name" class="item_form">
		<input type="text" name="surname"  class="item_form">
		<input type="date" name="birthday" class="item_form">
	    <select  name="team_id" class="item_form" id="isel">
                  
              <option value="default">team name...</option>
		<? foreach ($team as $tn) :?>
			  <option value="<?=$tn->id;?>"><?=$tn->team_name?></option>
		<? endforeach; ?>
		    
		  <option style="color:red;" value="addteam" class="addteam">+add new name</option>
		  
		</select>
		<select  type="text" name="country" class="item_form">
		  
			<option value="usa">USA</option>     
			<option value="italy">Italy</option>
			<option value="russia">Russia</option>
		</select>		
		<input type="submit" class="item_form">
	</form>
</div>


<div class="popup-fade">
	<div class="popup">
		<a class="popup-close" href="#">Закрыть</a>
		<p>
			<form  method="POST" id="formaddnew">
			<input type="text" name="team_name" class="item_form addInput">
			<input type="submit" class="item_form  addBut" >
		   </form>
	   </p>
	</div>		
</div>

	<?php require('partials/footer.php'); ?>

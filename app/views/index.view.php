	<?php require('partials/head.php'); ?>

	<h1>PLAYERS:</h1>
	
	<ul>
		<?php foreach ($allplayers as $pl) : ?>
			<li style="border: solid red 2px;list-style-type: none;"  onmouseover='mOver(this)' onmouseout='mOut(this)' class='playerItem'>
				<p><?=$pl['name'];?></p>
				<p> <?=$pl['surname']?></p>
				<p><?=$pl['birthday']?></p>
			
				<p><?=$pl['team']?></p>
				<p><?=$pl['country']?></p>
				<div class="action-block">
				          <p  iid="<?=$pl['id'];?>" onclick='edit(this);'><img  src='./public/img/edit.png'></p>
					      <p  iid="<?=$pl['id'];?>" onclick='del(this);'><img  src='./public/img/basket.svg'></p>
			   </div>
			</li>
		<?php endforeach; ?>
	</ul>

	<div class="popup-fade">
	  <div class="popup">
		<a class="popup-close" href="#">Закрыть</a>
		
			<form method="POST"  id ="editform">
					<input type="text" name="name" class="item_form edit_name">
					<input type="text" name="surname"  class="item_form edit_surname">
					<input type="date" name="birthday" class="item_form edit_birthday">
				    <select  name="team_id" class="item_form" id="edit_isel">
			                  
			              
					<? foreach ($team as $tn) :?>
						  <option value="<?=$tn->id;?>"><?=$tn->team_name?></option>
					<? endforeach; ?>
					    
				
					  
					</select>
					<select  type="text" name="country" class="item_form edit_country">
					  
						<option value="usa">USA</option>     
						<option value="italy">Italy</option>
						<option value="russia">Russia</option>
					</select>		
					<input type="submit" class="item_form  editBut">
	       </form>
	   
	   </div>		
    </div>

	<?php require('partials/footer.php'); ?>

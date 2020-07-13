<?php

namespace App\Controllers;
use Core\App;

class PagesController 
{
	public function home()
	{
		
		$players = App::get('database')->selectAll('players');
		$allplayers =[];

       
		foreach ($players as $key => $play) {
		$id = $play->team_id;
			
		$team = App::get('database')->selectById('team', $id);
	   

	     
	     $allplayers[$key]['id'] = $play->id;
	      $allplayers[$key]['name'] = $play->name;
	      $allplayers[$key]['surname'] = $play->surname;
	       $allplayers[$key]['birthday'] = $play->birthday;

	       $allplayers[$key]['team'] = $team['team_name'];
	      $allplayers[$key]['country'] = $play->country;
	  
        }
        $team = App::get('database')->selectAll('team');
     
		
		return view('index', compact('allplayers', 'team'));	
	}
	
	public function about()
	{
		return view('about');	
	}

}
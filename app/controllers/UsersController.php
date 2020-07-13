<?php

namespace App\Controllers;
use Core\App;

class UsersController 
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        $team = App::get('database')->selectAll('team');
        return view('users', compact('users', 'team'));
    }	
    public function store()
    {

        $params = [
            'name'          => (empty($_POST['name'])) ? '' : trim(strip_tags($_POST['name'])),
            'surname'       => (empty($_POST['surname'])) ? '' : trim(strip_tags($_POST['surname'])),
            'birthday'      => (empty($_POST['birthday'])) ? '' : trim(strip_tags($_POST['birthday'])),
            'team_id'        => (empty($_POST['team_id'])) ? '' : trim(strip_tags($_POST['team_id'])),
            'country'        => (empty($_POST['country'])) ? '' : trim(strip_tags($_POST['country']))
            ];

         if (empty($params['name'])) {
            return redirect('users');
            }

        try {
            App::get('database')->insert('players', $params);
        }
        catch (Exception $e) {
          require "views/500.php";
       }

        return redirect('./');
    }

    public function newteam()
    {


        $params = [
            'team_name' => (empty($_POST['team_name'])) ? '' : trim(strip_tags($_POST['team_name'])),

        ];
        $item_id='';
        if (empty($params['team_name'])) {
            return redirect('users');
        }

        try {
            if(App::get('database')->insert('team', $params))
            {
                $item_id = App::get('database')->selectLastId('team');
                echo $item_id['id'];
             }
        }
        catch (Exception $e) {
        require "views/500.php";
        }


    }

    public function edit()
    {


        $id = $_POST['id'];
        $params = [

        'name'          => (empty($_POST['name'])) ? '' : trim(strip_tags($_POST['name'])),
        'surname'       => (empty($_POST['surname'])) ? '' : trim(strip_tags($_POST['surname'])),
        'birthday'      => (empty($_POST['birthday'])) ? '' : trim(strip_tags($_POST['birthday'])),
        'team_id'       => (empty($_POST['team_id'])) ? '' : trim(strip_tags($_POST['team_id'])),
        'country'       => (empty($_POST['country'])) ? '' : trim(strip_tags($_POST['country']))
        ];

        if (empty($_POST['id'])) {
        return redirect('users');
        }

        try {
        App::get('database')->update('players',$id, $params);

        }
        catch (Exception $e) {
        require "views/500.php";
        }


        }
        public function delete()
        {
        $id = $_POST['id'];
        App::get('database')->deleteById('players',$id);
        return true;

    }


}
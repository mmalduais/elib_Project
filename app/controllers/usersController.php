<?php
namespace coding\app\controllers;

use coding\app\models\User;

class UsersController extends Controller{

    function newUser(){
        $this->view('new_user');
    }

        public function show(){

    }

    public function saveUser(){

        //print_r($_POST);
        $user=new User();
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->password=md5($_POST['password']);
        $user->is_active=isset($_POST['is_active'])?1:0;
        $user->role_id=1;
        if($user->save())
        $this->view('feedback',['success'=>"data inserted successful"]);
        else 
        $this->view('feedback',['danger'=>'can not add data']);

    }

    public function register(){
        $this->view("new_user");
    }

    public function adduser(){
        $this->view("new_user");
    }

    public function addbook(){
        $this->view("add_book");
    }

    public function addcategory(){
        $this->view("add_category");
    }

    public function addauther(){
        $this->view("add_auther");
    }


  public function addpublisher(){
        $this->view("add_publisher");
    }

    public function addcities(){
        $this->view("add_cities");
    }

    public function addoffer(){
        $this->view("add_offer");
    }

    public function addorder(){
        $this->view("add_order");
    }

    public function addpayment(){
        $this->view("add_payment");
    }
    
    public function adduseraddres(){
        $this->view("add_useraddres");
    }






    public function delete(){
        
    }




}
?>
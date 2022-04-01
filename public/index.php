<?php
require_once __DIR__ . '/../vendor/autoload.php';

use coding\app\controllers\AuthorsController;
use coding\app\controllers\PublishersController;
use coding\app\controllers\CategoriesController;
use coding\app\controllers\booksController;
use coding\app\system\AppSystem;
use coding\app\system\Router;
use coding\app\controllers\UsersController;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));//createImmutable(__DIR__);
$dotenv->load();

$config=array(
  'servername'=>$_ENV['DB_SERVER_NAME'],
  'dbname'=>$_ENV['DB_NAME'],
  'dbpass'=>$_ENV['DB_PASSWORD'],
  'username'=>$_ENV['DB_USERNAME']

);
$system=new AppSystem($config);

Router::get('/users',[UsersController::class,'show']);


Router::get('/books',function(){
  echo "books route path";
});

Router::get('/new_user',[UsersController::class,'register']);
Router::get('/new_user',[UsersController::class,'adduser']);
Router::get('/add_book',[UsersController::class,'addbook']);

Router::get('/new_category',[UsersController::class,'addcategory']);
Router::get('/add_auther',[UsersController::class,'addauther']);
Router::get('/add_publisher',[UsersController::class,'addpublisher']);
Router::get('/add_cities',[UsersController::class,'addcities']);
Router::get('/new_offer',[UsersController::class,'addoffer']);
Router::get('/new_order',[UsersController::class,'addorder']);
Router::get('/new_payment',[UsersController::class,'addpayment']);
Router::get('/new_useraddres',[UsersController::class,'adduseraddres']);





Router::get('/remove_user',[UsersController::class,'delete']);

Router::post('/users',[UsersController::class,'show']);
Router::get('/new_user',[UsersController::class,'newUser']);

Router::post('/save_user',[UsersController::class,'saveUser']);
Router::get('/save_author',[AuthorsController::class,'createAuthor']);


/** web routes  category */


Router::get('/categories',[CategoriesController::class,'listAll']);
Router::get('/add_category',[CategoriesController::class,'create']);
Router::get('/edit_category/{id}',[CategoriesController::class,'edit']);
Router::get('/remove_category',[CategoriesController::class,'remove']);
Router::post('/save_category',[CategoriesController::class,'store']);
Router::post('/update_category',[CategoriesController::class,'update']);

/** end of web routes */

/** web routes  books */

Router::get('/new_user',[UsersController::class,'adduser']);

Router::get('/book',[booksController::class,'listAll']);
Router::get('/add_book',[booksController::class,'create']);
Router::get('/edit_book/{id}',[booksController::class,'edit']);
Router::get('/remove_book',[booksController::class,'remove']);
Router::post('/save_book',[booksController::class,'store']);
Router::post('/update_book',[booksController::class,'update']);

/** end of web routes */


$system->start();
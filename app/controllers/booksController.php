<?php
namespace coding\app\controllers;

use coding\app\models\book;

class booksController extends Controller{

    function listAll(){
        $books=new book();
        $allbooks=$books->getAll();
        //print_r($allbooks);

        $this->view('list_books',$allbooks);

    }
    function create(){
        $this->view('add_book');

    }

    function store(){

        $book=new Book();
        
        $book->title=$_POST['title'];
        $imageName=$this->uploadFile($_FILES['image']);

        $book->image=$imageName!=null?$imageName:"default.png";
        $book->price=$_POST['price'];
        $book->description=$_POST['description'];
        $book->pages_number=$_POST['pages_number'];
        $book->quantity=$_POST['quantity'];
       
        $book->created_by=1;
    
        $book->save();
        header("Location:book");

    }
    function edit(){
        

    }
    function update(){

    }
    public function remove(){

    }


    public static function uploadFile(array $imageFile): string
    {
        // check images direction
        if (!is_dir(__DIR__ . '/../../public/images')) {
            mkdir(__DIR__ . '/../../public/images');
        }

        if ($imageFile && $imageFile['tmp_name']) {
            $image = explode('.', $imageFile['name']);
            $imageExtension = end($image);

            $imageName = uniqid(). "." . $imageExtension;
            $imagePath =  __DIR__ . '/../../public/images/' . $imageName;

            move_uploaded_file($imageFile['tmp_name'], $imagePath);

            return $imageName;
        }

        return null;
    }

    

}
?>
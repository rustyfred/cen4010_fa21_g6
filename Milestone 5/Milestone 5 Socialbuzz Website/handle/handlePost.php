<?php 
include '../core/init.php';
require_once '../core/classes/validation/Validator.php';
require_once '../core/classes/image.php';

use validation\Validator;

if (User::checkLogIn() === false) 
header('location: index.php'); 

$username =  User::getUserNameById($_SESSION['user_id']);

if (isset($_POST['post'])) {

    $status =  User::checkInput($_POST['status']) ;

    $img = $_FILES['post_img'];
    
    if ($_POST['status'] == '' && $img['name'] == '' ) {
    $_SESSION['errors_post'] = ['Post must have text or image'];
    header('location: ../'.$username);
    die();
    }

    $v = new Validator;
    if ($img['name'] != '') 
     $v->rules('image' , $img , ['image']);

    $errors = $v->errors;
    
    if ($errors == []) { 
        
        if ($img['name'] != '') {
        $image = new Image($img , "post"); 
        $postImg = $image->new_name ;
       
        } else $postImg = null;
               
        
        date_default_timezone_set("America/New_York");
        $data = [
            'user_id' => $_SESSION['user_id'] , 
            'post_on' => date("Y-m-d H:i:s") ,
        ];

        $post_id =   User::create('postdata' , $data);
        
        $data_post = [
            'post_id' => $post_id ,
            'status' => $status , 
            'img' => $postImg
        ];
        User::create('posts' , $data_post);
        if ($img['name'] != '') {
        $image->upload(); }
       
        header('location: ../$user->username');
        header('location: ../'.$username);
    } else {
        $_SESSION['errors_post'] = $errors;
        header('location: ../'.$username);
    }   
} else header('location: ../'.$username);
?>
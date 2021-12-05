<?php 
     include '../core/init.php';
     require_once '../core/classes/validation/Validator.php';
     require_once '../core/classes/image.php';

     use validation\Validator;

     if (User::checkLogIn() === false) 
     header('location: index.php');   

     $username =  User::getUserNameById($_SESSION['user_id']);

     $user =User::getData($_SESSION['user_id']);
     $currentImg = $user->img;

    if (isset($_POST['update'])) {

      $name =  User::checkInput($_POST['name']) ;
      $bio =   User::checkInput($_POST['bio']);
      $image = $_FILES['image'];


      $v = new Validator;
      $v->rules('name' , $name , ['required' , 'string' , 'max:20']);
      $v->rules('bio' , $bio , ['string' , 'max:100']);
      $v->rules('image' , $image , ['image']);

      
      $errors = $v->errors;

       if ($errors == []) {
    
      if ($image['name'] !== "") {
      $img = new Image($image); 
       $userImg = $img->new_name ;
      } else $userImg = $user->img;
      
      $data = [
         'name' => $name ,
         'bio' => $bio ,
         'img' => $userImg , 
      ];
      
      $sign= User::update('users' , $_SESSION['user_id'], $data); 

  

         if ($sign === true) {
             if ($image['name'] !== "") {
                if ($currentImg !== 'default.jpg')
                        unlink('../assets/images/users/' . $currentImg);
                        
                $img->upload(); 
                
            }

            header('location: ../'.$username);
        }

    } else {

        $_SESSION['errors'] = $errors;
        header('location: ../'.$username);

    }

    } else header('location: ../'.$username);
    
    




















?>
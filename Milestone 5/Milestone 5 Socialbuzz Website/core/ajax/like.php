<?php
	include '../init.php'; 
	
    if(isset($_POST['like']) && !empty($_POST['like'])){
    	$user_id  = $_SESSION['user_id'];
		$post_id = $_POST['like'];
		
        $for_user = Post::getData($post_id)->user_id;
		$get_id   = $_POST['user_id'];
		date_default_timezone_set("America/New_York");

		User::create('likes', array('user_id' => $user_id, 'post_id' => $post_id));

		echo `<div class="tmp d-none">
             `+ Post::countLikes($post_id) +`            
		</div>` ;
	}
    if(isset($_POST['unlike']) && !empty($_POST['unlike'])){
    	$user_id  = $_SESSION['user_id'];
    	$post_id = $_POST['unlike'];
    	$get_id   = $_POST['user_id'];
		$for_user = Post::getData($post_id)->user_id;

		Post::unLike($user_id, $post_id);
		
		echo `<div class="tmp d-none">
             `+ Post::countLikes($post_id) +`            
		</div>` ;
    }

    if(isset($_POST['file'])){
        $getFromT->uploadImage($_POST['files']);
    } 


?>
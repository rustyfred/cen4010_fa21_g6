<?php 

class Post extends User {
    
    protected static $pdo;
      
      public static function posts($user_id) {
        $stmt = self::connect()->prepare("SELECT * from `postdata`
        WHERE user_id IN (SELECT following_id from `follow` WHERE follower_id = :user_id)
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public static function postsAdmin($user_id) {
        $stmt = self::connect()->prepare("SELECT * from `postdata`
        WHERE user_id = 2 OR user_id IN (SELECT following_id from `follow` WHERE follower_id = 2)
        ORDER BY post_on DESC");
        $stmt->bindParam("2" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public static function postsUser($user_id) {
        $stmt = self::connect()->prepare("SELECT * from `postdata`
        WHERE user_id = :user_id
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public static function likedPosts($user_id) {
        $stmt = self::connect()->prepare("SELECT * from `postdata`
        WHERE id IN (SELECT post_id from `likes` WHERE user_id = :user_id)
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public static function mediaPosts($user_id) {
        $stmt = self::connect()->prepare("SELECT * from `postdata`
        WHERE id IN (SELECT post_id from `posts` WHERE user_id = :user_id AND img is not null)
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function isPost($post_id){
            
        $stmt = self::connect()->prepare("SELECT * FROM `posts` 
        WHERE `post_id` = :post_id");
        $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
        $stmt->execute(); 

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }

        public static function getTimeAgo($timestamp){
            date_default_timezone_set("America/New_York");
               
            $time_ago        = strtotime($timestamp);
            $current_time = strtotime(date("Y-m-d H:i:s")); 
            $time_difference = $current_time - $time_ago;
            $seconds         = $time_difference;
            
            $minutes = round($seconds / 60); 
            $hours   = round($seconds / 3600);  
            $days    = round($seconds / 86400);  
            $weeks   = round($seconds / 604800);
            $months  = round($seconds / 2629440);
            $years   = round($seconds / 31553280);
                   
            if ($seconds <= 60){
        
            return "now";
        
            } else if ($minutes <= 60){
        
            if ($minutes == 1){
        
                return "1 minute ago";
        
            } else {
        
                return "$minutes minutes ago";        
            }
        
            } else if ($hours <= 24){
        
            if ($hours == 1){
        
                return "1 hour ago";
        
            } else {
        
                return "$hours hours ago";        
            }
        
            } else if ($days <= 7){
        
            if ($days == 1){
        
                return "yesterday";
        
            } else {
        
                return "$days days ago";        
            }
        
            } else if ($weeks <= 4.3){
        
            if ($weeks == 1){
        
                return "a week ago";
        
            } else {        
                return "$weeks weeks ago";        
            }
        
            } else if ($months <= 12){
        
            if ($months == 1){       
                return "a month ago";        
            } else {
        
                return "$months months ago";
        
            }
        
            } else {
            
            if ($years == 1){
        
                return "one year ago";
        
            } else {
        
                return "$years years ago";
        
            }
            }
        }
        
        public static function getPostLinks($post){
            $post = preg_replace("/(https?:\/\/)([\w]+.)([\w\.]+)/", "<a href='$0' target='_blink'>$0</a>", $post);
            $post = preg_replace("/#([\w]+)/", "<a class='hash-post' href='#'>$0</a>", $post);		
            $post = preg_replace("/@([\w]+)/", "<a class='hash-post' href=' ".URL."$1'>$0</a>", $post);
            return $post;		
        }
        
        public static function countLikes($post_id) {
            $stmt = self::connect()->prepare("SELECT COUNT(post_id) as count FROM `likes`
            WHERE post_id = :post_id");
            $stmt->bindParam(":post_id" , $post_id , PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_OBJ);
            return $count->count;
        }
        public static function countPosts($user_id) {
            $stmt = self::connect()->prepare("SELECT COUNT(user_id) as count FROM `postdata`
            WHERE user_id = :user_id");
            $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_OBJ);
            return $count->count;
        }

        public static function unLike($user_id, $post_id){
            
            $stmt = self::connect()->prepare("DELETE FROM `likes` 
            WHERE `user_id` = :user_id and `post_id` = :post_id");
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
            $stmt->execute(); 

            if ($stmt->rowCount() > 0) {
                return true;
            } else return false;

        }

        public static function userLikeIt( $user_id ,$post_id){
            
            $stmt = self::connect()->prepare("SELECT `post_id` , `user_id` FROM `likes` 
            WHERE `user_id` = :user_id and `post_id` = :post_id");
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
            $stmt->execute(); 

            if ($stmt->rowCount() > 0) {
                return true;
            } else return false;

        }
        public static function usersLiked($post_id){
            
            $stmt = self::connect()->prepare("SELECT `post_id` , `user_id` FROM `likes` 
            WHERE  `post_id` = :post_id");
            $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
            $stmt->execute(); 

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }    
        
        public static function likedPostRealId($post_id) {
            $stmt = self::connect()->prepare("SELECT post_id FROM reposts 
            WHERE post_id = :post_id");
            $stmt->bindParam(":post_id" , $post_id , PDO::PARAM_STR);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_OBJ);
            return $id->post_id;
        }

        public static function getPost($post_id){
            $stmt = self::connect()->prepare("SELECT * FROM `posts` JOIN `postdata` 
            on postdata.id = posts.post_id 
            WHERE `post_id` = :post_id");
            $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public static function getData($id) {
            $stmt = self::connect()->prepare("SELECT * from `postdata` WHERE `id` = :id");
            $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
            $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
     }  

     public static function includeHeader($title) {
        include 'includes/posts.php';
    } 

    // public static function searchpost($search){
    //     $stmt = self::connect()->prepare("SELECT `id`,`username`,`name`,`img` FROM `users`
    //     WHERE `username` LIKE ? OR `name` LIKE ?");
    //     $stmt->bindValue(1, $search.'%', PDO::PARAM_STR);
    //     $stmt->bindValue(2, $search.'%', PDO::PARAM_STR);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    //   } 
}
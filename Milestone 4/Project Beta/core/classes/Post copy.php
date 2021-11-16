<?php

// class Post extends User
// {

//     protected static $pdo;

//     public static function posts($user_id)
//     {
//         $stmt = self::connect()->prepare("SELECT * from `postdata`
//         WHERE user_id = :user_id OR user_id IN (SELECT following_id from `follow` WHERE follower_id = :user_id)
//         ORDER BY post_on DESC");
//         $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_OBJ);
//     }
//     public static function postsUser($user_id)
//     {
//         $stmt = self::connect()->prepare("SELECT * from `postdata`
//         WHERE user_id = :user_id
//         ORDER BY post_on DESC");
//         $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_OBJ);
//     }
//     public static function mediaPosts($user_id)
//     {
//         $stmt = self::connect()->prepare("SELECT * from `postdata`
//         WHERE id IN (SELECT post_id from `posts` WHERE user_id = :user_id AND img is not null)
//         ORDER BY post_on DESC");
//         $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_OBJ);
//     }

//     public static function isPost($post_id)
//     {

//         $stmt = self::connect()->prepare("SELECT * FROM `posts` 
//         WHERE `post_id` = :post_id");
//         $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
//         $stmt->execute();

//         if ($stmt->rowCount() > 0) {
//             return true;
//         } else return false;
//     }

//     public static function getTimeAgo($timestamp)
//     {
//         date_default_timezone_set("America/New_York");

//         $time_ago        = strtotime($timestamp);
//         $current_time = strtotime(date("Y-m-d H:i:s"));
//         $time_difference = $current_time - $time_ago;
//         $seconds         = $time_difference;

//         $minutes = round($seconds / 60);
//         $hours   = round($seconds / 3600);
//         $days    = round($seconds / 86400);
//         $weeks   = round($seconds / 604800);
//         $months  = round($seconds / 2629440);
//         $years   = round($seconds / 31553280);

//         if ($seconds <= 60) {
//             return "now";
//         } 
        
//         else if ($minutes <= 60) {
//             if ($minutes == 1) {
//                 return "1 minute ago";
//             }          
//             else {
//                 return "$minutes minutes ago";
//             }
//         } 
        
//         else if ($hours <= 24) {
//             if ($hours == 1) {
//                 return "1 hour ago";
//             } 
//             else {
//                 return "$hours hours ago";
//             }
//         } 
        
//         else if ($days <= 7) {
//             if ($days == 1) {
//                 return "yesterday";
//             } 
//             else {
//                 return "$days days ago";
//             }
//         } 
        
//         else if ($weeks <= 4.3) {
//             if ($weeks == 1) {
//                 return "a week ago";
//             } 
//             else {
//                 return "$weeks weeks ago";
//             }
//         } 
        
//         else if ($months <= 12) {
//             if ($months == 1) {
//                 return "a month ago";
//             } 
//             else {
//                 return "$months months ago";
//             }
//         } 

//         else {
//             if ($years == 1) {
//                 return "one year ago";
//             } 
//             else {
//                 return "$years years ago";
//             }
//         }
//     }
// }



class Post extends User
{

    protected static $pdo;

    public function postsUser($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * from `postdata`
        WHERE user_id = :user_id
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }     
    // For the Social page, we will need a function that takes posts from users you have followed using the follow database
    // Also for the Buzz page, we will need a function that takes posts from the Admin only

    public static function mediaPosts($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * from `postdata`
        WHERE id IN (SELECT post_id from `posts` WHERE user_id = :user_id AND img is not null)
        ORDER BY post_on DESC");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function isPost($post_id)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM `posts` 
        WHERE `post_id` = :post_id");
        $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }


    //Add function to get timestamps for posts (how long agon they were posted) using strtotime() function
    //Don't put exact numbers, but instead assign variables and return "1 minute ago" or "1 week ago".
    public static function getTimeAgo($timestamp)
    {
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

        if ($seconds <= 60) {
            return "now";
        } 
        
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "1 minute ago";
            }          
            else {
                return "$minutes minutes ago";
            }
        } 
        
        else if ($hours <= 24) {
            if ($hours == 1) {
                return "1 hour ago";
            } 
            else {
                return "$hours hours ago";
            }
        } 
        
        else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } 
            else {
                return "$days days ago";
            }
        } 
        
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } 
            else {
                return "$weeks weeks ago";
            }
        } 
        
        else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } 
            else {
                return "$months months ago";
            }
        } 
        
        else {
            if ($years == 1) {
                return "one year ago";
            } 
            else {
                return "$years years ago";
            }
        }
    }
}
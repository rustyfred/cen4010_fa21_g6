<?php
include '../init.php';

if (isset($_POST['search'])) {
    $search = User::checkInput($_POST['search']);

    $result = User::search($search);
         
    if(!empty($result)) {

        echo ' <div class="nav-right-down-wrap">
        <ul> ';
    foreach ($result as $user) {
        echo ' <li >
        <div class="nav-right-down-inner">
        <div class="nav-right-down-left">
            <a class="" href="'.URL.$user->username.'"><img class="mt-2 ml-1" src="assets/images/users/'.$user->img.'"></a>
        </div>
        <div class="nav-right-down-right">
            <div class="nav-right-down-right-headline">
            <a class="search-name" href="'.URL.$user->username.'">'. $user->username.'</a>

            </div>
            
        </div>
        </div> 
        </li> ';
    }

    echo ' </ul>
    </div> ';
}
}



?>
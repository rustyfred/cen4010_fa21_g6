<?php

include 'classes/connection.php';
include 'classes/User.php';
include 'classes/Follow.php';
include 'classes/Post.php';

session_start();
 
global $pdo;

define("URL" , "http://localhost/cen4010_fa21_g06/");
// define("URL" , "https://lamp.cse.fau.edu/~cen4010_fa21_g06/");




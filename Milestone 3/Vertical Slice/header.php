<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Socialbuzz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
        </header>
    
        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
                <li><a class="active" href="index.php">Socialbuzz</a></li>
            </ul>
        <ul class="icons">
            <?php
                if(isset($_SESSION["id"]))
                {
            ?>
                <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                <li><a href="includes/logout.inc.php">LOGOUT</a></li>
            <?php
                }
                else
                {
            ?>
				<li><a href="signup.php">SIGN UP</a></li>                
                <li><a href="login.php">LOGIN</a></li>
            <?php  
                }
            ?>
        </ul>
    </nav>

<?php

include 'core/init.php';

$user_id = $_SESSION['user_id'];

$user = User::getData($user_id);

if (User::checkLogIn() === false)
  header('location: index.php');

$posts = Post::posts($user_id);
$who_users = Follow::whoToFollow($user_id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Socialbuzz</title>

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/home_style.css?v=<?php echo time(); ?>">

  <script src="assets/js/jquery-3.5.1.min.js"></script>
</head>

<body>

  <div id="mine">

    <!-- **********************************NAV********************************** -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="home.php">
        <img src="assets/images/icon.png" alt="" height="30px" width="30px" />
      </a>
      <a class="navbar-brand" href="home.php">Socialbuzz</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Social<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buzz.php">Buzz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL . $user->username; ?>">Profile</a>
          </li>
        </ul>
        <div class="navbar-item" style="margin: auto 4px">
          <a style="color:red" href="includes/logout.php"><strong>Logout</strong></a>
        </div>
        <span class="navbar-item" style="margin: auto 4px auto 16px">
          <a style="color:black" href="<?php echo URL . $user->username; ?>"><strong><?php echo $user->username ?></strong></a>
        </span>
        <span class="navbar-item" style="margin: auto 4px">
          <a href="<?php echo URL . $user->username; ?>"><img src="assets/images/users/<?php echo $user->img; ?>" alt="User" class="img-user" /></a>
        </span>
      </div>
    </nav>
    <!-- ************************************************************************* -->

    <!-- ****************************FEED SECTION********************************* -->

    <div class="grid-dposts">
      <div class="container-fluid" style="margin-top:80px">
        <div class="border-right">
          <div class="tab-content">
            <div class=" fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <?php include 'includes/posts.php'; ?>
              <a href="#" id="loadMore">Load More</a> 
            </div>
          </div>
        </div>
      </div>
      <!-- ************************************************************************* -->

      <!-- ***************************** Find Friends ***************************** -->
      <div class="box-share">
        <p class="txt-share"><strong>Follow Friends</strong></p>
        <?php
        foreach ($who_users as $user) {
          $user_follow = Follow::isUserFollow($user_id, $user->id);
        ?>
          <div class="grid-share">
            <a style="position: relative; z-index:5; color:black" href="<?php echo $user->username;  ?>">
              <img src="assets/images/users/<?php echo $user->img; ?>" alt="" class="img-share" />
            </a>
            <div style="padding-top:10px;">
              <p>
                <a style="position: relative; z-index:5; color:black" href="<?php echo $user->username;  ?>">
                  <strong><?php echo $user->username; ?></strong>
                </a>
              </p>

            </div>
            <div>
              <button class="follow-btn follow-btn-m 
                      <?= $user_follow ? 'following' : 'follow' ?>" data-follow="<?php echo $user->id; ?>" data-user="<?php echo $user_id; ?>" data-profile="<?php echo $profileData->id; ?>" style="font-weight: 700;">
                <?php if ($user_follow) { ?>
                  Following
                <?php } else {  ?>
                  Follow
                <?php }  ?>
              </button>
            </div>
          </div>

        <?php } ?>


      </div>
      <!-- ****************************************************************** -->

      <!-- ***************************** SEARCH ***************************** -->
      <div class="wrapper-right">
        <div class="input-group py-2 m-auto pr-5">
          <i id="icon-search" class="fas fa-search tryy"></i>
          <input type="text" class="form-control search-input" placeholder="Search Socialbuzz">
          <div class="search-result">

          </div>
        </div>
      </div>
      <!-- ****************************************************************** -->
    </div>
  </div>
  <script src="assets/js/search.js"></script>
  <script src="assets/js/photo.js?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="assets/js/like.js"></script>
  <script type="text/javascript" src="assets/js/follow.js?v=<?php echo time(); ?>"></script>
  <script src="https://kit.fontawesome.com/38e12cc51b.js" crossorigin="anonymous"></script>
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/loadmore.js"></script>
</body>

</html>
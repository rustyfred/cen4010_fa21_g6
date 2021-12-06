<?php

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
  include 'core/init.php';
  $username = User::checkInput($_GET['username']);
  $profileId = User::getIdByUsername($username);
  $profileData = User::getData($profileId);
  $user_id = $_SESSION['user_id'];
  $user = User::getData($user_id);
  $posts = Post::postsUser($profileData->id);
  $liked_posts = Post::likedPosts($profileData->id);
  $media_posts = Post::mediaPosts($profileData->id);
  $who_users = Follow::whoToFollow($user_id);

  if (!$profileData)
    header('location: index.php');

  if (User::checkLogIn() === false)
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Socialbuzz</title>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-T806BJBC8J"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-T806BJBC8J');
  </script>
  <meta charset="UTF-8">
  <meta name="description" content="Social Media Website">
  <meta name="keywords" content="Social Media,Socialbuzz,COVID-19,News,HTML,CSS,PHP,MySQL,JavaScript">
  <meta name="author" content="Team G6">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $profileData->name; ?> (@<?php echo $profileData->username; ?>) | Socialbuzz</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/profile_style.css?v=<?php echo time(); ?>">

</head>

<body>

  <script src="assets/js/jquery-3.5.1.min.js"></script>


  <div id="mine">

    <!-- **********NAV********** -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="home.php">
        <img src="assets/images/icon.png" alt="" height="30px" width="30px" />
      </a>
      <a class="navbar-brand" href="home.php">Socialbuzz</a>
      <button class="navbar-toggler" type="button" data-target="#navbarText" aria-controls="navbarText">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Social</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buzz.php">Buzz</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo URL . $user->username; ?>">Profile<span class="sr-only">(current)</span></a>
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


    <!-- *******************USER PAGE********************** -->


    <div class="grid-dposts">
      <div class="border-right">
        <div class="container-fluid" style="margin-top:70px">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-md-3">
              <span class="home-follow-count"><?php echo Follow::countFollowing($profileData->id); ?></span> Following</i>
            </div>
            <div class="col-md-3">
              <span class="home-follow-count"><?php echo Follow::countFollowers($profileData->id); ?></span> Followers</i>
            </div>

            <!-- Edit Profile -->
            <div class="">
              <?php if ($user->id == $profileData->id) { ?>
                <button class="home-edit-button" data-toggle="modal" data-target="#edit">Edit Profile</button>

                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">

                        <form method="POST" action="handle/handleUpdateData.php" enctype="multipart/form-data">

                          <div style="width: 300%;" class="d-flex justify-content-between">
                            <div>
                              <h5 class="modal-title d-inline" id="exampleModalLongTitle">Edit Profile</h5>
                            </div>
                            <div>
                              <button type="submit" name="update" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="image-upload">
                            <label for="file-input">
                              <i style="top: 200px;
                     left:225px;
                     color:white;
                     font-size:30px" class="far fa-images position-absolute"></i>
                            </label>
                            <input id="file-input" name="image" type="file" />
                          </div>
                          <img id="preview-user" class="home-img-user-edit" src="assets/images/users/<?php echo $profileData->img; ?>" alt="">
                        </div>

                        <?php if (isset($_SESSION['errors'])) { ?>
                          <script>
                            $(document).ready(function() {
                              $("#edit").modal('show');
                            });
                          </script>
                          <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <div class="alert alert-danger" role="alert">
                              <p style="font-size: 15px;" class="text-center"> <?php echo $error; ?>
                            </div> <?php }
                                }
                                unset($_SESSION['errors']) ?> </p>


                        <div class="form-group">
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $user->name; ?>" aria-describedby="emailHelp" placeholder="Nickname">
                        </div>
                        <div class="form-group">
                          <input type="text" name="bio" class="form-control" id="exampleInputEmail1" value="<?php if ($user->bio !== null)
                                                                                                              echo $user->bio; ?>" aria-describedby="emailHelp" placeholder="Bio">
                        </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- ****************************************************************** -->

                <!-- Other User Information-->
              <?php } else {
                $user_follow = Follow::isUserFollow($user_id, $profileData->id);
              ?>
                <button class=" follow-btn 
                   <?= $user_follow ? 'following' : 'follow' ?>" data-follow="<?php echo $profileData->id; ?>">
                  <?php if ($user_follow) { ?>
                    Following
                  <?php } else {  ?>
                    Follow
                  <?php }  ?>
                </button>
              <?php } ?>
            </div>
            <!-- ********************************************************************* -->
          </nav>

        </div>
        <div class="container-fluid" style="margin-top:90px">
          <img class="flex-left rounded-circle home-img-user" src="assets/images/users/<?php echo $profileData->img; ?>" alt="User Image">
          <div class="home-title">
            <h4><?php echo $profileData->username; ?></h4>
            <p><?php echo $profileData->bio; ?> </p>
          </div>

          <!-- ***************************** USER POST *****************************-->
          <?php if ($user->id == $profileData->id) { ?>
            <div class="center-input-search">
              <div class="input-group-login" id="userpost">

                <div class="container">

                  <div class="text">
                    <form class="" action="handle/handlePost.php" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <textarea class="form-control" name="status" rows="6" cols="100" placeholder="New Post..."></textarea>
                      </div>

                      <!-- Image upload place -->
                      <div class="position-relative upload-photo">
                        <img class="img-upload-tmp" src="assets/images/posts/post-60666d6b426a1.jpg" alt="">
                        <div class="icon-bg">
                          <i class="fas fa-times position-absolute upload-delete"></i>
                        </div>
                      </div>


                      <div class="bottom">

                        <div class="bottom-container">
                          <label for="post_img" class="ml-3 mb-2 uni">

                            <i class="fa fa-image item-pair"></i>
                          </label>
                          <input class="post_img" id="post_img" type="file" name="post_img">
                        </div>

                        <?php if (isset($_SESSION['errors_post'])) {

                          foreach ($_SESSION['errors_post'] as $t) { ?>

                            <div class="alert alert-danger">
                              <span class="item2-pair"> <?php echo $t; ?> </span>
                            </div>

                        <?php }
                        }
                        unset($_SESSION['errors_post']); ?>
                        <div>
                          <input type="submit" name="post" value="Post" class="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- *********************************************************************************** -->


          <div class="tab-content">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <?php include 'includes/postsprofile.php'; ?>
              <?php if ($user->id == $profileData->id) { ?>
              <a href="#" id="loadMore">Load More</a> 
              <?php } else { ?> 
                <a href="#" id="loadMoreother">Load More</a>  
              <?php } ?>        
            </div>
          </div>
        </div>
      </div>

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
              <button class="follow-btn-other follow-btn-m 
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

<!-- ******************************** Footer ********************************* -->
<footer class="text-center text-lg-start bg-light">
  <div class="text-center p-4">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Team G6 - Socialbuzz.com</a>
  </div>
</footer>
<!-- ************************************************************************ -->

  <script src="assets/js/search.js"></script>
  <script src="assets/js/photo.js"></script>
  <script src="assets/js/follow.js?v=<?php echo time(); ?>"></script>
  <script src="assets/js/users.js?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="assets/js/like.js"></script>
  <script src="https://kit.fontawesome.com/38e12cc51b.js" crossorigin="anonymous"></script>
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/loadmoreprofileother.js"></script>
  <script src="assets/js/loadmoreprofile.js"></script>

</body>

</html>
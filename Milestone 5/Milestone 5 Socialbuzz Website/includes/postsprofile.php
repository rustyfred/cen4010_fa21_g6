<?php
$user_id = $_SESSION['user_id'];

foreach ($posts as $post) {

  if (Post::isPost($post->id)) {

    $post_user = User::getData($post->user_id);
    $post_real = Post::getPost($post->id);
    $timeAgo = Post::getTimeAgo($post->post_on);
    $likes_count = Post::countLikes($post->id);
    $user_like_it = Post::userLikeIt($user_id, $post->id);

  }
  $post_link = $post->id;

?>

  <div class="box-post feed" style="position: relative;">
    <a href="<?php echo $post_user->username;  ?>">
      <span style="position:absolute; width:100%; height:100%; top:0;left: 0; z-index: 1;"></span>
    </a>

    <div class="grid-post">
      <a style="position: relative; z-index:1000" href="<?php echo $post_user->username;  ?>">
        <img src="assets/images/users/<?php echo $post_user->img; ?>" alt="" class="img-user" />
      </a>

      <div>
        <p>
          </a>
          <span class="username-socialbuzz"><?php echo $post_user->username ?> </span>
          <span class="username-socialbuzz"><?php echo $timeAgo ?></span>
        </p>
        <p class="post-links"><?php echo Post::getPostLinks($post_real->status); ?></p>

        <?php if ($post_real->img != null) { ?>
          <p class="mt-dpost-post">
            <img src="assets/images/posts/<?php echo $post_real->img; ?>" alt="" class="img-dpost-post" />
          </p>
        <?php } ?>

        <div class="grid-reactions">


          <div class="grid-box-reaction">
            <a class="hover-reaction hover-reaction-like 
        <?= $user_like_it ? 'unlike-btn' : 'like-btn' ?> " data-post="<?php
                                                                        echo $post->id;
                                                                        ?>" data-user="<?php echo $user_id; ?>">

              <i class="fa-thumbs-up <?= $user_like_it ? 'far mt-icon-reaction' : 'far mt-icon-reaction' ?>"></i>

              <div class="mt-counter likes-count d-inline-block">
                <p> <?php if ($likes_count > 0)  echo $likes_count; ?> </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
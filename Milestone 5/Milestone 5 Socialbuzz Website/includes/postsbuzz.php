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
  
  <div class="box-post feed mt-0 pt-0 mb-3" style="position: relative;">      
    <div class="grid-post ml-0 pl-0" style="background-color: #f8f9fa;"> 
      <a style="margin:0px">
      </a>    
      <div class="mt-4 ml-0 pr-5" >
        <p class="mb-2">
          <span class="h4"><?php echo Post::getPostLinks($post_real->title)?></span>          
          <span class="username-socialbuzz float-xl-right float-lg-right float-md-right float-sm-right" style="margin-right:5%"><?php echo $timeAgo ?></span>
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
<?php  } ?>
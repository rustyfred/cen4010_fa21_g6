<?php

?>
<form action="./handle/handleLogin.php" class="" method="POST">
  <div class="form-group">
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
  </div>
  <div class="text-center">
    <input type="submit" name="login" class="btn btn-primary" value="Log In">
  </div>
  <div class="con">
    <?php

    if (isset($_SESSION['errors'])) {
      foreach ($_SESSION['errors'] as $error) {
        echo ' <li class="error-li">
          <div class="span-fp-error">' . $error . '</div>
          </li>';
      }
      unset($_SESSION['errors']);
    }

    ?>
  </div>
</form>
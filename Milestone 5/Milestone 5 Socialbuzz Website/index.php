<?php


include 'core/init.php';

if (isset($_SESSION['user_id'])) {
  header('location: home.php');
}

?>

<html>

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
  <meta charset="UTF-8" />
  <meta name="description" content="Social Media Website">
  <meta name="keywords" content="Social Media,Socialbuzz,COVID-19,News,HTML,CSS,PHP,MySQL,JavaScript">
  <meta name="author" content="Team G6">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" />
  <link rel="stylesheet" href="assets/css/index_style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="assets/css/all.min.css">

</head>

<body>
  <main class="buzz-main">

    <div class="text-center">
    </div>

    <div class="text-center">
    <img src="assets/images/icon.png" class="rounded mt-5" style="width:15%;" alt="Socialbuzz">
      <div class="h1 join mt-3">Socialbuzz</div>
      <div class="text-center">

        <div class="buzz-login">
          <?php include 'includes/login.php';  ?>
        </div>
        <div class="buzz-signup">
          <?php include 'includes/signup.php'; ?>
        </div>

  </main>

  <!-- ******************************** Footer ********************************* -->
<footer class="text-center text-lg-start bg-light" style="position: fixed; bottom:0%; ">
  <div class="text-center p-4">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Team G6 - Socialbuzz.com</a>
  </div>
</footer>
<!-- ************************************************************************ -->
  <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
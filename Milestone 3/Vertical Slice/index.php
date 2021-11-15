<?php
    include_once 'header.php';
?>

<!-- Main -->
<div id="main">
    <section class="post">

<!-- when logged in -->
<?php
    if(isset($_SESSION["id"]))
    {
?>
    <form action="handle/handlePost.php" enctype="multipart/form-data" method="post" action="#">
        <div class="field">
            <label for="message">Message</label>
            <textarea name="status" id="message" rows="5"></textarea>
        </div>
    </form>
    <ul class="actions">
        <li><button name="post" value="post" type="submit">POST</button></li>
    </ul>   


<!-- when logged out -->
<?php
    }
    else
    {
?>
        <header class="major">
            <element class="bannerimage"><img src="images/banner.png" alt="banner" /></element>
            <h2>Socialbuzz</h2>
        </header>
<?php  
    }
?> 
    </section>
</div>

<!-- footer -->
<?php
    include_once 'footer.php';
?>
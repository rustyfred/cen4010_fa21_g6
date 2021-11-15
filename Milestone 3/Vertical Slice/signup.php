<?php
    include_once 'header.php';
?>

<!-- Main -->
<div id="main">
    <section class="post">

    <footer id="footer">
        <section class="login">
            <h4>SIGN UP</h4>
            <form action="includes/signup.inc.php" method="post">
                <div class="field"> 
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </div>
            </form>
        </section>
    </footer>

    </section>
</div>
 
<?php
    include_once 'footer.php';
?>

<?php
    include_once 'header.php';
?>

<div id="main">
    <section class="post">

    <footer id="footer">
        <section class="login">
            <h4>LOGIN</h4>
            <form action="includes/login.inc.php" method="post">
                <div class="field"> 
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <br>
                    <button type="submit" name="submit">LOGIN</button>
                </div>
            </form>
        </section>
    </footer>

    </section>
</div>    

<?php
    include_once 'footer.php';
?>

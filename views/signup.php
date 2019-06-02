<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class="wrap">
    <h1 class="login-title">Register</h1>
    <div class="center-align">
    <?=$_SESSION['ErrorMessage']?>
    </div>
    <div class="center-align light-green-text text-darken-4">
    <?=$_SESSION['SuccessMessage']?>
    </div>
    <form action="../controllers/addUser.php" method="post" name="login" class="login">
        <div>
            <label for="username">First Name: </label>
            <input type="text" id="fname" name="fname">
        </div>
        <div>
            <label for="username">Last Name: </label>
            <input type="text" id="lname" name="lname">
        </div>
        <div>
            <label for="email">E-mail: </label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password"  id="password" name="password">
        </div>
        <div>
            <label for="repeatPassword">Repeat Password: </label>
            <input type="password"  id="repeatPassword" name="repeatPassword">
        </div>
        <div>            
            <input type="submit" class="btn" name="signup" value="Sign Up">
        </div>
    </form>
</div>

<?php 
include( WEB_ROOT.'/views/partials/footer.php' ); 
$_SESSION['ErrorMessage'] = "";
$_SESSION['SuccessMessage'] = "";
?>
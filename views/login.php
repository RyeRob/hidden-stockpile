<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class="wrap">
    <h1 class="login-title">Sign In</h1>.
    <div class="center-align red-text text-accent-4">
    <?php if(isset($_SESSION['ErrorMessage'])){ echo $_SESSION['ErrorMessage'];}?>
    </div>
    <div class="center-align light-green-text text-darken-4">
    <?php if(isset($_SESSION['SuccessMessage'])){ echo $_SESSION['SuccessMessage'];}?>    
    </div>
    <form action="../controllers/login.php" method="post" name="login" class="login">
        <div>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <input type="submit" class="btn" name="login" value="Login">
        </div>
    </form>
</div>

<?php include( WEB_ROOT.'/views/partials/footer.php' );
$_SESSION['ErrorMessage'] = "";
$_SESSION['SuccessMessage'] = "";
?>
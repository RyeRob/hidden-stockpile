<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class="wrap">
    <h1 class="login-title">Sign In</h1>
    <form action="" method="post" name="login" class="login">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <div>
            <button type="button" class="btn">Log In</button>
            <a href="/" class="btn" id="cancel">Cancel</a>
        </div>
    </form>
</div>

<?php include( WEB_ROOT.'/views/partials/footer.php' ); ?>
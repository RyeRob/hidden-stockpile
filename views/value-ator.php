<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>

<h1>Collection Value-ator</h1>

<p>Enter your collection here and we'll tell you what it's worth.</p>

<p><a href="#">Sign up for Hidden Stockpile to track the value of your collection.</a></p>

<form>
    <input type="text" name="cardName" />
    <input type="submit" name="valueator" value="Check Price" />
</form>

<?php include( WEB_ROOT.'/views/partials/footer.php' ); ?>
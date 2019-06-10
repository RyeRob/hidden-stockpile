<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class="about container">
<h1>About Page</h1>
<p>
    This is an application intended to make it easy for people to get a value on their Magic: The Gathering cards. Wether you have
    an old collection that you'd like to get rid of or just rotating your collection to fill in cards you need for a new deck build
    you'll be able to see the value of your stockpile quickly and easily.
</p>
<p>
    This site also allows users to create an account and save coards to their collection or a watch list to monitor the value 
    of cards they own or cards they want.
</p>
</div>

<?php include( WEB_ROOT.'/views/partials/footer.php' ); ?>
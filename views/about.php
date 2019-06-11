<?php
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include( WEB_ROOT.'/views/partials/header.php' );
include( WEB_ROOT.'/views/partials/menu.php' );
?>
<div class="about container wrap z-depth-2">
<h1>About</h1>
<p>
    This is an application intended to make it easy for people to get a value on their 
    Magic: The Gathering cards. Whether you have an old collection that you'd like to get 
    rid of or just rotating your collection to fill in cards you need for a new deck build 
    you'll be able to see the value of your stockpile quickly and easily.
</p>
<p>
    Find the value of your cards is free and doesn't require an account but if you want the ability to add cards to your collection and watch list, you'll want to sign up. There are more features planned for registered users such as price alerts and in depth collection statistics.
</p>
</div>

<?php include( WEB_ROOT.'/views/partials/footer.php' ); ?>
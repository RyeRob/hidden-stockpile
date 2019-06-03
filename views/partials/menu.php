<div class="nav-bar z-depth-2">
    <a href="/"><img id="logo" src="../../images/logo.png" alt="site logo"></a>
    <ul class="nav-main">
        <li><a href="/">Home</a></li>
        <li><a href="/views/about.php">About</a></li>
        <li><a href="/views/valueCards.php">Value Cards</a></li>
    </ul>
    <ul class="nav-login">
        <?php
            if(isset($_SESSION['id']))
            {
                echo "<li><a href='/views/profile.php'>Welcome, ".$_SESSION['username']."</a></li>";
                echo "<li><a href='/controllers/logout.php'>Logout</a></li>";
            }
            else
            {
                echo "<li><a href='/views/login.php'>Log In</a></li>";
                echo "<li><a href='/views/signup.php'>Sign Up</a></li>";
            }
        ?>
    </ul>
</div>
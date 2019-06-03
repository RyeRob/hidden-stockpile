<?php
//Start our session
session_start();
define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
include(WEB_ROOT.'/includes/Classes/database.php');
include(WEB_ROOT.'/includes/Classes/user.php');

//Messages when there is an error logging in or if login is successful
$_SESSION['ErrorMessage'] = '';
$_SESSION['SuccessMessage'] = '';

//Instantiate our db
$db = Database::getDb();
$c = "";

//If the login button was pressed on Views/dashboard.php
if (isset($_POST['login']))
{
    //Instantiate user class
    $u = new User();

    //Set username variable to username retrieved from form
    $username = ($_POST['username']);

    //Run our existing user function and put results into variable c
    $c = $u->checkExistingUser($username, $db);

    //If the count of rows retrieved from the query is 0
    if(count($c) == 0)
    {
        //User doesn't exist
        $_SESSION['ErrorMessage'] = "User does not exist";
        header('Location: /views/login.php');
    }
    else
    {
        //Set user variable to information retrieved from database
        $userInfo = $u->getUser($username, $db);
        $user = $userInfo;

        //Check if our sign in password is the same as our stored password
        if(password_verify($_POST['password'], $user['password']))
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../views/profile.php");
        }
        else
        {
            $_SESSION['ErrorMessage'] = "Wrong username or password";
            header('Location: /views/login.php');
        }
    }

}

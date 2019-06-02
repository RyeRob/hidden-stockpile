<?php
//Start our session
session_start();
include '../includes/Classes/database.php';
include '../includes/Classes/user.php';

//Messages when there is an error signing up or if sign up is successful
$_SESSION['ErrorMessage'] = '';
$_SESSION['SuccessMessage'] = '';
$c = "";

//Password validation - letters and numbers 3 digits min 8 digits max
$pattern = "/[a-zA-Z0-9]{3,13}/";

//Instantiate our db
$db = Database::getDb();

//If signup button is pressed
if (isset($_POST['signup'])) {
    //Instantiate user class
	$u = new User();
	if($_POST['fname'] == "" || $_POST['lname'] == "" || $_POST['email'] == "" || $_POST['username'] == "" || $_POST['password'] == "")
	{
		$_SESSION['ErrorMessage'] = "Fields cannot be blank";
        header('Location: ../views/signup.php');
	}
	elseif(!preg_match($pattern, $_POST['repeatPassword']))
	{
		$_SESSION['ErrorMessage'] = "Password must be letters or numbers only and be between 3 and 13 characters long";
        header('Location: ../views/signup.php');		
	}
	elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['ErrorMessage'] = "Please enter a valid email";
        header('Location: ../views/signup.php');
	}
	//If passwords match, put info into variables
	elseif($_POST['password'] == $_POST['repeatPassword'])
	{
			//Run our existing user function and put results into variable c
			$c = $u->checkExistingUser($_POST['username'], $db);

			//If the count of rows retrieved from the query is 0
			if(count($c) == 0)
			{
				//Only make a new user if the user doesn't exist already
                //Put our entered values in the inputs into a variable
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
				$email = $_POST['email'];
				$username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Hash Pw
                
                //Run query
                $c = $u->addUser($fname, $lname, $email, $username, $password, $db);

                if($c)
                {
                    $_SESSION['SuccessMessage'] = "Registration Successful!";
                    header('Location: ../views/signup.php');
                }
                else
                {
                    $_SESSION['ErrorMessage'] = "Registration Failed.";
                    header('Location: ../views/signup.php');
                }
			}
			else
			{
				$_SESSION['ErrorMessage'] = "User already exists";
				header('Location: ../views/signup.php');
			}
	}
	else
	{
		$_SESSION['ErrorMessage'] = "Passwords do not match";
        header('Location: ../views/signup.php');
	}
}
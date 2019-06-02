<?php
class User
{
    //Add a new user
    public function addUser($fname, $lname, $email, $username, $password, $db)
    {
        $sql = "INSERT INTO users (fname, lname, email, username, password)
            VALUES (:fname, :lname, :email, :username, :password)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':fname', $fname);
        $pst->bindParam(':lname', $lname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':password', $password);

        $count = $pst->execute();
        return $count;
    }

    //Edit a user
    public function editUser($id, $fname, $lname, $email, $username, $password, $db)
    {
        $sql = "UPDATE users
                SET fname = :fname,
                lname = :lname, 
                email = :email,
                username = :username,
                password = :password
                WHERE id = :id"; 
        $pstm = $db->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->bindParam(':fname', $fname);
        $pstm->bindParam(':lname', $lname);
        $pstm->bindParam(':email', $email);
        $pstm->bindParam(':username', $username);
        $pstm->bindParam(':password', $password);
        $pstm->execute();

        //count
        return $pstm->execute();               

    }

    //Check for existing user
    public function checkExistingUser($username, $db)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, \PDO::PARAM_STR);
        $pdostm->execute();
        $u = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $u;
    }

    //Check for existing email
    public function checkExistingEmail($email, $db)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':email', $email, \PDO::PARAM_STR);
        $pdostm->execute();
        $u = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $u;
    }

    //Get user info in an associative array that will be put into the $user variable
    public function getUser($username, $db)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, \PDO::PARAM_STR);
        $pdostm->execute();
        $u = $pdostm->fetch(\PDO::FETCH_ASSOC);
        return $u;
    }

}

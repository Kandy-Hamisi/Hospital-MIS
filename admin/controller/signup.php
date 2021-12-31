<?php

// including the database connection

include "config.php";


// getting form data from user

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$uname = mysqli_real_escape_string($mysqli, $_POST['uname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$password1 = mysqli_real_escape_string($mysqli, $_POST['password1']);

if (!empty($fname) && !empty($uname) && !empty($email) && !empty($password1) && !empty($password)) {

    // checking if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
       if ($password === $password1) {
            // checking if email already exists
            $checkQuery = "SELECT Email from admins WHERE Email='{$email}'";
            $res = mysqli_query($mysqli, $checkQuery);

            // if email exists
            if (mysqli_num_rows($res) > 0) {
                echo "$email - already exists";
            }else{
                // inserting all user data into the table
                $insertSql = "INSERT INTO admins(FullName, Username, Email, PassCode)
                            VALUES('{$fname}', '{$uname}', '{$email}', '{$password}')";
                $resultinsert =mysqli_query($mysqli, $insertSql);

                // if data is inserted successfully
                if ($resultinsert) {
                    $sql = "SELECT * FROM admins WHERE Email = '{$email}'";
                    $resSql = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($resSql)) {
                        $row = mysqli_fetch_assoc($resSql);
                        $_SESSION['admin_user'] = $row['Username'];
                        echo "Success";
                    }
                }else{
                    echo "Something Went Wrong!!";
                }
            }
       }else{
           echo "The two paswords don't match. Try again!!";
       }
    }else{
        echo "$email - is not a valid email";
    }
}else{
    echo "All Fields are Required!!";
}


?>
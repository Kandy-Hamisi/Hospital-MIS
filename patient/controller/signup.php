<?php

// including the database connection

include "config.php";


// getting form data from user

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
$fullname = $fname. " " .$lname;

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($city) && !empty($address) && !empty($age) && !empty($gender) && !empty($password)) {
    
    // checking if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // checking if email already exists
        $checkQuery = "SELECT Email from users WHERE Email='{$email}'";
        $res = mysqli_query($mysqli, $checkQuery);

        // if email exists
        if (mysqli_num_rows($res) > 0) {
            echo "$email - already exists";
        }else{
            // inserting all user data into the table
            $insertSql = "INSERT INTO users(Fullname, User_address, City, Gender, Email, PassCode, Age)
                        VALUES('{$fullname}', '{$address}', '{$city}', '{$gender}', '{$email}', '{$password}', {$age})";
            $resultinsert =mysqli_query($mysqli, $insertSql);

            // if data is inserted successfully
            if ($resultinsert) {
                $sql = "SELECT * FROM users WHERE Email = '{$email}'";
                $resSql = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($resSql)) {
                    $row = mysqli_fetch_assoc($resSql);
                    $_SESSION['patient_name'] = $row['Fullname'];
                    echo "Success";
                }
            }else{
                echo "Something Went Wrong!!";
            }
        }
    }else{
        echo "$email - is not a valid email";
    }
}else{
    echo "All Fields are Required!!";
}


?>
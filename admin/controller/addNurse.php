<?php

include "config.php";

$nursename = mysqli_real_escape_string($mysqli, $_POST['nursename']);
$nurseDept = mysqli_real_escape_string($mysqli, $_POST['nursedept']);
$contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$pwd1 = mysqli_real_escape_string($mysqli, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($mysqli, $_POST['pwd2']);


if (!empty($nursename) && !empty($nurseDept) && !empty($contact) && !empty($email) && !empty($pwd1) && !empty($pwd2)) {
    
    // checking if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // checking if the two passwords match
        if ($pwd1 === $pwd2) {
            // checking if the email already exists
            $checkQuery = "SELECT Email from nurses WHERE Email ='{$email}'";
            $res = mysqli_query($mysqli, $checkQuery);

            // if email exists
            if (mysqli_num_rows($res) > 0) {
                echo "$email - is already taken";
            }else{
                // inserting the doctor's data into the database
                $insertSql = "INSERT INTO nurses(NurseName, Department, Phone, Email, PassCode)
                                VALUES('{$nursename}', '{$nurseDept}', '{$contact}', '{$email}', '{$pwd1}')";
                $result = mysqli_query($mysqli, $insertSql);

                // if the data is inserted successfully
                if ($result) {
                    echo "Success";
                }else{
                    "Something Went wrong. Try again!!";
                }
            }
        }else{
            echo "The two passwords don't match";
        }
    }

}else{
    echo "All fields are required!!!";
}

?>
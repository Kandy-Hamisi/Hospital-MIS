<?php

include "config.php";

$docspec = mysqli_real_escape_string($mysqli, $_POST['docspec']);
$docname = mysqli_real_escape_string($mysqli, $_POST['docname']);
$docaddress = mysqli_real_escape_string($mysqli, $_POST['docaddress']);
$docfees =mysqli_real_escape_string($mysqli, $_POST['docfees']);
$contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$pwd1 = mysqli_real_escape_string($mysqli, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($mysqli, $_POST['pwd2']);


if (!empty($docspec) && !empty($docname) && !empty($docaddress) && !empty($docfees) && !empty($contact) && !empty($email) && !empty($pwd1) && !empty($pwd2)) {
    
    // checking if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // checking if the two passwords match
        if ($pwd1 === $pwd2) {
            // checking if the email already exists
            $checkQuery = "SELECT Email from doctors WHERE Email ='{$email}'";
            $res = mysqli_query($mysqli, $checkQuery);

            // if email exists
            if (mysqli_num_rows($res) > 0) {
                echo "$email - is already taken";
            }else{
                $selSpec = "SELECT * from specialization WHERE specialization='{$docspec}'";
                $resSpec = mysqli_query($mysqli, $selSpec);
                $myRow = mysqli_fetch_assoc($resSpec);
                $newDocSpecId = $myRow['id'];
                // inserting the doctor's data into the database
                $insertSql = "INSERT INTO doctors(specialization_id, DocName, Address, Fees, Phone, Email, PassCode)
                                VALUES($newDocSpecId, '{$docname}', '{$docaddress}', '{$docfees}', '{$contact}', '{$email}', '{$pwd1}')";
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
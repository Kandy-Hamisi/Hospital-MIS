<?php
session_start();
include "config.php";


$patname = mysqli_real_escape_string($mysqli, $_POST['patname']);
$pataddress = mysqli_real_escape_string($mysqli, $_POST['pataddress']);
$patage =mysqli_real_escape_string($mysqli, $_POST['patage']);
$contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$medhis = mysqli_real_escape_string($mysqli, $_POST['medhis']);
$gender = mysqli_real_escape_string($mysqli, $_POST['sex']);
$allocation = mysqli_real_escape_string($mysqli, $_POST['allocation']);



if (!empty($patname) && !empty($pataddress) && !empty($patage) && !empty($contact) && !empty($allocation) && !empty($email) && !empty($medhis) && !empty($gender)) {
    
    // checking if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // checking if the email already exists
        $checkQuery = "SELECT Email from patients WHERE Email ='{$email}'";
        $res = mysqli_query($mysqli, $checkQuery);

        // if email exists
        if (mysqli_num_rows($res) > 0) {
            echo "$email - is already taken";
        }else{
            $selSpec = "SELECT * FROM doctors WHERE DocName = '{$_SESSION['doc_name']}'";
            $resSpec = mysqli_query($mysqli, $selSpec);
            $myRow = mysqli_fetch_assoc($resSpec);
            $newDocId = $myRow['id'];
            // inserting the doctor's data into the database
            $insertSql = "INSERT INTO patients(Doc_id, PatientName, Contact, Email, Gender, Address, Age, Allocation, Med_history)
                            VALUES($newDocId, '{$patname}', '{$contact}', '{$email}', '{$gender}', '{$pataddress}', '{$patage}', '{$allocation}', '{$medhis}')";
            $result = mysqli_query($mysqli, $insertSql);

            // if the data is inserted successfully
            if ($result) {
                echo "Success";
            }else{
                "Something Went wrong. Try again!!";
            }
        }
        
    }

}else{
    echo "All fields are required!!!";
}

?>
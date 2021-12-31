<?php


session_start();
include_once "config.php";

$docspec = mysqli_real_escape_string($mysqli, $_POST['docspec']);
$docfees = mysqli_real_escape_string($mysqli, $_POST['fees']);
$app_date = mysqli_real_escape_string($mysqli, $_POST['app_date']);
$app_time = mysqli_real_escape_string($mysqli, $_POST['app_time']);


// incase of deletion
$user_del = 0;
$doc_del = 0;

if (!empty($docspec) && !empty($docfees) && !empty($app_date) && !empty($app_time)) {
    
    // selecting specialization
    $specSel = "SELECT * FROM specialization WHERE id=$docspec";
    $res = mysqli_query($mysqli, $specSel);
    $myRow = mysqli_fetch_assoc($res);
    $docSpecialization = $myRow['specialization'];

    // selecting doctor
    $docSel = "SELECT * FROM doctors WHERE specialization_id=$docspec";
    $myRes = mysqli_query($mysqli, $docSel);
    $row1 = mysqli_fetch_assoc($myRes);
    $docId = $row1['id'];

    // selecting user
    $selUser = "SELECT id FROM users WHERE Fullname='{$_SESSION['patient_name']}'";
    $resUser = mysqli_query($mysqli, $selUser);
    $useRow = mysqli_fetch_assoc($resUser);
    $user_id = $useRow['id'];
    

    // inserting appointment into the table
    $app_insert = "INSERT INTO appointments(docspec, doc_id, user_id, cons_fees, appointment_date, appointment_time, user_delete, doctor_delete)
                                VALUES('$docSpecialization', $docId, $user_id, $docfees, '$app_date', '$app_time', $user_del, $doc_del)";
    $result = mysqli_query($mysqli, $app_insert);

    // if the data is inserted successfuly
    if ($result) {
        echo "Success";
    }else{
        echo "Something Went Wrong. Try Again!!";
    }

}else{
    echo "All Fields are Required";
}

?>
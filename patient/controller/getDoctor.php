<?php

include_once "config.php";


// getting doctor's name
if ($_POST['doctor_id']) {
    $query = "SELECT * FROM doctors WHERE specialization_id=".$_POST['doctor_id'];
    $res = mysqli_query($mysqli, $query);
    
    // check if the id exists
    if (mysqli_num_rows($res) > 0) {
        echo '<option value="">Select Doctor</option>';
        while ($row1 = mysqli_fetch_assoc($res)) {
            echo '<option value='.$row1['id'].'>'.$row1['DocName'].'</option>';
        }
    }else{
        echo '<option>No Doctor Found</option>';
    }
}

// getting doctor's consultancy fees
if ($_POST['doc_fees']) {
    $myQuery = "SELECT * FROM doctors WHERE id=".$_POST['doc_fees'];
    $result = mysqli_query($mysqli, $myQuery);

    // check if the id exists
    if (mysqli_num_rows($result)) {
        echo '<option>Doctor consultation fee</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['Fees'].'>'.$row['Fees'].'</option>';
        }
    }else {
        echo '<option>No Fee Found</option>';
    }
}


?>


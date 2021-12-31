<?php

include "config.php";


$spec = mysqli_real_escape_string($mysqli, $_POST['spec']);

if(!empty($spec)){
    // check if the specialization already exists
    $checkQuery = "SELECT specialization FROM specialization WHERE specialization='{$spec}'";
    $res = mysqli_query($mysqli, $checkQuery);

    // if the specialization exists
    if (mysqli_num_rows($res) > 0) {
        echo "$spec - already exists";
    }else{
        // Insert the specialization into the database
        $insertSql = "INSERT INTO specialization(specialization) VALUES('$spec')";
        $resultInsert = mysqli_query($mysqli, $insertSql);

        // if the data is inserted successfully
        if ($resultInsert) {
            echo "Success";
        }else{
            echo "Something Went Wrong!!";
        }
    }
}

?>
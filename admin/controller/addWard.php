<?php

include "config.php";

$wardname = mysqli_real_escape_string($mysqli, $_POST['wardname']);
$rooms = mysqli_real_escape_string($mysqli, $_POST['room']);



if (!empty($wardname) && !empty($rooms)) {
    

    // checking if the ward name is already in the database
    $checkQuery = "SELECT WardName from wards WHERE WardName ='{$wardname}'";
    $res = mysqli_query($mysqli, $checkQuery);

    // if email exists
    if (mysqli_num_rows($res) > 0) {
        echo "$wardname - is already in the database";
    }else{
        // inserting the doctor's data into the database
        $insertSql = "INSERT INTO wards(WardName, Rooms)
                        VALUES('{$wardname}', '{$rooms}')";
        $result = mysqli_query($mysqli, $insertSql);

        // if the data is inserted successfully
        if ($result) {
            echo "Success";
        }else{
            "Something Went wrong. Try again!!";
        }
    }

}else{
    echo "All fields are required!!!";
}

?>
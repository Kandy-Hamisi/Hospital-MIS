<?php

include "config.php";

$roomname = mysqli_real_escape_string($mysqli, $_POST['roomname']);
$beds = mysqli_real_escape_string($mysqli, $_POST['beds']);
$status = "Available";


if (!empty($roomname) && !empty($beds)) {
    

    // checking if the ward name is already in the database
    $checkQuery = "SELECT * from Beds WHERE BedName ='{$beds}'";
    $res = mysqli_query($mysqli, $checkQuery);

    // if email exists
    if (mysqli_num_rows($res) > 0) {
        echo "$beds already exits";
    }else{
        // inserting the rooms data into the database
        $insertSql = "INSERT INTO Beds(RoomId, BedName, Status)
                        VALUES('{$roomname}', '{$beds}', '{$status}')";
        $result = mysqli_query($mysqli, $insertSql);

        // if the data is inserted successfully
        if ($result) {
            echo "Success";
        }else{
            // echo "Something Went wrong. Try again!!";
            printf("Error: %s\n", mysqli_error($mysqli));
        }
    }

}else{
    echo "All fields are required!!!";
}




?>
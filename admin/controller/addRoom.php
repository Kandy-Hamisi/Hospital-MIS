<?php

include "config.php";

$wardname = mysqli_real_escape_string($mysqli, $_POST['wardname']);
$rooms = mysqli_real_escape_string($mysqli, $_POST['rooms']);   


if (!empty($wardname) && !empty($rooms)) {
    

    // checking if the ward name is already in the database
    $checkQuery = "SELECT * from Rooms WHERE RoomName ='{$rooms}'";
    $res = mysqli_query($mysqli, $checkQuery);

    // if email exists
    if (mysqli_num_rows($res) > 0) {
        echo "$rooms already exits";
    }else{
        // inserting the rooms data into the database
        $insertSql = "INSERT INTO Rooms(WardID, RoomName)
                        VALUES('{$wardname}', '{$rooms}')";
        $result = mysqli_query($mysqli, $insertSql);

        // if the data is inserted successfully
        if ($result) {
            echo "Success";
        }else{
            echo "Something Went wrong. Try again!!";
        }
    }

}else{
    echo "All fields are required!!!";
}




?>
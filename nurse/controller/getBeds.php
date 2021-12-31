<?php

include_once "config.php";


// getting doctor's name
if ($_POST['room_id']) {
    $query = "SELECT * FROM Rooms WHERE WardID=".$_POST['room_id'];
    $res = mysqli_query($mysqli, $query);
    
    // check if the id exists
    if (mysqli_num_rows($res) > 0) {
        echo '<option value="">Select Room</option>';
        while ($row1 = mysqli_fetch_assoc($res)) {
            echo '<option value='.$row1['id'].'>'.$row1['RoomName'].'</option>';
        }
    }else{
        echo '<option>No Room Found</option>';
    }
}

// getting doctor's consultancy fees
if ($_POST['beds_id']) {
    $myQuery = "SELECT * FROM Beds WHERE RoomId='{$_POST['beds_id']}' AND Status='Available'";
    $result = mysqli_query($mysqli, $myQuery);

    // check if the id exists
    if (mysqli_num_rows($result)) {
        echo '<option>Select Bed</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['BedName'].'>'.$row['BedName'].'</option>';
        }
    }else {
        echo '<option>No Bed Found</option>';
    }
}


?>


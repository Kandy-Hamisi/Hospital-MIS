<?php

include 'config.php';

$patname = mysqli_real_escape_string($mysqli, $_POST['patname']);
$wardname = mysqli_real_escape_string($mysqli, $_POST['wardname']);
$rooms = mysqli_real_escape_string($mysqli, $_POST['rooms']);
$beds = mysqli_real_escape_string($mysqli, $_POST['beds']);


if (!empty($patname) && !empty($wardname) && !empty($rooms) && !empty($beds)) {
	
	// select wards
	$wardSel = "SELECT * FROM wards WHERE id=$wardname";
	$ret = mysqli_query($mysqli, $wardSel);
	$r = mysqli_fetch_assoc($ret);
	$ward = $r['WardName'];

	// select rooms
	$roomSel = "SELECT * FROM Rooms WHERE id=$rooms";
	$return = mysqli_query($mysqli, $roomSel);
	$row = mysqli_fetch_assoc($return);
	$room = $row['RoomName'];

	// select Patients
	$patSel = "SELECT * FROM BedStatus WHERE PatientName='{$patname}'";
	$res = mysqli_query($mysqli, $patSel);


	if (mysqli_num_rows($res) > 0) {
		echo "$patname - already has a bed allocated to";
	}else{ 

		// insert into BedStatus
		$statInsert = "INSERT INTO BedStatus(PatientName, WardName, RoomName, BedName) VALUES('$patname', '$ward', '$room', '$beds')";
		$result = mysqli_query($mysqli, $statInsert);

		if ($result) {
			echo "Success";
			// update bed availability
			$bedupdate = "UPDATE Beds SET Status='Occupied' WHERE BedName = '$beds'";
			$feed = mysqli_query($mysqli, $bedupdate);
			if ($feed) {
				echo "<script>window.alert('Bed is now occupied')</script>";
			}else{
				echo "<script>window.alert('Error')</script>";
			}
		}else{
			printf("Error: %s\n", mysqli_error($mysqli));
		}

		// 
	}

}else{
	echo "All Fields are required";
}



?>
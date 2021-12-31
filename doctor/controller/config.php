<?php

$mysqli = mysqli_connect("localhost", "root", "", "segaHospital");

if(!$mysqli){
    echo "<script>window.alert('Could not connect to the databse')</script>";
}

?>
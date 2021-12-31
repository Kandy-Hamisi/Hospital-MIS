<?php

include_once "config.php";

$spec = mysqli_real_escape_string($mysqli, $_POST['spec']);
$docname = mysqli_real_escape_string($mysqli, $_POST['docname']);
$fee = mysqli_real_escape_string($mysqli, $_POST['fees']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$docId = (isset($_GET['edit']) ? $_GET['edit'] : null);



if (!empty($spec) && !empty($docname) && !empty($fee) && !empty($address) && !empty($phone)) {
    
    // update the doctors details

    $docupdate = "UPDATE doctors SET specialization_id={$spec}, DocName='{$docname}',
     Address='{$address}', Fees=$fee, Phone='{$phone}' WHERE id=$docId";
    $ret = mysqli_query($mysqli, $docupdate);
    if ($ret) {
        echo "Success";
    }else{
        
        printf("Error: %s\n", mysqli_error($mysqli));
        echo $docid;
    }
}else{
    echo "All Fields Are Required";
}


?>
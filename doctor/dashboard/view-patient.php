<?php 

session_start();


include_once "../controller/config.php"; 
// require_once "../controller/medhis.php";

if (isset($_POST['submit'])) {
    
    $sugar = mysqli_real_escape_string($mysqli, $_POST['sugar']);
    $pressure = mysqli_real_escape_string($mysqli, $_POST['pressure']);
    $weight = mysqli_real_escape_string($mysqli, $_POST['weight']);
    $temp = mysqli_real_escape_string($mysqli, $_POST['temp']);
    $presc = mysqli_real_escape_string($mysqli, $_POST['presc']);
    $patID = (isset($_GET['viewid']) ? $_GET['viewid'] : null);

    if (!empty($pressure) && !empty($sugar) && !empty($weight) && !empty($temp) && !empty($presc)) {
        
        // Inserting the details into the db
        $medInsert = "INSERT INTO medicalhistory(PatientID, BloodPressure, BloodSugar, Weight, Temperature, Prescription)
                VALUES('$patID', '$pressure', '$sugar', '$weight', '$temp', '$presc')";
        $medRet = mysqli_query($mysqli, $medInsert);

        // if data inserted Successfully
        if ($medRet) {
            echo "<script>alert('success')</script>";
            echo $patID;
        }else{
            printf("Error: %s\n", mysqli_error($mysqli));
        }
    }else{
        echo "<script>alert('All fields are Required')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sb-admin-2.js"></script>

    <!-- Datatable scripts -->
    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="vendor/DataTable/DataTables-1.10.25/css/jquery.dataTables.css">
  
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> -->
<script src="vendor/DataTable/DataTables-1.10.25/js/jquery.dataTables.js"></script>

    <!-- dataTables css link -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <title>My admin Panel</title>
</head>
<body id="page-top">
    
    <!-- Page wrapper -->
    <div id="wrapper">

        <!-- including the page sidebar -->
        <?php include_once "partials/sidebar.php"; ?>

        <!-- Content-wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            
                <!-- including the topbar/navbar -->
                <?php include_once "partials/navbar.php"; ?>
            
                
                <!-- Beginning Page Content -->
                <div class="container-fluid">
                    <!-- page heading -->
                    <h1 class="h3 mb-2 text-gray-800">User Medical History</h1>
                    
                    <!-- patients info table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold">Patient Info</h3>
                        </div>
                        <?php
                            $selPat = "SELECT * FROM patients WHERE id={$_GET['viewid']}";
                            $runq = mysqli_query($mysqli, $selPat);
                            $patRow = mysqli_fetch_array($runq);
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered" id="dataTable">
                                    <tr>
                                        <th colspan="4">Patient Details</th>
                                        
                                    </tr>
                                    <tr>
                                        <th>Patient Name</th>
                                        <td><?php echo $patRow['PatientName']; ?></td>
                                        <th>Patient Email</th>
                                        <td><?php echo $patRow['Email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Mobile Number</th>
                                        <td><?php echo $patRow['Contact']; ?></td>
                                        <th>Patient Address</th>
                                        <td><?php echo $patRow['Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Gender</th>
                                        <td><?php echo $patRow['Gender']; ?></td>
                                        <th>Patient Age</th>
                                        <td><?php echo $patRow['Age']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Medical History(if any)</th>
                                        <td><?php echo $patRow['Med_history']; ?></td>
                                        <th>Patient Reg Date</th>
                                        <td><?php echo $patRow['CreateDate']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- DataTables Test -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Medical History</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-repsonsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Blood Pressure</th>
                                            <th>Weight</th>
                                            <th>Blood Sugar</th>
                                            <th>Body Temperature</th>
                                            <th>Medical Prescription</th>
                                            <th>Visit Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Blood Pressure</th>
                                            <th>Weight</th>
                                            <th>Blood Sugar</th>
                                            <th>Body Temperature</th>
                                            <th>Medical Prescription</th>
                                            <th>Visit Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // selecting doctor

                                            // $selUser = "SELECT id FROM doctors WHERE DocName='{$_SESSION['doc_name']}'";
                                            // $run = mysqli_query($mysqli, $selUser);
                                            // $useRow = mysqli_fetch_assoc($run);
                                            // $doc_id = $useRow['id'];



                                            $sql = "SELECT * FROM medicalhistory WHERE PatientID={$_REQUEST['viewid']}";
                                            $result = mysqli_query($mysqli, $sql);
                                            
                                        ?>
                                        <?php while($myRow = mysqli_fetch_assoc($result)): ?>
                                            
                                            <tr>
                                                <td><?php echo $myRow['BloodPressure']; ?></td>
                                                <td><?php echo $myRow['Weight']; ?></td>
                                                <td><?php echo $myRow['BloodSugar']; ?></td>
                                                <td><?php echo $myRow['Temperature']; ?></td>
                                                <td><?php echo $myRow['Prescription']; ?></td>
                                                <td><?php echo $myRow['CreationDate']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- adding medical history -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="font-weight-bold text-primary">Add Medical History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive myForm">
                            <form method="POST">
                                            
                                <div class="error-text"></div>
                                <table class="table-bordered table" id="dataTable">
                                    <tr>
                                        <th>Blood Pressure:</th>
                                        <td>
                                            <input type="text" class="form-control" name="pressure" id="pressure" placeholder="<?php echo $patRow['id']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood Sugar:</th>
                                        <td>
                                            <input type="text" class="form-control" name="sugar" id="sugar" placeholder="Blood Sugar">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Body Weight:</th>
                                        <td>
                                            <input type="text" class="form-control" name="weight" id="weight" placeholder="Body Weight">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Body Temperature:</th>
                                        <td>
                                            <input type="text" class="form-control" name="temp" id="temp" placeholder="Body Temperature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Prescription:</th>
                                        <td>
                                            <textarea name="presc" id="" cols="30" rows="10" placeholder="medical Prescription"></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <div class="myButton">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Medical History">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>

                

            </div>
        </div>
    </div>

    

    <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );
    
    </script>
    
</body>
</html>
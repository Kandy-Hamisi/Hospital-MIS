<?php 

session_start();

include_once "../controller/config.php";

if (isset($_GET['delid'])) {
    
    $bedStatId = $_GET['delid'];

    // sel from bedstatus
    $selstatus = "SELECT * FROM BedStatus";
    $return = mysqli_query($mysqli, $selstatus);
    $row = mysqli_fetch_assoc($return);
    $bed = $row['BedName'];

    $delStat = "DELETE FROM BedStatus WHERE id=$bedStatId";
    $ret = mysqli_query($mysqli, $delStat);

    if ($ret) {
        
        // update bed status
        $bedupdate = "UPDATE Beds SET Status='Available' WHERE BedName='$bed'";
        $feed = mysqli_query($mysqli, $bedupdate);
        if ($feed) {
            echo "<script>window.alert('Bed is now made available')</script>";
            echo "<script>window.location='view-bedstat.php'</script>";
        }else{
            echo "<script>window.alert('Error in updating')</script>";
        }
    }else{
            
            printf("Error: %s\n", mysqli_error($mysqli));
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

    <link rel="stylesheet" type="text/css" href="vendor/icofont/icofont.min.css">

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
                    <h1 class="h3 mb-2 text-gray-800">Patient Bed Allocation</h1>
                    

                    <!-- DataTables Test -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">View Medical History</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-repsonsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Patients Name</th>
                                            <th>Ward Name</th>
                                            <th>Room Name</th>
                                            <th>Bed Name</th>
                                            <th>Allocation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Patients Name</th>
                                            <th>Ward Name</th>
                                            <th>Room Name</th>
                                            <th>Bed Name</th>
                                            <th>Allocation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // selecting bedstatus

                                            $selStat = "SELECT * FROM BedStatus";
                                            $run = mysqli_query($mysqli, $selStat);
                                            
                                        ?>
                                        <?php while($myRow = mysqli_fetch_assoc($run)): ?>
                                            
                                            <tr>
                                                <td><?php echo $myRow['PatientName']; ?></td>
                                                <td><?php echo $myRow['WardName']; ?></td>
                                                <td><?php echo $myRow['RoomName']; ?></td>
                                                <td><?php echo $myRow['BedName']; ?></td>
                                                <td><?php echo $myRow['AllocationDate']; ?></td>
                                                <td><a href="view-bedstat.php?delid=<?php echo $myRow['id'];?>"><i class="icofont-ui-delete"></i></a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                </table>
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
<?php 

session_start();
if (isset($_SESSION['admin_name'])) {
    include_once "../controller/config.php";
}else {
    header("Location:../login.php");
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
    <title>Sega | Admin module</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Manage Patients</h1>
                    

                    <!-- DataTables Test -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">View Patients</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-repsonsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Patients Name</th>
                                            <th>Contact Number</th>
                                            <th>Patient Gender</th>
                                            <th>Creation Date</th>
                                            <th>Allocation</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Patients Name</th>
                                            <th>Contact Number</th>
                                            <th>Patient Gender</th>
                                            <th>Creation Date</th>
                                            <th>Allocation</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // selecting doctor

                                            // $selUser = "SELECT id FROM doctors";
                                            // $run = mysqli_query($mysqli, $selUser);
                                            // $useRow = mysqli_fetch_assoc($run);
                                            // $doc_id = $useRow['id'];



                                            $sql = "SELECT * FROM patients";
                                            $result = mysqli_query($mysqli, $sql);
                                            
                                        ?>
                                        <?php while($myRow = mysqli_fetch_assoc($result)): ?>
                                            
                                            <tr>
                                                <td><?php echo $myRow['PatientName']; ?></td>
                                                <td><?php echo $myRow['Contact']; ?></td>
                                                <td><?php echo $myRow['Gender']; ?></td>
                                                <td><?php echo $myRow['CreateDate']; ?></td>
                                                <td><?php echo $myRow['Allocation']; ?></td>
                                                <td><?php echo $myRow['Update_Date']; ?></td>
                                                <td><a href="view-patients.php?viewid=<?php echo $myRow['id'];?>"><i class="fa fa-eye"></i></a></td>
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
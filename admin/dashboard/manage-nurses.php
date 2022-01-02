<?php 

session_start();
if (isset($_SESSION['admin_name'])) {
    include_once "../controller/config.php";

    // if delete link is clicked
    if (isset($_GET['delete'])) {
        
        $nurseID = $_GET['delete'];

        $delQuery = "DELETE FROM nurses WHERE id = $nurseID";
        $run = mysqli_query($mysqli, $delQuery);

        if ($run) {
            echo "<script>window.location='manage-nurses.php'</script>";
        }else{
            echo "<script>window.alert('Something Went Wrong!')</script>";
        }
    }
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

    <!-- link to icofont -->
    <link rel="stylesheet" href="vendor/icofont/icofont.min.css">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <title>Sega | Admin module</title>
    <style>
        .action-icons{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .action-icons > a{
            padding-right: 10px;
        }
    </style>
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
                    <h1 class="h3 mb-2 text-gray-800">Admin | Manage Nurses</h1>
                    
                    <!-- doctor's info table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold">Nurses's Listing</h3>
                        </div>

                        <?php 
                            // selecting doctors from the db
                            $selDoc = "SELECT * FROM nurses";
                            $retd = mysqli_query($mysqli, $selDoc);
                            
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nurse Name</th>
                                            <th>Nurse Department</th>
                                            <th>Nurse COntact</th>
                                            <th>Nurse Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nurse Name</th>
                                            <th>Nurse Department</th>
                                            <th>Nurse COntact</th>
                                            <th>Nurse Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($myRow = mysqli_fetch_assoc($retd)): ?>
                                            
                                        <tr>
                                            <td><?php echo $myRow['NurseName']; ?></td>
                                            <td><?php echo $myRow['Department']; ?></td>
                                            <td><?php echo $myRow['Phone'];?></td>
                                            <td><?php echo $myRow['Email'];?></td>
                                            <td class="action-icons">
                                                <!-- <a href="edit-nurse.php?edit=<?php echo $myRow['id']; ?>"><i class="icofont-ui-edit"></i></a> -->
                                                <a href="manage-nurses.php?delete=<?php echo $myRow['id']; ?>"><i class="icofont-ui-delete"></i></a>
                                            </td>
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
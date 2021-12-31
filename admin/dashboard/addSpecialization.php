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
    <title>My admin Panel</title>
    <style>
        .split-managements{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }
        .myCard{
            width: 400px !important;
            padding: 40px 30px;
        }
        .addspec form .error-text{
            color: #721c24;
            background: #f8d7da;
            padding: 8px 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #f5c6cb;
            display: none;
        }
        .error-text.greener{
            color: #fff !important;
            background: green !important;
            padding: 8px 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #f5c6cb;
            display: none;
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
                    <h1 class="h3 mb-2 text-gray-800">Add Specializarions</h1>
                    <p>Note that specializations cannot be inserted more than once</p>

                    <section class="spec-formSection">
                        <div class="card myCard addspec">
                            <h5>Doctor Specialization</h5>
                            <form action="" method="POST">
                                <div class="error-text">There is an error</div>
                                <div class="form-group input field">
                                    <label for="docspec">Doctor Specialization</label>
                                    <input type="text" class="form-control" placeholder="Enter Doctor Specialization" name="spec">
                                </div>
                                <div class="form-group myButton">
                                    <input type="button" value="Add Specification" name="add_spec" id="" class="btn btn-outline-primary">
                                </div>
                            </form>
                        </div>
                    </section>

                    

                </div>

            </div>
        </div>
    </div>

    <script>
//         $(document).ready( function () {
//     $('#dataTable').DataTable();
// } );
    
    </script>
    <script src="../Javascript/addspec.js"></script>
</body>
</html>
<?php 

session_start();
error_reporting(0);
if (isset($_SESSION['admin_name'])) {
    include_once "../controller/config.php";

    $docid = (isset($_GET['edit']) ? $_GET['edit'] : null);

    echo $docid;

    if (isset($_POST["submit"])) {
        $spec = mysqli_real_escape_string($mysqli, $_POST['spec']);
        $docname = mysqli_real_escape_string($mysqli, $_POST['docname']);
        $fee = mysqli_real_escape_string($mysqli, $_POST['fees']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);



        if (!empty($spec) && !empty($docname) && !empty($fee) && !empty($address) && !empty($phone)) {
            
            // update the doctors details

            $docupdate = "UPDATE doctors SET specialization_id={$spec}, DocName='{$docname}',
            Address='{$address}', Fees=$fee, Phone='{$phone}' WHERE id=$docid";
            $ret = mysqli_query($mysqli, $docupdate);
            if ($ret) {
                echo "<script>alert('Success')</script>";
            }else{
                echo "<script>alert('Something Went Wrong')</script>";
            }
        }else{
            echo "<script>alert('All Fields Are Required')</script>";
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
    <title>My admin Panel</title>
    <style>
        .action-icons{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .action-icons > a{
            padding-right: 10px;
        }
        form .error-text{
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
                    <h1 class="h3 mb-2 text-gray-800">Admin | Edit Doctor's Details</h1>
                    <?php 
                            // selecting doctors from the db
                            $selDoc = "SELECT * FROM doctors WHERE id=$docid";
                            $retd = mysqli_query($mysqli, $selDoc);
                            $docRow = mysqli_fetch_assoc($retd);
                        ?>
                    
                    <!-- doctor's info table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold">Doctor's Details</h3>
                            <div class="pat-info">
                                <h5><?php echo $docRow['DocName']. "'s " ?>Profile</h5>
                                <h6>Creation Date: <?php echo $docRow['CreateDate']; ?></h6>
                                <h6>Updation Date: <?php echo $docRow['UpdationDate']; ?></h6>
                            </div>
                        </div>

                        
                        <div class="card-body updateForm">
                            <!-- form -->
                            <form action="" method="POST">
                                <div class="error-text"></div>
                                <div class="form-group">
                                    <label for="spec">Doctor Specialization</label>
                                    <select name="spec" id="" class="form-control">
                                        <?php
                                            // select specialization
                                            $specsel = "SELECT * FROM specialization";
                                            $ret = mysqli_query($mysqli, $specsel);
                                        ?>
                                        <option value="">Select specialization</option>
                                        <?php while($speRow = mysqli_fetch_assoc($ret)): ?>
                                            <option value="<?php echo $speRow['id']; ?>"><?php echo $speRow['specialization']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="docname">Doctor's Name</label>
                                    <input type="text" class="form-control" name="docname" id="" value="<?php echo $docRow['DocName']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Doctor's Address</label>
                                    <input type="text" class="form-control" name="address" id="" value="<?php echo $docRow['Address']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fees">Doctor's Fees</label>
                                    <input type="text" class="form-control" name="fees" id="" value="<?php echo $docRow['Fees']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Doctor's Phone</label>
                                    <input type="text" class="form-control" name="phone" id="" value="<?php echo $docRow['Phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Doctor's Email</label>
                                    <input type="email" class="form-control" name="email" id="" value="<?php echo $docRow['Email']; ?>" disabled>
                                </div>
                                <div class="form-group myButton">
                                    <input type="submit" name="submit" id="" value="Update" class="btn btn-success">
                                </div>
                            </form>
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
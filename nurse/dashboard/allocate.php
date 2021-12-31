<?php 

session_start();


if (isset($_SESSION['nurse_name'])) {
    include_once "../controller/config.php"; 
}else{
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
        .bookAppointment form .error-text{
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
    <script>
        // function to fetch the doctors name via jquery ajax
        function fetchRoom(id) {
                $('#roomname').html('');
                $.ajax({
                    type: 'POST',
                    url: '../controller/getBeds.php',
                    data: { room_id : id},
                    success: function(data){
                        $('#roomname').html(data);
                    }
                })
        }

        // function to fetch the doctors consultancy fees via jquery ajax
        function fetchBeds(val) {
            $('#bedname').html('');
            $.ajax({
                type: 'POST',
                url: '../controller/getBeds.php',
                data: {beds_id : val},
                success: function(data){
                    $('#bedname').html(data);
                }
            })
        }


    </script>

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
                    <h1 class="h3 mb-2 text-gray-800">Nurse | Allocate Bed</h1>
                    <p>Note that only patients who will be alloted wards and beds should be added as in patients.</p>

                    <section class="bed-allocate">
                        <div class="card myCard allocate">
                            <h5>Allocate bed to In-Patients</h5>
                            <form class="form" role="form" method="POST">
                                <div class="error-text">
                                    
                                </div>
                                <div class="form-group field">
                                    <label>Patient Name</label>
                                    <?php 
                                        // select patients
                                        $selPat = "SELECT * from patients WHERE Allocation='In-Patient'";
                                        $return = mysqli_query($mysqli, $selPat);
                                    ?>
                                    <select class="form-control" name="patname">
                                        <option value="">Select patient Name:</option>
                                        <?php while($row = mysqli_fetch_assoc($return)): ?>
                                            <option value="<?php echo $row['PatientName']; ?>"><?php echo $row['PatientName']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group field">
                                    <label>Ward Name:</label>
                                    <?php
                                        // select wardname
                                        $wardSel = "SELECT * FROM wards";
                                        $ret = mysqli_query($mysqli, $wardSel);
                                    ?>
                                    <select class="form-control" name="wardname" onchange="fetchRoom(this.value)">
                                        <option value="">Select Ward</option>
                                        <?php while($myRow = mysqli_fetch_assoc($ret)): ?>
                                            <option value="<?php echo $myRow['id']; ?>"><?php echo $myRow['WardName']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group field">
                                    <label>Room Name:</label>
                                    <select class="form-control" id="roomname" name="rooms" onchange="fetchBeds(this.value)">
                                        <option value="">Select Room</option>
                                    </select>
                                </div>
                                <div class="form-group field">
                                    <label>Bed Name:</label>
                                    <select class="form-control" id="bedname" name="beds">
                                        <option value="">Select Bed</option>
                                    </select>
                                </div>
                                <div class="form-group myButton">
                                    <input type="button" name="" class="btn btn-outline-primary" value="Allocate Bed">
                                </div>
                            </form>
                        </div>
                    </section>

                </div>

            </div>
        </div>
    </div>

    <script>

    
    </script>
    <script src="../Javascript/addBed.js"></script>
</body>
</html>
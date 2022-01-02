<?php 

session_start();


if (isset($_SESSION['patient_name'])) {
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
        function FetchDoc(id) {
                $('#docname').html('');
                $.ajax({
                    type: 'POST',
                    url: '../controller/getDoctor.php',
                    data: { doctor_id : id},
                    success: function(data){
                        $('#docname').html(data);
                    }
                })
        }

        // function to fetch the doctors consultancy fees via jquery ajax
        function FetchFees(val) {
            $('#fees').html('');
            $.ajax({
                type: 'POST',
                url: '../controller/getDoctor.php',
                data: {doc_fees : val},
                success: function(data){
                    $('#fees').html(data);
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
                    <h1 class="h3 mb-2 text-gray-800">Book Appointment with Doctor</h1>
                    <p>Select a doctor specialization and book Appointment</p>

                    <section class="spec-formSection">
                        <div class="card myCard bookAppointment">
                            <h5>Book an Appointment</h5>
                            <form action="" method="POST">
                                <div class="error-text">There is an error</div>
                                
                                <div class="form-group field">
                                <label for="docspec">Select Doctor Specialization</label>
                                    <select name="docspec" id="docspec" class="form-control" onchange="FetchDoc(this.value)">
                                        <option value="">Please Select Specialization</option>
                                        <?php 
                                            $chooseSql = "SELECT * FROM specialization";
                                            $ret = mysqli_query($mysqli, $chooseSql);
                                        ?>
                                        <?php while($myRow = mysqli_fetch_assoc($ret)): ?>
                                            <option value="<?php echo $myRow['id']; ?>"><?php echo $myRow['specialization']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group field">
                                    <label for="docname"></label>
                                    <select name="docname" id="docname" class="form-control" onchange="FetchFees(this.value)">
                                        <option value="">Select Doctor</option>
                                    </select>
                                </div>
                                <div class="form-group field">
                                    <label for="fees">Consultancy Fees</label>
                                    <select name="fees" id="fees" class="form-control" readonly></select>
                                </div>
                                
                                <div class="form-group field">
                                    <label for="">Pick Appointment Date</label>
                                    <input type="date" name="app_date" id="date" class="form-control" placeholder="Enter Appointment Date">
                                </div>
                                <div class="form-group field">
                                    <label for="time">Time</label>
                                    <input type="time" name="app_time" id="time" placeholder="<?php echo Date('h:m'); ?>">
                                </div>
                                
                                
                                <div class="form-group myButton">
                                    <input type="button" value="Book Appointment" name="book_aptmnt" id="" class="btn btn-outline-primary">
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
    <script src="../Javascript/appointment.js"></script>
</body>
</html>
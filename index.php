<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src="js/main.js"></script>
    <!-- link to main css -->
    <link rel="stylesheet" href="css/welcome.css">
    <title>Sega Hospital</title>
</head>
<body>
    <!-- header section-->
    <section class="header-section">
        <header class="myHeader">
            <div class="header-logo">
                <h1 class="myLogo">Sega Hospital</h1>
            </div>

            <!-- navbar area -->
            <!-- <ul class="mynav">
                <li class="nav-item"><a class="nav-link" href="patient/signUp.php">Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="patient/login.php">Login</a></li>
            </ul> -->
        </header>
    </section>

    <!-- hero section -->
    <section class="hero-section">
        <div class="hero-intro intro">
            <h1>Welcome to sega hospital</h1>
            <h4>fuatilia afya yako</h4>
        </div>
    </section>

    <section class="module-section">
        <div class="intro module-intro">
            <h1 class="title module-title">Sega Hospital Modules</h1>
        </div>

        <div class="module-splitter">
            <div class="mycard">
                <div class="mycard-header">
                    <h4 class="heading">User Module</h4>
                </div>
                <div class="mycard-body">
                    <h6>User can perform the following functions</h6>
                    <ul class="functions">
                        <li>Book Appointment</li>
                        <li>View medical history</li>
                        <li>View Appointment History</li>
                    </ul>
                </div>
                <div class="mycard-footer">
                    <button id="patientbtn">Sign in</button>
                </div>
            </div>
            <div class="mycard">
                <div class="mycard-header">
                    <h4 class="heading">Doctor Module</h4>
                </div>
                <div class="mycard-body">
                    <h6>Doctor can perform the following functions</h6>
                    <ul class="functions">
                        <li>Add Patient</li>
                        <li>Administer medical prescription</li>
                        <li>Insert patient medical history</li>
                    </ul>
                </div>
                <div class="mycard-footer">
                    <button id="docbtn">Sign In</button>
                </div>
            </div>
            <div class="mycard">
                <div class="mycard-header">
                    <h4 class="heading">Admin Module</h4>
                </div>
                <div class="mycard-body">
                    <h6>Admin can perform the following functions</h6>
                    <ul class="functions">
                        <li>View Appointment History</li>
                        <li>View medical history</li>
                        <li>Manage all operations</li>
                    </ul>
                </div>
                <div class="mycard-footer">
                    <button id="adminbtn">Sign In</button>
                </div>
            </div>
            <div class="mycard">
                <div class="mycard-header">
                    <h4 class="heading">Nurse Module</h4>
                </div>
                <div class="mycard-body">
                    <h6>Nurse can perform the following functions</h6>
                    <ul class="functions">
                        <li>View available beds</li>
                        <li>Allocate bed to patients</li>
                        <li>Manage bed allocation</li>
                    </ul>
                </div>
                <div class="mycard-footer">
                    <button id="nursebtn">Sign In</button>
                </div>
            </div>
        </div>
    </section>

    <section class="myfooter">
        <footer class="footer">
            <p>All rights reserved <?php echo Date('Y'); ?></p>
        </footer>
    </section>
</body>
</html>
<?php include_once "includes/header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Sega Hospital Nurse Login</header>
            <form action="" method="POST">
                <div class="error-text"></div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password">
                    <i class="icofont-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Dashboard">
                </div>
            </form>
            <div class="link">Dont have an account? <a href="signUp.php">SignUp Now</a></div>
        </section>
    </div>


    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/login.js"></script>
</body>
</html>
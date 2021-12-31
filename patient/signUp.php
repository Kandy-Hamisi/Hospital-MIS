<?php include_once("includes/header.php"); ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Sega Hospital - Create Account</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your Email" required>
                </div>
                <div class="field input">
                    <label for="">Address</label>
                    <input type="text" name="address" id="">
                </div>
                <div class="field input">
                    <label for="">City</label>
                    <input type="text" name="city" id="">
                </div>
                <div class="field input">
                    <label for="">Age</label>
                    <input type="number" name="age" id="">
                </div>
                <div class="field radios">
                    <input type="radio" name="gender" id="" value="Male">Male
                    <input type="radio" name="gender" id="" value="Female">Female
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                    <i class="icofont-eye"></i>
                </div>
                
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login Now</a></div>
        </section>
    </div>
    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/signup.js"></script>
</body>
</html>
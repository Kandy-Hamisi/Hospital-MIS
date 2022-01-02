<?php

// Importing PHpMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// load composer's autoloader
require "../../vendor/autoload.php";

// including the database connection

include "config.php";




// getting form data from user

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
$fullname = $fname. " " .$lname;

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($city) && !empty($address) && !empty($age) && !empty($gender) && !empty($password)) {
    
    // checking if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // checking if email already exists
        $checkQuery = "SELECT Email from users WHERE Email='{$email}'";
        $res = mysqli_query($mysqli, $checkQuery);

        // if email exists
        if (mysqli_num_rows($res) > 0) {
            echo "$email - already exists";
        }else{
            // inserting all user data into the table
            $insertSql = "INSERT INTO users(Fullname, User_address, City, Gender, Email, PassCode, Age)
                        VALUES('{$fullname}', '{$address}', '{$city}', '{$gender}', '{$email}', '{$password}', {$age})";
            $resultinsert =mysqli_query($mysqli, $insertSql);

            // if data is inserted successfully
            if ($resultinsert) {
                $sql = "SELECT * FROM users WHERE Email = '{$email}'";
                $resSql = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($resSql)) {
                    $row = mysqli_fetch_assoc($resSql);
                    $_SESSION['patient_name'] = $row['Fullname'];
                    // echo "Success";

                    // handle mailing
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'your email';                     //SMTP username
                        $mail->Password   = 'your email password';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                        //Recipients
                        $mail->setFrom('your email', 'Sega Hospital');
                        $mail->addAddress($email, $fname);     //Add a recipient
                        $mail->addAddress($email);               //Name is optional
                        $mail->addReplyTo('your email', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Welcome Message';
                        $mail->Body    = $fname." ". $lname. ' Thank you for joining SegaHospital. Stay tuned for our new emails.';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                        
                        if ($mail->send()) {
                            echo "Success";
                        }
                        
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                }
            }else{
                echo "Something Went Wrong!!";
            }
        }
    }else{
        echo "$email - is not a valid email";
    }
}else{
    echo "All Fields are Required!!";
}


?>
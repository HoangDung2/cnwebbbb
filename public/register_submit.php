<?php

session_start();
$_SESSION['mail'] = $_POST['email'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;                   
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $_ENV['MY_MAIL'];                     
        $mail->Password   = $_ENV['PASS_MAIL'];                               
        $mail->SMTPSecure = 'tls';           
        $mail->Port       = 587;                               
        $mail->setFrom($_ENV['MY_MAIL'], 'Review Phim');
        $mail->addAddress($_POST['email'], $_POST['name']);               
        $mail->isHTML(true);                                  
        $mail->Subject = '';
        $mail->Body    = 'Bạn đã đăng kí thành công';
        $mail->AltBody = '';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    include('../config.php');

if(isset($_POST['submit']) && $_POST['name'] != '' && $_POST['location'] != '' && $_POST['phone'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['password_confirmation'] != ''){
    $name = $_POST["name"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];

    if( $password != $password_confirmation ){
        header("location:register.php");
        die();
    }

    $sqll = "SELECT * FROM users WHERE name='$name'";
    $old = mysqli_query($connect, $sqll);

    if( mysqli_num_rows($old) > 0 ) {
        header("location:register.php");
        die();
    }

    $sql = "INSERT INTO users (name,location,phone,email,password,created) VALUES ('$name','$location','$phone','$email','$password', now())";
    mysqli_query($connect, $sql);
    header("location:login.php");
}
else {
    header("location:register.php");
}
?>
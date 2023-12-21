<?php
  require "../vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $message = $message . "\n\n" ."Sender Info\n"."Name: " .$name . "\nEmail: " . $email;

  $mail = new PHPMailer(true); 
  $mail->isSMTP();//method
  $mail->SMTPAuth = true;//property

  //configuring the smtp server
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail-> Port = 587;

    $mail->Username = "forpecs@gmail.com";
    $mail->Password = "nefr lgky czcj ursl";

    $mail->setFrom($email, $name);
    $mail->addAddress("nyabutofelix@outlook.com");

    $mail->Subject = $subject;
    $mail->Body = $message;

    if($mail->send()){;
    echo '<script>alert("Message sent successfully")</script>';
    echo '<script>setTimeout(function(){ window.location.href = "../index.php#contact"; }, 1000);</script>';

    }else{
    echo '<script>alert("Something went wrong. Try again.")</script>';
    echo '<script>setTimeout(function(){ window.location.href = "../index.php#contact"; }, 1000);</script>';
    }
?>

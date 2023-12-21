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

    $mail->send();
    // header("Location: sent.html");
    // echo "Sent successfully";
    
?>

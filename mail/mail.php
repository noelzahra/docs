<?php
  if (isset($_POST['submit'])) {
    require 'phpmailer/PHPMailerAutoLoad.php';

    function sendemail($to, $from, $fromName, $body) {
        $mail = new PHPMailer();
        $mail->setFrom($from, $fromName);
        $mail->addAddress($to);
        $mail->Subject = 'Portfolio reply';
        $mail->Body = $body;
        $mail->isHTML( false );

        return $mail->send();
    }
  
    $name = $_POST['username'];
    $email = $_POST['email'];
    $body = $_POST['body'];

    function debug($msg) {
      echo "<script>console.log(\"$msg\")</script>";
    };

   if (sendemail('noelart@maltanet.net', $email, $name, $body)) {
      $msg ='Email sent successfully';
      debug($msg);
      } else {
      $msg ='Email failed';
      debug($msg);
    }
  }
?>
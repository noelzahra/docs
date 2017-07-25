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

   if (sendemail('noelart@maltanet.net', $email, $name, $body)) {
      $msg ='Email sent successfully';
      } else {
      $msg ='Email failed';
    }
  }
?>
<html>
<head>
  <title>PHP Contact Form</title>
</head>
<style type="text/css">
  input, textarea {
    width: 250px;
    height: 27px;
    margin-bottom: 10px;
  }

  textarea {
    height: 150px;
    resize: vertical;
  }

  body {
    text-align: center;
    margin-top: 250px;
  }
</style>
<body>
    <form method="post" action="index.php">
      <input type="text" name="username" placeholder="Name…" required><br>
      <input type="email" name="email" placeholder="Email…" required><br>
      <textarea name="body" placeholder="Message…" required></textarea><br>
      <input type="submit" name="submit" value="Send Email">
    </form>
    <?php echo $msg; ?>
</body>
</html>
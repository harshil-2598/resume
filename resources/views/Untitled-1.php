<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

session_start();



$name = htmlspecialchars(stripslashes(trim($_POST['name'])));

$email = htmlspecialchars(stripslashes(trim($_POST['email'])));

$message = htmlspecialchars(stripslashes(trim($_POST['message'])));

$mobile = htmlspecialchars(stripslashes(trim($_POST['number'])));

// require_once ('akismet/classes/Akismet.class.php');

// require_once ('akismet/classes/Akismet.function.php');



if (isset($name) && trim($name) !== '' && isset($email) && trim($email) !== '' && isset($message) && trim($message) !== '' && isset($mobile) && trim($mobile) !== '') {



  if ($_SESSION["code"] == $_POST['captcha']) {



    // $oMySpamProtection = new MySpamProtection();

    // if($oMySpamProtection->isSpam($email) || $oMySpamProtection->isSpam($message) || $oMySpamProtection->isSpam($name) || $oMySpamProtection->isSpam($phone) || $oMySpamProtection->isSpam($city)){



    //     header('location:http://sahjanandengineering.com/sahjanandengineering-Electric-Chain-Hoist/');



    // }else{



    if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)) {

      //echo "ERROR junk email detact";

      header('location:index.php');
    } else {





      preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $message, $msg_match);



      preg_match_all('/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i', $message, $msg_match_email);











      if (count($msg_match[0]) > 0 || count($msg_match_email[0]) > 0) {



        //echo "ERROR junk msg";

        header('location:index.php');
      } else {







        require_once('phpmailer/src/Exception.php');



        require_once('phpmailer/src/PHPMailer.php');



        require_once('phpmailer/src/SMTP.php');



        $message_body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

  <head>

  <meta http-equiv="content-type" content="text/html; charset=windows-1250">

  <meta name="generator" content="PSPad editor, www.pspad.com">

  <title></title>

  <style type="text/css">span.go{display:none} .go{display:none}</style>

  </head>

  <body>

    <div style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;background:#ffffff;border:10px solid #cccccc;width:600px;padding:20px;margin: 0px auto;">

    <table border="1" cellpadding="5" style="width:500px;font-family:arial;font-size:12px;font-weight:normal;color:#000000;border-collapse:collapse;border:1px solid #cccccc;border-color:#cccccc">

      <tbody>

        <tr>

          <td colspan="2" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;border-bottom:3px solid #cccccc"><b>Enquiry Details</b></td>

        </tr>

        <tr>

          <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Full Name:</td>

          <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $name . '</b></td>

        </tr>

       

        <tr>

          <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">E-mail:</td>

          <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $email . '</b></td>

        </tr>

        <tr>

          <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Phone Number:</td>

          <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $mobile . '</b></td>

        </tr>

        

        <tr>

          <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Message:</td>

          <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;line-height:17px"><b>' . $message . '</b></td>

        </tr>

        <tr>

        </tr>

      </tbody>

    </table>

  </div>

  </body>

</html>

';





        $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
        $mail->IsSMTP(); // telling the class to use SMTP
        try {
          $mail->Host = "mail.smtp2go.com"; // SMTP server
          $mail->SMTPDebug = 0;                    // enables SMTP debug information (for testing)
          $mail->AddAddress('restoknee@gmail.com', 'New Enquiry From Restoknee');
          $mail->SetFrom('bcc1@spartanstechnolabs.com', 'New Enquiry From Restoknee');
          $mail->AddBCC('bluechipclicksleads@gmail.com', 'New Enquiry From Restoknee ');
          $mail->Port = 465;
          $mail->Subject = 'New Enquiry From Restoknee Website ';
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
          $mail->Username = "bluechipclicks1";
          $mail->Password = "National1712!@#";

          $mail->MsgHTML($message_body);
          //$mail->AddAttachment('images/phpmailer.gif');      // attachment
          // $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
          $mail->Send();
          header('location:thankyou.php');
          //echo "Message Sent OK<p></p>\n";

        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
          echo $e->getMessage(); //Boring error messages from anything else!
        }
      }
    }
  }
  //  }

  else {   ?>
    <script>
      if (confirm("You have enter Wrong Captcha.....Please Enter Correct Captcha Code")) {
        window.location.href = "index.php";
      } else {
        window.location.href = "index.php";
      }
    </script>
  <?php

  }
} else { ?>
  <script>
    if (confirm("Please Enter All Details Correct..")) {
      window.location.href = "index.php";
    } else {
      window.location.href = "index.php";
    }
  </script>
<?php
}

?>
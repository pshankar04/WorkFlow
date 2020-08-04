 
<?php
include("./php/class.phpmailer.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
// require 'class.phpmailer.php';
  //echo "Hello";

  if(isset($_POST)){
echo "sent";
      $return_arrfinal = array();
      $status_array['status'] = '1';
      $mail = new PHPMailer();
      $message = $_POST['msg'];
      $emailId = $_POST['email'];
      // $toarraymail=$lastName;
      // $toarraymail="cmuth001@odu.edu";
      $mail->SMTPDebug = false;                               // Enable verbose debug output
      $mail->Port = '587';
      $mail->isSMTP();                                      // Set mailer to use SMTP // Specify main and backup SMTP servers                                    // Set mailer to use SMTP
      $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true; // Authentication must be disabled
      // $mail->Username = 'tasteofindiahr@gmail.com';
      // $mail->Password = 'Toiwebweb22';
      $mail->Username = 'studentrecruitment.csodu@gmail.com';
      $mail->Password = 'Srts@123';
      $mail->SMTPSecure= 'tls';
 

      // $mail->Username = 'studentrecruitment.csodu@gmail.com';
      // $mail->Password = 'Srts@123';
      // $mail->SMTPSecure= 'tls';


      $mail->setFrom('pbikk001@odu.edu',"Puneeth");
      $mail->AddAddress($emailId);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Procurement Portal Update';
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->Send()){
        // return "failed";
        echo "failed";
      }else{
        echo "sent";
      }
  }

?>
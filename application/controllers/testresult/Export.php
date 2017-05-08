<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Export extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        // $this->output('logistics/v_generator_exam');
    }

    public function info(){
    	echo phpinfo();
    }


    public function send_email(){
		
    	require_once APPPATH."/libraries/testresult/PHPMailerAutoload.php";


			$mail = new PHPMailer();  // กำหนดตัวแปร  $mail
			
                                                                 
		    $mail->From = "root@localhost"; // กำหนดอีเมล์ที่ใช้ในการส่ง
		    $mail->FromName = "Administrator Nems"; // กำหนดชื่อผู้ส่ง
		    $mail->Host = "localhost"; // กำหนดที่อยู่โฮส
		    $mail->Mailer = "smtp"; 
		    $mail->AddAddress('dream07312@gmail.com'); // กำหนดอีเมล์ผู้รับ
		    $mail->Subject = "Test Send Email From Nems Server"; // กำหนดหัวข้ออีเมล์
		    $mail->Body = "Hello Message From Nems Server"; // กำหนดเนื้อหาอีเมล์

		    $mail->IsHTML(false); 

		    $mail->SMTPAuth = "true"; 
		    $mail->Username = "root@localhost"; // กำหนดusername ของโฮส
		    $mail->Password = "yD1tD2%T"; // กำหนด password ของโฮส
			if(!$mail->Send()) {
			    echo $mail->Send();
			} else {
			    echo "Message sent!";
			}

		// GAMIL		
		// //Create a new PHPMailer instance
		// $mail = new PHPMailer;
		// //Tell PHPMailer to use SMTP
		// $mail->isSMTP();
		// //Enable SMTP debugging
		// // 0 = off (for production use)
		// // 1 = client messages
		// // 2 = client and server messages
		// $mail->SMTPDebug = 1;
		// //Ask for HTML-friendly debug output
		// $mail->Debugoutput = 'html';
		// //Set the hostname of the mail server
		// $mail->Host = "smtp.gmail.com";
		// //Set the SMTP port number - likely to be 25, 465 or 587
		// $mail->Port = 587;
		// //Set the encryption system to use - ssl (deprecated) or tls
		// $mail->SMTPSecure = 'tls';
		// //Whether to use SMTP authentication
		// $mail->SMTPAuth = true;
		// //Username to use for SMTP authentication
		// $mail->Username = "";
		// //Password to use for SMTP authentication
		// $mail->Password = "";
		// //Set who the message is to be sent from
		// $mail->setFrom('dream07312@gmail.com', 'dream');
		// //Set who the message is to be sent to
		// $mail->addAddress('dream07312@gmail.com', 'test send email');
		// //Set the subject line
		// $mail->Subject = 'test send email !!!!';
		// //Read an HTML message body from an external file, convert referenced images to embedded,
		// //convert HTML into a basic plain-text alternative body
		// //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
		// $mail->msgHTML("Test email by nems.kmutt.ac.th");

		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}






	} // end function email

}
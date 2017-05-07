<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SendMail
{
    public function __construct()
    {
        //parent::__construct();
    }
    public function send_email($data_mail)
    {
        /*
         * This example shows making an SMTP connection with authentication.
         */

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Asia/Bangkok');

        //require 'PHPMailer/PHPMailerAutoload.php';
        require_once APPPATH.'/libraries/testresult/PHPMailerAutoload.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = MAIL_HOST;
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = MAIL_PORT;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = MAIL_SMTP;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = MAIL_AUTH;
        //Username to use for SMTP authentication
        $mail->Username = MAIL_USER;
        //Password to use for SMTP authentication
        $mail->Password = MAIL_PASS;
        //Set who the message is to be sent from
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        //Set who the message is to be sent to
        $mail->addAddress($data_mail['email'], $data_mail['email']);
        //Set the subject line
        $mail->Subject = $data_mail['subject'];
        // Your message
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
        $mail->msgHTML($data_mail['message']);

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '.$mail->ErrorInfo;

            return false;
        } else {
            //echo 'Message sent!';
            return true;
        }
    } // end function email
    public function _print($mval = '')
    {
        if ($mval) {
            echo '<pre>';
            print_r($mval);
            echo '</pre>';
        }
    }
}

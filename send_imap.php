<?php
function sendEmail($template, $firstname, $email, $date, $todate){ 

if ($template == 0) {
    $emailbody = file_get_contents('includes/email-templates/hol-req-booked.txt');
    $subject = "Holiday Request - Booked";
}

if ($template == 1) {
    $emailbody = file_get_contents('includes/email-templates/hol-req-approved.txt');
    $subject = "Holiday Request - Approved";
}

if ($template == 2) {
    $emailbody = file_get_contents('includes/email-templates/hol-req-denied.txt');
    $subject = "Holiday Request - Denied";
}

if ($template == 3) {
    $emailbody = file_get_contents('includes/email-templates/cancellations/cancel-request.txt');
    $subject = "Holiday Cancellation Requested";
}

if ($template == 4) {
    $emailbody = file_get_contents('includes/email-templates/cancellations/can-req-approved.txt');
    $subject = "Holiday Cancellation Request - Approved";
}

if ($template == 5) {
    $emailbody = file_get_contents('includes/email-templates/cancellations/can-req-approved.txt');
    $subject = "Holiday Cancellation Request - Denied";
}
// $emailbody = file_get_contents('../includes/email-templates/hol-req-approved.txt');
$emailto = $email;


$emailbody = str_replace("%firstname%", $firstname, $emailbody);
$emailbody = str_replace("%date%", $date, $emailbody);
$emailbody = str_replace("%todate%", $todate, $emailbody);

// $status = $_REQUEST['status'];
// $subject = $_REQUEST['subject'];
// $emailbody = $_REQUEST['body'];
// $emailto = $_REQUEST['emailto'];

require 'email/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'helpdesk@mfm-it.co.uk';
$mail->Password = 'Mon1t0r#Fl0w84$!';
$mail->SetFrom('helpdesk@mfm-it.co.uk', 'HelpDesk');
$mail->addAddress("$emailto", '');




$mail->SMTPDebug  = 0;
$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
$mail->IsHTML(true);




$mail->Subject = "$subject";
$mail->Body    = $emailbody;
$mail->AltBody = 'MFM IT - Ticket information';



if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}

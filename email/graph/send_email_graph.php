<?php


$email = $_REQUEST["email"];
$date = $_REQUEST["date"];
$todate = $_REQUEST["todate"];
$firstname = $_REQUEST["firstname"];


// $ticketid = $_REQUEST['ticketid'];
// $emailfile = $_REQUEST['emailfile'];
// $ticketsubject = $_REQUEST['ticketsubject'];
$subject = $_REQUEST['subject'];
$replyemail = $_REQUEST['replyemail'];
$content = $_REQUEST['content'];

$content1 = $content;


// this is to stop any email loops 
// if (strpos($replyemail, '@mailflowmonitor.co.uk') !== false) {
//     exit();
// }


$emailhtml = $content;
$emailhtml = str_replace('%firstname%', "$firstname", "$emailhtml");
$emailhtml = str_replace('%date%', "$date", "$emailhtml");
$emailhtml = str_replace('%todate%', "$todate", "$emailhtml");
$emailhtml = str_replace('\"', '"', "$emailhtml");

/// microsoft graph email system
$msg['subject'] = "$subject";
$msg['body'] = "$emailhtml ..";
$msg['toemail'] = $replyemail;

$json = base64_encode(json_encode($msg));

$ret = exec("node /home/mfmadmin/nodejs/send_email.js $json 2>&1", $out, $err);
print_r($out);
print_r($err);

?>

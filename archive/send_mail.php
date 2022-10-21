<?php

switch 
$body = file_get_contents('../includes/email-templates/hol-req-approved.txt');
$emailto = "luke.willmore@mfm-it.co.uk";
$subject = "Test Email";


echo $body;

// $fields = array(
//     'body' => urlencode($body),
//     'emailto' => urlencode($emailto),
//     'subject' => urlencode($subject),
//     'key' => urlencode('23B146E4A52FBB73746DD35229A14'),
// );
// foreach ($fields as $key => $value) {
//     $fields_string .= $key . '=' . $value . '&';
// }
// rtrim($fields_string, '&');
// open connection



// 
$postdata = http_build_query(
    array(
        'body' => urlencode($body),
        'emailto' => urlencode($emailto),
        'subject' => urlencode($subject),
        // 'key' => urlencode('23B146E4A52FBB73746DD35229A14'),
        'key' => '23B146E4A52FBB73746DD35229A14',
    )
);

$opts = array(
    'http' =>    array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);




// $result = file_get_contents('https://www.connect-technology.co.uk/send_imap.php?subject=test&body=messagehtml&emailto=richard.blackmore@mfm-it.co.uk&key=23B146E4A52FBB73746DD35229A14');
$result = file_get_contents('http://www.connect-technology.co.uk/send_imap.php', false, $context);
// $result = file_get_contents('/var/www/clients/client2/web4/send_imap.php', false, $context);

// $ch = curl_init();
// //set the url, number of POST vars, POST data
// curl_setopt($ch,CURLOPT_URL, "/var/www/clients/client2/web4/send_imap.php");
// curl_setopt($ch,CURLOPT_POST, count($fields));
// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
// //execute post
// $result = curl_exec($ch);
// echo $result;
// //close connection
// curl_close($ch);

echo "that";
echo $result;

?>
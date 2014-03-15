<?php
include('SMTPconfig.php');
include('SMTPClass.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$to = 'jody@introapp.net';
$from = 'jody@introapp.net';
$subject = 'what a country';
$body = 'my country is of thee, sweet land of liberty, of thee I sing';
$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
$SMTPChat = $SMTPMail->SendMail();
}
?>
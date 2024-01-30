<?php
$name=$_POST['name'];
$visitor_email=$_post['email'];
$subject $_post['subject'];
$message = $_post['message'];

$email_form = 'hrithik222003@gmail.com';

$email_subject = 'new form submission';

$email_body = "User name: $name.\n".
                "User email: $visitor_email.\n".
                "Subject: $subject.\n".
                "Message: $message";
$to = 'hrithik222003@gmail.com';

$header = "From: $email_form \r\n";

$headers = "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$header);

header("Location:contact.html");
?>
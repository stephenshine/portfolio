<?php
$to = "stephen.shine88@gmail.com";
$subject = "contact from portoflio";
$name = $_POST['name2'];
$email = $_POST['email2'];
$message = $_POST['message2'];
$header = "From " . $name . ". Email address: " . $email;
$sent = mail($to, $subjet, $message, $headers);
?>
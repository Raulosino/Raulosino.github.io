<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "info@truckmastercr.com"; 
$subject = "Truckmaster contactenos:  $name";
$body = "Nombre: $name\n\nEmail: $email\n\nTelefono: $phone\n\nMensaje:\n$message";
$header = "De: noreply@yourdomain.com\n";
$header .= "Email: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>

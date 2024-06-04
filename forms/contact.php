<?php
  // Reemplaza contact@example.com con tu dirección de correo electrónico real
  $receiving_email_address = 'jesusmoren93@gmail.com';

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type");

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('No se puede cargar la biblioteca "PHP Email Form"!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Configuración SMTP
  $contact->smtp = array(
    'host' => 'smtp.sendpulse.com',
    'username' => 'example@gmail.com',
    'password' => 'pass',
    'port' => 587
  );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>

<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'kylix.ijse@gmail.com';

  // Path to the PHP Email Form library
  $php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';

  if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form();
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // SMTP Configuration
//   $contact->smtp = array(
//     'host' => 'smtp.your-email-provider.com',
//     'username' => 'your-smtp-username',
//     'password' => 'your-smtp-password',
//     'port' => '587'
//   );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>

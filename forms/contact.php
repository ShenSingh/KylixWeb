<!-- not complit////////////////////////////////////////////////////////////// 405 err////////// -->
<?php
require '../assets/vendor/php-email-form/php-email-form.php';

$receiving_email_address = 'kylix.ijse@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form();
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = sanitize_input($_POST['name']);
$contact->from_email = sanitize_input($_POST['email']);
$contact->subject = sanitize_input($_POST['subject']);

// Uncomment below code if you want to use SMTP to send emails. Enter your correct SMTP credentials.
/*
$contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587',
    'encryption' => 'tls', // Change to 'ssl' if necessary
);

*/

$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(sanitize_input($_POST['message']), 'Message', 10);

echo $contact->send();

// Function to sanitize input data
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<?php
// Set the email address where you want to receive the form submissions
$receiving_email_address = 'madhubhashana99@gmail.com';

// Check if the PHP Email Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new instance of the PHP_Email_Form class
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set the recipient email address
$contact->to = $receiving_email_address;

// Set the sender's name and email from the form fields
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];

// Set the email subject from the form field
$contact->subject = $_POST['subject'];

// Add additional form fields to the email body (if needed)
// Example: $contact->additional_info = $_POST['additional_info'];

// Send the email
echo $contact->send();
?>


  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

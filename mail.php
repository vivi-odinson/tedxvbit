<!DOCTYPE html>
<html>
<body>



<?php

// Has the form been submitted?
if (isset($_POST['send'])) {
    // Set some variables
    $required_fields = array('name', 'email'); // add fields as needed
    $errors = array();

    $success_message = "Congrats! Your message has been sent successfully!";
    $sendmail_error_message = "Oops! Something has gone wrong, please try later.";

    // Cool the form has been submitted! Let's loop 
    // through the required fields and check
    // if they meet our condition(s)
    foreach ($required_fields as $fieldName) {
        // If the current field in the loop is NOT part of the form submission -OR-
        // if the current field in the loop is empty
        if (!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

            // add a reference to the errors array, indicating that these conditions have failed
            $errors[$fieldName] = "The {$fieldName} is required!";
        }
    }

    // Proceed if there aren't any errors
    if (empty($errors)) {
        // add fields as needed
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8' );
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8' );

        // Email receivers
        $to_emails = "anonymous1@example.com, anonymous2@example.com";

        $subject = 'Contact form sent from ' . $name;
        $message = "From: {$name}";
        $message .= "Email: {$email}";

        $headers = "From: {$name}\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        if (mail($to_emails, $subject, $message, $headers)) {
            echo $success_message;
        } else {
            echo $sendmail_error_message;
        }
    } else {

        foreach($errors as $invalid_field_msg) {
            echo "<p>{$invalid_field_msg}</p>";
        }
    }
}

</body>
</html>



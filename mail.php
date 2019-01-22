<!DOCTYPE html>
<html>
<body>



<?php $name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "tedxvbit@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>
$mail_result = mail($_MAILTO, $_SUBJECT, $_FORMCONTENT, $_MAILHEADER);
if ($mail_result) {
    echo <<<HTML
<div>Mail was successfully sent!</div>
HTML;
} else {
    echo <<<HTML
<div>Sending mail failed!</div>
HTML;
}

</body>
</html>
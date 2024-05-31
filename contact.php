<?php
/*
if(isset($_POST['submit'])){
	//Get form data
	$name = $_POST['name'];
	$email = $_POST['email'];
    $subject = $_POST['subject'];	
	$message = $_POST['message'];	
	
	//validation for email
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if (!preg_match($email_exp, $email)) {
        echo '<br><span style="color:red;">The Email address you entered is not valid.</span>';
		exit;
    }
	
	$to = "sebbarsalma255@gmail.com";  //recipient email address
	$subject = "Contact Form";  //Subject of the email
	
	//Message content to send in an email
	$message = "Name: ".$name."<br>Email: ".$email."<br> Objet: ".$objet."<br> Message: ".$message."<br>";
	
	//Include dynamic content in email message content
	$message .= "Dynamic field details:";
	foreach ($_POST["dynamic_field"] as $key => $value) {
		if($value !== ''){
			$message .=	$value.",";
		}
	}
	
	//Email headers
	$headers = "From:".$email."\r\n";
	$headers = "CC: someone@example.com";
	$headers .= "Reply-To:".$email."\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	//Send email 
	mail($to, $subject, $message, $headers);
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Always set content-type when sending HTML email
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," ") ,$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    $body="<h1>Message envoyé de $name :</h1>";
    $body.="<p style='color:red'>$message</p>";

    //envoyer l'email
    if (mail("fatimontassif@gmail.com",$subject,$body,$headers)) {
		echo "<p>Message envoyé</p>";
    } else {
		echo "<p>Erreur lors de l'envoi du message. Veuillez réessayer.</p>";
    }
} else {
    echo "Une erreur est survenue. Veuillez réessayer.";
}

?>
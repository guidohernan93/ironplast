<?php
header('Access-Control-Allow-Origin: *'); 

// Function to avoid header injection
function ValidarDatos($campo){
//Array con las posibles cabeceras a utilizar por un spammer
$badHeads = array("Content-Type:",
"MIME-Version:",
"Content-Transfer-Encoding:",
"Return-path:",
"Subject:",
"From:",
"Envelope-to:",
"To:",
"bcc:",
"cc:");
//Comprobamos que entre los datos no se encuentre alguna de
//las cadenas del array. Si se encuentra alguna cadena se
//dirige a una página de Forbidden
foreach($badHeads as $valor){
	if(strpos(strtolower($campo), strtolower($valor)) !== false){
		header( "HTTP/1.0 403 Forbidden");
		exit;
	}
}
}

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['msg'];
	$subject = $_POST['subject'];
	
	// Valido campos
	ValidarDatos($name);
	ValidarDatos($email);
	ValidarDatos($message);
	ValidarDatos($subject);

	//send email
    if (mail("guidohernan93@gmail.com", "Subject is email:" .$email, $message)){
		echo "enviado";
	}else {
		echo "nono";
	}
}
?>

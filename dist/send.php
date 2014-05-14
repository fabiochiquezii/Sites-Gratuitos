<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio</title>
</head>

<body>

<?php
$nome = $_POST['nome'];
$assunto = $_POST['assunto'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$status = true;

if ($nome == ""){
	$status = false;
	echo '<script>alert("o campo nome está vazio");location.href="contato.html";</script>';
}

if ($assunto == ""){
	$status = false;
	echo '<script>alert("o campo conteúdo está vazio");location.href="contato.html";</script>';
}

if ($email == ""){
	$status = false;
	echo '<script>alert("o campo e-mail está vazio");location.href="contato.html";</script>';
}

if ($msg == ""){
	$status = false;
	echo '<script>alert("o campo conteúdo está vazio");location.href="contato.html";</script>';
}

if (substr_count($email, "@")!=1){
	$status = false;
	echo '<script>alert("o campo email está inválido");location.href="contato.html";</script>';
}
?>

<?php
$to = "fabiochiquezi@gmail.com";
$subject = "Portifólio";
$message = "<strong>nome:</strong>$nome<br />
			<strong>email:</strong>$email<br />
			<strong>assunto:</strong>$assunto<br />
			<strong>conteúdo:</strong>$msg<br />";
$header = "MIME-Version: 1.0 \n";
$header .= "Content-type: text/html; charset=iso-8859-1 \n";
$header .= "From: $email\n";

if ($status == true){
mail($to, $subject, $message, $header);
	echo '<script>alert("o seu e-mail foi enviado");location.href="contato.html";</script>';
}

else{
	echo '<script>alert("ocorreu um erro... tente novamente");location.href="contato.html";</script>';
}

?>
</body>
</html>
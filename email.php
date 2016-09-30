<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");
 
$nome = $_POST["nome"];
$email = $_POST["email"];
$fone = $_POST["fone"];
$mensagem  = $_POST["mensagem"];

$msgDe = $nome;
$msgDe.="-";
$msgDe .=$email;

$emailMsg = $nome;
$emailMsg .=" ";
$emailMsg .=$mail;
$emailMsg .=" ";
$emailMsg .=$fone;
$emailMsg .=" ";
//$emailMsg .=$mensagem;

$mail = new PHPMailer();
$mail->SetLanguage("br", "libs/"); //Idioma
$mail->IsSMTP();

$mail->Host = "ssl://smtp.gmail.com"; //Host do servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = "emehandre@gmail.com"; //Nome do usuario SMTP
$mail->Password = "ua2nqvgc";     //Senha do usuario SMTP
$mail->FromName = $msgDe;    //nome de quem ta enviando, vai aparecer na coluna "De:"

//INICIO --- Quem vai receber-----------------------------------------------
$mail->AddAddress("analista@avchap.com.br");
$mail->AddAddress("emersonsilvestrin@live.com.br");
//$mail->AddAddress("email_03@nome_da_empresa.com.br");
//FIM --- Quem vai receber--------------------------------------------------

$mail->AddReplyTo($email); //Quem irá receber a resposta (quando a pessoal responder)
$mail->IsHTML(true);

//Assunto
$mail->Subject = "Orcamento Trabalhos Site";
//Corpo da mensagem, pode usar tags html
$mail->Body = "<font face='Courier New'><b><font size='4'>$emailMsg<br><BR>$mensagem</font></b><BR>";

if(!$mail->Send())
{
echo "<script> alert('A mensagem não pode ser enviada. <p> Erro do envio: ' . $mail->ErrorInfo; location.href = 'index.html' </script>";
}

//echo "Mensagem enviada com sucesso!";
echo "<script> alert('Email Enviado Com Sucesso!');location.href = 'index.html' </script>";
?>
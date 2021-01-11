<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


if ( isset( $_POST['email']))
{
	$message = $_POST['email'];
	$mail = new PHPMailer(true);
	
	
 // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
 $mail->IsSMTP(); // Define que a mensagem será SMTP
 //$mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
 $mail->Host = 'smtp.portalf.com.br'; // Seu endereço de host SMTP
 $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
 $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
 $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
 $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
 $mail->Username = 'sender@portalf.com.br'; // Conta de email existente e ativa em seu domínio
 $mail->Password = 's3nd3r'; // Senha da sua conta de email
 
 
 // DADOS DO REMETENTE
 $mail->Sender=('sender@portalf.com.br'); // Conta de email existente e ativa em seu domínio
 $mail->setFrom('sender@portalf.com.br', 'IndikMais'); // Sua conta de email que será remetente da mensagem
 //$mail->FromName = "IndikMais"; // Nome da conta de email
 // DADOS DO DESTINATÁRIO
 
 
 $mail->AddAddress('keiler.trindade@portalf.com.br'); // Define qual conta de email receberá a mensagem
 //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
 //$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
 //$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 //Definição de HTML/codificação
 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
 $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 $mail->Subject = 'Novo interesse em nossas novidades!';
 $mail->Body    = 'Novo e-mail para cadastrar no recebimendo de nossas novidades: '.$message;
 
 // ENVIO DO EMAIL
 $enviado = $mail->Send();
 // Limpa os destinatários e os anexos
 $mail->ClearAllRecipients();
 // Exibe uma mensagem de resultado do envio (sucesso/erro)
 if ($enviado) {
   echo "Cadastro realizado com sucesso!";
   //header('Refresh:0');
   //echo "<meta http-equiv='refresh' content='10;URL=index.html'>";
   } else {
   echo "Não foi possível realizar o cadastro, por favor tente novamente em alguns minutos!.";
   echo "Detalhes do erro: " . $mail->ErrorInfo;
}
}
else{
	echo "Email não informado corretamente";
}
	
	



?>
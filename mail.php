<?php

if ( isset( $_POST['email']))

{
	$message = $_POST['email'];

	$from = "sender@portalf.com.br";
    $to = "keiler.trindade@portalf.com.br";
    $subject = "Novo contato cadastrado";
    
	echo $message;	
    //$headers = "From:" . $from;
	//mail($to,$subject,$message, $headers);
}

else{
	echo "Erro ao enviar e-mail";
}
	
   // mail($to,$subject,$message, $headers);
   // echo "The email message was sent.";


?>
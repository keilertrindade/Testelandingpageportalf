<?php

require 'vendor/autoload.php'

date_default_timezone_set('America/Bahia');
$date = date('m/d/Y h:i:s a', time());

$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nome = $_POST['nome'];

//echo $email . "Nome: " .$nome. " Telefone: " .$telefone;
// $date;


$service_account_file = 'credenciais.json';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credenciais.json');
$service = new Google_Service_Sheets($client);

$spreadsheetId = "1oY1ks3sX4dzrHl7Q4VwyrkpKLqUY36Z4cz3OJ2uo7_E"; //It is present in your URL
$get_range = "Dados!A1:D2102”; //Posso colocar apenas "Dados" para pegar todo o conteúdo dela. Ainda não sei se preciso de range pra poder inserir os dados

?>
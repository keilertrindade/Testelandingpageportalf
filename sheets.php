<?php

require 'vendor/autoload.php';

date_default_timezone_set('America/Bahia');
$date = date('m/d/Y h:i:s a', time());

$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nome = $_POST['nome'];

echo "E-mail: ".$email . "\nNome: " .$nome. "\nTelefone: " .$telefone . "\nData: ".$date;


$service_account_file = 'credenciais.json';

$client = new Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig('credenciais.json');

$service = new Google_Service_Sheets($client);
//var_dump($service);

$spreadsheetId = '1oY1ks3sX4dzrHl7Q4VwyrkpKLqUY36Z4cz3OJ2uo7_E'; //It is present in your URL
$get_range = 'Dados!A1:D5'; // Posso colocar apenas 'Dados' para pegar todo o conteúdo dela. Ainda não sei se preciso de range pra poder inserir os dados

$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
/*$values = $response->getValues();

$numRows = $response->getValues() != null ? count($response->getValues()) : 0;
printf("%d rows retrieved.", $numRows);
*/

?>
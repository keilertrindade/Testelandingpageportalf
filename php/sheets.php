<?php

require '../vendor/autoload.php';

date_default_timezone_set('America/Bahia');
$date = date('d/m/Y H:i:s', time());

$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nome = $_POST['nome'];

$service_account_file = 'credenciais.json';

$client = new Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig('credenciais.json');

$service = new Google_Service_Sheets($client);
//var_dump($service);

$spreadsheetId = '1oY1ks3sX4dzrHl7Q4VwyrkpKLqUY36Z4cz3OJ2uo7_E';
$range = 'Dados!A2:D2102';

$values = [[$date, $nome, $email, $telefone]];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);

$params = [
    'valueInputOption' => "RAW"
];

$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

/*$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
$values = $response->getValues();

print_r($values);

$numRows = $response->getValues() != null ? count($response->getValues()) : 0;
printf("\n%d rows retrieved.", $numRows);
*/


echo "Dados cadastrados com sucesso! Entraremos em contato o mais rápido possível!\n\nE-mail: ".$email . "\nNome: " .$nome. "\nTelefone: " .$telefone . "\nData: ".$date;

?>
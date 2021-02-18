<?php error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); 

$curl = curl_init();

curl_setopt_array($curl, Array(
	CURLOPT_URL            => 'https://9991110dlvacina.table.core.windows.net/tbdadosvacinacao?sv=2018-03-28&si=policeVacivida&tn=tbdadosvacinacao&sig=HCMgtbVTIXSEiC2QxWnM1oYbVfksbXUqmfjYPYY9yJY%3D',
	CURLOPT_USERAGENT      => 'spider',
	CURLOPT_TIMEOUT        => 120,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_ENCODING       => 'UTF-8'
));

$data = curl_exec($curl);

curl_close($curl);


$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

$total_vacinados = $xml->entry->content->children('m', true)->children('d', true)->TOTAL_VACINADOS;
$vacinados_dose1 = $xml->entry->content->children('m', true)->children('d', true)->TOTAL_VACINADOS_1_DOSE;
$vacinados_dose2 = $xml->entry->content->children('m', true)->children('d', true)->TOTAL_VACINADOS_2_DOSE;
$data_atualzacao = $xml->entry->content->children('m', true)->children('d', true)->DATA_ATUAL;
$data_hora = date("d/m/Y H:i", strtotime($data_atualzacao));

?>

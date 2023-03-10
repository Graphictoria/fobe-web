<?php


/*
Fobe 2021 
*/

//headers

use Fobe\Users\Outfit;

header("Access-Control-Allow-Origin: https://www.idk16.xyz");

header("access-control-allow-credentials: true");

$data = json_decode(file_get_contents('php://input'));
$name = $data->name;

if (!$data)
{
	http_response_code(400);
}
else
{
	try {
		if (Outfit::CreateOutfit($name, $user->id)) {
			$createoutfit = "Outfit Created";
		}
	} catch (Exception $e) {
		$createoutfit = $e->getMessage();
	}
	
	header('Content-Type: application/json');
	echo json_encode(array("alert" => $createoutfit));
}
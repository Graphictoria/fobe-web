<?php

/*
Fobe 2021 
*/

//headers

use Fobe\Users\User;

header("Access-Control-Allow-Origin: https://www.idk16.xyz");

header("access-control-allow-credentials: true");

$data = json_decode(file_get_contents('php://input'));

if (!$data)
{
	http_response_code(400);
}
else
{	
	$privacy = $data->preference;
	header('Content-Type: application/json');
	echo json_encode(array("success" => User::SetCanJoinUser($user->id, $privacy)));
}
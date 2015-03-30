<?php

function hash_password($password)
{
	$password = password_hash($password, PASSWORD_BCRYPT);

	return $password;
}
function verify_password($password, $hash)
{
	
	$password = password_verify($password, $hash);

	return $password ? $hash : $password;
}

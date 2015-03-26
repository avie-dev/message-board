<?php

function hash_password($password)
{
	$password = password_hash($password, PASSWORD_BCRYPT);
	return base64_encode(md5($password)); 
}


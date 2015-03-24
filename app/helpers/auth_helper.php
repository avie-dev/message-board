<?php

function hash_password($password)
{
	return base64_encode(md5($password)); //encode the result of md5() to base64 for stronger security 
}

function check_password($password)
{
	return base64_decode(md5($password));
}
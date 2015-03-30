<?php

function validate_between($check, $min, $max)
{
	$n = mb_strlen($check);
	return $min <= $n && $n <= $max;
}

function confirm_password($password, $pass_confirm)
{
	return $password === $pass_confirm;
}
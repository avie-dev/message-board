<?php

function eh($string)
{
    if (!isset($string)) return;
    echo htmlspecialchars($string, ENT_QUOTES);
}

function readable_text($s)
{
     $s = htmlspecialchars($s, ENT_QUOTES);
     $s = nl2br($s);
     return $s;
}

function redirect_page($page)
{
	header("Location: " . APP_URL . "/");
}

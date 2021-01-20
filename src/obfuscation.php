<?php
$characters = array('<', '>', '`', '\'', '"', '\\');

function Obfuscate($string)
{
    return str_replace($characters, $string);
}
?>
<?php
require_once '../phpScripts/register_functions.php';
include_once '../phpScripts/globals.php';

if (array_key_exists("REQUEST_METHOD", $_SERVER))
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        registerUser($LOCALHOST_CREDENTIALS, '');
    }
<?php
if (!isset($_SESSION)) {
  session_start();
}

function getReferer()
{
  return $_SERVER['HTTP_REFERER'] ?? './';
}


$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (!defined('BASE_PATH')) {
  define('BASE_PATH', 'https://examen-ebc97cbf4820.herokuapp.com/');
}

if (!isset($_SESSION['global_token'])) {
  $_SESSION['global_token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

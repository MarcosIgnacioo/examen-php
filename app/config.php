<?php
if (!isset($_SESSION)) {
  session_start();
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (!defined('BASE_PATH')) {
  if (strpos($user_agent, "Win") !== FALSE) {
    define('BASE_PATH', 'http://localhost/examen-php/');
  } else if (strpos($user_agent, "Mac") !== FALSE) {
    define('BASE_PATH', 'http://localhost/examen-php/');
  } else {
    define('BASE_PATH', 'http://localhost/examen-php/');
  }
}

if (!isset($_SESSION['global_token'])) {
  $_SESSION['global_token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

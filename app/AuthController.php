<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (
  !$_POST || !$_POST["action"] || !$_POST["global_token"]
  || ($_SESSION["global_token"] != $_POST['global_token'])
) {
  echo 'There is no action';
  return;
}

switch ($_POST["action"]) {
  case 'login':
    $authController = new Auth();
    $res = $authController->login($_POST["email"], $_POST["password"]);
    if ($res->code != 2) {
      header('Location: ' . 'login', true);
      return 'error';
    }

    $_SESSION["api_token"] = $res->data->token;
    $_SESSION["user_name"] = $res->data->name; 
    $_SESSION["user_email"] = $res->data->email;

    header('Location: products');
    exit();

  case 'logout':
    session_unset();
    session_destroy();
    header('Location: /');
    exit();

  default:
    break;
}

class Auth
{
  function login($email, $password)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}

<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}



switch ($_POST["action"]) {
  case 'create_level':
    $levelController = new LevelController();
    $res = $levelController->createLevel($_POST);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    break;

  case 'update_level':
    $levelController = new LevelController();
    $res = $levelController->updateLevel($_POST);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    break;

  case 'delete_level':
    $levelController = new LevelController();
    $res = $levelController->deleteLevel($_POST["level_id"]);
    echo json_encode($res);
    break;

  case 'list_levels':
    $levelController = new LevelController();
    echo json_encode($levelController->getAllLevels());
    break;

  case 'level_details':
    $levelController = new LevelController();
    echo json_encode($levelController->getLevelDetails($_POST["level_id"]));
    break;

  default:
    echo 'Invalid action';

    break;
}

class LevelController
{
  private $apiBase = 'https://crud.jonathansoto.mx/api/levels';

  function createLevel($level) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $level,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function updateLevel($level) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($level),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function deleteLevel($level_id) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $level_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function getAllLevels() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function getLevelDetails($level_id) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $level_id ,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }
}
?>

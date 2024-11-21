<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


function getReferer() {
  return $_SERVER['HTTP_REFERER'] ?? './products';
}

switch ($_POST["action"]) {
  case 'create_presentation':
    $presentationController = new PresentationController();
    $res = $presentationController->createPresentation($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'update_presentation':
    $presentationController = new PresentationController();
    $res = $presentationController->updatePresentation($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'delete_presentation':
    $presentationController = new PresentationController();
    $res = $presentationController->deletePresentation($_POST["presentation_id"]);
    echo json_encode($res);
    break;

  case 'list_presentations':
    $presentationController = new PresentationController();
    echo json_encode($presentationController->getAllPresentations());
    break;

  case 'presentation_details':
    $presentationController = new PresentationController();
    echo json_encode($presentationController->getPresentationDetails($_POST["presentation_id"]));
    break;

  default:
    echo 'Invalid action';

    break;
}

class PresentationController
{
  private $apiBase = 'https://crud.jonathansoto.mx/api/presentations';

  function createPresentation($presentation) {
    $uploadDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR;
    $uploadFile = $uploadDir . basename($_FILES['cover']['name']);
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadFile)) {
        $presentation['cover'] = new CURLFILE(realpath($uploadFile));

        if (isset($presentation['categories']) && is_array($presentation['categories'])) {
            foreach ($presentation['categories'] as $index => $category) {
                $presentation["categories[$index]"] = $category;
            }
            unset($presentation['categories']);
        }

        if (isset($presentation['tags']) && is_array($presentation['tags'])) {
            foreach ($presentation['tags'] as $index => $tag) {
                $presentation["tags[$index]"] = $tag;
            }
            unset($presentation['tags']);
        }
    }

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
        CURLOPT_POSTFIELDS => $presentation,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['api_token'],
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    if (file_exists($uploadFile)) {
        unlink($uploadFile);
    }

    return json_decode($response)->data;
  }

  function updatePresentation($presentation){
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
      CURLOPT_POSTFIELDS => http_build_query($presentation),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function deletePresentation($presentation_id) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $presentation_id,
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

  function getAllPresentations() {
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

  function getPresentationDetails($presentation_id) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $presentation_id,
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

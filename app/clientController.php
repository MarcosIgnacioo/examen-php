<?php
session_start();

if (
  !$_POST || !$_POST["action"] || !$_POST["global_token"]
  || ($_SESSION["global_token"] != $_POST['global_token'])
) {
  echo 'There is no action';
  return;
}

switch ($_POST["action"]) {
  case 'create_client':
    $clientController = new ClientController();
    $res = $clientController->createClient($_POST);
    header('Location: ./clients');
    exit();
    break;

  case 'delete_client':
    $clientController = new ClientController();
    $res = $clientController->deleteClient($_POST["id"]);
    header('Location: ./clients');
    exit();
    break;

  case 'update_client':
    $clientController = new ClientController();
    $res = $clientController->updateClient($_POST);
    header('Location: ./clients');
    exit();
    break;

  case 'list_clients':
    $clientController = new ClientController();
    echo json_encode($clientController->getAllClients());
    break;

  case 'client_details':
    $clientController = new ClientController();
    echo json_encode($clientController->getClientDetails($_POST["id"]));
    break;

  case 'add_address':
    $clientController = new ClientController();
    $res = $clientController->addAddress($_POST);
    header('Location: ./clients');
    exit();
    break;

  case 'delete_address':
    $clientController = new ClientController();
    $res = $clientController->deleteAddress($_POST["address_id"]);
    header('Location: ./clients');
    exit();
    break;

  case 'update_address':
    $clientController = new ClientController();
    $res = $clientController->updateAddress($_POST);
    header('Location: ./clients');
    exit();
    break;

  default:
    echo 'Invalid action';
    break;
}

class ClientController
{
  private $apiBase = 'https://crud.jonathansoto.mx/api/clients';

  function createClient($client)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/register',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $client,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
}

  function deleteClient($id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $id,
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

  function updateClient($client)
  {
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
      CURLOPT_POSTFIELDS => http_build_query($client),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
}

  function getAllClients()
  {
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

  function getClientDetails($id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $id . '/details',
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

  function addAddress($address)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/addresses',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $address,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
}

  function deleteAddress($address_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/addresses/' . $address_id,
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

  function updateAddress($address)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $this->apiBase . '/addresses/' . $address['address_id'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => http_build_query($address),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Bearer ' . $_SESSION['api_token'],
    ),
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  return json_decode($response)->data;
}

}
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
function getReferer() {
  return $_SERVER['HTTP_REFERER'] ?? './catalog';
}


switch ($_POST["action"]) {
  case 'add_category':
    $catalogController = new CatalogController();
    $res = $catalogController->createCategory($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'update_category':
    $catalogController = new CatalogController();
    $res = $catalogController->updateCategory($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'delete_category':
    $catalogController = new CatalogController();
    $res = $catalogController->deleteCategory($_POST["category_id"]);
    echo json_encode($res);
    break;

  case 'add_brand':
    $catalogController = new CatalogController();
    $res = $catalogController->createBrand($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'update_brand':
    $catalogController = new CatalogController();
    $res = $catalogController->updateBrand($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'delete_brand':
    $catalogController = new CatalogController();
    $res = $catalogController->deleteBrand($_POST["brand_id"]);
    echo json_encode($res);
    break;

  case 'add_tag':
    $catalogController = new CatalogController();
    $res = $catalogController->createTag($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'update_tag':
    $catalogController = new CatalogController();
    $res = $catalogController->updateTag($_POST);
    header('Location: ' . getReferer());
    exit();
    break;

  case 'delete_tag':
    $catalogController = new CatalogController();
    $res = $catalogController->deleteTag($_POST["tag_id"]);
    echo json_encode($res);
    break;

  default:
    echo 'Invalid action';
    break;
}

class CatalogController
{
  private $apiBaseCategories = 'https://crud.jonathansoto.mx/api/categories';
  private $apiBaseBrands = 'https://crud.jonathansoto.mx/api/brands';
  private $apiBaseTags = 'https://crud.jonathansoto.mx/api/tags';

  function createCategory($category)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseCategories,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $category,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function updateCategory($category)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseCategories,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($category),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function deleteCategory($category_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseCategories . '/' . $category_id,
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

  function createBrand($brand)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseBrands,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $brand,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function updateBrand($brand)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseBrands,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($brand),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function deleteBrand($brand_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseBrands . '/' . $brand_id,
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

  function getTags()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseTags,
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


  function createTag($tag)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseTags,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $tag,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function updateTag($tag)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseTags,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($tag),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }

  function deleteTag($tag_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBaseTags . '/' . $tag_id,
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
}

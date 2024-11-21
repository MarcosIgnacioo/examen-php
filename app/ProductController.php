<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}



switch ($_POST["action"]) {
  case 'add_product':
    $productController = new ProductController();
    $res = $productController->createProduct($_POST);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    break;
  case 'update_product':
    $productController = new ProductController();
    $res = $productController->updateProduct($_POST);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    break;
  case 'delete_product':
    $productController = new ProductController();
    $res = $productController->deleteProduct($_POST);
    echo json_encode(array($res, $_POST));
    break;

  case 'get_product_details':
    $productController = new ProductController();
    echo json_encode($productController->getProductDetails($_POST["id"]));
    break;


  case 'get_orders':
    $productController = new ProductController();
    echo json_encode($productController->getOrders($_POST["id"]));
    break;

  case 'get_presentations_by_product':
    $productController = new ProductController();
    echo json_encode($productController->getPresentationsByProduct($_POST['id']));
    break;


  default:
    echo 'Invalid action';

    break;
}

class ProductController
{
  function get()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
        'Cookie: XSRF-TOKEN=eyJpdiI6IkN2YVJlblJFcGoycFFibEZpTFZMaGc9PSIsInZhbHVlIjoiQldWbUVNeUVkMzFic29PZjUxVXpCZ291YkIzN0o4TE4rZ3lwZStsNThmd2tYd01idTUyZ0VvZFh1aURmcFYyOTl1UzVRMXJDSDlRQXNUWlRKSEFqVHlxb09YYWxQZlNOaFFFNmJielliajhWOEd1YzNqUkxiMzdUWmVnRVI5WHkiLCJtYWMiOiJkN2JjZWRlYTdlYjg4NjhiODZhYzAyYjExZWVjNTM5YmJjNTI1ZjZhOGZmY2UzNTliOTc0NTIyNmE3YWVjM2UxIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlBheGw1RTd6M2F4RVVSWCs0Q2F6WWc9PSIsInZhbHVlIjoidDVmNFh2UHYvSkFYRjF2b0lwRUw2YXAvZUVuSjMvUDhRZGFjVkxwL0o2S1hvNlJKelFBSVgvV1NjQjlYVjlZTWJFV2I0OXBrUmJQU3psTzRZSVhSQlhQYWgrMVp1MldTMFFGQ01uano2SGo3Y1M4d05McVdzNGZYNEpGeVV0eU4iLCJtYWMiOiI0YzYyNDJmYjJhNjMyNzA4MTlkZWYwZGIwOWYyNjA5YzA1NzM4NjJmNWM4NGU4NTg5MjU1YzRjMDVlOTQ5M2E4IiwidGFnIjoiIn0%3D'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response)->data;
  }

  function getProductBySlug($slug)
  {
    if (!isset($_SESSION['api_token'])) {
      return 'no hay api ytoken';
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response)->data;
  }

  function createProduct($product)
  {
    $uploadDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR;
    $uploadFile = $uploadDir . basename($_FILES['cover']['name']);
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadFile)) {

      $product['cover'] = new CURLFILE(realpath($uploadFile));

      if (isset($product['categories']) && is_array($product['categories'])) {
        foreach ($product['categories'] as $index => $category) {
          $product["categories[$index]"] = $category;
        }
        unset($product['categories']);
      }

      if (isset($product['tags']) && is_array($product['tags'])) {
        foreach ($product['tags'] as $index => $tag) {
          $product["tags[$index]"] = $tag;
        }
        unset($product['tags']);
      }


      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $product,
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer ' . $_SESSION['api_token'],
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      return json_decode($response)->data;
    } else {
      return ['error' => 'Error al mover el archivo subido.'];
    }
  }

  function updateProduct($product)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($product),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response)->data;
  }

  function deleteProduct($product)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $product['id'],
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
  function getProductDetails($id)
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
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }


  function getOrders($id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->apiBase . '/' . $id . '/orders',
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

  function getPresentationsByProduct($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/' . $id,
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

  function dummy()
  {
    return 'hola desde productroocntorller';
  }
}

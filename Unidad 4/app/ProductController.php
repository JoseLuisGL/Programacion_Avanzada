<?php

session_start();   


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'create_product':
            $nombre = $_POST['nombre'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $features = $_POST['features'];

            $productController = new ProductController();
            $productController->createProduct($nombre, $slug, $description, $features);
            break;
    }
}

class ProductController {

    public function products(){
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
            'Authorization: Bearer '.$_SESSION['user_data']->token
          ),
        ));
  
        $response = curl_exec($curl);
  
        curl_close($curl);
        $responseData = json_decode($response, true);
  
        if (isset($responseData['data'])) {
          return $responseData['data'];
        } else {
          return [];
        }
  
  
      }
  
      public function getBySlug($slug){
  
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
            'Authorization: Bearer '.$_SESSION['user_data']->token
          ),
        ));
  
        $response = curl_exec($curl);
  
        curl_close($curl);
        #echo $response;
  
        $responseData = json_decode($response, true);
        if (isset($responseData['data'])) {
          return $responseData['data'];
        } else {
          return [];
        }
  
      }

    public function createProduct($nombre, $slug, $description, $features) {
        
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
        CURLOPT_POSTFIELDS => array('name' => $nombre,
                                    'slug' => $slug,
                                    'description' => $description,
                                    'features' => $features),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['user_data']->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseData = json_decode($response, true);

        if (isset($responseData['code']) && $responseData['code'] === 4) {
            header("Location: ../home.php?status=OK");
            exit();
        } else {
            echo "<script>alert('Algo está mal :v');</script>";
        }
        
    }
}


?>
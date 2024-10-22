<?php

session_start();   

var_dump($_SESSION);

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
            'Authorization: Bearer 126|upSIc59zJ4MX7oVb49xDqtcyymgtpjmCEoW9J42e',
            'Cookie: XSRF-TOKEN=eyJpdiI6IlVwZW5SVURtTVU2OTdoRVQ5NU1ERlE9PSIsInZhbHVlIjoiTlpVWEpUdWJuNEdER3hIRWZPL1kzQXRkK2thS1UxbWtwa0FtdDlJS3FFMTFKNk5vMVFyRnBLckIxc054Y205akt1ZW01NVBmMTJuL2ZEbTYyK3AvYTlDREMzTEswMVRtRVJMMjBsbVRtNFE1NVVpVUF0YStMb3ZjUzUvbTJBWG4iLCJtYWMiOiI1ODRiM2M2ODA0YjU3YTFkODYwM2YzNTIwNmRkNTBmOTgwYjJmMjVjOTY0NjliMGQxY2M4MmJhN2UzYjY3YjdiIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IktQZ3BReTJ5Y0dsY003U0o5MGE4Tnc9PSIsInZhbHVlIjoiQU15TU1EQ3QzRmRVU3o0NHk4YVd4c3B4R1o5cVlQaHFJOG5YcGpJWGNjaUJHK090SzcrZWhWZDE1TGVkOGRCYzFEYlZmOUpIVEtYdHBYTVFwd3VTeVdrYmpWUk5mK3BUaW5MQ2xSUkJFemNJczlQbGd0dnRqcHJaNUl3bkVuVmkiLCJtYWMiOiJiOThhMzQwYjdlZDE0ZDQ0NDY0MGRhMzU4NTdhMjJiMTdhYjMyODViNTMzZDMzMzUyNGVjZDI3NTAzMDRlN2Y3IiwidGFnIjoiIn0%3D'
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
            'Authorization: Bearer 487|7YWmOat3ArMhyXJaMun4HLDFgMnnkPFlvZ3HbzIc'
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
            'Authorization: Bearer 649|lMp0LnD2uWtLG4ARPt5cX87eV0k2Leli4dFprb76'
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
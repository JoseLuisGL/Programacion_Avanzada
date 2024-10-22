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
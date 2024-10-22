<?php
session_start();

if(isset($_POST["action"])) {
    switch($_POST["action"]) {
        case "access":
            $authController = new AuthController();

            $email = $_POST["email"];
            $password = $_POST["password"];

            $authController->login($email, $password);
            break;
    }
}

class AuthController{

    public function login($email=null, $password=null){

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
          CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
          CURLOPT_HTTPHEADER => array(
            'Cookie: XSRF-TOKEN=eyJpdiI6IkkxcC9wNU1JSkpBUnl5N3Q3VlUrNHc9PSIsInZhbHVlIjoiTjhWUjh3WEFIWkE2RVJEUW1sR0orTkRlREZEd1dGaTBMYlFuUkVSeTNUTVBKT0N2OFdPOFlvS210ZHpWalFZRDlONWQzUEZJMEtFZGxTSGdmU1cweXFpbU5MVTcwTkxucjBVZmxsWnpFUkFuT2taVUZUY3RUbFI4VGdXUFpuVEkiLCJtYWMiOiI0MzA3ZDYwZGZjN2QzZWM2ZDNmY2VlZDhjMjgwOWM2OGExNzM3YzY2Nzk2YjM2NDVjM2NjNDIwZGJhNzg5ZTZiIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IjJGcmZWaWZtOG9SSXdoRTVDV3RrUGc9PSIsInZhbHVlIjoibjVqVlVKSisxRngwR0p1cjI3MmFNZndlZjFUaFdHWnVQTzdqMGYvZHJ5RVF6MkNTdVdFSTFVKzQ2K0x1MTlnTjZDc3lMeGFLbFhwQXJMei9Tbm5ENkJHbEhBRjVIZDExVXlQSzZsSzhIMWYyT3loUFAxbDhCWWoraUZobVBYUGQiLCJtYWMiOiIzNWFmOWMwMWVmNTY5MDMyOTYxMzhkZWFiNTdiZDAyZWEzMDFhMjI4MGZiYjY1NjdiNTQ3NGFiN2M1OTkzZThkIiwidGFnIjoiIn0%3D'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $responseData = json_decode($response, true);
        #echo $response;

        if (isset($responseData['code']) && $responseData['code'] === 2) {
          header("Location: ../home.php");
          exit();
        } else {
          echo "<script>alert('Credenciales incorrectas, por favor intenta nuevamente.');</script>";
          echo "<script>window.location.href = '../login.php';</script>";
        }    
        
    }

}



?>
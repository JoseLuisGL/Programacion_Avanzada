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


}



?>
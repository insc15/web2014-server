<?php
    require_once('../Utils/cors.php');
    require_once('../Utils/returnFormat.php');
    require_once('../Utils/connection.php');

    function productFormat($data){
        global $connection;
        $data->{'is_free'} = $data->{'is_free'} == '0' ? false : true;

        $data->{'genres'} = explode(",",$data->{'genres'});
        $data->{'developers'} = explode(",",$data->{'developers'});
        $data->{'publishers'} = explode(",",$data->{'publishers'});

        for ($i=0; $i < count($data->{'genres'}); $i++) { 
            $genreResult = $connection->query("select * from genres where genre_id=".$data->{'genres'}[$i]);
            if($genreResult->num_rows > 0){
                $genreData = $genreResult->fetch_object();
                $data->{'genres'}[$i] = $genreData;
            }else{
                unset($data->{'genres'}[$i]);
            }
        }

        return $data;
    }

    function getAllProducts(){
        global $connection;
        $productArray = [];
        $result = $connection->query("select * from products");
        if($result->num_rows > 0){
            while($data = $result->fetch_object()){
                //bool format
                $data = productFormat($data);
                array_push($productArray, $data);
            }
        }
        return $productArray;
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        ReturnFormat('success',getAllProducts());
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Payload = json_decode(file_get_contents('php://input'), true);
        switch ($Payload['method']) {
            case 'get':
                if($Payload['token']){
                    $productArray = [];
                    $conditionString = base64_decode($Payload['token']);

                    $result = $connection->query('select * from products ' . $conditionString);
                    if($result && $result->num_rows > 0){
                        while($data = $result->fetch_object()){
                            $data = productFormat($data);
                            array_push($productArray, $data);
                        }
                        ReturnFormat('success', $productArray);    
                    }else{
                        ReturnFormat('failed', 'there is an error in your parameter');    
                    }
                }
                break;
            // case 'get':
            //     if($Payload['token']){
            //         $UserData = json_decode(base64_decode($Payload['token']));
            //         $result = $connection->query("select * from users where username='". $UserData -> {'username'} ."' and password='".$UserData -> {'password'}."'");
                    
            //         if($result->num_rows > 0){
            //             $data = $result->fetch_assoc();
            //             ReturnFormat("success",base64_encode(json_encode($data)));                        
            //         }else{
            //             ReturnFormat("failed","Sai tên đăng nhập hoặc mật khẩu");
            //         }
            //     }
            //     break;
            default:
                break;
        }
    }
?>
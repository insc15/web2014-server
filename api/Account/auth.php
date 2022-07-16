<?php
    require_once('../Utils/cors.php');
    require_once('../Utils/returnFormat.php');
    require_once('../Utils/connection.php');
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Payload = json_decode(file_get_contents('php://input'), true);
        switch ($Payload['method']) {
            case 'login':
                if($Payload['token']){
                    $UserData = json_decode(base64_decode($Payload['token']));
                    $result = $connection->query("select * from users where username='". $UserData -> {'username'} ."' and password='".$UserData -> {'password'}."'");
                    
                    if($result->num_rows > 0){
                        $data = $result->fetch_assoc();
                        ReturnFormat("success",base64_encode(json_encode($data)));                        
                    }else{
                        ReturnFormat("failed","Sai tên đăng nhập hoặc mật khẩu");
                    }
                }
                break;
            case 'register':
                if($Payload['token']){
                    $UserData = json_decode(base64_decode($Payload['token']));
                    $result = $connection->query("INSERT INTO users (email, username, password, avatar_path) VALUES ('" .$UserData -> {'email'}. "','". $UserData -> {'username'} ."','". $UserData -> {'password'} ."','". $UserData->{'avatar_path'} ."')");
                    if(mysqli_errno($connection) === 1062){
                        strpos($connection->error, "email") ? ReturnFormat("duplicate","Email đã được sử dụng") : ReturnFormat("duplicate","Tên đăng nhập đã được sử dụng");
                        
                    }else{
                        $response = $connection->query("select * from users where username='". $UserData -> {'username'} ."' and password='".$UserData -> {'password'}."'");
                        $data = $response->fetch_assoc();
                        ReturnFormat("success",base64_encode(json_encode($data)));
                    }
                }
                break;
            default:
                break;
        }
    }
?>
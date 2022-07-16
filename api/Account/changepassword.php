<?php 
    require_once('../Utils/cors.php');
    require_once('../Utils/returnFormat.php');
    require_once('../Utils/connection.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Payload = json_decode(file_get_contents('php://input'), true);
        if($Payload['token']){
            $UserData = json_decode(base64_decode($Payload['token']));
            $username = $UserData -> {'username'};
            $password = $UserData -> {'password'};
            $userID = $UserData -> {'user_id'};
            $newPassword = $UserData -> {'newPassword'};
            $result = $connection->query("update users set password='$newPassword' where username='$username' and password='$password' and user_id='$userID'");
            if($connection -> affected_rows === 1){
                ReturnFormat('success', 'Thay đổi mật khẩu thành công');
            }else if($connection -> affected_rows === 0){
                ReturnFormat('failed', 'Sai mật khẩu');
            }else{
                ReturnFormat('warning', 'Thay đổi đã được áp dụng với nhiều tài khoản');
            }
        }
    }
?>
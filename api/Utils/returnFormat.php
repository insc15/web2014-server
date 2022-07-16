<?php 
    function ReturnFormat($status, $message){
        $obj = new stdClass();
        $obj->status = $status;
        $obj->message = $message;
        echo json_encode($obj, true);
    }
?>
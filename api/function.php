<?php 
    function doc_status($status) {
        if($status == 0) {
            return "ยังไม่ได้อ่าน";
        }else{
            return "อ่านแล้ว";
        }
    }
    function log_action($conn , $action, $detail,$user_id) {
        $sql = $conn->query("INSERT INTO tb_log(log_action,log_date,log_detail,log_user) VALUES('".$action."',now(),'".$detail."','".$user_id."')");
        $conn->close();
    }
    function logToFile($action, $msg){
        $logFile = "../log/log.txt";
        $logMsg = "[".date("Y-m-d H:i:s")."] ";
        $logMsg .= "SYSTEM: ['".strtoupper($action)."'] '".ucwords($msg)."'\n";
        file_put_contents($logFile,$logMsg,FILE_APPEND);
    }
?>
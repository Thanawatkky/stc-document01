<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'edituser':
                $sql = $conn->query("UPDATE tb_user SET email='".$_REQUEST['email']."', fname='".$_REQUEST['fname']."',lname='".$_REQUEST['lname']."' WHERE user_id='".$_REQUEST['user_id']."' ");
                if($sql) {
                    logToFile("Update","admin updated user profile successfully");
                    $_SESSION['success'] = "แก้ไขข้อมูลผู้ใช้งานสำเร็จ";
                    header("Location: ../admin/index.php?p=users");
                }else{
                    echo $conn->error;
                }
                break;
                case 'ban':
                    $sql = $conn->query("UPDATE tb_user SET user_status = 999 WHERE user_id='".$_REQUEST['user_id']."' ");
                    if($sql) {
                        logToFile("Update","admin ban user successfully");
                        $_SESSION['success'] = "ดำเนินการทำเสร็จ";
                        header("Location: ../admin/index.php?p=users");
                    }else{
                        echo $conn->error;
                    }
                    break;

        }
    }
?>
<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'admin':
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                if($sql) {
                    $fet = $sql->fetch_object();
                   if($_REQUEST['new_pass'] == $_REQUEST['confirm_pass']) {
                    if(md5($_REQUEST['current_pass']) == $fet->password) {
                        $sql_update = $conn->query("UPDATE tb_user SET password='".md5($_REQUEST['new_pass'])."' WHERE user_id='".$_SESSION['user_id']."' ");
                        if($sql_update) {
                            $_SESSION['success'] = "แก้ไขรหัสผ่านสำเร็จ";
                            header("Location: ../admin/index.php?p=forgot_pass");
                        }else{
                            echo $conn->error;
                        }
                    }else{
                        $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                        header("Location: ../admin/index.php?p=forgot_pass");
                    }
                   }else{
                    $_SESSION['error'] = "รหัสผ่านใหม่และยืนยันรหัสผ่านไม่ตรงกัน";
                    header("Location: ../admin/index.php?p=forgot_pass");
                   }
                }else{
                    echo $conn->error;
                }

            break;
            case 'user':
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                if($sql) {
                    $fet = $sql->fetch_object();
                   if($_REQUEST['new_pass'] == $_REQUEST['confirm_pass']) {
                    if(md5($_REQUEST['current_pass']) == $fet->password) {
                        $sql_update = $conn->query("UPDATE tb_user SET password='".md5($_REQUEST['new_pass'])."' WHERE user_id='".$_SESSION['user_id']."' ");
                        if($sql_update) {
                            $_SESSION['success'] = "แก้ไขรหัสผ่านสำเร็จ";
                            header("Location: ../index.php?p=forgot_pass");
                        }else{
                            echo $conn->error;
                        }
                    }else{
                        $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                        header("Location: ../index.php?p=forgot_pass");
                    }
                   }else{
                    $_SESSION['error'] = "รหัสผ่านใหม่และยืนยันรหัสผ่านไม่ตรงกัน";
                    header("Location: ../index.php?p=forgot_pass");
                   }
                }else{
                    echo $conn->error;
                }

            break;

            
            default:
                # code...
                break;
        }
    }
?>
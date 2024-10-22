<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    $sql = $conn->query("SELECT * FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    if($sql->num_rows <= 0) {
        $_SESSION['error'] = "email ไม่ถูกต้อง";
        header("Location: ../login.php");
    }else{
        $fet = $sql->fetch_object();
        if($fet->user_status == 1) {
            if(md5($_REQUEST['password']) == $fet->password) {
                $_SESSION['user_id'] = $fet->user_id;
                $_SESSION['fname'] = $fet->fname;
                $_SESSION['lname'] = $fet->lname;
                if($fet->user_role == 1) {
                    log_action($conn, "Login", "Login success", $fet->user_id);
                    logTofile("Login",$fet->fname." login successfully");
                    header("Location: ../admin/index.php");
                }else{
                    log_action($conn, "Login", "Login success", $fet->user_id);
                    logTofile("Login",$fet->fname." login successfully");
                    header("Location: ../index.php");
                }
            }else{
                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                header("Location: ../login.php");
            }
        }else{
            $_SESSION['error'] = "บัญชีของคุณโดนยกเลิกการเข้าใช้งาน เนื่องจากอาจทำผิดข้อตกลงการใช้งาน";
            header("Location: ../login.php");
        }
    }
?>
<?php 
    session_start();
    include '../connect.php';
    $sql_check = $conn->query("SELECT email FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    if($sql_check->num_rows <= 0) {
        $sql = $conn->query("INSERT INTO tb_user(email, password, fname, lname) VALUES('".$_REQUEST['email']."','".md5($_REQUEST['password'])."','".$_REQUEST['fname']."','".$_REQUEST['lname']."') ");
        if($sql) {
            $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
            header("Location: ../login.php");
        }else{
            echo $conn->error;
        }
    }else{
        $_SESSION['error'] = "email ถูกใช้งานแล้ว กรุณาเข้าสู่ระบบหรือเปลี่ยน email ของคุณ";
        header("Location: ../register.php");
    }
?>
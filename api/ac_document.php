<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'admin_send':
                if($_FILES['doc_name']['name'] != "" && $_REQUEST['owner'] != "") {
                    move_uploaded_file($_FILES['doc_name']['tmp_name'],'../document/'.$_FILES['doc_name']['name']);
                    
                    $sql = $conn->query("INSERT INTO tb_document(doc_name, doc_size, sender_id, receiver_id,send_date) VALUES('".$_FILES['doc_name']['name']."','".$_FILES['doc_name']['size']."','".$_SESSION['user_id']."','".$_REQUEST['owner']."',now())");
                    if($sql) {
                        $_SESSION['success'] = "ส่งเอกสารสำเร็จ";
                        header("Location: ../admin/index.php?p=add_doc");

                    }else{
                        echo $conn->error;
                    }
                }else{
                    $_SESSION['error'] = "คุณไม่ได้แนบไฟล์หรือไม่ได้เลือกผู้รับเอกสาร";
                    header("Location: ../admin/index.php?p=add_doc");
                    
                }
                break;
            case 'user_send':
                if($_FILES['doc_name']['name'] != "" && $_REQUEST['owner'] != "") {
                    move_uploaded_file($_FILES['doc_name']['tmp_name'],'../document/'.$_FILES['doc_name']['name']);
                    
                    $sql = $conn->query("INSERT INTO tb_document(doc_name, doc_size, sender_id, receiver_id,send_date) VALUES('".$_FILES['doc_name']['name']."','".$_FILES['doc_name']['size']."','".$_SESSION['user_id']."','".$_REQUEST['owner']."',now())");
                    if($sql) {
                        $_SESSION['success'] = "ส่งเอกสารสำเร็จ";
                        header("Location: ../index.php?p=add_doc");

                    }else{
                        echo $conn->error;
                    }
                }else{
                    $_SESSION['error'] = "คุณไม่ได้แนบไฟล์หรือไม่ได้เลือกผู้รับเอกสาร";
                    header("Location: ../index.php?p=add_doc");
                    
                }
                break;
            case 'download':
                $sql = $conn->query("SELECT * FROM tb_document WHERE doc_id='".$_REQUEST['doc_id']."' ");
                $fet = $sql->fetch_object();
                $filePath = "../document/".$fet->doc_name;
                if(file_exists($filePath)) {
                    header("Content-Type: application/octet-stream");
                    header("Content-Disposition: attachment; filename=".basename($filePath));
                    header("Content-Lenght: ".filesize($filePath));
                    readfile($filePath);
                    $sql_update = $conn->query("UPDATE tb_document SET doc_status = 1 WHERE doc_id='".$_REQUEST['doc_id']."' ");
                    exit;
                }else{
                    $_SESSION['error'] = "ไม่พบไฟล์ดังกล่าว";
                    header('Location: ../index.php?p=add_doc');
                }
                break;
                case 'del':
                    $sql = $conn->query("DELETE FROM tb_document WHERE doc_id='".$_REQUEST['doc_id']."' ");
                    if($sql) {
                        $_SESSION['success'] = "ลบข้อมูลการส่งเอกสารสำเร็จ";
                        header("Location: ../admin/index.php?p=document_box");
                    }else{
                        echo $conn->error;
                    }
                    break;
        }
    }
?>
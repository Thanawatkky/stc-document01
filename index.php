<?php 
    session_start();
    include 'connect.php';
    include 'api/function.php';
    if(empty($_SESSION['user_id'])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
        <?php 
            include 'side.php';
        ?>
    <div class="main-content" id="main-content">

            <?php 
                include 'nav.php';
            ?>
    <div class="content">
    
    <?php 
                if(isset($_SESSION['success'])) {

            ?>
            <div class="alert-success">
                <?php echo $_SESSION['success'];?>
            </div>
            <?php 
            unset($_SESSION['success']);
        }
         ?>
            <?php 
                if(isset($_SESSION['error'])) {

            ?>
            <div class="alert-error">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php 
            unset($_SESSION['error']);
        }
         ?>
        <?php 
            if(isset($_REQUEST['p'])) {
                include($_REQUEST['p'].".php");
            }else{
                include 'dashboard.php';
            }
        ?>
    </div>
</div>
<script src="js/main.js"></script>
</body>
</html>
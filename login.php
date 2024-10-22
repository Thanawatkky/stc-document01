<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin page</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Doc</h1>
        </div>
        <form action="api/ac_login.php" method="post">
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
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Example@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="text-center">
                <p style="margin: 1rem 0;">ยังไม่มีบัญชีใช่ไหม? <a href="register.php">สมัครเลย</a></p>
                <button type="submit" class="btn-submit">Signin</button>
            </div>
        </form>
    </div>
</body>
</html>
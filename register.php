<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Doc</h1>
        </div>
        <form action="api/ac_register.php" method="post">
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
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="fname">ชื่อ</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your firstname">
            </div>
            <div class="form-group">
                <label for="lname">นามสกุล</label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your lastname">
            </div>
            <div class="text-center" style="margin-bottom: 1rem;">
                <p style="margin: 1rem 0;">มีบัญชีอยู่แล้วใช่ไหม? <a href="login.php">เข้าสู่ระบบ</a></p>
                <button type="submit" class="btn-submit">Signup</button>
            </div>
        </form>
    </div>
</body>
</html>
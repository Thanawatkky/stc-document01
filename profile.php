<?php 
    $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet = $sql->fetch_object();
    
?>
<div class="card-edituser">
    <form action="api/ac_profile.php?ac=user" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $fet->email; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="fname">ชื่อ</label>
            <input type="text" name="fname" id="fname" value="<?php echo $fet->fname; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname" id="lname" value="<?php echo $fet->lname; ?>" class="form-control" required>
        </div>
      <div class="text-end">
            <a href="index.php?p=forgot_pass">เปลี่ยนรหัสผ่าน</a>
        </div>
        <button type="submit">ยืนยัน</button>
    </form>
</div>
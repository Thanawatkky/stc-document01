<h2 class="txt-header">เปลี่ยนรหัสผ่าน</h2>

<div class="card-edituser">
    <form action="../api/ac_password.php?ac=admin" method="post">
        <div class="form-group">
            <label for="current_pass">รหัสผ่านปัจจุบัน</label>
            <input type="password" name="current_pass" id="current_pass" class="form-control" placeholder="ป้อนรหัสผ่านปัจจุบันของคุณ" required>
        </div>
        <div class="form-group">
            <label for="new_pass">รหัสผ่านใหม่</label>
            <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="ป้อนรหัสผ่านใหม่ของคุณ" required>
        </div>
        <div class="form-group">
            <label for="confirm_pass">ยืนยันรหัสผ่านใหม่</label>
            <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="ป้อนรหัสผ่านใหม่อีกครั้ง" required>
        </div>
        <button type="submit">ยืนยัน</button>
    </form>
</div>
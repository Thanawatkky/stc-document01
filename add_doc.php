<h2 class="txt-header">ส่งเอกสาร</h2>
<div class="card-edituser">
    <form action="api/ac_document.php?ac=user_send" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="owner">เลือกผู้ใช้งาน</label>
            <select name="owner" id="owner" class="form-control" required>
                <option value="" disabled selected>เลือกผู้รับเอกสาร</option>
                <?php 
                    $sql = $conn->query("SELECT user_id, email FROM tb_user WHERE user_role <> 1 AND user_status = 1 AND user_id <> '".$_SESSION['user_id']."' ");
                    while($fet = $sql->fetch_object()){
                ?>
                <option value="<?php echo $fet->user_id; ?>"><?php echo $fet->email; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="document">แนบเอกสาร</label>
            <input type="file" name="doc_name" id="doc_name" class="form-control">
        </div>
            <button type="submit">ส่งเอกสาร</button>
    </form>
</div>
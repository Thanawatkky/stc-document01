<?php 
    $rows = array('#', 'UserID','Name','Email','Status','Action');
?>
<h2 class="txt-header">จัดการผู้ใช้งาน</h2>
<table>
    <thead>
        <tr>
            <?php 
                foreach ($rows as $row => $val) {
                   
            ?>
            <th><?php echo $val; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = $conn->query("SELECT * FROM tb_user WHERE user_role <> 1");
            $i=0;
            while($fet = $sql->fetch_object()) {
                $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $fet->user_id; ?></td>
            <td><?php echo $fet->fname.' '.$fet->lname; ?></td>
            <td><?php echo $fet->email; ?></td>
            <td>
                <?php 
                    if($fet->user_status == 1) {
                        echo '<p style="background-color: lightgreen; color: darkgreen; padding: 4px 2px; border-radius: 10px;">Active</p>';
                    }else{
                        echo '<p style="background-color: lightcoral; color: darkred; padding: 4px 2px; border-radius: 10px;">Ban</p>';
                    }
                ?>
               
            </td>
            <td>
               <div class="text-center">
                <?php 
                    if($fet->user_status == 1) {

                    
                ?>
                <a href="index.php?p=profile&user_id=<?php echo $fet->user_id; ?>" class="btn-edit">Edit</a>
                <a href="../api/ac_user.php?ac=ban&user_id=<?php echo $fet->user_id; ?>" onclick="return confirm('ต้องการยกเลิกการใช้บัญชีดังกล่าวหรือไม่?');" class="btn-ban">Ban</a>
              <?php } ?>
            </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
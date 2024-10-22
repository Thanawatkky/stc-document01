<?php 
    $rows = array('#', 'เอกสาร','ผู้ส่ง','ผู้รับ','วันที่ส่ง','สถานะ','Action');
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
            $sql = $conn->query("SELECT * FROM tb_document LEFT JOIN tb_user ON tb_document.sender_id = tb_user.user_id ");
            $i=0;
            while($fet = $sql->fetch_object()) {
                $i++;
                $sql_receiver = $conn->query("SELECT * FROM tb_user WHERE user_id='".$fet->receiver_id."' ");
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $fet->doc_name; ?></td>
            <td><?php echo $fet->fname.' '.$fet->lname; ?></td>
                <?php 
                    while ($fet_receiver = $sql_receiver->fetch_object()) {
                      
                ?>
            <td><?php echo $fet_receiver->fname.' '.$fet_receiver->lname; ?></td>
            <?php } ?>
            <td><?php echo date('d-m-Y',strtotime($fet->send_date));?></td>
            <td>
                <?php 
                  echo doc_status($fet->doc_status);
                ?>
               
            </td>
            <td>
               <div class="text-center">
                <a href="../api/ac_document.php?ac=del&doc_id=<?= $fet->doc_id; ?>" onclick="return confirm('ต้องการลบข้อมูลการส่งเอกสารนี้หรือไม่?')" class="btn-ban">Del</a>
            </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
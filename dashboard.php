<?php 
    $sql_send = $conn->query("SELECT * FROM tb_document WHERE sender_id='".$_SESSION['user_id']."' ");
    $sql_receiver = $conn->query("SELECT * FROM tb_document WHERE receiver_id='".$_SESSION['user_id']."'");
    $num = array($sql_send->num_rows, $sql_receiver->num_rows);
?>
<div class="col-2">
    <div class="card">
        <h3>เอกสารที่ถูกส่ง</h3>
        <p><?php echo $num[0]; ?></p>
    </div>
    <div class="card">
        <h3>เอกสารรอรับ</h3>
        <p><?php echo $num[1]; ?></p>
    </div>
</div>

<div class="card" style="margin-top: 2rem;">
          <?php 
            $rows = array('#', 'เอกสาร','ผู้ส่ง','วันที่ส่ง','สถานะ','Action');
        ?>
        <h2 class="txt-header" style="color: lightgray">จัดการผู้ใช้งาน</h2>
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
                    $sql = $conn->query("SELECT * FROM tb_document LEFT JOIN tb_user ON tb_document.sender_id = tb_user.user_id WHERE tb_document.receiver_id = '".$_SESSION['user_id']."' LIMIT 5 ");
                    $i=0;
                    while($fet = $sql->fetch_object()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fet->doc_name; ?></td>
                    <td><?php echo $fet->fname.' '.$fet->lname; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($fet->send_date));?></td>
                    <td>
                        <?php 
                        echo doc_status($fet->doc_status);
                        ?>
                    
                    </td>
                    <td>
                    <div class="text-center">
                        <?php 
                            if($fet->doc_status == 0) {

                            
                        ?>
                        <a href="api/ac_document.php?ac=download&doc_id=<?= $fet->doc_id;?>" class="btn-success">Download</a>
                    <?php } ?>
                    </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

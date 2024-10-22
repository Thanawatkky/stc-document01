<?php 
    $sql_side = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet_side = $sql_side->fetch_object();
?>
<nav class="sidebar" id="sideBar">
    <div class="text-center">
        <h3>document</h3>
    </div>
    <div class="user-panel">
        <p><?php echo $fet_side->fname." ".$fet_side->lname; ?></p>
    </div>
    <ul class="side-menu">
        <li class="side-list"><a href="" class="side-link"><p>Dashboard</p></a></li>
        <li class="side-list"><a href="index.php?p=add_doc" class="side-link"><p>ส่งเอกสาร</p></a></li>
        <li class="side-list"><a href="index.php?p=document_box" class="side-link"><p>กล่องเอกสาร</p></a></li>
        <li class="side-list"><a href="index.php?p=profile" class="side-link"><p>ข้อมูลส่วนตัว</p></a></li>
    </ul>
</nav>

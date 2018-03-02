<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 25/02/2018
 * Time: 13:38
 */
?>
<?php
    @session_start();
    require('assets/connect-db.php');
    mysql_query("SET NAMES 'utf8'");
?>
<div class="js-sticky">
    <div class="fh5co-main-nav">
        <div class="container-fluid">
            <div class="fh5co-menu-1">

                <a href="#" data-nav-section="about">Thông tin&numsp;</a>
                <a href="#" data-nav-section="features">Nổi bật</a>
                <a href="#" data-nav-section="menu">Sản phẩm&numsp;</a>
            </div>
            <div class="fh5co-logo">
                <a href="index.php" style = "color: #ff1c69">heart</a>
            </div>
            <div class="fh5co-menu-2">
                <a href="#" data-nav-section="events">Dịch vụ&numsp;</a>
                <a href="#" data-nav-section="reservation">Liên hệ&numsp;</a>
                <?php
                    if(isset($_SESSION['customer'])){
                        $fullname = "";
                        $email = $_SESSION['customer'];
                        $sql = "SELECT * FROM taikhoan where email ='$email'" ;
                        $query = mysql_query($sql);
                        $row = mysql_fetch_array($query);
                        $fullname = $row['tenkh'];
                        $phone = $row['sdt'];
                        ?>
                        <a href="cart.php"><?php echo $fullname;?></a>
                    <?php }else{ ?>
                ?>
                <a href="login.php">Đăng nhập</a>
                <?php }?>
            </div>
        </div>

    </div>

</div>

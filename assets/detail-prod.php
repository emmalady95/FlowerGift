<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 11:26
 */
?>
<?php
if(isset($_GET['det'])&&($_GET['det'])!=''){
    $tmp= $_GET['det'];
//    echo $tmp;
}else{
    $tmp='';
}

$sql= "SELECT * FROM sanpham WHERE masp = '$tmp'";
$result = mysql_query($sql);

$sql2= "SELECT tensp FROM sanpham WHERE masp = '$tmp'";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($result2);
$name = $row2[0];

?>
<div id="fh5co-menus" data-section="menu">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading to-animate">Chi tiết sản phẩm</h2>
                <p class="sub-heading to-animate"><?php echo $name;?></p>
            </div>
        </div>
        <div class = "container">
            <?php
                while($row = mysql_fetch_array($result)){
            ?>
            <div class="row row-padded" style=";">
                <div class="col-md-7">
                    <figure>
                        <!--                                    <img src="images/menu-6.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">-->
                        <?php echo '<img src="data:image/png;base64,'.base64_encode( $row['anh'] ).'"/>';?>
                    </figure>
                </div>
            </div>
            <?php }?>
        </div>

    </div>
</div>

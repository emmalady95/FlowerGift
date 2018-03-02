<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 10:56
 */
?>
<?php
    require('assets/connect-db.php');
    mysql_query("SET NAMES 'utf8'");
?>
<?php
    if(isset($_GET['prod'])&&($_GET['prod'])!=''){
        $tmp= $_GET['prod'];
        echo $tmp;
    }else{
        $tmp='';
    }

    $sql= "SELECT * FROM sanpham WHERE maloai = $tmp";
    $result = mysql_query($sql);
?>
<?php
    // CART
    @session_start();
    if(isset($_GET['add-cart'])){
        $cod_prod = $_GET['add-cart'];
        if(isset($_SESSION['cart2']) && is_array($_SESSION['cart2'])){
            $count = count($_SESSION['cart2']);
            $flag = false;
            for($i = 0; $i < $count; $i++){
                if($_SESSION['cart2'][$i]['codprod1'] == $cod_prod){
                    $_SESSION['cart2'][$i]['quanlity'] += 1;
                    $flag = true;
                    break;
                }
            }
            if($flag == false){
                $_SESSION['cart2'][$count]['codprod1'] = $cod_prod;
                $_SESSION['cart2'][$count]['quanlity'] = 1;
            }
        }else{
            $_SESSION['cart2'] = array();
            $_SESSION['cart2'][0]['codprod1'] = $cod_prod;
            $_SESSION['cart2'][0]['quanlity'] = 1;
        }
        //echo $_SESSION['cart'][0]['codprod'];
        //echo $_SESSION['cart'][0]['quanlity'];
        header("Location: product.php?prod=$tmp");
    }
?>
<div id="fh5co-menus" data-section="menu">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading to-animate">Sản phẩm</h2>
                <p class="sub-heading to-animate">Wedding Day</p>
            </div>
        </div>
        <div class="row row-padded">
            <div class="col-md-12">
                <div class="fh5co-food-menu to-animate-2">
                    <!--                    <h2 class="fh5co-drinks">Drinks</h2>-->
                    <ul>
                        <?php
                            while($row = mysql_fetch_array($result)){
                        ?>
                        <li>
                            <div class="fh5co-food-desc">
                                <figure>
<!--                                    <img src="images/menu-6.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">-->
                                    <?php echo '<img src="data:image/png;base64,'.base64_encode( $row['anh'] ).'"/>';?>
                                </figure>
                                <div>
                                    <h3><?php echo $row['tensp']?></h3>
                                    <p><?php echo number_format($row['gia']);?> VNĐ</p>
                                </div>
                            </div>
                            <?php if(isset($_SESSION['customer'])){ ?>
                            <div class="fh5co-food-pricing">
                                <a href="product.php?prod=<?php echo $tmp;?>&add-cart=<?php echo $row['masp'];?>">Mua hàng</a>
                            </div>
                            <?php }?>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



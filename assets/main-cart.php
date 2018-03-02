<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 12:44
 */
?>
<?php
    @session_start();
    require('assets/connect-db.php');
    mysql_query("SET NAMES 'utf8'");
    $email =$_SESSION['customer'];
    if(isset($_SESSION['cart2'])){
        if(isset($_GET['minus'])){
            $minus = $_GET['minus'];
            for($i = 0; $i < count($_SESSION['cart2']); $i++){
                if($_SESSION['cart2'][$i]['codprod1'] == $minus){
                    $_SESSION['cart2'][$i]['quanlity'] -= 1;
                }
            }
        }
        if(isset($_GET['plus'])){
            $plus = $_GET['plus'];
            for($i = 0; $i < count($_SESSION['cart1']); $i++){
                if($_SESSION['cart2'][$i]['codprod1'] == $plus){
                    $_SESSION['cart2'][$i]['quanlity'] += 1;
                }
            }
        }
    }
//header("Location: cart.php");
?>
<section id="cart_items">
    <div class="container">
        <div class="main-content row">
            <div class = "container">
                <ul class="tags">
                    <li style = "margin-top: 20px;"><a href="cart.php">Giỏ hàng <span>Sản phẩm</span></a></li>
                </ul>
            </div>

            <div class="cart_info">
                <h3 class="text-center" style = "color:#eb6b22; ">SẢN PHẨM ĐÃ CHỌN</h3>
                <form action="#" type="POST">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image" style="text-align: center;"></td>
                            <td class="description" style="text-align: center;">Sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity" style="text-align: center;">Số lượng</td>
                            <td class="total" style="text-align: center;">Tổng tiền</td>
                            <td></td>
                        </tr>
                        </thead>
                        <?php
                        if(!isset($_SESSION['cart2'])){
                            echo '<p style = "text-align:center;margin-top:20px;">Bạn chưa chọn sản phẩm nào</p>';
                        }else{
                        for($i = 0; $i < count($_SESSION['cart2']); $i++){
                        $cod = $_SESSION['cart2'][$i]['codprod1'];
                        $query = mysql_query("SELECT * FROM sanpham WHERE masp = '$cod'");
                        //echo $query;
                        $row = mysql_fetch_array($query);
                        $int = 1;

                        ?>
                        <tbody>
                        <tr>
                            <td class="cart_product" style="text-align: center;">
                                <a>

                                    <?php echo '<img class = "col-xs-7" src="data:image/png;base64,'.base64_encode( $row['anh'] ).'"/>';?></a>
                            </td>
                            <td class="cart_description" style="text-align: center;">
                                <h4><a href=""><?php echo $row['tensp']; ?></a></h4>

                            </td>
                            <td class="cart_price">
                                <p><?php echo number_format($row['gia']); ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="?plus=<?php echo $row['masp']; ?>" title = "Thêm">+<i class ="fa fa-plus"></i></a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_SESSION['cart2'][$i]['quanlity']; ?>" autocomplete="off" size="4">
                                    <a class="cart_quantity_down" href="?minus=<?php echo $row['masp']; ?>" title = "Giảm"> - </a>
                                </div>
                            </td>
                            <td class="cart_total" style="text-align: center;">
                                <p class="cart_total_price">
                                    <?php
                                    $price = $row['gia'];
                                    $int = $_SESSION['cart2'][$i]['quanlity'];
                                    $total= $int * $price;
                                    echo number_format($total);
                                    ?> VNĐ
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="?delete=<?php  echo $row['masp']; ?>" title = "Xóa"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        }
                        ?>
                        </tbody>
                        <tfoot class = "sum-money">
                        <tr class="container" >
                            <?php
                            $sum_money = 0;
                            if(!isset($_SESSION['cart2']))
                            {
                                echo '';
                            }else{
                                for($i = 0; $i < count($_SESSION['cart2']); $i++){
                                    $cod = $_SESSION['cart2'][$i]['codprod1'];
                                    $query1 = mysql_query("SELECT * FROM sanpham WHERE masp = '$cod'");
                                    $row1 = mysql_fetch_array($query1);
                                    $tot = $row1['gia'] * $_SESSION['cart2'][$i]['quanlity'];
                                    $sum_money = $sum_money + $tot;
                                }
                                ?>
                                <td>TỔNG TIỀN</td>
                                <td><?php echo number_format($sum_money);
                                    ?> Đ</td>
                                <td><a href = "checkout.php"><input style = "background: #eb6b22;width:150px;height: 50px;color: #fff;" type="button" name="checkout" value="Check out"></a></td>
                            <?php }
                            ?>
                        </tr>
                        </tfoot>
                    </table>
                </form>

                <!--**************************************************************************************************-->
                <h3 class="text-center" style = "color:#eb6b22;margin-top:40px;">SẢN PHẨM ĐÃ THÊM</h3>
                <form action="#" method="POST">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image" style="text-align: center;"></td>
                            <td class="description" style="text-align: center;">Sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity" style="text-align: center;">Số lượng</td>
                            <td class="total" style="text-align: center;">Tổng tiền</td>
                            <td class="total" style="text-align: center;">Ngày thêm</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query2 = mysql_query("SELECT c.id,email,masp,sl,gia,ngaylap from giohang c, ctgiohang cd where (c.id = cd.id) and (email = '$email')");

                        while($row = mysql_fetch_array($query2)){
                            ?>
                            <tr>
                                <td class="cart_product" style="text-align: center;">
                                    <a href="">
                                        <?php
                                        $cod = $row['masp'];
                                        $sql = mysql_query("SELECT anh FROM sanpham WHERE masp = '$cod' ");
                                        $row2 = mysql_fetch_array($sql);

                                        ?>
                                        <?php echo '<img class = "col-xs-7" src="data:image/png;base64,'.base64_encode( $row2[0] ).'"/>';?></a>
                                    </a>
                                </td>

                                <td class="cart_description" style="text-align: center;">
                                    <h4><a href="">
                                            <?php
                                            $cod1 = $row['masp'];
                                            $sql3 = mysql_query("SELECT tensp FROM sanpham WHERE masp= '$cod1'");
                                            $row3 = mysql_fetch_array($sql3);
                                            echo $row3[0];
                                            ?>
                                        </a></h4>

                                </td>

                                <td class="cart_price">
                                    <p><?php echo number_format($row['gia']); ?></p>
                                </td>

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $row['sl']; ?>" autocomplete="off" size="4">
                                    </div>
                                </td>

                                <td class="cart_total" style="text-align: center;">
                                    <p class="cart_total_price">
                                        <?php
                                        $price = $row['gia'];
                                        $int = $row['sl'];
                                        $total= $int * $price;
                                        echo number_format($total);
                                        ?> VNĐ
                                    </p>
                                </td>

                                <td class="cart_total" style="text-align: center;">
                                    <p class="cart_total_price">
                                        <?php echo $row['ngaylap']; ?>
                                    </p>
                                </td>

                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="" title = "Xóa"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot class = "sum-money">
                        <?php
                        $query4 = mysql_query("SELECT SUM(gia * sl) from giohang c,ctgiohang cd where email = '$email' and (c.id = cd.id)");
                        $r = mysql_fetch_array($query4);
                        $sum = $r[0];

                        ?>
                        <tr class = "container">
                            <td>TỔNG TIỀN</td>
                            <td><?php echo number_format($sum);?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <?php
                    $sql = mysql_query("SELECT SUM(c.id) FROM ctgiohang cd, giohang c WHERE (cd.id = c.id) and email ='$email'");
                    $re = mysql_fetch_array($sql);
                    $ro = $re[0];
                    if($ro == NULL){
                        echo '';
                    }else{
                        ?>
                        <!--                                <center><a style = "margin-top: 20px;" type="button"  class="popup-with-form btn btn-fefault cart" href = "#buy-cart">-->
                        <!--                                        <i class="fa fa-shopping-cart"></i>  Mua hàng-->
                        <!--                                    </a></center>-->
                        <center><td><a href = "#"><input style = "background: #eb6b22;width:150px;height: 50px;color: #fff;" type="button" name="Mua hàng" value="Check out"></a></td>
                        </center><?php } ?>

                </form>

                <!-- ********************************** BUY CART *********************************************-->
                <h3 class="text-center" style = "color:#eb6b22;margin-top:40px;">SẢN PHẨM ĐÃ MUA</h3>
                <form action="#" method="POST">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="description" style="text-align: center;">Mã Sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity" style="text-align: center;">Số lượng</td>
                            <td class="total" style="text-align: center;">Tổng tiền hóa đơn</td>
                            <td class="total" style="text-align: center;">Ngày Mua</td>
                            <td class="total" style="text-align: center;">Tình trạng</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query3 = mysql_query("SELECT cod_prod,quantity,unit_price,sum_money,quantity,date,state from bill b, billdetail bd where (b.bill_num = bd.bill_num) and (email = '$email')");

                        while($row = mysql_fetch_array($query3)){
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="">
                                        <?php
                                        echo $row['cod_prod'];?>
                                    </a>
                                </td>

                                <td class="cart_description">
                                    <a><?php echo $row['unit_price']; ?></a>
                                </td>

                                <td class="cart_price">
                                    <a><?php echo $row['quantity']; ?></a>
                                </td>

                                <td class="cart_quantity">
                                    <a><?php echo $row['sum_money']; ?></a>
                                </td>

                                <td class="cart_total">
                                    <a><?php echo $row['date']; ?></a>
                                </td>

                                <td class="cart_total">
                                    <a><?php echo $row['state']; ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- ********************************** BUY CART *********************************************-->
<form id="buy-cart" class="white-popup-block mfp-hide form-horizontal" action="buy-cart.php" method = "POST">
    <h4 class="title text-center" style = "margin-top:20px;color:#FF3030;">ĐẶT MUA HÀNG</h4>

    <div class="form-group">
        <label class="col-sm-3 control-label">Size</label>
        <div class="col-sm-3">
            <select name="size">
                <?php
                $sql1 = "SELECT size FROM productdetail group by size";
                $query1 = mysql_query($sql1);
                while($row1 = mysql_fetch_array($query1)){
                    ?>
                    <option>
                        <?php echo $row1[0];?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Màu sắc</label>
        <div class="col-sm-3">
            <select name="color">
                <?php
                $sql2 = "SELECT color FROM productdetail group by color";
                $query2 = mysql_query($sql2);
                while($row2 = mysql_fetch_array($query2)){
                    ?>
                    <option>
                        <?php echo $row2[0];?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group mt-lg">
        <label class="col-sm-3 control-label">Tên khách hàng</label>
        <div class="col-sm-5">
            <input type="text" name="fullname" class="form-control" value="<?php echo $fullname;?>" required />
        </div>
    </div>

    <div class="form-group mt-lg">
        <label class="col-sm-3 control-label">Số điện thoại</label>
        <div class="col-sm-5">
            <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" required />
        </div>
    </div>

    <div class="form-group mt-lg">
        <label class="col-sm-3 control-label">Địa chỉ</label>
        <div class="col-sm-5">
            <input type="text" name="address" class="form-control" placeholder="" required/>
        </div>
    </div>

    <div class="row mb-lg">
        <div class="col-sm-9 col-sm-offset-3">
            <button class="btn btn-primary">Mua hàng</button>
        </div>
    </div>
</form>
<script src="assets/jvscript/main.js" type="text/javascript"></script>

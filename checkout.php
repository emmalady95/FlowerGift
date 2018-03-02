<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 13:01
 */
?>

<?php
    @session_start();
    require('assets/connect-db.php');
    mysql_query("SET NAMES 'utf8'");
    if(isset($_SESSION['customer'])){
        $email = $_SESSION['customer'];
    }
    //echo $email;
    //  if(isset($_SESSION['cart2']))
    //      echo "CÓ NHÉ";
    // elses
    //      echo "KHÔNG NHÉ";
    $result = mysql_query("SELECT now()");
    $r = mysql_fetch_array($result);
    $date = $r[0];
    //echo $date;
    $query = mysql_query("INSERT INTO giohang(`email`,`ngaylap`) VALUES('$email','$date')");
    //echo count($_SESSION['cart2']);
    if($query){
        for($i = 0; $i < count($_SESSION['cart2']); $i++){
            //echo count($_SESSION['cart2']);
            $max = mysql_query("SELECT max(id) FROM giohang");
            // //  		//echo $max;
            $row = mysql_fetch_array($max);
            // //  		//echo $row[0];
            $cart_id = $row[0];
            $product_id = $_SESSION['cart2'][$i]['codprod1'];
            //          //echo $product_id;
            $qual = $_SESSION['cart2'][$i]['quanlity'];
            //          //echo $qual;
            $product = mysql_query("SELECT gia FROM sanpham where masp = '$product_id'");
            $row1 = mysql_fetch_array($product);
            $price = $row1[0];
            mysql_query("INSERT INTO ctgiohang(`id`,`masp`,`sl`,`gia`) VALUES($cart_id, '$product_id',$qual,$price)");
            //echo " INSERT INTO cartdetail(`id`,`cod_prod`,`quantity`,`unit_price`) VALUES($cart_id, '$product_id',$qual,$price)";
        }
    }
    unset($_SESSION['cart2']);
header("Location:cart.php");

?>
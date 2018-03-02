<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 11:53
 */
?>
<?php
    require('assets/connect-db.php');
    @session_start();
    if(count($_POST) > 0){
        $username = $_POST['uuser'];
        $password = $_POST['upass'];
        $sql = "SELECT email FROM taikhoan where email = '$username' and password = '$password' ";
        //echo "SELECT email FROM taikhoan where username = '$username' and password = '$password'";
        $query = mysql_query($sql);
        $result = mysql_fetch_array($query);

        if($result){
            $_SESSION['customer'] = $result['email'];
            echo 'Xin chào'.' '.$username.' .Bạn đã đăng nhập thành công';
            header("Location: index.php");
        }
        else{
            $_SESSION['error'] = "Đăng nhập không thành công";
            header("Location: login.php?login=false");
        }

    }
?>

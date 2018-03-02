<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 12:05
 */
?>
<?php
require('php/connect-db.php');
mysql_query("SET NAMES 'utf8'");
@session_start();
if(count($_POST) > 0){
    $username = $_POST['reuser'];
    $password = $_POST['repass'];
    $fullname = $_POST['rename'];
    $phone = $_POST['rephone'];

    $sql = "INSERT INTO taikhoan(email,password,tenkh,sdt) values('$username','$password','".$fullname."',$phone)";

    $query = mysql_query($sql);
    // $result = mysql_fetch_array($query);

    if($query){
        $id = 0;
        $sql = "SELECT email FROM taikhoan where username = '$username' and password = '$password' " ;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        $id = $row['email'];
        $_SESSION['customer'] = $id;
        // echo 'Xin chào'.' '.$username.' .Bạn đã đăng nhập thành công';
    }
    else{
        // $_SESSION['error'] = "Đăng ký không thành công";
        echo '<script type="text/javascript" language = "javascript">alert("Đăng ký không thành công!");</script>'
        header("Location: login.php");

		}
    header("Location: index.php");

}
?>

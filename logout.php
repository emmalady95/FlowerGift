<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 11:51
 */
?>
<?php
    @session_start();
    unset($_SESSION['customer']);
    header("Location: index.php");
?>

<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 10:31
 */
?>
<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    // $db = 'hnriot';
    // $conn = @mysql_connect('localhost', 'root', '')
    //      	  	  or die("Unable connect to MySQL: " . mysql_error() ."<br>");

    //      	  mysql_select_db('hnriot', $conn) or
    //      	  	  die("Unable to select DB: " . mysql_error() . "<br>");
    $conn = @mysql_connect($host, $user, $pass);
    mysql_select_db('heartshop', $conn);
?>

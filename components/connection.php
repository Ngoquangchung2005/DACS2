<?php
$conn=mysqli_connect("localhost", "root", "", "shop_db");

function unique_id(){
    $char='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($char);
    $randomString='';
    for ($i=1;$i<20;$i++){
        $randomString.=$char[mt_rand(0,$charLength-1)];
    }
    return $randomString;
}
?>
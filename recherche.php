<?php
require(pdo.php);
$n=$_POST['T1'];
$p=$_POST['T2'];
$q="select * from user where $n='nom' ";
$r=mysqli_query($conn,$q);
if($r){
    echo("existe");
}

?>
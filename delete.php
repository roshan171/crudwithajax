<?php

include 'connect.php';

if(isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $sql="delete from `crudmodal` where id=$unique";
    $result=mysqli_query($conn,$sql);
}


?>
<?php

$conn = mysqli_connect("localhost","root","","crud");

if(!$conn){
    //echo"coonection successfull";
    die (mysqli_error($conn));
}




?>
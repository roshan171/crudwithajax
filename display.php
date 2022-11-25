<?php

include 'connect.php';

if(isset($_POST['displaySend'])){
    $table = '<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">place</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';

    $sql="select * from `crudmodal`";
    $result=mysqli_query($conn,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $place=$row['place'];
        $table.=' <tr>
        <th scope="row">'.$number.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$place.'</td>
        <td>
    <button class="btn btn-dark" data-toggle="modal" data-target="#updatemodal" onclick="UpdateUser('.$id.')">Update</button>
    <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
</td>
      </tr>';
      $number++;
}
$table.='</table>';
echo $table;
}


?>


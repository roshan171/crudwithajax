<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud with bootstrap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="alert alert-warning">


<!-- Modal -->
<div class="modal fade" id="completemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="completename">Enter Name:</label>
    <input type="text" class="form-control" id="completename"  placeholder="Enter Name">
      </div>
      <div class="form-group">
    <label for="completeemail">Enter Email:</label>
    <input type="email" class="form-control" id="completeemail"  placeholder="Enter Email">
      </div>
      <div class="form-group">
    <label for="completemobile">Enter Mobile:</label>
    <input type="text" class="form-control" id="completemobile"  placeholder="Enter Mobile">
      </div>
      <div class="form-group">
    <label for="completeplace">Enter place:</label>
    <input type="text" class="form-control" id="completeplace"  placeholder="Enter Place">
      </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="adduser()">Submit</button>
        <button type="button" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div>

<!--update modal-->

<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="updatename">Enter Name:</label>
    <input type="text" class="form-control" id="updatename"  placeholder="Enter Name">
      </div>
      <div class="form-group">
    <label for="updateemail">Enter Email:</label>
    <input type="email" class="form-control" id="updateemail"  placeholder="Enter Email">
      </div>
      <div class="form-group">
    <label for="updatemobile">Enter Mobile:</label>
    <input type="text" class="form-control" id="updatemobile"  placeholder="Enter Mobile">
      </div>
      <div class="form-group">
    <label for="updateplace">Enter place:</label>
    <input type="text" class="form-control" id="updateplace"  placeholder="Enter Place">
      </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="updateDetails()">Update</button>
        <button type="button" class="btn btn-danger">Close</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>


    <h1 class="text-center">Crud Operation With Modal</h1>
    <button class="btn btn-dark my-3" data-toggle="modal" data-target="#completemodal">Add User</button>
    <div id="displayDataTable"></div>














<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script>

$(document).ready(function(){
    displayData();

});

    // display  function

    function displayData(){
        var displayData='true';
        $.ajax({
            url:'display.php',
            type:'post',
            data:{
                displaySend:displayData
            },
            success:function(data,status){
$('#displayDataTable').html(data);
            }
        });

    }



    function adduser(){
        var nameAdd=$('#completename').val();
        var emailAdd=$('#completeemail').val();
        var mobileAdd=$('#completemobile').val();
        var placeAdd=$('#completeplace').val();
    

    $.ajax({
        url:"insert.php",
        type:'post',
        data:{
            nameSend:nameAdd,
            emailSend:emailAdd,
            mobileSend:mobileAdd,
            placeSend:placeAdd
            
        },
        success:function(data,status){
            //function to  display data
            //console.log(status);
            $('#completemodal').modal('hide');
            displayData();
        }
    
    });
}


// delete record

function DeleteUser(deleteid){
    $.ajax({
        url:"delete.php",
        type:'post',
        data:{
            deletesend:deleteid
        },
        success:function(data,status){
            displayData();
        }
    });
}


//Update record

function UpdateUser(updateid){
  $('#hiddendata').val(updateid);
  
  $.post("update.php",{updateid:updateid},function(data,status){
    var userid=JSON.parse(data);
    $('#updatename').val(userid.name);
    $('#updateemail').val(userid.email);
    $('#updatemobile').val(userid.mobile);
    $('#updateplace').val(userid.place);
  });
}

// onclick function update user
function updateDetails() {
  var updatename=$('#updatename').val();
  var updateemail=$('#updateemail').val();
  var updatemobile=$('#updatemobile').val();
  var updateplace=$('#updateplace').val();
  var hiddendata=$('#hiddendata').val();

  $.post("update.php",{
    updatename:updatename,
    updateemail:updateemail,
    updatemobile:updatemobile,
    updateplace:updateplace,
    hiddendata:hiddendata
  },
  function(data,status){
    $('#updatemodal').modal('hide');
    displayData();
  });
  }
 
  

</script>
    
</body>
</html>
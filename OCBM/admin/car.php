<?php include_once('header.php');?>
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>	

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$insert = false;
$delete = false;
include('adminconnection.php');
if(isset($_GET['delid']))
{
$delid = $_GET['delid'];

$sql = "DELETE FROM `car` WHERE `car`.`car_id` = $delid";
$result = mysqli_query($conn, $sql);
if($result)
{
    // echo "Deleted";
    $delete = true;
}
else{
    echo " not Deleted";
}
}
  // if($_SERVER['REQUEST_METHOD'] == "POST"){
  //   if(isset($_POST['idEdit'])){
  //     $id = $_POST["idEdit"];
  //     $name = $_POST["nameEdit"];
  //     $description = $_POST["descriptionEdit"];
  //     $status = $_POST["statusEdit"];
  //   //   $file_name = $_FILES['uploadfileEdit']['name'];
  //   //   $file_tmp = $_FILES['uploadfileEdit']['tmp_name'];
  //   //   $file_type = $_FILES['uploadfileEdit']['type'];
  //   //   $file_size = $_FILES['uploadfileEdit']['size'];
  //   //   // Specify a directory to store uploaded files
  //   //   $upload_dir = '../admin/car-images/';
  //   //   $target_file = $upload_dir . $file_name;
  //   //   var_dump($file_name);
  //   // //   Move the uploaded file to the target directory
  //   //   if (move_uploaded_file($file_tmp, $target_file)) {
      
  //     $sql = "UPDATE `car` SET `name` = '$name' , `description` = '$description' , `status` = '$status' WHERE `car`.`id` = $id";
  //     $result = mysqli_query($conn, $sql);
  //     if($result){
  //      $update = true;
  //     }
  //     else{
  //       echo "Car has not updated successfully";
  //     }
  //   }







  
  
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['uploadfile'])) {
      $car_name = $_POST["car_name"];
      $description = $_POST["description"];
      $status = $_POST["status"];
      $file_name = $_FILES['uploadfile']['name'];
      $file_tmp = $_FILES['uploadfile']['tmp_name'];
      $file_type = $_FILES['uploadfile']['type'];
      $file_size = $_FILES['uploadfile']['size'];
      // Specify a directory to store uploaded files
      $upload_dir = '../admin/car-images/';
      $target_file = $upload_dir . $file_name;
  
      // Move the uploaded file to the target directory
      if (move_uploaded_file($file_tmp, $target_file)) {
          // File upload successful, perform database operations here
          $sql = "INSERT INTO `car` (`doc`, `car_name`, `description`, `status`) VALUES ('$file_name', '$car_name', '$description', '$status')";
          $result = mysqli_query($conn,$sql);
          if($result){
              $insert = true;
          }else{
              echo "Error on update query";
          }
      } 
  }
 
  //  }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="./assets/css/registration.css">

<style>
    h3{
        text-align: center;
        color: #2b6eff;
    }
    .cart-button {
  position: relative;
  padding: 10px;
  width: 100px;
  height: 50px;
  margin:12px;
  border: 0;
  border-radius: 10px;
  background-color:#6895f7;
  outline: none;
  cursor: pointer;
  color: #fff;
}
.cart-button:hover {
  background-color:#8bc0fc;
}
/* .edit_2 {
            color: black;
            background-color: #437fe7;
        } */

        /* .remove {
            color: black;
            background-color:red;
        } */
        img{
            height:100px;
            width:100px;
        }
        td a{
            padding: 5px;
            background-color: #639af2;
            color: white;
            border-radius: 5px;
}
td a :hover{
            padding: 5px;
            background-color: green;
            color: white;
}
/* .active1{
            background-color: green;
            color: #fff;
        }

        .inactive {
          background-color: red;
            color: #fff;
        } */
        .error{
          color:red;
        }


</style>
</head>
 
<body>
        <h3>CAR</h3>
            <div>
                    <button class="cart-button" id="openModal">
                  Add Car 
                    </button>
            </div>
           <!-- Modal -->
<!-- <div class="modal fade" id="editcarmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Edit Car</h5>
        <button type="button" class="close" id="closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="car.php" method="POST" >
          <input type="hidden" name="idEdit" id="idEdit">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="1"></textarea>
              </div>
            <div class="form-group">
                <label for="status">status</label>
                <input class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
              </div>
         
            <div class="modal-footer d-block mr-auto">

              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
    </div>
  </div>
</div>

</div> -->
<?php
 if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Car has been inserted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>
<?php
 if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Car has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }

?>


    <!-- Modal -->
<div class="modal fade" id="addcarmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-name" id="exampleModalLabel">Add Car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="car.php" method="POST" enctype="multipart/form-data" id="carvali">
          <!-- <input type="hidden" name="idEdit" id="idEdit"> -->
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" id="uploadfile" name="uploadfile" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="car_name" name="car_name" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>
        
          <div class="form-group">
              <label for="status">status</label>
              <input type="text" class="form-control" id="status" name="status" aria-describedby="emailHelp">
            </div>
            <div class="modal-footer d-block mr-auto">
              <!-- <button type="submit" class="btn btn-secondary " id="close" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Add Car</button>
            </div>
          </form>
</div>
    </div>
  </div>
</div>
<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Car_ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">status</th>
      <th scope="col">Created_on</th>
      <th scope="col">Updated_on</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $sql = "SELECT * FROM `car`";
  $result = mysqli_query($conn, $sql);
$car_id = 0;
while($data = mysqli_fetch_array($result)){
  $car_id++;

 ?>

<tr>
<td><?Php echo $data['car_id']; ?></td>
<td><img src="../admin/car-images/<?php echo $data['doc']; ?>"style="height:100px;"></td>
<td><?Php echo $data['car_name']; ?></td>
<td><?Php echo $data['description']; ?></td>
<td><button disabled type="button" class="btn btn-sm btn-success">Active</button></td>
<td><?Php echo $data['created_on']; ?></td>
<td><?Php echo $data['updated_on']; ?></td>
<td><a href="editcar.php?editid=<?php echo $data['car_id']; ?>">Edit</a>
<a href="car.php?delid=<?php echo $data['car_id']; ?>" class='delete btn btn-sm btn-danger'>Delete</a></td>
</tr>
<?php 
 }
?>
  
  </tbody>
</table>
</div>

<script>
    $('document').ready(function () {
      $('#carvali').validate({
          rules:{
            uploadfile: 
            {
              required:true
            },
            car_name: 
            {
              required:true
            },
            description: 
            {
              required:true
            },
            status: 
            {
              required:true
            }
          }
             
        })
     
    $('#openModal').click(function () {
        $('#addcarmodal').modal('toggle');
    });
    $('.close').click(function () {
        $('#addcarmodal').modal('hide');
    });
})


</script>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    
    
    <script>
      $("#myTable").DataTable({
        "pageLength": 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
      });
      
      
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
			 
      </body>
    </html>
 <!---footer---->
  
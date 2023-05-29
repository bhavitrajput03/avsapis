<!DOCTYPE html>
<html>

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body {
  font-size: 20px;
}
.bs-example{
      margin: 90px;
    }
    .fa {
  padding: 20px;
  font-size: 20px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-instagram {
  background: #f09433; 
background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}
.font{
  font-size: 20px;
  
  
}
</style>

</head>
<body>


<div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onclick="window.location.href='https://google.com'">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Thank You For Your Feedback!</h4>
            </div>
            <div class="modal-body">
                <p>Please Follow and Like us on!</p>                     
            </div> 
<center>
<a href="https://www.facebook.com/Automobile-vintage-SPA-105676131152490/?modal=admin_todo_tour" class="fa fa-facebook"></a>
<a href="https://www.instagram.com/avs486/" class="fa fa-instagram"></a>
<a href="#" class="fa fa-google"></a>
</center>
        </div>
    </div>
</div>



<?php
$conn=mysqli_connect("localhost","id20818722_id13787439_admin","rRajput@291194","id20818722_id13787439_avs_customer_records");

// if(isset($_GET['cid'])){
      
//      $txt = $_GET['cid'];


if(isset($_GET['cid'])){
      
     $txt = $_GET['cid'];

list($a, $d) = explode('@',$txt);
   }

  
// }

if(isset($_POST['submit']))
        {
        $fb = $_POST['submit'];

$query=mysqli_query($conn,"UPDATE visiters SET feedback = '$fb' WHERE cid ='$a' AND date like '$d%'");
echo "<script>$('#thankyouModal').modal('show')</script>";
        }





?>







   <!--  <form action="" method="post" >
<input type="text" name="username"  class="form-control" >
<input type="submit" name="submit" class="btn btn-success">
        </form> -->

 
<div class="container">
  <h1>Please Share Your Feed Back!</h1>
  <div class="row">
      <form action="" method="post" >

   <button  class="btn col-sm-4" style="background-color:blue;"
       type="Submit"  name="submit" value="GOOD" >
     <span style='font-size:100px;'>&#128522;</span>
<p class="font" style="color:white;">GOOD &#128522;</p></button>
  
<button class="btn col-sm-4 " style="background-color:pink;"  type="Submit" name="submit" value="AVG" >
     <span style='font-size:100px;'>&#128578;</span>
<p class="font" style="color:white;">AVREGE &#128578;</p></button>

    
    <button class="btn col-sm-4 " style="background-color:red;"  type="Submit" name="submit" value="BAD" >
     <span style='font-size:100px;'>&#128524;</span>
<p class="font" style="color:white;">BAD &#128524;</p></button>

</form>
    </div>
    </div>

<script type="text/javascript">
  
  
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

</script>



    </body>
</html>

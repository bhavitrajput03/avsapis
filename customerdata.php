<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");


// $rowID = isset($_POST['name']) ? $_POST['name'] : '';

// echo $rowID;

$request=$_SERVER['REQUEST_METHOD'];
$data=array();
switch ($request) {

	case 'POST':
		response(adddata());
		
		break;
	
}


function adddata(){
	global $conn;


	$vecle_number=$_POST['vechile_number'];
	$date=$_POST['datetime'];
	$vecle_name=$_POST['vechile_id'];
	$empId = $_POST['employeeID'];
	
$result = mysqli_query($conn,"SELECT * FROM customerdata WHERE vechile_number='$vecle_number' LIMIT 1");

$result1 = mysqli_query($conn,"SELECT * FROM vechile_type WHERE vechile_name='$vecle_name' LIMIT 1");

$busnessid = mysqli_query($conn,"SELECT * FROM employees WHERE employeeID='$empId' LIMIT 1");

$busnessIdGet = mysqli_fetch_assoc($busnessid);

$num_rows1 = mysqli_num_rows($result1);
$num_rows = mysqli_num_rows($result);
// echo $num_rows;
if ($num_rows > 0) {
 $result = mysqli_query($conn,"SELECT cid FROM customerdata WHERE vechile_number='$vecle_number'");

 $num_rows = mysqli_fetch_assoc($result);
 
 $query=mysqli_query($conn,"insert into visiters(cid,date,feedback,employeeID,businessID) values('".$num_rows['cid']."','$date','','$empId','".$busnessIdGet['businessID']."')");

	 if($query==true){
	 
	 	$data[]=array("message"=>"create","cid"=>$num_rows['cid']."@".$date);

	 }else{
	 	$data[]=array("message"=>"not create");
	 }
	 return $data;
}
else if($num_rows1>0){
$get_vehcle_id = mysqli_query($conn,"SELECT vechile_id FROM vechile_type WHERE vechile_name='$vecle_name'");

 $v_id = mysqli_fetch_assoc($get_vehcle_id);

$query=mysqli_query($conn,"insert into customerdata(customer_name,mobile_number,vechile_number,date,vechile_id) values('".$_POST['customer_name']."','".$_POST['mobile_number']."','".$_POST['vechile_number']."','$date','".$v_id['vechile_id']."')");
	 if($query==true){
	 
	 	$result2 = mysqli_query($conn,"SELECT cid FROM customerdata WHERE vechile_number='".$_POST['vechile_number']."'");

 $num_rows2 = mysqli_fetch_assoc($result2);

 $query=mysqli_query($conn,"insert into visiters(cid,date,feedback,employeeID,businessID) values('".$num_rows2['cid']."','$date','','$empId','".$busnessIdGet['businessID']."')");
	 if($query==true){
	 
	 	$data[]=array("message"=>"create","cid"=>$num_rows2['cid']."@".$date);

	 }else{
	 	$data[]=array("message"=>"not create");
	 }
	 return $data;

	 }else{
	 	$data[]=array("message"=>"not create");
	 }
	 return $data;
}

else {

$query=mysqli_query($conn,"insert into vechile_type(vechile_name) values('".$_POST['vechile_id']."')");
	 if($query==true){
	 $get_vehcle_id = mysqli_query($conn,"SELECT vechile_id FROM vechile_type WHERE vechile_name='$vecle_name'");

 $v_id = mysqli_fetch_assoc($get_vehcle_id);

$query=mysqli_query($conn,"insert into customerdata(customer_name,mobile_number,vechile_number,date,vechile_id) values('".$_POST['customer_name']."','".$_POST['mobile_number']."','".$_POST['vechile_number']."','$date','".$v_id['vechile_id']."')");
	 if($query==true){
	 
	 	$result2 = mysqli_query($conn,"SELECT cid FROM customerdata WHERE vechile_number='".$_POST['vechile_number']."'");

 $num_rows2 = mysqli_fetch_assoc($result2);

 $query=mysqli_query($conn,"insert into visiters(cid,date,feedback,employeeID,businessID) values('".$num_rows2['cid']."','$date','','$empId','".$busnessIdGet['businessID']."')");
	 if($query==true){
	 
	 	$data[]=array("message"=>"create","cid"=>$num_rows2['cid']."@".$date);

	 }else{
	 	$data[]=array("message"=>"not create");
	 }
	 return $data;

	 }else{
	 	$data[]=array("message"=>"not create");
	 }
	 return $data;

	 }


  
}

	
}


function response($data){
	 echo json_encode($data);
}

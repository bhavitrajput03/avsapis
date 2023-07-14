<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");

$request=$_SERVER['REQUEST_METHOD'];
$data=array();
switch ($request) {
	case 'POST':
		response(getdata());
		break;
	
	
	
}


function getdata(){
	global $conn;
     
	// $vecle_name=$_GET['vechile_type'];
	// $vecle_number=$_POST['vechile_number'];
	$busId = $_POST['businessID'];

 $query1= mysqli_query($conn,"SELECT COUNT(*) as count FROM `visiters` inner join employees e on e.employeeID=visiters.employeeID  WHERE visiters.businessID='$busId'");
 
$row=mysqli_fetch_assoc($query1);



$query2= mysqli_query($conn,"SELECT COUNT(*) as count1 FROM visiters inner join employees e on e.employeeID=visiters.employeeID  WHERE visiters.businessID='$busId' AND DATE(date) = CURDATE()");
   
   $row2=mysqli_fetch_assoc($query2);


$query3= mysqli_query($conn,"SELECT COUNT(*) as count2 FROM `visiters` inner join employees e on e.employeeID=visiters.employeeID  WHERE visiters.businessID='$busId' AND date between date_sub(now(),INTERVAL 30 day) and now() ");
	
$row3=mysqli_fetch_assoc($query3);


	$data = array($row,$row2,$row3);
	return $data;
}






function response($data){
	 echo json_encode($data);
}

?>
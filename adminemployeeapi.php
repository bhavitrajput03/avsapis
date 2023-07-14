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

	$busId = $_POST['businessID'];
    
$query= mysqli_query($conn,"SELECT employeeID , employeeName , employeeNumber ,businessID ,status FROM employees emp WHERE emp.businessID='$busId'");
 
	while ($row=mysqli_fetch_assoc($query)) {
	  
	        	$data[]=array("status"=>"true","employeeID"=>$row['employeeID'],"employeeName"=>$row['employeeName'],"employeeNumber"=>$row['employeeNumber'],"active_status"=>$row['status']);
	}
	if(empty($data)){
	    	$data[]=array("status"=>"false");
     }

	return $data;
}

function response($data){
	 echo json_encode($data);
}

?>
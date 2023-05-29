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
	$date=$_POST['date'];
	$busId = $_POST['businessID'];
    
$query= mysqli_query($conn,"SELECT vechile_number , customer_name , mobile_number ,feedback,vechile_name,v.date FROM customerdata c inner JOIN visiters v on v.cid = c.cid inner join vechile_type b on b.vechile_id=c.vechile_id WHERE v.date like '$date%' AND v.businessID='$busId'");
 
	while ($row=mysqli_fetch_assoc($query)) {
	  
	        	$data[]=array("status"=>"true","vechile_number"=>$row['vechile_number'],"customer_name"=>$row['customer_name'],"mobile_number"=>$row['mobile_number'],"feedback"=>$row['feedback'],"vechile_name"=>$row['vechile_name'],"date"=>$row['date']);
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
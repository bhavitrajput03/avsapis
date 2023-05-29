<?php
$conn=mysqli_connect("localhost","id20818722_id13787439_admin","rRajput@291194","id20818722_id13787439_avs_customer_records");


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
    

$query= mysqli_query($conn," SELECT vechile_number , customer_name , mobile_number ,vechile_name,feedback,v.date FROM customerdata c inner JOIN visiters v on v.cid = c.cid inner join vechile_type b on b.vechile_id=c.vechile_id WHERE MONTH(v.date) = MONTH(NOW()) ");
	while ($row=mysqli_fetch_assoc($query)) {
		$data[]=array("vechile_number"=>$row['vechile_number'],"customer_name"=>$row['customer_name'],"mobile_number"=>$row['mobile_number'],"vechile_name"=>$row['vechile_name'],"feedback"=>$row['feedback'],"date"=>$row['date']);

	}
	return $data;
}






function response($data){
	 echo json_encode($data);
}

?>
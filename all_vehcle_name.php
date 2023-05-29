<?php
$conn=mysqli_connect("localhost","id20818722_id13787439_admin","rRajput@291194","id20818722_id13787439_avs_customer_records");

$request=$_SERVER['REQUEST_METHOD'];
$data=array();
switch ($request) {
	case 'GET':

		response(getdata());
		break;
}

function getdata(){
	global $conn;
	$query=mysqli_query($conn,"SELECT * FROM `vechile_type`");
	while ($row=mysqli_fetch_assoc($query)) {
	$data[]=array("vechile_id"=>$row['vechile_id'],"vechile_name"=>$row['vechile_name']);

	}
	return $data;
}
function response($data){
	 echo json_encode($data);
}

?>
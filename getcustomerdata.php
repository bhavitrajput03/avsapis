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
	$vecle_number=$_POST['vechile_number'];


if($vecle_number ==''){

	$result = mysqli_query($conn,"SELECT vechile_number FROM customerdata");
	// $num_rows = mysqli_fetch_assoc($result);
$num_rows1 = mysqli_num_rows($result);

if($num_rows1>0){
	while ($num_rows=mysqli_fetch_assoc($result)) {
	    
		$data[]=array("vechile_number"=>$num_rows['vechile_number']);

}}else{
    $data[]=array("vechile_number"=>'');
}

}else{
	$result=mysqli_query($conn,"SELECT * FROM customerdata WHERE vechile_number='$vecle_number'");
	
 $num_rows = mysqli_fetch_assoc($result);
	$result2=mysqli_query($conn,"SELECT vechile_name FROM vechile_type WHERE   vechile_id= '".$num_rows['vechile_id']."'");
	
	$num_rows2 = mysqli_fetch_assoc($result2);
		$data[]=array("cid"=>$num_rows['cid'],"customer_name"=>$num_rows['customer_name'],"mobile_number"=>$num_rows['mobile_number'],"vechile_number"=>$num_rows['vechile_number'],"vechile_name"=>$num_rows2['vechile_name']);
		

	
}

	return $data;


}



function response($data){
	 echo json_encode($data);
}

?>
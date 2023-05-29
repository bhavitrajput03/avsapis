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
     
	
	
    $num=$_POST['number'];
if($num==0){
$query= mysqli_query($conn," SELECT  IFNULL(t.COUNT, 0) AS COUNT, week.day FROM (SELECT DATE(date) DATE, COUNT(cid) COUNT, DATE_FORMAT(date,'%a') DAYNAME FROM visiters WHERE DATE(date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND CURDATE() GROUP BY DATE(date)) AS t RIGHT OUTER JOIN ( SELECT 'Sun' AS day UNION SELECT 'Mon' AS day UNION SELECT 'Tue' AS day UNION SELECT 'Wed' AS day UNION SELECT 'Thu' AS day UNION SELECT 'Fri' AS day UNION SELECT 'Sat' AS day ) AS week ON week.day = t.DAYNAME GROUP BY DATE(date)");
	


 while ($row=mysqli_fetch_assoc($query)) {
 $data[]=$row;
}
	return $data;
}

if($num==1){
$query= mysqli_query($conn," SELECT DATE_FORMAT(date, "%b") AS MONTH, COUNT(cid) as COUNT FROM customerdata WHERE date <= NOW() and date >= Date_add(Now(),interval - 6 month) GROUP BY DATE_FORMAT(date, '%M') DESC");
	

while ($row=mysqli_fetch_assoc($query)) {
 $data[]=$row;
}
	return $data;
}
}
function response($data){
	 echo json_encode($data);
}

?>

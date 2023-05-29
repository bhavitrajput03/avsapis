<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");


require_once 'employeefunctions.php';
// json response array
$response = array();
 
if (isset($_POST['employeeName']) && isset($_POST['employeeNumber']) && isset($_POST['businessId'])) {
 
     // genrate uniqueid
     $uniqueID = generateUniqueID();
    // receiving the post params
    $employeeName = $_POST['employeeName'];
    $employeeId = $uniqueID;
	$employeeNumber = $_POST['employeeNumber'];
    $businessId = $_POST["businessId"];
 
    // check if user already exists with the same email
    if(emailExists($employeeName,$employeeNumber)){
		// email already exists
		$response[]=array("error"=>'TRUE',"error_msg"=>"Employee Name or Employee Number already exists");
        // $response["error"] = TRUE;
        // $response["error_msg"] = "mobile already exists with " . $email;
        echo json_encode($response);
	}else {
        // create a new user
        $user = storeUser($employeeName, $employeeId, $employeeNumber,$businessId);

        if ($user) {
            // user stored successfully
            
              $response[]=array("status"=>'success',"employeeId"=>$user['employeeID']);
            
            // $response["error"] = FALSE;
            // $response["employee"]["emp_id"] = $user["emp_id"];
            
            // $response["employee"]["emp_name"] = $user["emp_name"];
            // $response["employee"]["emp_mobilenumber"] = $user["emp_mobilenumber"];
          
           
            echo json_encode($response);
        } else {
            // user failed to store
           $response[]=array("error"=>'TRUE',"error_msg"=>"Unknown error occurred!");
            // $response["error"] = TRUE;
            // $response["error_msg"] = "Unknown error occurred!";
            echo json_encode($response);
        }
    }
} else {
     $response[]=array("error"=>'TRUE',"error_msg"=>"Required parameters missing!");
    // $response["error"] = TRUE;
    // $response["error_msg"] = "Required parameters missing!";
    echo json_encode($response);
}

?>
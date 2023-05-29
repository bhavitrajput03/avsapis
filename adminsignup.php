<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");

require_once 'adminfunction.php';
// json response array
$response = array();
 
if (isset($_POST['email'])  && isset($_POST['businessName']) && isset($_POST['mobileNumber'])) {
    

    // genrate uniqueid
    $uniqueID = generateUniqueID();
    // receiving the post params
    $email = $_POST['email'];
	$businessId = $uniqueID;
    $businessName = $_POST["businessName"];
    $mobileNumber = $_POST['mobileNumber'];
 
    // check if user already exists with the same email
    if(emailExists($businessId)){
		// email already exists
         $response[]=array("error"=>'TRUE',"error_msg"=>"businessId already exists with " . $businessId);
        // $response["error"] = TRUE;
        // $response["error_msg"] = "Email already exists with " . $username;
        echo json_encode($response);
	}else {
        // create a new user
        $user = storeUser($businessId, $email, $businessName,$mobileNumber);

        if ($user) {
            // user stored successfully

            $response[]=array("status"=>'success',"businessid"=>$user['businessID'],"email"=> $user['email'],"businessname"=>$user['businessName'],"mobilenumber"=>$user['mobileNumber']);
            // $response["error"] = FALSE;
            // $response["admin"]["id"] = $user["id"];
            
            // $response["admin"]["userEmail"] = $user["userEmail"];
            // $response["admin"]["password"] = $user["password"];
            // $response["admin"]["contactNo"] = $user["contactNo"];
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
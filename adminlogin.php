<?php

require_once 'adminfunction.php';
 
// json response array
$response = array();
 
if (isset($_POST['businessId'])) {
 
    // receiving the post params
    $businessId = $_POST['businessId'];
 
    // get the user by email and password
    $user = getUserByEmailAndPassword($businessId);
 
    if ($user != false) {
        // user is found

          $response[]=array("status"=>'success',"businessid"=>$user['businessID'],"email"=> $user['email'],"businessname"=>$user['businessName'],"mobilenumber"=>$user['mobileNumber']);
        // $response["error"] = FALSE;
        // $response["admin"]["id"] = $user["id"];
        // $response["admin"]["userEmail"] = $user["userEmail"];
        
        echo json_encode($response);
    } else {
        // user is not found with the credentials

           $response[]=array("error"=>'TRUE',"error_msg"=>"Wrong businessId entered! Please try again!");
        // $response["error"] = TRUE;
        // $response["error_msg"] = "Wrong email or password entered! Please try again!";
        echo json_encode($response);
    }
} else {
    //required post params is missing
    $response[]=array("error"=>'TRUE',"error_msg"=>"Required parameters missing!");
    // $response["error"] = TRUE;
    // $response["error_msg"] = "Required parameters missing :(!";
    echo json_encode($response);
}
?>
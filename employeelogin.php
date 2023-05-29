<?php

require_once 'employeefunctions.php';

 
// json response array
$response = array();
 
if (isset($_POST['employeeId'])) {
 
    // receiving the post params
    $employeeId = $_POST['employeeId'];
    // $password = $_POST['password'];
 
    // get the user by email and password
    $user = getUserByEmailAndPassword($employeeId);
 
    if ($user != false) {
        // user is found


    $response[]=array("status"=>'success',"businessid"=>$user['businessID'],"employeeId"=> $user['employeeID']);
        // $response["error"] = FALSE;
      
        // $response["employee"]["emp_id"] = $user["emp_id"];
        // $response["employee"]["emp_name"] = $user["emp_name"];
        
        echo json_encode($response);
    } else {
        // user is not found with the credentials
         $response[]=array("error"=>'TRUE',"error_msg"=>"Wrong employeeId entered! Please try again!");
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
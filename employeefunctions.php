
<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");

	function storeUser($employeeName, $employeeId, $employeeNumber,$businessId){
		global $conn;

		$query = "INSERT INTO employees (employeeName, employeeID, employeeNumber,businessID) VALUES('$employeeName', '$employeeId', '$employeeNumber','$businessId')";
		
		$result = mysqli_query($conn, $query);

		if($result){
			
			$user = "SELECT * FROM employees WHERE employeeID = '{$employeeId}'";
			$res = mysqli_query($conn, $user);

			while ($user = mysqli_fetch_assoc($res)){
				return $user;
			}
		}else{

				return false;
			}

	}


	function getUserByEmailAndPassword($employeeId){
		global $conn;
		$query = "SELECT * from employees where employeeID = '{$employeeId}'";
	
		$user = mysqli_query($conn, $query);
		
		if($user){
			while ($res = mysqli_fetch_assoc($user)){
				return $res;
			}
		}
		else{
			return false;
		}
	}


	function emailExists($employeeName,$employeeNumber){
		global $conn;
		$query = "SELECT employeeID from employees where employeeName = '{$employeeName}' AND employeeNumber= '{$employeeNumber}'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			return true;
		}else{
			return false;
		}
	}

	function generateUniqueID() {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$uniqueID = '';
		$length = 15;
	
		for ($i = 0; $i < $length; $i++) {
			$charIndex = ($i % 2 == 0) ? rand(0, 9) : rand(10, 35);
			$uniqueID .= $characters[$charIndex];
		}
	
		return $uniqueID;
	}

?>
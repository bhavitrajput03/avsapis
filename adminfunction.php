
<?php
$conn=mysqli_connect("localhost","root","Bhavit@03","id20818722_id13787439_avs_customer_records");

	function storeUser($businessId, $email, $businessName,$mobileNumber){
		global $conn;

		$query = "INSERT INTO admins (businessID, businessName,email,mobileNumber) VALUES('$businessId', '$email', '$businessName','$mobileNumber')";
		
		$result = mysqli_query($conn, $query);

		if($result){
			
			$user = "SELECT * FROM admins WHERE businessId = '{$businessId}'";
			$res = mysqli_query($conn, $user);

			while ($user = mysqli_fetch_assoc($res)){
				return $user;
			}
		}else{

				return false;
			}

	}


	function getUserByEmailAndPassword($businessId){
		global $conn;
		$query = "SELECT * from admins where businessID = '{$businessId}'";
	
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


	function emailExists($businessId){
		
		global $conn;
		$query = "SELECT businessId from admins where businessId = '{$businessId}'";
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
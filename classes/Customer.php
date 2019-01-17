 <?php
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php');
		include_once ($filepath.'/../helpers/Format.php');

		include_once ($filepath.'/../lib/PHPMailer/PHPMailerAutoload.php');
		
?>

<?php
	/**
	* Customer Class
	*/
	class Customer{
		private $db;
		private $fm;
	
	public function __construct(){
		$this->db = new Database(); 
		$this->fm = new Format(); 

		}

		public function customerRegistration($data){
			$name  		=mysqli_real_escape_string($this->db->link,$data['name']);
			$address  	=mysqli_real_escape_string($this->db->link,$data['address']);
			$city  		=mysqli_real_escape_string($this->db->link,$data['city']);
			$country  	=mysqli_real_escape_string($this->db->link,$data['country']);
			$zip  		=mysqli_real_escape_string($this->db->link,$data['zip']);
			$phone 		=mysqli_real_escape_string($this->db->link,$data['phone']);
			$email  	=mysqli_real_escape_string($this->db->link,$data['email']);
			$pass  		=mysqli_real_escape_string($this->db->link,md5($data['pass']));
			$repass  		=mysqli_real_escape_string($this->db->link,md5($data['repass']));
			

			 if ($name == "" || $address  == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass  == "" ) {

			    	$msg="<span class='error'> Fields  must not be empty !</span>";
					return $msg;
		 	
			   }
			  if (!preg_match("/^[a-zA-Z ]*$/",$name)){
			  	$msg="<span class='error'> Invalid Name. Only letters and white space allowed!</span>";
					return $msg;
				}else{
					if (!preg_match("/^[a-zA-Z ]*$/",$city)){
			  	$msg="<span class='error'> Invalid City. Only letters and white space allowed!</span>";
					return $msg;
				}else{
					
					if (!preg_match("/^[0-9]{4}$/", $zip)){
						$msg="<span class='error'> Only Digit Allowed & zip code Must be 4 Digit!</span>";
					
						return $msg;
						
						
				}else{
					if (!preg_match("/^[a-zA-Z ]*$/",$country)){
			  	$msg="<span class='error'> Invalid Country. Only letters and white space allowed!</span>";
					return $msg;
				}else{
					if (!preg_match("/^[0-9]{11}$/", $phone)){
						$msg="<span class='error'> Only Digit Allowed & Phone Number Must be 11 Digit!</span>";
						
						return $msg;
						
						
				}else{
					if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
						$msg="<span class='error'> Invalid Email !</span>";
					return $msg;
					}else{
		
			$mailquery = " SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1 ";
			$mailchk = $this->db->select($mailquery); 
			if ($mailchk !=false) {
			  	$msg="<span class='error'> E-mail Already Exist!</span>";
					return $msg;
			  } 
			   else{ 
			   	if ($pass==$repass){ 
			   
			   
			  			$query = " INSERT INTO tbl_customer(name, address , city, country , zip, phone, email , pass) VALUES('$name','$address ','$city','$country ','$zip','$phone','$email','$pass') ";

			 $inserted_row= $this->db->insert($query);
				if ($inserted_row) {
					$msg="<span class='success'>Registration Successfull</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Registration Unsuccessfull . Please try again later. </span>";
					return $msg;
				}
				}else{
					$msg="<span class='error'>Password Not Match</span>";
					return $msg;
					}
					}
				}
				}
			  }	
			}
		}
	}
}



		public function customerLogin($data){

			$email  	=mysqli_real_escape_string($this->db->link,$data['email/phone']);
			$pass  		=mysqli_real_escape_string($this->db->link,md5($data['pass']));
			if (empty($email ) || empty($pass )) {

				$msg="<span class='error'> Fields  must not be empty !</span>";
				return $msg;
			}

			$query = " SELECT * FROM tbl_customer WHERE (email='$email' || phone='$email' ) AND pass='$pass' ";
			$result = $this->db->select($query);
			if ($result !=false) {
				 $value = $result->fetch_assoc();
				 Session::set("cuslogin",true);
				 Session::set("cmrId",$value['id']);
				 Session::set("cmrName",$value['name']);
				 header("Location:cart.php");
				}
				else{
					$msg="<span class='error'> Email or Password does not match !</span>";
					return $msg;
				}
				
		   }

		   public function getCustomerData($id){
		   		$query = "SELECT * FROM tbl_customer WHERE id='$id'";
				$result = $this->db->select($query);
				return $result;
		   }

public function getCustomerList(){
		   		$query = "SELECT * FROM tbl_customer  ";
				$result = $this->db->select($query);
				return $result;
		   }
public function getOrderListById(){
		   		$query = "SELECT * FROM tbl_order   ";
		   		
				$result = $this->db->select($query);
				return $result;
		   }

	public function delOrderById($id){
		 $query = " SELECT * FROM tbl_order WHERE cmrId='$id' " ;
		 $getData = $this->db->select($query);
		 if ($getData) {
		 	while ($delImg=$getData->fetch_assoc()) {
		 		$dellink = $delImg['image'];
		 		unlink($dellink);
		 	}
		 }

		 $delquery = " DELETE FROM tbl_order WHERE cmrId='$id' ";
		 $deldata = $this->db->delete($delquery);
		 if ($deldata) {
			$msg="<span class='success'>Product Deleted Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='error'>Product Not Deleted </span>";
				return $msg;
		} 
	}		   		   


		   public function updateCustomerProfile($data, $cmrId){

		   	$name  		=mysqli_real_escape_string($this->db->link,$data['name']);
			$address  	=mysqli_real_escape_string($this->db->link,$data['address']);
			$city  		=mysqli_real_escape_string($this->db->link,$data['city']);
			$country  	=mysqli_real_escape_string($this->db->link,$data['country']);
			$zip  		=mysqli_real_escape_string($this->db->link,$data['zip']);
			$phone 		=mysqli_real_escape_string($this->db->link,$data['phone']);
			$email  	=mysqli_real_escape_string($this->db->link,$data['email']);
			
			

			 if ($name == "" || $address  == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "") {

			    	$msg="<span class='error'> Fields  must not be empty !</span>";
					return $msg;
		 	
			   }
		
			 else{
			  		$query = " UPDATE tbl_customer 
			  		SET
			  		name='$name',
			  		address='$address',
			  		city='$city',
			  		country='$country',
			  		zip='$zip',
			  		phone='$phone',
			  		email='$email' 

			  		WHERE id ='$cmrId'";

			  		$updated_row=$this->db->update($query);

					if ($updated_row) {
						$msg="<span class='success'>Your Profile Updated Successfuly</span>";
						return $msg;
						
					}else{
						$msg="<span class='error'>Your Profile Not Updated ! </span>";
						return $msg;
				}
			}
		 }

		 public function userPassRecovey($email){
		$email=$this->fm->validation($email);
		
		$email =mysqli_real_escape_string($this->db->link,$email);
		if (empty($email)) {
		$error="<span class='error'>Email Must Not be Empty</span>";
		return $error;

	}

		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$nmsg="<span class='error'>Invalid Email Address !</span>";
			return $nmsg;

			
		}
		else{
				$mailquerry=" SELECT * FROM tbl_customer WHERE email='$email' ";
				$mailcheck =$this->db->select($mailquerry);
			

					if ($mailcheck !=false) {
						while ($restul=$mailcheck->fetch_assoc()) {
							$id=$restul['id'];
							$name=$restul['name'];
						}
						$text = substr($email, 0,3);
						$rand =rand(10000,99999);
						$newpass ="$text$rand";
						$password =md5($newpass);
						$query=" UPDATE tbl_customer
						SET
						pass='$password' WHERE id='$id' ";
						$update=$this->db->update($query);

		$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; 
$mail->SMTPDebug = 2;                              // Enable SMTP authentication
$mail->Username = 'fffbhs@gmail.com';                 // SMTP username
$mail->Password = 'Ht00012btgb';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('fffbhs@gmail.com', 'Sukh');
$mail->addAddress('cseuu29@gmail.com', 'Md');     // Add a recipient
$mail->addAddress('cseuu29@gmail.com');               // Name is optional
$mail->addReplyTo('fffbhs@gmail.com', 'Information');


    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Pass Recovery';
$mail->Body    = '$newpass';


						if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 'Message has been sent';
					}

					}else{
							$loginmsg="<span class='error'>Email Not Exist!</span>";
							return $loginmsg;
	

					}
		}
	}


	public function userPassChange($pass,$newpass,$renewpass,$cmrId){

		   	$pass 		=mysqli_real_escape_string($this->db->link,$pass);
			$newpass  	=mysqli_real_escape_string($this->db->link,$newpass);
			$renewpass  =mysqli_real_escape_string($this->db->link,$renewpass);
			
			 if ($pass =="" || $newpass=="" || $renewpass =="") {

			    	$msg="<span class='error'> Fields  must not be empty !</span>";
					return $msg;
		 		 }
			  $query = " SELECT * FROM tbl_customer WHERE pass='$pass' AND id='$cmrId'";
			   $result =$this->db->select($query);
			   $value = $result;
			   if(!$value){
			    	$msg="<span class='error'> Curent Password Not Match! </span>";
						return $msg;
			   		
			   	}else{
			   		if($newpass==$renewpass){
			   		
			   		$query = "UPDATE tbl_customer SET
			   		pass='$newpass'  WHERE id='$cmrId'";
			   		$result =$this->db->update($query);

			   			if($result){
			   					$msg="<span class='success'>Password Update Successfully </span>";
						return $msg;
			   			}else{
			   				$msg="<span class='error'>Password Not Update ! </span>";
						return $msg;
			   			}
			   	
			   		
			   		}
				else{
						$msg="<span class='error'>New Password Not Match ! </span>";
						return $msg;
			   	
			  
			   }
}
			  
 }
 public function getOrderId(){

 }


}
?>

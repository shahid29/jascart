<?php
		$filepath = realpath(dirname(__FILE__));
		
		include_once ($filepath.'/../lib/PHPMailer/PHPMailerAutoload.php');
		
		
		
		include_once ($filepath.'/../lib/Database.php');
		include_once ($filepath.'/../helpers/Format.php');
		


?>




<?php


class Adminlogin{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database(); 
		$this->fm = new Format(); 

	}

	public function admminLogin($adminUser,$adminPass){
		$adminUser=$this->fm->validation($adminUser);
		$adminPass=$this->fm->validation($adminPass);

		$adminUser =mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass =mysqli_real_escape_string($this->db->link,$adminPass);

		if (empty($adminUser) || empty($adminPass)) {
			$loginmsg="Username or Password must not be empty !";
			return $loginmsg;

			
		}else{
				$querry=" SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
				$result=$this->db->select($querry);

					if ($result !=false) {
						$value=$result->fetch_assoc();
						Session::set("adminlogin",true);
						Session::set("adminId",$value['adminId']);
						Session::set("adminUser",$value['adminUser']);
						Session::set("adminName",$value['adminName']);
						Session::set("adminRole",$value['adminRole']);


						header("Location:dashbord.php");
					}else{
							$loginmsg="Username or Password not match!";
							return $loginmsg;
	

					}
		}
	}
	public function forgetpass($adminEmail){
		$adminEmail=$this->fm->validation($adminEmail);
		
		$adminEmail =mysqli_real_escape_string($this->db->link,$adminEmail);
		if (empty($adminEmail)) {
		$error="<span class='error'>Email Must Not be Empty</span>";
		return $error;

	}

		elseif (!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)) {
			$nmsg="<span class='error'>Invalid Email Address !</span>";
			return $nmsg;

			
		}
		else{
				$mailquerry=" SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' ";
				$mailcheck =$this->db->select($mailquerry);
			

					if ($mailcheck !=false) {
						while ($restul=$mailcheck->fetch_assoc()) {
							$adminId=$restul['adminId'];
							$adminUser=$restul['adminUser'];
						}
						$text = substr($adminEmail, 0,3);
						$rand =rand(10000,99999);
						$newpass ="$text$rand";
						$password =md5($newpass);
						$query=" UPDATE tbl_admin 
						SET
						adminPass='$password' WHERE adminId='$adminId' ";
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

	
	public function adminPassChange($adminUser,$adminPass,$newpass,$renewpass){

		$adminUser =mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass =mysqli_real_escape_string($this->db->link,$adminPass);
		$newpass =mysqli_real_escape_string($this->db->link,$newpass);
		$renewpass =mysqli_real_escape_string($this->db->link,$renewpass);

		if ($adminUser == "" || $adminPass=="" || $newpass =="" || $renewpass == "") {

			$msg="<span class='error'>Field Must Not be Empty!</span>";
			return $msg;
			
			}

		$query = " SELECT * FROM tbl_admin WHERE adminUser='$adminUser' ";
		$result =$this->db->select($query);
		if ($result) {
			
		$query = " SELECT * FROM tbl_admin WHERE adminPass='$adminPass' ";
		$result =$this->db->select($query);

		if ($result) {
				
				if ($newpass==$renewpass) {

						$query = " UPDATE tbl_admin SET adminPass='$newpass' WHERE adminPass='$adminPass' ";
						$update = $this->db->update($query);
						if ($update) {
							$msg="<span class='success'>Password Updated Successfully</span>";
							return $msg;
						}else{
							$msg="<span class='error'>Something Went Wrong!</span>";
							return $msg;
						}
					
				}else{
					$msg="<span class='error'>New Password Not Match!</span>";
					return $msg;
				}
		}else{
			$msg="<span class='error'>Old Password Not Match!</span>";
			return $msg;
		}
	}else{
			$msg="<span class='error'>User Name Not Match!</span>";
			return $msg;
		}		
	
	}
	public function adminRegistration($data){
			$adminName  =mysqli_real_escape_string($this->db->link,$data['adminName']);
			$adminUser  =mysqli_real_escape_string($this->db->link,$data['adminUser']);
			$adminEmail =mysqli_real_escape_string($this->db->link,$data['adminEmail']);
			$adminPass  =mysqli_real_escape_string($this->db->link,md5($data['adminPass']));
			$adminConPass =mysqli_real_escape_string($this->db->link,md5($data['adminConPass']));

			if ($adminName == "" || $adminUser == "" || $adminEmail == "" || $adminPass == "" || $adminConPass == ""  ) {
				$msg="<span class='error'>Field Must Not be Empty</span>";
				return $msg;
			}
			

			$mailquery = " SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' LIMIT 1 ";
			$mailchk = $this->db->select($mailquery); 
			if ($mailchk !=false) {
			  	$msg="<span class='error'> E-mail Already Exist!</span>";
				return $msg;
			  } 
			  elseif (!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)) {
			$nmsg="<span class='error'>Invalid Email Address !</span>";
			return $nmsg;
				}		
			   else{
			   		if ($adminPass==$adminConPass) {
			   			$query= " INSERT INTO tbl_admin(adminName,adminUser,adminEmail,adminPass) VALUES('$adminName','$adminUser','$adminEmail','$adminPass') ";
			   			$result = $this->db->insert($query);
			   			if ($result) {
			   				$msg="<span class='success'> Registraton Successful</span>";
							return $msg;
			   				
			   			}else{
			   				$msg="<span class='error'> Something Went Wrong !</span>";
							return $msg;
			   			}
			   		}else{
			   			$msg="<span class='error'> Password Not Match!</span>";
						return $msg;
			   		

			   }
			}
	
		}

		public function addUser($data){
			$adminName  =mysqli_real_escape_string($this->db->link,$data['adminName']);
			$adminUser  =mysqli_real_escape_string($this->db->link,$data['adminUser']);
			$adminEmail  =mysqli_real_escape_string($this->db->link,$data['adminEmail']);
			$adminPass  =mysqli_real_escape_string($this->db->link,md5($data['adminPass']));
			$adminConPass  =mysqli_real_escape_string($this->db->link,md5($data['adminConPass']));
			$adminRole  =mysqli_real_escape_string($this->db->link,$data['adminRole']);

			if ($adminName == "" || $adminUser == "" ||  $adminPass == "" || $adminRole== "" ) {
				$msg="<span class='error'>Field Must Not be Empty</span>";
				return $msg;
			}
			

			$mailquery = " SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' LIMIT 1 ";
			$mailchk = $this->db->select($mailquery); 
			if ($mailchk !=false) {
			  	$msg="<span class='error'> E-mail Already Exist!</span>";
				return $msg;
			  } 
			  elseif (!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)) {
			$nmsg="<span class='error'>Invalid Email Address !</span>";
			return $nmsg;
				}		
			   else{
			   		if ($adminPass==$adminConPass) {
			   			$query= " INSERT INTO tbl_admin(adminName,adminUser,adminEmail,adminPass,adminRole) VALUES('$adminName','$adminUser','$adminEmail','$adminPass','$adminRole') ";
			   			$result = $this->db->insert($query);
			   			if ($result) {
			   				$msg="<span class='success'> Created Successful</span>";
							return $msg;
			   				
			   			}else{
			   				$msg="<span class='error'> Something Went Wrong !</span>";
							return $msg;
			   			}
			   		}else{
			   			$msg="<span class='error'> Password Not Match!</span>";
						return $msg;
			   		

			   }
			}
	
		}
		public function getUserData($adminId){
		   		$query = "SELECT * FROM tbl_admin WHERE adminId='$adminId'";
				$result = $this->db->select($query);
				return $result;
		   }

		public function updateProfile($data,$adminId,$adminRole){

		   	$adminName  =mysqli_real_escape_string($this->db->link,$data['adminName']);
			$adminUser  =mysqli_real_escape_string($this->db->link,$data['adminUser']);
			$adminEmail  =mysqli_real_escape_string($this->db->link,$data['adminEmail']);
			$adminDetails  =mysqli_real_escape_string($this->db->link,$data['adminDetails']);
			

			 if ($adminName == "" || $adminUser  == "" || $adminEmail == "" || $adminDetails == "" ) {

			    	$msg="<span class='error'> Fields  must not be empty !</span>";
					return $msg;
		 	
			   }
		
			 else{
			  		$query = " UPDATE tbl_admin 
			  		SET
			  		adminName='$adminName',
			  		adminUser='$adminUser',
			  		adminEmail='$adminEmail',
			  		adminDetails='$adminDetails'
			  		 

			  		WHERE adminId ='$adminId' AND adminRole='$adminRole' ";

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
		 public function getUserList(){
		 	$query =" SELECT * FROM tbl_admin ";
		 	$result = $this->db->select($query);
		 	return $result;
		 }

		 public function delUserById($id){
		$query = " DELETE FROM tbl_admin WHERE adminId='$id' ";
		$deldata = $this->db->delete($query);

		if ($deldata) {
			$msg="<span class='success'> Deleted Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='error'>Not Deleted </span>";
				return $msg;
		}
	}

}


?>
<?php

include 'Database.php';
// include 'Session.php';

class Customer
{
	
	private $db;
	
	function __construct()
	{
		$this->db = new Database();
	}

	public function regInsert($data)
	{
		$cname = $data['rname'];
		$cemail = $data['remail'];
		$cphone = $data['rphone'];
		$cpass = md5($data['rpassword']);
		$ccity = $data['rcity'];
		$caddress = $data['raddress'];

		if ($cname == '' || $cemail == '' || $cphone == '' || $cpass == '' || $ccity == '' || $caddress == '') 
		{
			$msg = "Input field is empty!";
			return $msg;
		}
		else
		{
			try 
			{
				$queryCheck = "SELECT Customer_Email FROM customer WHERE Customer_Email = '$cemail' LIMIT 1";
				$cusCheck = $this->db->select($queryCheck);  

				if ($cusCheck != false) 
				{
					$msg = "Email Already Exist!";
					return $msg;
				}
				else
				{
					$query = "INSERT INTO customer VALUES ('', '$cname', '$cemail', '$cphone', '$cpass', '$ccity', '$caddress')";
					$cusInsert = $this->db->insert($query);  

					if ($cusInsert) 
					{
						$msg = "Insertion Failled!";
						return $msg;
					}
					else
					{
						echo "<script>window.location.assign('index.php')</script>";
					}

				}
				
				
			} 
			catch (PDOException $e) 
			{
				$msg = $e->getMessage();
				return $msg;
			}       
		}  

	}

	public function cusLogin($data)
	{
		$lemail = $data['lemail'];
		$lpass = md5($data['lpass']);


		if ($lemail == ''  || $lpass == '') 
		{
			$msg = "Input field must not be empty!";
			return $msg;
		}
		else
		{
			try 
			{
				$query = "SELECT Customer_Name, Customer_ID, Customer_Email, Customer_Password FROM customer WHERE Customer_Email = '$lemail' && Customer_Password = '$lpass' LIMIT 1";
				$login = $this->db->select($query);

				if ($login != false) 
				{
					$logData = $login->fetch();
					$_SESSION['user_logged'] = true;
					$_SESSION['userId'] = $logData['Customer_ID'];
					$_SESSION['useremail'] = $logData['Customer_Email'];
					$_SESSION['username'] = $logData['Customer_Name'];
					
				}
				else
				{
					$msg = "Invalid email and password!";
					return $msg;
				}


			} 
			catch (PDOException $e) 
			{
				$msg = $e->getMessage();
				return $msg;
			}
		}
		
	}

	public function cusDetailsByemail($cemail)
	{
		try 
		{
			$query = "SELECT * FROM customer WHERE Customer_Email = '$cemail'";
			$dbe = $this->db->select($query);
			if (!$dbe) 
			{
				echo "No";
			}
			return $dbe;
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function cusDetailsByid($cid)
	{
		try 
		{
			$query = "SELECT * FROM customer WHERE Customer_ID = '$cid'";
			$dbe = $this->db->select($query);
			if (!$dbe) 
			{
				echo "No";
			}
			return $dbe;
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function updateProfile($data, $cid)
	{

		try 
		{
			$cname = $data['cname'];
			$cemail = $data['cemail'];
			$caddrs = $data['caddrs'];
			$cphn = $data['cphn'];
			$ccity = $data['ccity'];

			$query = "UPDATE customer 
			SET Customer_Name = '$cname', Customer_Email = '$cemail', Customer_Phone = '$cphn' , Customer_City = '$ccity' , Customer_Address = '$caddrs' 
			WHERE Customer_ID = '$cid'";
			$upCus = $this->db->update($query); 
			
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function orderProduct($cusID)
	{
		try 
		{
			$sid = session_id();
			$query = "SELECT * FROM cart WHERE SID = '$sid'";
			$dbe = $this->db->select($query);
			if ($dbe) 
			{
				while ($result = $dbe->fetch()) 
				{
					$pid = $result['Pro_ID'];
					$pName = $result['Pro_Name'];
					$pImg = $result['Pro_Img'];
					$pPrice = $result['Pro_Price'];
					$pQuantity = $result['Quantity'];

					$insertOrder = "INSERT INTO `order` VALUES ('', '$cusID', '$pid', '$pName', '$pImg', '$pPrice', '$pQuantity', '0', CURRENT_TIMESTAMP)";

					$inData = $this->db->insert($insertOrder);
					// return $inData;
				}
			}
			else
			{
                echo "No";
			}

		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function emptyCart()
	{
		// DELETE FROM cart WHERE SID = ''
		try 
		{
			$sid = session_id();
            $query = "DELETE FROM cart WHERE SID = '$sid'";
			$delCus = $this->db->delete($query); 
			
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}
    
    public function productDetails()
	{
		try 
		{
            $userId = $_SESSION['userId'];
            // echo $userId;
            $query = "SELECT * FROM `order` WHERE Customer_ID = '$userId' ORDER BY Order_ID DESC";
			$selPro = $this->db->select($query); 
			return $selPro;
			
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

}

?>
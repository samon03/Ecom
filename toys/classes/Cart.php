<?php

class Cart
{
	
	private $db;
	
	function __construct()
	{
		$this->db = new Database();
	}

	public function addToCart($amount, $proID)
	{
		try 
		{
			$sid = session_id();

			$query = "SELECT * FROM `product` WHERE Pro_ID = $proID && Total_Quantity > $amount";
			$cartSel = $this->db->select($query); 
			$data = $cartSel->fetch();

			$proTitle = $data['Pro_Title'];
			$proPrice = $data['Pro_Price'];
			$proQuantity = $data['Total_Quantity'];
			$proImg = $data['Pro_Image'];
			$proPrice = $data['Pro_Price'];

			$checkQuery = "SELECT * FROM cart WHERE Pro_ID = 
			'$proID' && SID = '$sid'";

			$checkData = $this->db->select($checkQuery);
			if ($checkData) 
			{
				$msg = "Product already exist";
				return $msg;
			}

			if ($cartSel != false) 
			{
				$query = "INSERT INTO cart VALUES ('', '$sid', '$proID', '$proTitle', '$proImg', '$amount', '$proPrice')";
				$crtInsert = $this->db->insert($query); 

				// $msg = $sid. $proID.$proTitle.$proImg.$proQuantity;
				// 	return $msg; 

				if ($crtInsert) 
				{
					$msg = "Insertion Failled!";
					return $msg;
				}
				else
				{
					echo "<script>window.location.assign('cart.php')</script>";
				}
			}
			else
			{
				$msg = "Stock out!";
				return $msg;
			}

			

		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}       
		
	}

	public function getCartProduct()
	{
		try 
		{
			$sid = session_id();
		    $query = "SELECT * FROM cart WHERE SID = '$sid' ORDER BY Cart_ID DESC";
		    $selData = $this->db->select($query);
		    return $selData;
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}

	}

	public function updateQuantity($upQuantity, $upID)
	{
		try 
		{
			$query = "UPDATE cart
                      SET Quantity = '$upQuantity' 
                      WHERE Cart_ID = '$upID'";
		    $upData = $this->db->update($query);
		    return $upData; 
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function deleteFromCart($delID)
	{
		try 
		{
			$query = "DELETE FROM cart WHERE Cart_ID = '$delID'";
		    $delData = $this->db->delete($query);
		    // echo "<script>window.location.assign('cart.php')</script>";
		    return $delData; 

		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function checkCartTable()
	{
		try 
		{
			$sid = session_id();
		    $query = "SELECT * FROM cart WHERE SID = '$sid'";
		    $selData = $this->db->select($query);
		    return $selData;
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}

	}

	
}

?>
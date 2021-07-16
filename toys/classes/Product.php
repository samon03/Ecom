<?php 

 // include 'Database.php';

class Product
{
	private $db;
	
	function __construct()
	{
		$this->db = new Database();
	}

	public function productInsert($data, $pimg)
	{
		try 
		{
			$proTitle = $data['title'];
			$selCat = $data['selcat'];
			$selBrand = $data['selBrand'];
			$proDes = $data['desInput'];
			$proPrice = $data['price'];
			$proQuantity = $data['quantity'];
			$proTyp = $data['proType'];
			
			$uploadImg = $pimg['image']['name'];
            $filetmpname = $pimg['image']['tmp_name'];
            $folder = './pic/';
    

            if ($proTitle == '' || $selCat == '' || $selBrand == '' || $proDes == '' || $proPrice == '' || $proQuantity == '' || $proTyp == '' )
			{
				echo "<script>console.log('Field must not empty!')</script>";
			}
			else
			{

				move_uploaded_file($filetmpname, $folder.$uploadImg);

			    $query = "INSERT INTO product VALUES ('', '$proTitle','$proPrice','$selCat', '$selBrand', '$proDes', '$uploadImg', '$proQuantity', '$proTyp')";
                $productInsert = $this->db->insert($query); 
				 
				echo "<script>window.location.assign('./show_product_list.php')</script>";
			}

		} 
		catch (PDOException $e) 
		{
			echo "<script>console.log('Insertion Failled!')</script>";
			
		}       

	}

	public function getAllproduct()
	{
		$query = "SELECT product.*, category.Category_Name, brand.Brand_Name FROM product, category, brand WHERE category.Category_Id = product.Category_Id && brand.Brand_ID = product.Brand_Id  
            ORDER BY product.Pro_ID DESC";
		$brndAll = $this->db->select($query); 
		return $brndAll; 
	}

	public function getFourproduct()
	{
		$query = "SELECT product.*, category.Category_Name, brand.Brand_Name FROM product, category, brand WHERE category.Category_Id = product.Category_Id && brand.Brand_ID = product.Brand_Id  
            ORDER BY product.Pro_ID DESC LIMIT 4";
		$brndAll = $this->db->select($query); 
		return $brndAll; 
	}

	public function selProByID($proID)
	{
		$query = "SELECT * FROM product WHERE Pro_ID = $proID";
		$updateData = $this->db->select($query);
		return $updateData;
	}

	public function nameFromId($cat, $brnd)
	{
         $query = "SELECT Category_Name, Brand_Name FROM product, category, brand WHERE category.Category_Id = '$cat' && brand.Brand_ID = '$brnd'";
         $nameData = $this->db->select($query);
		 return $nameData;
	}

	public function updateProduct($proID, $data, $pimg)
	{

		try 
		{
			$proTitle = $data['title'];
			$selCat = $data['selcat'];
			$selBrand = $data['selBrand'];
			$proDes = $data['desInput'];
			$proPrice = $data['price'];
			$proQuantity = $data['quantity'];
			$proTyp = $data['proType'];
			
			$uploadImg = $pimg['image']['name'];
            $filetmpname = $pimg['image']['tmp_name'];
            $folder = './pic/';
    

            if ($proTitle == '')
			{
				echo "<script>console.log('Field must not empty!')</script>";
			}
			else
			{
                 
                try 
				{
					 $query = "UPDATE product 
                          SET Pro_Title = '$proTitle',Pro_Price = '$proPrice' , 
                          Category_Id = '$selCat',Brand_Id = '$selBrand', 
                          Pro_Image = '$uploadImg', Pro_Description = '$proDes',
                          Total_Quantity = '$proQuantity',Type = '$proTyp' 
                          WHERE Pro_ID = $proID";
				 
				    $product = $this->db->update($query); 
				    echo "<script>window.location.assign('./show_product_list.php')</script>";
				} 
				catch (PDOException $e) 
				{
					echo $e->getMessage();
				}
			}

		} 
		catch (PDOException $e) 
		{
			echo "<script>console.log('Insertion Failled!')</script>";
			
		}       
		
	}

	public function delProById($pId)
	{
		try 
		{
			$query = "DELETE FROM product WHERE Pro_ID = $pId";
		    $deleteData = $this->db->delete($query);
		    echo "<script>window.location.assign('./show_product_list.php')</script>";
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}
		
	}

	public function compareProduct($id, $proID)
	{
        try 
		{
			
			$check = "SELECT * FROM compare WHERE Customer_ID = '$id' && Pro_ID = '$proID'";
		    $checkData = $this->db->select($check);
		    if ($checkData) 
		    {
                 $msg = "Already Added!";
                 return $msg;
		    }

			$query = "SELECT * FROM product WHERE Pro_ID = '$proID'";
		    $compareData = $this->db->select($query)->fetch();
		    if ($compareData) 
		    {
		    	$proTitle = $compareData['Pro_Title'];
		    	$proPrice = $compareData['Pro_Price'];
		    	$proImg = $compareData['Pro_Image'];

		    	try 
		    	{
		    		$insert = "INSERT INTO compare VALUES ('', '$id', '$proID', '$proTitle', '$proImg', '$proPrice')";
		    		$compareData = $this->db->insert($insert);
		    		$msg = "Added to compare list";
		    	} 
		    	catch (PDOException $e) 
		    	{
		    		$msg = "Can't add to compare list";
		    	}
		    	return $msg;
		    }
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function compareProductList()
	{
		try 
		{
			$id = $_SESSION['userId'];
			$compare = "SELECT * FROM compare WHERE Customer_ID = '$id'";
		    $compareData = $this->db->select($compare);
		    
            return $compareData;
		    
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function delCompareList()
	{
		try 
		{
			$id = $_SESSION['userId'];
			$delCompare = "DELETE FROM compare WHERE Customer_ID = '$id'";
		    $delCompareData = $this->db->select($delCompare);
		    
            return $delCompareData;
		    
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}
 
	public function addToWishlist($id ,$proID)
	{
        try 
		{
			
			$check = "SELECT * FROM wishlist WHERE Customer_ID = '$id' && Pro_ID = '$proID'";
		    $checkData = $this->db->select($check);
		    if ($checkData) 
		    {
                 $msg = "Already Added to wishlist!";
                 return $msg;
		    }

			$query = "SELECT * FROM product WHERE Pro_ID = '$proID'";
		    $compareData = $this->db->select($query)->fetch();
		    if ($compareData) 
		    {
		    	$proTitle = $compareData['Pro_Title'];
		    	$proPrice = $compareData['Pro_Price'];
		    	$proImg = $compareData['Pro_Image'];

		    	try 
		    	{
		    		$insert = "INSERT INTO wishlist VALUES ('', '$id', '$proID', '$proTitle', '$proImg', '$proPrice')";
		    		$wishData = $this->db->insert($insert);
		    		$msg = "Added to wishlist";
		    	} 
		    	catch (PDOException $e) 
		    	{
		    		$msg = "Can't add to wishlist list";
		    	}
		    	return $msg;
		    }
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function wistList()
	{
		try 
		{
			$id = $_SESSION['userId'];
			$wish = "SELECT * FROM wishlist WHERE Customer_ID = '$id'";
		    $wishData = $this->db->select($wish);
		    
            return $wishData;
		    
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

	public function delWishlistProduct($proID)
	{
		try 
		{
			$delWish = "DELETE FROM wishlist WHERE Pro_ID = '$proID'";
		    $delWishData = $this->db->select($delWish);
		    
            return $delWishData;
		    
		} 
		catch (PDOException $e) 
		{
			$msg = $e->getMessage();
			return $msg;
		}
	}

}

?>
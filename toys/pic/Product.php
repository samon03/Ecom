<?php 

// include 'db_credentials/Database.php';

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
			
			$uploadImg = $_FILES['image']['name'];
            $filetmpname = $_FILES['image']['tmp_name'];
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
		$query = "SELECT * FROM product ORDER BY Pro_ID DESC";
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

	public function updateProduct($brandID, $bInp)
	{

		if ($brandID != '' || $bInp != '') 
		{
			$query = "UPDATE brand
			SET Brand_Name = '$bInp'
			WHERE Brand_ID = '$brandID'";
			$update = $this->db->update($query);
			echo "<script>window.location.assign('./show_brand_list.php')</script>";
		}
		
	}

	public function delProById($pId)
	{
		$query = "DELETE FROM product WHERE Pro_ID = $pId";
		$deleteData = $this->db->delete($query);
		echo "<script>window.location.assign('./show_product_list.php')</script>";
	}

}

?>
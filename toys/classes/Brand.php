<?php 

// include 'db_credentials/Database.php';

class Brand
{
	private $db;
	
	function __construct()
	{
		$this->db = new Database();
	}

	public function brandInsert($brandInput)
	{
		if ($brandInput == '') 
		{
			echo "<script>console.log('Input field is empty!')</script>";
		}
		else
		{
			try 
			{
				$query = "INSERT INTO brand VALUES('', '$brandInput');";
                $brandInsert = $this->db->insert($query);  
                echo "<script>window.location.assign('./show_brand_list.php')</script>";

				if ($brandInsert) 
				{
					echo "<script>console.log('Passed')</script>";
				}
				else
				{
					echo "<script>console.log('Faill')</script>";
				}
			} 
			catch (PDOException $e) 
			{
				echo "<script>console.log('Faill')</script>";
			}       
		}  
	}

	public function getAllBrand()
	{
		$query = "SELECT Brand_ID, Brand_Name FROM brand ORDER by Brand_ID DESC";
		$brndAll = $this->db->select($query); 
		return $brndAll; 
	}

	public function selByID($brandID)
	{
		$query = "SELECT Brand_ID, Brand_Name FROM brand WHERE Brand_ID = $brandID";
        $updateData = $this->db->select($query);
        return $updateData;
	}

	public function upBrand($brandID, $bInp)
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

	public function delBrandById($brandID)
	{
		$query = "DELETE FROM brand WHERE Brand_ID = $brandID";
        $deleteData = $this->db->delete($query);
        echo "<script>window.location.assign('./show_brand_list.php')</script>";
	}

}



?>
<?php 

// include 'db_credentials/Database.php';

class Category
{
	private $db;
	
	function __construct()
	{
		$this->db = new Database();
	}

	public function catInsert($catInput)
	{
		if ($catInput == '') 
		{
			echo "<script>console.log('Input field is empty!')</script>";
		}
		else
		{
			try 
			{
				$query = "INSERT INTO category VALUES ('', '$catInput')";
				$catInsert = $this->db->insert($query);  
				echo "<script>window.location.assign('./show_category_list.php')</script>";
				if ($catInsert) 
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

	public function getAllCategory()
	{
		$query = "SELECT Category_Id, Category_Name FROM category ORDER by Category_Id DESC";
		$catAll = $this->db->select($query); 
		return $catAll; 
	}

	public function selByID($catID)
	{
		$query = "SELECT Category_Name FROM category WHERE Category_Id = $catID";
        $updateData = $this->db->select($query);
        return $updateData;
	}

	public function updateCategory($catID, $catInp)
	{
       
        if ($catID != '' || $catInp != '') 
        {
        	$query = "UPDATE category
                  SET Category_Name = '$catInp'
                   WHERE Category_Id = $catID";
            $update = $this->db->update($query);
            echo "<script>window.location.assign('./show_category_list.php')</script>";
        }
		
	}

	public function delCategoryById($delID)
	{
		$query = "DELETE FROM category WHERE Category_Id = $delID";
        $deleteData = $this->db->delete($query);
        echo "<script>window.location.assign('./show_category_list.php')</script>";
	}

}



?>
<?php
// session_start();

class Database
{
	public $link;

	public function __construct()
	{
		$this->connectionDB();
	}
	private function connectionDB()
	{
		try 
		{
		   $this->link = new PDO('mysql:host=localhost;dbname=ecomdb', 'root', '');
	       $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       echo "<script>console.log('DB connected!')</script>";
	       
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}
	}

	public function select($query)
	{
		$result = $this->link->query($query) or die($this->link->error.__LINE__);

		if ($result->rowCount() > 0) 
		{
			return $result;
		}
		else
		{
			return false;
		}
	}
	
	public function insert($query)
	{
        try 
        {
        	$insert_row = $this->link->query($query);
        	if ($insert_row) 
		    {
			  // header("Location: index.php");
			  echo "<script>console.log('Inserted Successfully!')</script>";
            }
        } 
        catch (PDOException $e) 
        {
        	// echo $e->getMessage();
        	echo "<script>console.log('Error in insert!')</script>";
        }
	}

	public function delete($query)
	{

        try 
        {
        	$delete_row = $this->link->query($query);
        	if ($delete_row) 
		    {
			  echo "<script>console.log('Deleted Successfully!')</script>";
            }
        } 
        catch (PDOException $e) 
        {
        	// echo $e->getMessage();
        	echo "<script>console.log('Error in delete!')</script>";
        }
	}

	public function update($query)
	{
        try 
        {
        	$update_row = $this->link->query($query);
        	if ($update_row) 
		    {
			  echo "<script>console.log('Update Successfully!')</script>";
            }
        } 
        catch (PDOException $e) 
        {
        	// echo $e->getMessage();
        	echo "<script>console.log('Error in Update!')</script>";
        }
	}
}

?>
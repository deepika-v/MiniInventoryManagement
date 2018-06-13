<?php

/**
 * 
 */
class Manufacturer 
{	
	

	public static function get_all_manufacturers_list()
	{
		return Database::find_this_query("Select * from manufacturer");
		
	}

	public static function create()
	{
		global $database;
		$sql = "INSERT  IGNORE INTO `manufacturer` (`manufacturer_name`) VALUES ('";
		$sql .=$database->escape_string($database->manufacturer_name)."')";
		$query = $database->query($sql);
		if ($query) {

			$database->manufacturer_id = $database->the_insert_id();
			return true;
		}
		else
		{
            return false;
		}
	}
	public static function update()
	{
		global $database;
		$sql = " UPDATE `manufacturer`
		         SET `manufacturer_name` = '";
		$sql .= $database->escape_string($database->manufacturer_name)."' WHERE `manufacturer`.`manufacturer_id` ="; 
		$sql .= $database->escape_string($database->manufacturer_id);
		$query = $database->query($sql);
		var_dump(mysqli_affected_rows($database->connection));
		if (mysqli_affected_rows($database->connection) == 1) {

			return true;
		}
		else
		{
            return false;
		}

	}
}
?>
<?php

/**
 * 
 */
class Manufacturer 
{	
	

	public function get_all_manufacturers_list(){
		global $database;
		$result_set = $database->query("Select * from manufacturer");
		return $result_set;
	}
}
?>
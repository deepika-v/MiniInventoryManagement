<?php 
/**
 * 

 */
class Model 
{
	
	function __construct(argument)
	{
		# code...
	}

	public function get_all_model_list(){
		global $database;
		$result_set = $database->query("Select model.*, manufacturer_id, manufacturer_name from model join manufacturer on model.manufacturer_id = manufacturer.manufacturer_id ");
		return $result_set;
	}
}

?>
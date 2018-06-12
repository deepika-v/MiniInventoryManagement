<?php 
/**
 * 

 */
class Model 
{
	
	

	public function get_all_model_list(){
		global $database;
		$result_set = $database->query("Select model.*, manufacturer_name from model join manufacturer on model.manufacturer_id = manufacturer.manufacturer_id join file_attachment on file_attachment.model_id = model.model_id");
		return $result_set;
	}
}

?>
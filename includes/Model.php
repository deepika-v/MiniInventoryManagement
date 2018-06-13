<?php 
/**
 * 

 */
class Model 
{
	
	
	

	public static function get_all_model_list(){
		return Database::find_this_query("Select model.*, manufacturer_name from model join manufacturer on model.manufacturer_id = manufacturer.manufacturer_id left join file_attachment on file_attachment.model_id = model.model_id");
		
	}

	public static function get_model_details_by_id($model_id){
		return Database::find_this_query("Select model.*, manufacturer_name from model join manufacturer on model.manufacturer_id = manufacturer.manufacturer_id left join file_attachment on file_attachment.model_id = model.model_id where model.model_id = $model_id");
		
	}

}

?>
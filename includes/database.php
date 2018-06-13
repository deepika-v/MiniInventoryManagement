<?php 

 require_once("../includes/config.php");
/**
 * 
 */
class Database 
{
	public $model_id;
	public $model_name;
	public $manufacturer_id;
	public $model_color;
	public $model_mf_year;
	public $model_registration_no;
	public $model_avaliable_count;
	public $model_sold_count;
	public $model_note;
	public $created_on;
	public $updated_on;
	public $manufacturer_name;
	public $file_attachment_id;
	public $file_path;
	public $file_type;
	
	public $connection;
	function __construct()
	{
		$this->open_db_connection();
	}


	public function open_db_connection()
	{
		$this->connection =  new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if($this->connection->connect_errno)
		{
			die("Database Connection failed". $this->connection->connect_error);
		}
	}

	public function query($sql)
	{
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
		return $result;
	}

	private function confirm_query($result)
	{
		if(!$result)
		{
			die("Query Failed" . $this->connection->error);
		}

	}

	public function escape_string($string)
	{
		$escaped_string = $this->connection->real_escape_string($string);

		return $escaped_string;
	}

	public function last_insert_id()
	{
         return $this->connection->insert_id();
	}
	public function the_insert_id()
	{
         return   mysqli_insert_id($this->connection);      
	}

	/*public function fetch_array($result)
	{
		$results = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))	
		{
			$results[] = $row;
		}

		return $results;
	}*/


	public static function find_this_query($sql){
		global $database;
		$result_set = $database->query($sql);
		$the_object_array = array();
		while($row = mysqli_fetch_assoc($result_set))	
		{
			//echo "in while";
			$the_object_array[]= self::instantation($row);
		}
		
		
		return $the_object_array;
	}

	private static function instantation($data)
	{
		
		$the_object = new self;
		foreach ($data as $the_attribute => $value) 
		{			
			if($the_object->has_the_attribute($the_attribute))
			{
				$the_object->$the_attribute = $value;
			}
 			
		}
		return $the_object;
	}

	private function has_the_attribute($the_attribute)
	{
		$object_properties = get_object_vars($this);
		return array_key_exists($the_attribute, $object_properties);

	}


	
}
        
$database = new Database();
?>
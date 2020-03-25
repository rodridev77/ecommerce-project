<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

/**
 * 
 */

class Customer
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connect();
	}

	public function CustomerRegistration($CustomerData){
		
		$query = "INSERT INTO customer (email,password_key,name,surname,phone,cpf,active) VALUES(:email,:password_key,:name,:surname,:phone,:cpf,:active)";
		
		$fields = array_keys($CustomerData);

		//var_dump($CustomerData);
		//var_dump($fields);

		$stt = $this->conn->prepare($query);

		foreach ($fields as $key => $value) {
			//$value = filter_var($value);
			$stt->bindValue(":$value",$CustomerData[$value],PDO::PARAM_STR);
		}
		if($stt->execute()){
			return true;
		}else{
			return false;
		}

	}

}



 ?>
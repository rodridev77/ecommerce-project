<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

/**
 *@author Marcelino Braga
 */

class Customer
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connect();
	}

	public function CustomerRegistration($CustomerData){
		
		try{

			if (in_array("", $CustomerData)) {
				return false;
			}

			$query = "INSERT INTO customer (email,password_key,name,surname,phone,cpf,active) VALUES(:email,:password_key,:name,:surname,:phone,:cpf,:active)";
			
			$fields = array_keys($CustomerData);

			$stt = $this->conn->prepare($query);

			foreach ($fields as $key => $value) {
				$stt->bindValue(":$value",$CustomerData[$value],PDO::PARAM_STR);
			}

			if($stt->execute()){
				return true;
			}
		} catch (\PDOException $Exception) {
			echo $Exception->getMessage();
			die;
		}
	}

	public function CustomerUpdate($CustomerData){

		try{

			if (in_array("", $CustomerData)) {
				return false;
			}

			$id = $CustomerData['id'];

			unset($CustomerData['id']);

			$query = 'UPDATE customer SET email=:email,password_key=:password_key,name=:name,surname=:surname,phone=:phone,cpf=:cpf,voucher_id=:voucher_id WHERE id=:id';
			
			$fields = array_keys($CustomerData);

			$stt = $this->conn->prepare($query);

			foreach ($fields as $key => $value) {
				$stt->bindParam(":$value",$CustomerData[$value],PDO::PARAM_STR);
			}
			$stt->bindParam(":id",$id,PDO::PARAM_INT);

			if($stt->execute()){
				return true;
			}

		}catch (\PDOException $Exception) {
            echo $Exception->getMessage();
            die;
        }
	}

	public function CustomerDelete($CustomerId){
		try {
			$query= "DELETE FROM customer WHERE id=:id";
			$stt = $this->conn->prepare($query);
			$stt->bindParam(":id",$CustomerId,PDO::PARAM_INT);
			$stt->execute();
			if ($stt->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		} catch (\PDOException $Exception) {
			echo $Exception->getMessage();
			die;
		}
	}

	public function getAllCustomers(){
		try {
			$query = "SELECT * FROM customer GROUP BY id";
			$stt = $this->conn->prepare($query);
			if ($stt->execute()) {
				$customers = $stt->fetchAll(PDO::FETCH_ASSOC);
			}
		} catch (\PDOException $Exception) {
			echo $Exception->getMessage();
			die;
		}

		return $customers;
		
	}

}

 ?>
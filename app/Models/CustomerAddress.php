<?php
namespace app\Models;
use app\Core\Connection;
use \PDO;


class CustomerAddress
{
    private $conn;
    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    	public function customerAddress($CustomerDataAddress){
		try {
			$query = "INSERT INTO customer_address (address,number,zipcode,district,city,state,customer_id
			) VALUES(:address,:number,:zipcode,:district,:city,:state,:customer_id)";

			$stt = $this->conn->prepare($query);

			$stt->bindValue(":address", $CustomerDataAddress['address'], PDO::PARAM_STR);
			$stt->bindValue(":number", $CustomerDataAddress['number'], PDO::PARAM_INT);
			$stt->bindValue(":zipcode", $CustomerDataAddress['zipcode'], PDO::PARAM_INT);
			$stt->bindValue(":district", $CustomerDataAddress['district'], PDO::PARAM_STR);
			$stt->bindValue(":city", $CustomerDataAddress['city'], PDO::PARAM_STR);
			$stt->bindValue(":state", $CustomerDataAddress['state'], PDO::PARAM_STR);
			$stt->bindValue(":customer_id", $CustomerDataAddress['customer_id'], PDO::PARAM_INT);

			if ($stt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (\PDOException $Exception) {
			echo $Exception;
		}

	}
}
?>
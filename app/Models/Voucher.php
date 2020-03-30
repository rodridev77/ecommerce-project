<?php 

namespace app\Models;
use app\Core\Connection;
use \PDO;


/**
 * @author Marcelino Braga
 */
class Voucher
{
	private $conn;

	function __construct()
	{
		$this->conn = Connection::connect();
	}

	public function newVoucher($voucherData){

		try {
			$query = "INSERT INTO voucher (value,creation_date,expiration_date) VALUES (:value,:creation_date,:expiration_date)";
			$stt = $this->conn->prepare($query);

			$stt->bindValue(":value", $voucherData['value'], PDO::PARAM_STR);
			$stt->bindValue(":creation_date", $voucherData['creation_date'], PDO::PARAM_STR);
			$stt->bindValue(":expiration_date", $voucherData['expiration_date'], PDO::PARAM_STR);

			if ($stt->execute()) {
				return true;
			}else{
				return false;
			}
		} catch (\PDOException $exception) {
			echo $exception;
		}
	}

	public function deleteVoucher($voucherId){
		try {
			$query = "DELETE FROM voucher WHERE id=:id";
			$stt = $this->conn->prepare($query);
			$stt->bindParam(":id", $voucherId, PDO::PARAM_INT);
			$stt->execute();
			if ($stt->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		} catch (\PDOException $exception) {
			echo $exception;	
		}
	}

	public function updateVoucher($voucherData){
		try {
			$query = "UPDATE voucher SET type=:type,value=:value,creation_date=:creation_date,expiration_date=:expiration_date WHERE id=:id";
			$stt = $this->conn->prepare($query);
			
			$stt->bindValue(":id",$voucherData['id'],PDO::PARAM_INT);
			$stt->bindValue(":type",$voucherData['type'],PDO::PARAM_INT);
			$stt->bindValue(":value", $voucherData['value'], PDO::PARAM_STR);
			$stt->bindValue(":creation_date", $voucherData['creation_date'], PDO::PARAM_STR);
			$stt->bindValue(":expiration_date", $voucherData['expiration_date'], PDO::PARAM_STR);

			if ($stt->execute()) {
				return true;
			}else{
				return false;
			}
			
		} catch (\PDOException $exception) {
			echo $exception;
		}
	}


}



 ?>
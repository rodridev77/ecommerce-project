<?php 
namespace app\Controllers;

use app\Core\Controller;
use app\Models\Customer;

class CustomerController extends Controller{
	private $data = [];
	public function registerForm(){
		$viewPath = 'forms/';
		$viewName = "register_form";
		$this->data['form'] = "Formulario de cadastro";
		$this->loadTemplate($viewPath, $viewName, $this->data);
	}

	public function register(){

		$data = array("email"=> FILTER_SANITIZE_STRING, 
					"password_key" => FILTER_SANITIZE_STRING,
					"name" => FILTER_SANITIZE_STRING, 
					"surname" => FILTER_SANITIZE_STRING,
					"phone" => FILTER_SANITIZE_STRING,
					"cpf" => FILTER_SANITIZE_STRING,
					"active" => FILTER_VALIDATE_INT
					);
		$postData = filter_input_array(INPUT_POST,$data);
		
		$customer = new Customer();
		
		if ($customer->CustomerRegistration($postData)) {
			echo "Cliente cadastrado";
		}else{
			echo "Cliente nao cadastrado";
		}

/* 		$viewPath = 'forms/';
		$viewName = "register_form";
		$this->loadTemplate($viewPath, $viewName, $this->data); */
			
	}

	public function Update(){

		$data = array("id" => FILTER_VALIDATE_INT
					,"email"=> FILTER_SANITIZE_STRING,
					"password_key" => FILTER_SANITIZE_STRING,
					"name" => FILTER_SANITIZE_STRING, 
					"surname" => FILTER_SANITIZE_STRING,
					"phone" => FILTER_SANITIZE_STRING,
					"cpf" => FILTER_SANITIZE_STRING
					);

		$postData = filter_input_array(INPUT_POST,$data);
		
		$customer = new Customer();
	
		if ($customer->CustomerUpdate($postData)) {
			echo "Cliente atualizado";
		}else{
			echo "Cliente nao atualizado";
		}
/* 
		$viewPath = 'forms/';
		$viewName = "register_form";
		$this->loadTemplate($viewPath, $viewName, $this->data); */
			
	}

	public function Delete(){
		$id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
		$customer = new Customer();

		if($customer->CustomerDelete($id)){
			echo "cliente deletado";
		}else{
			echo "cliente nao deletado";
		}
	}

	public function getCustomers(){
		$customer = new Customer();
		var_dump($customer->getAllCustomers());
	}
}

 ?>
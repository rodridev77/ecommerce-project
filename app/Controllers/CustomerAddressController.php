<?php
namespace app\Controllers;
use app\Core\Controller;
use app\Models\CustomerAddress;

class CustomerAddressController extends Controller
{
    private $data = [];

    public function addAddress(){
        $addressData = ["address"=>FILTER_SANITIZE_STRING,
                    "number"=>FILTER_VALIDATE_INT,
                    "zipcode"=>FILTER_VALIDATE_INT,
                    "district"=>FILTER_SANITIZE_STRING,
                    "city"=>FILTER_SANITIZE_STRING,
                    "state"=>FILTER_SANITIZE_STRING,
                    "customer_id"=>FILTER_VALIDATE_INT];
        $addressData = filter_input_array(INPUT_POST,$addressData);

        $customer = new CustomerAddress();

        if($customer->customerAddress($addressData)){
            echo "ok";
        }else{
            echo "not ok";
        }
    }
}


?>
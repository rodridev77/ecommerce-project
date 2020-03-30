<?php

namespace app\Controllers;
use app\Core\Controller;
use app\Models\Voucher;

class VoucherController extends Controller
{
    private $data = [];

    public function addVoucher(){
        $voucherData = array("value"=>FILTER_SANITIZE_STRING,
        "creation_date"=>FILTER_SANITIZE_STRING,
        "expiration_date"=>FILTER_SANITIZE_STRING);

        $voucherData = filter_input_array(INPUT_POST,$voucherData);
        $voucher = new Voucher();
        if($voucher->newVoucher($voucherData)){
            echo "voucher criado";
        }else{
            echo "voucher nao criado";
        }
    }
    public function updateVoucher(){
        $voucherData = array("id"=>FILTER_VALIDATE_INT,"type"=>FILTER_VALIDATE_INT,"value"=>FILTER_SANITIZE_STRING,
        "creation_date"=>FILTER_SANITIZE_STRING,
        "expiration_date"=>FILTER_SANITIZE_STRING);

        $voucherData = filter_input_array(INPUT_POST,$voucherData);
        $voucher = new Voucher();
        if($voucher->updateVoucher($voucherData)){
            echo "voucher atualizado";
        }else{
            echo "voucher nao atualizado";
        }
    }

    public function delVoucher(){
        $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
        $voucher = new Voucher();
        if($voucher->deleteVoucher($id)){
            echo "deletado";
        }else{
            echo "N deletado";
        }
    }

}

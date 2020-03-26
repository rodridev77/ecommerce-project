<?php

namespace app\Controllers;

//use app\Core\Connection;
use app\Core\Controller;

class HomeController extends Controller {

    private $data = [];

    public function index() {
        $viewPath = '';
        $viewName = "home";
        $this->data['product_list'] = "Lista de Produtos na Home";

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function teste($teste) {
        $viewPath = '';
        $viewName = "teste";
        $this->data['teste'] = $teste;

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

}

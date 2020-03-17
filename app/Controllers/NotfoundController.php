<?php

namespace app\Controllers;

use app\Core\Controller;

class NotfoundController extends Controller {

    public function index() {
        $viewPath = '';
        $viewName = "404";

        $this->loadView($viewPath, $viewName);
    }

}

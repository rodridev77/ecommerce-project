<?php

namespace app\Core;

class Controller
{

    public function loadView($viewPath, $viewName, $viewData = array())
    {
        extract($viewData);

        require "app/views/" . $viewPath . $viewName . ".php";
    }

    public function loadTemplate($viewPath, $viewName, $viewData = array())
    {
        require_once "app/views/template/default_template.php";
    }

    public function loadViewInTemplate($viewPath, $viewName, $viewData = array())
    {
        extract($viewData);
        require_once "app/views/" . $viewPath . $viewName . ".php";
    }
}

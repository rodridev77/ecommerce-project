<?php

namespace app\Core;

class Core {

    private function makeRoute($url) {

        $params = array();

        if (!empty($url) && ($url != '/')) {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0] . "Controller";
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = "index";
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = "HomeController";
            $currentAction = "index";
        }

        $currentController = ucfirst($currentController);
        $prefixo = '\app\Controllers\\';

        return ["currentController" => $currentController, "prefixo" => $prefixo, "params" => $params, "currentAction" => $currentAction];
    }

    private function runRoute($params) {

        extract($params);

        if ((!file_exists('app/Controllers/' . $currentController . '.php')) || (!method_exists($prefixo . $currentController, $currentAction))) {
            $currentController = 'NotfoundController';
            $currentAction = 'index';
        }

        $newController = $prefixo . $currentController;
        $controller = new $newController();
        call_user_func_array(array($controller, $currentAction), $params);
    }

    public function run() {
        $url = '/';

        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }
        //echo $url;
        $params = $this->makeRoute($url);

        $this->runRoute($params);
    }

}

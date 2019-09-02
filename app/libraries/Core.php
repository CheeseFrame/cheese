<?php
/**
 * App Core Class
 * Creates URL & loads controller
 * URL FORMAT /controller/method/params
 */


class Core
{
    protected $currentController = CONTROLLER;
    protected $currentMethod = METHOD;
    protected $params = [];


    public function __construct ()
    {
        $url = $this->getUrl();
        //Look in controller for first value
        if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')) {
            //if exists set as currentController
            $this->currentController = ucwords($url[0]);
            /*unset url[0]*/
            unset($url[0]);
        }
        //require controller file
        require_once '../app/controllers/'. $this->currentController .'.php';
        // instantiate controller class
        $this->currentController = new $this->currentController;

        //check for the second index of the url array
        if(isset($url[1])) {
            //check if method exists
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset url[1];
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [];
        // Call a callback with array params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        } else{
            return false;
        }
    }


}
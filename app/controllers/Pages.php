<?php
class Pages extends Controller {
    public function __construct() {
        
    }

    public function index() {
       
        $data =[
            "title" => "Cheese",
            "description" => "Lightweight PHP Framework <br> Check out the <a href='http://cheeseframework.ml/'>docs</a> in order to know how to use this framework.",
            "links" => "<a href='http://cheeseframework.ml/'>Docs</a>&nbsp;&nbsp;&nbsp; <a href='pages/about'> About</a>&nbsp;&nbsp;&nbsp; <a href='https://github.com/CheeseFramework/'> GITHUB</a>"
        ];
        $this->view('pages/index', $data);
    }

    public function about() {
        $data =[
            "title" => "About us",
            "description" => "Cheese is a Lightweight PHP Framework"
        ];
        $this->view('pages/about', $data);
    }
}

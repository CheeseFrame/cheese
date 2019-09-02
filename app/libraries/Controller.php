<?php
/**
 * Base Controller
 * Loads models and views
 */
class Controller {
    // Load model
    public function model($model) {
        // require model
        require_once '../app/models/'. $model . '.php';
        // Instantiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = []) {
        //check if view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            // require view file
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exists");
        }
    }
}
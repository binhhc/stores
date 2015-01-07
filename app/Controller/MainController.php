<?php

App::uses('AppController', 'Controller');

/**
 * Contacts controller
 *
 * @since 2015/01/06
 * @package app.Controller
 */
class MainController extends AppController {

    public $name = 'Main';

    /**
     * main page
     * @author OanhHa
     * @created 2015/01/06
     */
    public function index() {

    	$this->layout = "main_page";
    	$this->set('title_for_layout', 'Main Page');
    }
    public function item_management() {
    	$this->layout = false;
    }
}
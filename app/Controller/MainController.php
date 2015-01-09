<?php
class MainController extends AppController {

    public function index() {
        $this->layout = 'main_page';

        // pr($this->request->data);
    }

    public function item_management() {
        $this->layout = false;
    }



}
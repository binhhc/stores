<?php
class UsersController extends AppController {


    public function index(){

    }


    public function login() {
        $this->layout = false;

        // pr($this->request->data);
    }

    public function forgotPassword() {
        $this->layout = false;
    }


}
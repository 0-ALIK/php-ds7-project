<?php

class IndexController {

    public function getLoginPage() {
        header('refresh:0;url=views/login.php');
        exit;
    }

    public function getRegisterPage() {
        header('refresh:0;url=views/registro.php');
        exit;
    }
    
}
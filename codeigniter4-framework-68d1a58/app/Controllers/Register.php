<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Users;

class Register extends Controller
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    public function register() {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordconf = $this->request->getPost('passwordconf');

        if ($password != $passwordconf) {
            redirect("/register?error=1");
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $result = $this->userModel->addUser($username, $email, $hash);

        if ($this->request->getPost('rememberme') != null) {
            //TODO: add tokens and cookies and allat
        }

        redirect("/");
    }
}
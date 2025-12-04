<?php

namespace App\Controllers;

use App\Models\Users;
use CodeIgniter\Controller;

class Login extends Controller {
    protected $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    public function login() {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $auth = service('auth');
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        $result = $auth->attempt($credentials);

        if (! $result->isOk()) {
            return redirect()->to('/login?error=2');
        }

        if ($this->request->getPost('rememberme') != null) {
            //TODO: token generation and storing
        }

        return redirect("/");
    }
}
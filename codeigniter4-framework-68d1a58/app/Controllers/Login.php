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

        $user = $this->userModel->getUserByEmail($email);

        if ($user == null) {
            return redirect()->to('/login?error=2');
        } else {
            $password_is_correct = password_verify($password, $user["HASH"]);

            if (!$password_is_correct) {
                return redirect()->to("/register?error=1");
            }

            if ($this->request->getPost('rememberme') != null) {
                //TODO: token generation and storing
            }

            return redirect()->to('/');
        }
    }
}
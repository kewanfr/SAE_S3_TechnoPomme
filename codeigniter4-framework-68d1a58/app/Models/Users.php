<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel;

class Users extends UserModel
{
    public function getUserByEmail($email) {
        return $this->select('users.*')
            ->where('users.email', $email)
            ->first();
    }

    public function getUserByUsername($username) {
        return $this->select('users.*')
            ->where('users.username', $username)
            ->first();
    }

    public function getUserById($id) {
        return $this->select('users.*')
            ->where('users.id', $id)
            ->first();
    }
}
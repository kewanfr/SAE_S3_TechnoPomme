<?php

namespace App\Models;

use CodeIgniter\Model;
use PDOException;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "name", "email", "hash"];

    public function getUserByEmail($email) {
        return $this->where("email", $email)->first();
    }

    public function getUserById($id) {
        return $this->where("id", $id)->first();
    }

    public function addUser($name, $email, $password) {
        $id = rand(1, 10000);

        try {
            return $this->insert(["id" => $id, "name" => $name, "email" => $email, "hash" => $password]);
        } catch (\ReflectionException $e) {
            return $e->getMessage();
        }
    }
}
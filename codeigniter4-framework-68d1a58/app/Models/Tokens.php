<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Tokens extends Model
{
    protected $table = "tokens";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "user_id", "token", "expiry"];

    function mintTocken($user_id, $long_lived) {
        $now = new DateTime();
        if ($long_lived) {
            $interval = new \DateInterval('P1D');
        } else {
            $interval = new \DateInterval('PT1H');
        }
        $now->add($interval);

        $expiry = $now->format("Y-m-d H:i:s");


    }
}
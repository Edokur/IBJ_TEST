<?php

namespace App\Models;

use CodeIgniter\Model;

class Peserta_model extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password'];
}

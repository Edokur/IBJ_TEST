<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{
    protected $table = 'course_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}

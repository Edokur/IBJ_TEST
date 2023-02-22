<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas_model extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'course_category_id'];
}

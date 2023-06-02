<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table      = 'department';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'department',
        'ref',
        'status',
    ];
}

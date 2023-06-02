<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisionModel extends Model
{
    protected $table      = 'division';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'division',
        'dp_id',
        'status',
    ];
}

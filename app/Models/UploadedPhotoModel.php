<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadedPhotoModel extends Model
{
    protected $table      = 'uploaded_photo';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'dp_id',
        'shorting',
        'activity_id',
        'filename',
        'filepath',
        'filesize',
        'upload_by',
        'upload_date'
    ];
}

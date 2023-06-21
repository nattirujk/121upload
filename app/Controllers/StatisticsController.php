<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\DepartmentModel;
use App\Models\ActivityModel;
use App\Models\UploadedPhotoModel;

class StatisticsController extends BaseController
{
    use ResponseTrait;
    public function index_act_all()
    {
        //จำนวนผู้ลงทะเบียน
        $db = \Config\Database::connect();
        $query = $db->query('SELECT  DISTINCT activity.dp_id AS dp ,department.department FROM activity
        LEFT JOIN department ON department.id = activity.dp_id ');
        $data = $query->getResult();
        // dd($data);
        return view('statistics',$data);
    }

}

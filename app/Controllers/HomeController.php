<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\DepartmentModel;
use App\Models\ActivityModel;
use App\Models\UploadedPhotoModel;

class HomeController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view('template/header')
            . view('/landing_page')
            . view('template/footer');
    }

    public function home() {
        return view('home');
    }

    public function manual() {
        return view('manual');
    }
    
    public function org_level1() {
        $DepartmentModel = new DepartmentModel();
        $data = $DepartmentModel->where('ref','0')->findAll();
    
        return $this->respond($data);
    }

    public function org_level2($id) {
        $DepartmentModel = new DepartmentModel();

        $data = $DepartmentModel->where('ref',$id)->findAll();
      
        return $this->respond($data);
    }

    public function show(){

        $id1 = $this->request->getPostGet('organize_id');
        $id2 = $this->request->getPostGet('organize_pid');
        $ActivityModel = new ActivityModel();
        $DepartmentModel = new DepartmentModel();
        $UploadedPhotoModel = new UploadedPhotoModel();
        
        if ($id2) {
            $data['org_root'] = $DepartmentModel->where('id',$id1)->first();
            $data['org'] = $DepartmentModel->where('id',$id2)->first();
            $data['org']['activity'] = $ActivityModel->where('dp_id',$id2)
                          ->orderBy('activity', 'asc')
                        ->findAll();
            foreach ($data['org']['activity'] as $key => $value) {
                $data['org']['activity'][$key]['photo'] = $UploadedPhotoModel->where('activity_id',$value['id'])->findAll();
            }
        }else {
            $data['org_root'] = [];
            $data['org'] = $DepartmentModel->where('id',$id1)->first();
            $data['org']['activity'] = $ActivityModel->where('dp_id',$id1)
                          ->orderBy('activity', 'asc')
                        ->findAll();
            foreach ($data['org']['activity'] as $key => $value) {
                $data['org']['activity'][$key]['photo'] = $UploadedPhotoModel->where('activity_id',$value['id'])->findAll();
                
            }
        }
      
        
        return view('home',$data);
     
    }


    public function statistics() {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT COUNT( DISTINCT dp_id ) AS department FROM activity');
        $results = $query->getRow();
        $data = array();
        $ActivityModel= new ActivityModel();
        $act1 = $ActivityModel->where('activity',1)->findAll();
        $act2 = $ActivityModel->where('activity',2)->findAll();
        $act3 = $ActivityModel->where('activity',3)->findAll();
        $act4 = $ActivityModel->where('activity',4)->findAll();
        $act5 = $ActivityModel->where('activity',5)->findAll();
        $act6 = $ActivityModel->where('activity',6)->findAll();
        $act7 = $ActivityModel->where('activity',7)->findAll();
        $deparment = $ActivityModel->where('dp_id',7)->findAll();

        $data['act1'] = count($act1);
        $data['act2'] = count($act2);
        $data['act3'] = count($act3);
        $data['act4'] = count($act4);
        $data['act5'] = count($act5);
        $data['act6'] = count($act6);
        $data['act7'] = count($act7);
        $data['department'] = $results->department;

        $builder = $db->table('user');
        $data['dp_id_account'] = $builder->countAllResults();


        // $queryAct1 = $db->query('select department.department FROM department WHERE department.id in ((SELECT  DISTINCT dp_id  AS id FROM activity where activity.activity = 1 )) ');

        return $this->respond($data);
    }

  
 
}

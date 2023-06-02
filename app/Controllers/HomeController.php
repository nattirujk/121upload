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

 
}

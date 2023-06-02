<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use App\Models\UploadedPhotoModel;

class upload extends BaseController
{
    protected $helpers = ['form'];

    public function checkAuth(){
        return  redirect('/');
    }

    public function uploader()
    {
        $session = session();
        $department = $session->get('dp_id');
        $data = [];
        $data['uploaded'] = [];
        $activityModel = New ActivityModel();

        if (!empty($this->request->getVar('a'))) {
            $data['activity'] = $activityModel
                ->where('dp_id',$department)
                ->where('activity',$this->request->getVar('a'))
                ->first();
            if (!empty($data['activity'])) {
                $UploadedPhotoModel = new UploadedPhotoModel();
                $pic = array();
                for ($i=1; $i <= 4 ; $i++) { 
                    $r = array();
                    $r = $UploadedPhotoModel
                                    ->where('activity_id',$data['activity']['id'])
                                    ->where('shorting',$i)
                                    ->first();
                    $pic[$i] = (!empty($r) ? $r: NULL ) ;
                }
                $data['uploaded'] = $pic;
            }

                // echo var_dump($activity)   ;
                //  exit;
        }else {
            # code...
        }
      
        return view('template/header')
            . view('uploader',$data)
            . view('template/footer');
    }

    public function upload_pic()
    {
        $validationRules = [
            'activity' => [
                'label' => 'กิจกรรม',
                'rules' => 'required',
                'errors' => [
                    'required' => 'เลือกกิจกรรม'
                ]
            ],
            'title' => [
                'label' => 'หัวข้อ',
                'rules' => 'required|min_length[5]|max_length[150]',
                'errors' => [
                    'required' => 'กรุณาเพิ่มหัวข้อ',
                    'min_length' => 'กรุณาเขียนหัวข้ออย่างน้อย 5 ตัวอักษร',
                    'max_length' => 'สามารถเขียนหัวข้อได้ไม่เกิน 150 ตัวอักษร'
                ] 
            ],
            'content' => [
                'label' => '',
                'rules' => 'required|min_length[5]|max_length[1000]',
                'errors' => [
                    'required' => 'กรุณาเพิ่มรายละเอียด',
                    'min_length' => 'กรุณาเขียนรายละเอียดอย่างน้อย 5 ตัวอักษร',
                    'max_length' => 'สามารถเขียนรายละเอียดได้ไม่เกิน 1000 ตัวอักษร'
                ] 
            ]
        ];

        $validatePhoto1 = [
                'photo1' => [
                    'label' => 'ภาพที่ 1',
                    'rules' => [
                        'uploaded[photo1]',
                        'is_image[photo1]',
                        'mime_in[photo1,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[photo1,10240]',
                        'max_dims[photo1,1920,1080]',
                    ],
                    'errors' => [
                        'uploaded' => 'กรุณาอัพโหลด {field}',
                        'is_image' => '{field} ไม่ใช่ไฟล์รูปภาพ',
                        'mime_in' => 'ประเภทไฟล์ {field} ไม่ตรงตามที่กำหนด',
                        'max_size' => 'ขนาด {field} ใหญ่เกิน 10 MB',
                        'max_dims' => 'สัดส่วน {field} ใหญ่เกิน 1920 x 1080',
                    ],
                ]
            ]; 
         
        if (!$this->validate($validationRules)) {
           
            $data = ['errors' => $this->validator];
            return view('template/header')
            . view('uploader',$data)
            . view('template/footer');
        }
        // if (!$this->validate($validatePhoto1)) {
           
        //     $data = ['errors' => $this->validator];
        //     return view('template/header')
        //     . view('uploader',$data)
        //     . view('template/footer');
        // }
        
        $imagefile1 = $this->request->getFiles('photo1');
        $imagefile2 = $this->request->getFiles('photo2');
        $imagefile3 = $this->request->getFiles('photo3');
        $imagefile4 = $this->request->getFiles('photo4');
        
  
        //ดึงข้อมูลผู้ใช้งานที่อัพโหลดภาพ
        $session = session();
        $department = $session->get('dp_id');
        $store_path = 'uploads/' . $department ;
        $username = $session->get('username');
        date_default_timezone_set('Asia/Bangkok');

        $activityModel = New ActivityModel();
        $activity = $activityModel
                ->where('dp_id',$department)
                ->where('activity',$this->request->getPost('activity'))->first();
        $uploadPhotoModel = new UploadedPhotoModel();
      
        if(empty($activity)){  // กรณี Insert
            $activityData = [
                'dp_id' => $department,
                'activity' => $this->request->getPost('activity'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            ];
            $activityModel->insert($activityData);
            $activity_id = $activityModel->getInsertID();

            if ($imagefile1->getName()) {
                if (!$this->validate($validatePhoto1)){
                    $data = ['errors' => $this->validator];
                    return view('template/header')
                    . view('uploader',$data)
                    . view('template/footer');
                }
                $newName = uppicture($imagefile1,$store_path);
            }
            foreach ($imagefile['photo'] as $key => $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(WRITEPATH . $store_path , $newName);

                    $uploadPhoto = [
                        'dp_id' => $department,
                        'shorting' => $key,
                        'activity_id' => $activity_id,
                        'filename' => $newName,
                        'filepath' => $store_path,
                        'upload_by' => $username,
                        'upload_date' => date("Y-m-d H:i:s")
                    ];
                    $uploadPhotoModel->insert($uploadPhoto);
                }
            }

            return redirect('uploader');
         
        }else {  //update 
            $activityData = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            ];
            $activityModel->update($this->request->getPost('id'),$activityData);

            foreach ($imagefile['photo'] as $key => $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(WRITEPATH . $store_path , $newName);

                    $updatePhoto = $uploadPhotoModel
                        ->where('activity_id' , $activity['id'])
                        ->where('shorting', $key)->first();
                    if ($updatePhoto) {
                        $uploadPhoto = [
                            'filename' => $newName,
                            'filepath' => $store_path,
                            'upload_by' => $username,
                            'upload_date' => date("Y-m-d H:i:s")
                        ];
                        $uploadPhotoModel->update($updatePhoto['id'],$uploadPhoto) ;

                    }else {
                        $uploadPhoto = [
                            'dp_id' => $department,
                            'shorting' => $key,
                            'activity_id' => $activity['id'],
                            'filename' => $newName,
                            'filepath' => $store_path,
                            'upload_by' => $username,
                            'upload_date' => date("Y-m-d H:i:s")
                        ];
                        $uploadPhotoModel->insert($uploadPhoto);
                    }
                }
            }
            return redirect('uploader');
        }

    }

    public function get_activity()
    {
        $data = [];
        $activity = new ActivityModel();

        $data = $activity->findAll();

        return json_encode($data);
    }

    public function uppicture ($picture,$store_path) {
        $newName = $picture->getRandomName();
        $picture->move(WRITEPATH . $store_path, $newName, true);

        return $newName;
    }
}

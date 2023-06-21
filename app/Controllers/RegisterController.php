<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    use ResponseTrait;
    protected $helpers = ['form','url'];
    
    
    public function index()
    {

        $validation = \Config\Services::validation ();

        if (!$this->request->is('post')) {
            return view('register');
        }

        
        $department = [];        
        // if ($this->request->getPost('department_id1')) {
        //     $DepartmentModel = new DepartmentModel();
        //     $department = $DepartmentModel->where('ref',$this->request->getPost('department_id1'))->first();
        //     if (!empty($department)) {
        //         $validation->setRules(
        //             [
        //             'department_id2' => 'required',
        //             ],
        //             [
        //                 'department_id2' => [
        //                     'required' => 'เลือก สังกัด',
        //                 ]
        //             ]
        //                 );
        //     }

        // }

        $validation->setRules(
            [
            'department_id1' => 'required',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[4]',
            'passconf' => 'required|matches[password]',
            ],
            [
                'department_id1' => [
                    1 => 'เลือก สังกัด',
                ]
            ]
    );
       
        if (! $validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput();
        }
        $dp_id = (!empty($this->request->getVar('department_id2')) ? $this->request->getVar('department_id2') : $this->request->getVar('department_id1') );
        $UserModel = new UserModel();

        $checkEmail =  $UserModel->where('username',$this->request->getVar('email'))->first();
        // echo var_dump($checkEmail) ;
        // exit;
        if ($checkEmail) {
            $validation->setError('email', 'มีผู้ใช้ อีเมลนี่ไปแล้ว หากต้องการเปลี่ยนแปลงกรุณาติดต่อเจ้าหน้าที่ email: nattiruj.k@gmail.com');
            return redirect()->back()->withInput();
        }
        $checkdp_id =  $UserModel->where('dp_id',$dp_id)->first();
        if ($checkdp_id) {
            $validation->setError('org', 'สังกัดที่ท่านเลือก มีผู้ลงทะเบียนไปแล้ว ด้วยอีเมลที่ชื่อ '.$checkdp_id['username'] . ' หากต้องการเปลี่ยนแปลงกรุณาติดต่อเจ้าหน้าที่ email: nattiruj.k@gmail.com' );
            return redirect()->back()->withInput();
        }

            $data = [
                'username' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'dp_id' => $dp_id 
            ];
    
            $UserModel->save($data);
        
        return redirect()->to(url_to('login'));
        
    }
}

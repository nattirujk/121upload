<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Authentication extends BaseController
{
    public function login()
    {
        if (!(session()->get('username') !== null)) {
            return view('template/header')
                . view('/login')
                . view('template/footer');
        }

        return  redirect('uploader');
    }

    public function authorize()
    {
        $validationRules = [
            'username' => [
                'label' => 'กรอกอีเมลที่ท่านลงทะเบียนไว้',
                'rules' => [
                    'required'
                ],
                'errors' => [
                    'required' => 'กรุณากรอก {field}'
                ]
            ],
            'password' => [
                'label' => 'รหัสผ่าน',
                'rules' => [
                    'required'
                ],
                'errors' => [
                    'required' => 'กรุณากรอก {field}'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {

            $data = ['error' => $this->validator];
            session()->setFlashdata($data);

            return redirect()->to(url_to('login'));
        }

        $username = $this->request->getPost('username');
        $password = (string)$this->request->getPost('password');

        // dd($username, $password);
        // exit;
        $user = new UserModel();
        $data = $user->select('username, password, dp_id')
            ->where('username', $username)
            ->first();
        if ($data) {
            $authenticatePassword = password_verify($password, $data['password']);
            // echo var_dump($authenticatePassword);
            // exit;
            if ($authenticatePassword === false) {
    
                $this->validator->setError('password', 'ชื่อผู้ใช้ หรือรหัสผ่านผิดพลาด');
                $data = ['error' => $this->validator];
                session()->setFlashdata($data);
    
                return  redirect()->to(url_to('login'));
            }
        }else {
            $this->validator->setError('password', 'ไม่พบผู้ใช้งาน กรุณาตรวจสอบอีเมลของท่านให้ถูกต้อง');
            $data = ['error' => $this->validator];
            session()->setFlashdata($data);

            return  redirect()->to(url_to('login'));
        }
        

        if ($data != null) {
            $session_data = [
                'username' => $data['username'],
                'dp_id' => $data['dp_id'],
                'isLoggedIn' => TRUE
            ];
            session()->set($session_data);

            return redirect()->to(url_to('uploader'));
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(url_to('home'));
    }
}

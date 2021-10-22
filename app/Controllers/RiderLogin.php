<?php

namespace App\Controllers;
use App\Models\RLog_IN;

class RiderLogin extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('rider-login', $data);
	}

	public function login(){

        $session = \Config\Services::session(); //session start

        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        if(empty($email) OR empty($pass)){
            $session->setFlashdata('msg', 'All field is required');
            return redirect()->to('/rider-login');
        }else{
            $log = new RLog_IN();
            $code = $log->login_valid($email, $pass);

            if($code == 200){
                //array of data from getuserData/Client data for session
                $session_Data = $log->getUserData($email); 
                $session->set($session_Data); 

                //route to dashboard
                return redirect()->to('/Rdashboard');
            }else if($code == 400){

                $session->setFlashdata('msg', 'Email not Found');
                return redirect()->to('/rider-login');

            }else if($code == 300){

                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/rider-login');

            }else{

                //error message for not verified
                $session->setFlashdata('msg', $code );
                return redirect()->to('/rider-login');

            }
        }

    }

	 //destroy session (logout)
	 public function logout()
	 {
		 $session = session();
		 $session->destroy();
		 return redirect()->to('/rider-login');
	 }
}

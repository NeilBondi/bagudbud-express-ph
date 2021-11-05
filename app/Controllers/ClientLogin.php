<?php

namespace App\Controllers;
use App\Models\Log_IN;

class ClientLogin extends BaseController
{
	public function index()
	{
        helper('form');
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('client-login', $data);
	}

    //login process 
	public function login(){

        $session = \Config\Services::session(); //session start

        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $log = new Log_IN();
        $code = $log->login_valid($email, $pass);

        if($code == 200){

            //array of data from getuserData/Client data for session
            $session_Data = $log->getUserData($email); 
            $session->set($session_Data); 

            //route to dashboard
            return redirect()->to(base_url('/client-dashboard/deliveries'));
        }else if($code == 400){

            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/client-login');

        }else if($code == 300){

            $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->to('/client-login');

        }else{

            //error message for not verified
            $session->setFlashdata('msg', $code );
            return redirect()->to('/client-login');

        }

    }

    //destroy session (logout)
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/client-login');
    }

    //verification process
    public function verify($data = null){// get the verification key and validate
		$vkey = $data;
		$validation = new Log_IN();

		if ($validation->validation($vkey)){//function from Log_In model
			return redirect()->route('client-login');
		}else{
			echo 'Request Time Out';
		}
   }


}

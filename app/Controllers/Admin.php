<?php

namespace App\Controllers;

use App\Models\Admin\Admin_Model;

class Admin extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/index', $data);
	}

	public function login()
	{
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('admin/login', $data);
	}

	public function client()
	{
		$admin_model = new Admin_Model();
        $data = array(
            "page_title" => "Bagudbud | Admin",
			"logdata"    => $admin_model->getAllClients()
        );
		return view('admin/clients', $data);
	}

	public function notifyClient(){
		$admin_model = new Admin_Model();
		$mssg = $this->request->getPost('mssg');
		$cid = $this->request->getPost('cid');

		$data = [
			'sender' => 'Admin',
			'Client_id' => $cid,
			'delivery_id' => 0,
			'body' => $mssg,
			'tracking' => 'from admin',
			'status'  => 0
		];

		if($admin_model->notify($data)){
			return json_encode([
				'code' => 202,
				'msg' => 'Send'
			]);
		}else{
			return json_encode([
				'code' => 404
			]);
		}
	}

	public function deleteClient(){
		$admin_model = new Admin_Model();
		$cid = $this->request->getPost('cid');

		if($admin_model->deleteC($cid)){
			return json_encode([
				'code' => 202
			]);
		}else{
			return json_encode([
				'code' => 404
			]);
		}
	}

	public function applications()
	{
		$admin_model = new Admin_Model();
		$result['data'] = $admin_model->getAllApplications();

        $data = array(
            "page_title" => "Bagudbud | Admin",
			"data" => $result
        );
		return view('admin/applications', $data);
	}

	public function deliveryPersonnels()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/delivery-personnels', $data);
	}

	public function messages()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/index', $data);
	}

    
	public function adminLogin() {
		
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$admin_model = new Admin_Model();
		$result = $admin_model->getAdminData($username);
		foreach ($result as $row) {
			if ($row['username'] === $username && $row['password'] === $password) {
				return json_encode([
					"status_code" => 200,
					"message" => "Successfully Logged In"
				]);
			}
		}
		return json_encode([
			"status_code" => 404,
			"message" => "Invalid Username or Password"
		]);
	}

	public function getAllApplications() {
		$admin_model = new Admin_Model();
		$result['data'] = $admin_model->getAllApplications();

		return view('admin/applications', $result);
	}

}

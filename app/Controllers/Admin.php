<?php

namespace App\Controllers;

use App\Models\Admin\Admin_Model;

class Admin extends BaseController
{
	public function index()
	{
		$admin_model = new Admin_Model();
        $data = array(
            "page_title" => "Bagudbud | Admin",
			"logdata"    => $admin_model->getAllRequest()
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

	public function deleteRequest(){
		$admin_model = new Admin_Model();
		$rid = $this->request->getPost('req_id');

		if($admin_model->deleteR($rid)){
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
		$admin_model = new Admin_Model();
		$result['data'] = $admin_model->getAllDeliveryPersonnels();
        $data = array(
            "page_title" => "Bagudbud | Admin",
			"data" => $result
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

		return view('Admin/displays/applications-row', $result);
	}

	public function setPersonnelStatus() {
		$id = $this->request->getPost('cid');
		$email = $this->request->getPost('email');

		$admin_model = new Admin_Model();

		// send email process
			$to = $email;
			$subject = 'Account Verification';
			$body = '<h1> Acount verified </h1>';

			// $email = \Config\Services::email();

			// $email->setFrom('johdigay@my.cspc.edu.ph', 'BAGUDBUD express');
			// $email->setTo($to);
			// $email->setSubject($subject);
			// $email->setMessage($body);			

			// if($email->send()){
			// 	// go to EmailVerification Page

				if($admin_model->setPersonnelsStatus($id)) {
					return json_encode([
						"code" => 202,
						"msg" => "Successfully Hired!"
					]);
				}
				return json_encode([
					"status_code" => 404,
					"message" => "Delivery Personnel not found!"
				]);
				// headrer("Location: ".base_url('/email-verification')."");
					
			// }else{
			// 	$data = $email->printDebugger(['headers']);
			// 	echo json_encode(['code' => 505, 'msg' => $data]);
			// }
	}

	public function deletePersonnel() {
		$id = $this->request->getPost('cid');
		$email = $this->request->getPost('email');

		$admin_model = new Admin_Model();
		// send email process
		$to = $email;
		$subject = 'Account Verification';
		$body = '<h1> Your account has been deleted because of inactive status </h1>';

		// $email = \Config\Services::email();

		// $email->setFrom('johdigay@my.cspc.edu.ph', 'BAGUDBUD express');
		// $email->setTo($to);
		// $email->setSubject($subject);
		// $email->setMessage($body);			

		// if($email->send()){
		// 	// go to EmailVerification Page

			if($admin_model->deleteApplication($id) && $admin_model->deletePersonnel($id)) {
				return json_encode([
					"code" => 202,
					"msg" => "Successfully Hired!"
				]);
			}
			return json_encode([
				"status_code" => 404,
				"message" => "Delivery Personnel not found!"
			]);
			// headrer("Location: ".base_url('/email-verification')."");
				
		// }else{
		// 	$data = $email->printDebugger(['headers']);
		// 	echo json_encode(['code' => 505, 'msg' => $data]);
		// }
	}


	public function countClient(){
		$model = new Admin_Model();

		$db = \Config\Database::connect();
        $builder = $db->table('clients');


		return json_encode([
			'result' => $builder->countAllResults(),
		]);
	}

	public function countApplication(){
		$model = new Admin_Model();

		$db = \Config\Database::connect();
        $builder = $db->table('dp_applications');


		return json_encode([
			'result' => $builder->countAllResults(),
		]);
	}

	public function countRequest(){
		$model = new Admin_Model();

		$db = \Config\Database::connect();
        $builder = $db->table('clientrecords');
		// $builder->select('requestrecord');
		$query = $builder->get();
		$data = $query->getResultArray();

		$allrequest = 0;
		foreach($data as $result){
			$allrequest = $allrequest + $result['requestrecord'];
		}


		return json_encode([
			'result' => $allrequest,
		]);
	}

	public function countDeliveries(){
		$model = new Admin_Model();

		$db = \Config\Database::connect();
        $builder = $db->table('riderrecords');
		// $builder->select('requestrecord');
		$query = $builder->get();
		$data = $query->getResultArray();

		$allrequest = 0;
		foreach($data as $result){
			$allrequest = $allrequest + $result['successdelivery'];
		}


		return json_encode([
			'result' => $allrequest,
		]);
	}

}

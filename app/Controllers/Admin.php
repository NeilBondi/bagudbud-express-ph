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
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/clients', $data);
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

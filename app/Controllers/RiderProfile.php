<?php

namespace App\Controllers;
use  App\Models\Dashboard\Rider_Dashboard;
use App\Models\Log_IN;

class RiderProfile extends BaseController
{
	public function index()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Profile"
        );
		return view('rider/rider-profile', $data);
	}
	public function passwordAndSecurity()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Password and Security"
        );
		return view('rider/rider-password-and-security', $data);
	}

	public function removeAccount()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Delete account"
        );
		return view('rider/delete-account', $data);
	}

	public function getRiderData(){

		$session = session();
		$id = $session->get('rid');

		$model = new Rider_Dashboard();

		$data = $model->getCompleteData($id);		

		foreach($data as $row){
			$date = date_create($row['delP_Bday']);
    		$xdate = date_format($date, "Y-m-d");
			
			return json_encode([
				'first-name' => $row['delP_fName'],
				'last-name' => $row['delP_lName'],
				'date-of-birth' => $xdate,
				'gender' => $row['delP_Gender'],
				'email' => $row['delP_Email'],
				'phone-number' => $row['delP_Cnumber'],
				'Municipality' => $row['delP_Municipality'],
				'barangay' => $row['delP_Address'],
				'vehicle-type' => $row['vehicle_Type'],
			]);
		}

		// return json_encode($riderdata);
	}

	public function editProfile(){

		$session = session();
		$id = $session->get('rid');

		$fname = $this->request->getPost('first-name');
		$lname = $this->request->getPost('last-name');
		$barangay = $this->request->getPost('barangay');
		$municipality = $this->request->getPost('Municipality');
		$c_num = $this->request->getPost('phone-number');
		$C_email = $this->request->getPost('email');
		$gender = $this->request->getPost('gender');
		$Bday = $this->request->getPost('date-of-birth');
		$vehicle = $this->request->getPost('vehicle-type');

		$date = date_create($Bday);
		$xdate = date_format($date, 'Y-m-d');

		$data = [
			'delP_fName' => $fname,
			'delP_lName' => $lname,
			'delP_Address' => $barangay,
			'delP_Municipality' => $municipality,
			'delP_Email' => $C_email,
			'delP_Cnumber' => $c_num,
			'delP_Gender' => $gender,
			'delP_Bday' => $xdate,
			'vehicle_Type' => $vehicle
		];

		$model = new Rider_Dashboard();
		if($model->editProfile($id, $data)){
			return json_encode([
				'code' => 202,
				'msg'  => 'Profile Edited Successfuly'
			]);
		}else{
			return json_encode([
				'code' => 505,
				'msg'  => 'We can\'t process your request, Plsease try again later'
			]);
		}
		return json_encode($data);
	}

	public function deleteAccount(){
		$session = session();
		$id = $session->get('rid');

		$model = new Rider_Dashboard();
		$pendingD = $model->countAcceptedRequest($id);
		if($pendingD > 0){
			return json_encode([
				'code'  => 404,
				'msg'   => "You Have {$pendingD} Pending deliveries, Complete or Cancel it before deleting your account"
			]);			// return redirect()->to(base_url('/client-login'));
		}else{
			if($model->deleteAccount($id)){
				return json_encode([
					'code'  => 202
				]);
			}else{
				return json_encode([
					'code'  => 204
				]);
			}
		}
	}

	public function checkPassword(){
		$session = session();
		$id = $session->get('rid');

		$cpass = $this->request->getPost('cPass');

		$model = new Rider_Dashboard();
		if($model->checkCPassword($id, $cpass)){
			return json_encode([
				'id' => 202,
			]);
		}else{
			return json_encode([
				'id' => 404,
			]);
		}
		
	}

	public function updatePassword(){
		$session = session();
		$id = $session->get('rid');

		$npass = $this->request->getPost('npass');
		$npass = password_hash($npass, PASSWORD_DEFAULT);
		$data = [
			'delP_Password' => $npass,
		];

		$model = new Rider_Dashboard();
		if($model->updatePassword($id, $data)){
			return json_encode([
				'id' => 202,
			]);
		}else{
			return json_encode([
				'id' => 404,
			]);
		}
		
	}
}

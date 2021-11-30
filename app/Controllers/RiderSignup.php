<?php

namespace App\Controllers;

use App\Models\Rider_Signup;
use App\Models\Apply;
use CodeIgniter\HTTP\Header;

class RiderSignup extends BaseController
{
	public function index()
	{
		$data = array(
			"page_title" => "Bagudbud | Signup"
		);
		return view('rider-signup', $data);
	}

	public function check_Email()
	{
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo json_encode(['code' => 404, 'msg' => 'Invalid Email']);
			// echo '400';
		} else {
			// $this->load->model('Sign_IN');
			$Sign_IN = new Rider_Signup();
			if ($Sign_IN->email_checker($_POST['email'])) {
				echo json_encode(['code' => 400, 'msg' => 'Email is Already Used']);
				// echo '404';
			} else {
				echo json_encode(['code' => 200, 'msg' => '']);
				// echo '200';
			}
		}
	}

	public function register()
	{ //insert data on database and send email verification

		$fname = $this->request->getPost('first-name');
		$lname = $this->request->getPost('last-name');

		$name = $fname . ' ' . $lname;

		$gender = $this->request->getPost('gender');
		$Bday = $this->request->getPost('birthdate');
		$c_num = $this->request->getPost('phone-number');
		$C_email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$municipality = $this->request->getPost('municipality');
		$barangay = $this->request->getPost('barangay');
		$street = $this->request->getPost('zone-street');
		$vehicle = $this->request->getPost('vehicle-type');
		$address = $street . ', ' . $barangay;


		$date = date_create($Bday);
		$xdate = date_format($date, 'Y-m-d');

		// creates a new password hash using a strong one-way hashing algorithm.
		$password = password_hash($password, PASSWORD_DEFAULT);
		// $vkey = md5(time() . $name);
		//generate verifivation key
		$vkey = substr(md5(time() . $fname), 0, 12);

		$data = [
			'delP_fName'           => ucwords($fname),
			'delP_lName'           => ucwords($lname),
			'delP_Gender'         => $gender,
			'delP_Bday'           => $xdate,
			'delP_Address'        => ucwords($address),
			'delP_Municipality'   => $municipality,
			'delP_Email'          => $C_email,
			'delP_Cnumber'        => $c_num,
			'delP_Password'       => $password,
			'vehicle_Type'        => $vehicle
		];

		//email template for message body

		$client = new Rider_Signup();
		if ($client->insert($data)) {
			$id = $client->getInsertID(); // get last inserted id
			$aData = ['delP_ID' => $id];
			$apply = new Apply();
			$apply->insert($aData);

			$recorddata = [ //make records into db
				'delP_ID' => $id,
				'successdelivery' => 0

			];
			$client->makeRecord($recorddata);
			$applyId = $apply->getInsertID();
			$applyData = array(
				'applyId'   => $applyId,
				'applyName' => ucwords($name)
			);

			$parser = \Config\Services::parser();

			$body = $parser->setData($applyData) //html email template---)
				->render('temp/emailTemp');

			// send email process-------------------------------------------
			$to = $C_email;
			$subject = 'Account Verification And Requirements Information';

			$email = \Config\Services::email();

			$email->setFrom('johdigay@my.cspc.edu.ph', 'BAGUDBUD express');
			$email->setTo($to);
			$email->setSubject($subject);
			$email->setMessage($body);

			if ($email->send()) {
				//go to EmailVerification Page---)
				echo json_encode([
					'redirect' => base_url('/riderNotif'),
					'user_email' => $C_email
				]);
			} else {
				$data = $email->printDebugger(['headers']);
				echo json_encode(['code' => 505, 'msg' => $data]);
			}
			//end of send email process-----------------------------------
		} else {
			echo json_encode(['code' => 404, 'msg' => 'Error']);
		}
	}
}

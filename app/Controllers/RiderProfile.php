<?php

namespace App\Controllers;
use  App\Models\Dashboard\Client_Dashboard;
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

	public function getUserData() {

		$session = session();
		$id = $session->get('id');

		// $model = new Client_Dashboard();

		// $data = $model->getCompleteData($id);		

		// foreach($data as $row){

		// 	$date = date_create($row['B_day']);
    	// 	$xdate = date_format($date, "Y-m-d");
			
		// 	$newdata = [
		// 		'first-name' => $row['Name'],
		// 		'last-name' => $row['L_name'],
		// 		'date-of-birth' => $xdate,
		// 		'gender' => $row['Gender'],
		// 		'email' => $row['Email'],
		// 		'phone-number' => $row['Contact_num'],
		// 		'shop-name' => $row['B_name'],
		// 		'product-name' => $row['Product_type'],
		// 		'Municipality' => $row['Municipality'],
		// 		'barangay' => $row['Address'],
		// 	];
		// }

		// return json_encode($newdata);
		// return json_encode([
		// 	'first-name' => 'John',
		// 	'last-name' => 'Doe',
		// 	'date-of-birth' => '2021-01-01',
		// 	'gender' => 'Male',
		// 	'email' => 'example@example.com',
		// 	'phone-number' => '09123456789',
		// 	'shop-name' => 'Shop name',
		// 	'product-name' => 'Food',
		// 	'Municipality' => 'Baao',
		// 	'barangay' => 'San Miguel',
		// 	'zone-street' => $id,
		// ]);
	}

	public function editProfile(){

		$session = session();
		$id = $session->get('id');

		// $fname = $this->request->getPost('first-name');
		// $lname = $this->request->getPost('last-name');
		// $barangay = $this->request->getPost('barangay');
		// $municipality = $this->request->getPost('Municipality');
		// $c_num = $this->request->getPost('phone-number');
		// $C_email = $this->request->getPost('email');
		// $gender = $this->request->getPost('gender');
		// $Bday = $this->request->getPost('date-of-birth');
		// $b_name = $this->request->getPost('shop-name');
		// $product_type = $this->request->getPost('product-name');

		// $date = date_create($Bday);
		// $xdate = date_format($date, 'Y-m-d');

		// $data = [
		// 	'Name' => $fname,
		// 	'L_name' => $lname,
		// 	'Address' => $barangay,
		// 	'Municipality' => $municipality,
		// 	'Email' => $C_email,
		// 	'Contact_num' => $c_num,
		// 	'Gender' => $gender,
		// 	'B_day' => $xdate,
		// 	'B_name' => $b_name,
		// 	'Product_type' => $product_type,
		// ];

		// $model = new Client_Dashboard();
		// if($model->editProfile($id, $data)){
		// 	return json_encode([
		// 		'code' => 202,
		// 		'msg'  => 'Profile Edited Successfuly'
		// 	]);
		// }else{
		// 	return json_encode([
		// 		'code' => 505,
		// 		'msg'  => 'We can\'t process your request, Plsease try again later'
		// 	]);
		// }
		// return json_encode($data);
	}

	public function deleteAccount(){
		// $session = session();
		// $id = $session->get('id');

		// $model = new Client_Dashboard();

		// if($model->deleteAccount($id)){
		// 	return json_encode([
		// 		'code'  => 202
		// 	]);
		// 	// return redirect()->to(base_url('/client-login'));
		// }
	}
}

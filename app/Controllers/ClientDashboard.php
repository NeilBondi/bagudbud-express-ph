<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use  App\Models\Dashboard\Client_Dashboard;

class ClientDashboard extends BaseController
{
	public function index()
	{
		$dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('id');

		$userDBdata = $dash->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$clientData = array(
				'id'           => $row['Client_id'],
				'Name'         => $row['Name'],
				'Address'      => $row['Address'],
				'Municipality' => $row['Municipality'],
				'Email'        => $row['Email'],
				'Contact_num'  => $row['Contact_num'],
				'B_name'  => $row['B_name'],
			);
		}

		$data = array(
            "page_title" => "Bagudbud | Dashboard",
			'logData' => $clientData//fetch session data
        );
		return view('client-dashboard', $data);
	}

	public function addRecepient(){
		$session = session();
		$id = $session->get('id');
		$name = $this->request->getPost('name');
		$phoneNumber = $this->request->getPost('phone-number');
		$address = $this->request->getPost('address');
		$Municipality = $this->request->getPost('Municipality');
		$productName = $this->request->getPost('product-name');
		$productPrice = $this->request->getPost('product-price');
		$payment = $this->request->getPost('payment');
		
		return json_encode([
			'id' => $id,
			'name' => $name,
			'phone-number' => $phoneNumber,
			'address' => $address,
			'Municipality' => $Municipality,
			'product-name' => $productName,
			'product-price' => $productPrice,
			'payment' => $payment,
			'addRecipient' => true
			
		]);
	}

	public function editRecepient(){
		$session = session();
		$id = $session->get('id');
		$name = $this->request->getPost('name');
		$phoneNumber = $this->request->getPost('phone-number');
		$address = $this->request->getPost('address');
		$Municipality = $this->request->getPost('Municipality');
		$productName = $this->request->getPost('product-name');
		$productPrice = $this->request->getPost('product-price');
		$payment = $this->request->getPost('payment');

		return json_encode([
			'id' => $id,
			'name' => $name,
			'phone-number' => $phoneNumber,
			'address' => $address,
			'Municipality' => $Municipality,
			'product-name' => $productName,
			'product-price' => $productPrice,
			'payment' => $payment,
			'editRecipient' => true
			
		]);
	}

	public function pending() {

		$dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('id');

		$userDBdata = $dash->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$clientData = array(
				'id'           => $row['Client_id'],
				'Name'         => $row['Name'],
				'Address'      => $row['Address'],
				'Municipality' => $row['Municipality'],
				'Email'        => $row['Email'],
				'Contact_num'  => $row['Contact_num'],
				'B_name'  => $row['B_name'],
			);
		}
		$data = array(
            "page_title" => "Bagudbud | Pending",
			'logData' => $clientData,
        );
		return view('client-request-pending', $data);
	}

	public function details($id) {
		$data = array(
            "page_title" => "Bagudbud | Delivery Details",
        );
		return view('delivery-details', $data);
	}

	public function tracking() {
		$data = array(
            "page_title" => "Bagudbud | Tracking",
        );
		return view('client/tracking', $data);
	}

	public function temp() {
		return json_encode([
			'name' => 'John Doe',
			'p-num' => '09123456789',
			'address' => '001, Zone 1, San Miguel',
			'municipality' => 'Nabua',
			'product-name' => 'sample name',
			'product-price' => '100',
			'mode-of-payment' => 'COD',
		]);
	}
}

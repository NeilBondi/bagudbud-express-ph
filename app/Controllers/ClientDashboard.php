<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class ClientDashboard extends BaseController
{
	public function index()
	{
		$session = session();
		$data = array(
            "page_title" => "Bagudbud | Dashboard",
			'logData' => $session->get('email')//fetch session data
        );
		return view('client-dashboard', $data);
	}

	public function pending() {
		$data = array(
            "page_title" => "Bagudbud | Pending",
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

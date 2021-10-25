<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class ClientDashboard extends Controller
{
	public function index()
	{
		$session = session();
		$data = array(
            "page_title" => "Bagudbud | Home",
			'logData' => $session->get('email')//fetch session data
        );
		return view('client-dashboard', $data);
	}

	public function pending() {
		$data = array(
            "page_title" => "Bagudbud | Home",
        );
		return view('client-request-pending', $data);
	}

	public function details($id) {
		$data = array(
            "page_title" => "Bagudbud | Home",
        );
		return view('delivery-details', $data);
	}
}

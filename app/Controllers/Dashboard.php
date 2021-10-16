<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		$session = session();
		$data = array(
            "page_title" => "Bagudbud | Home",
			'logData' => $session->get('email')//fetch session data
        );
		return view('dashboard', $data);
	}
}

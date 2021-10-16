<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// $session = session();
		$data = array(
            "page_title" => "Bagudbud | Home",
			// 'logData' => $session->get('logData')
        );
		return view('home', $data);
	}
}

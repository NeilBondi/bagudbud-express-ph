<?php

namespace App\Controllers;

class Tracking extends BaseController
{
	public function index($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Tracking",
			"email" => $email
        );
		return view('customer-tracking', $data);
	}
}

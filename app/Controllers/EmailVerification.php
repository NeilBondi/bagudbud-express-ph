<?php

namespace App\Controllers;

class EmailVerification extends BaseController
{
	public function index($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Email Verification",
			"email" => $email
        );
		return view('email-verification', $data);
	}
}

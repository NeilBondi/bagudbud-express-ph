<?php

namespace App\Controllers;

class RiderSignup extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Signup"
        );
		return view('rider-signup', $data);
	}
}

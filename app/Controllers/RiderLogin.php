<?php

namespace App\Controllers;

class RiderLogin extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('rider-login', $data);
	}
}

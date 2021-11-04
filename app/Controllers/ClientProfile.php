<?php

namespace App\Controllers;
use App\Models\Log_IN;

class ClientProfile extends BaseController
{
	public function index()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Profile"
        );
		return view('client/client-profile', $data);
	}
	public function passwordAndSecurity()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Password and Security"
        );
		return view('client/client-password-and-security', $data);
	}

    


}

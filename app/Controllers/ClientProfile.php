<?php

namespace App\Controllers;
use App\Models\Log_IN;

class ClientProfile extends BaseController
{
	public function index()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('client/client-profile', $data);
	}

    


}

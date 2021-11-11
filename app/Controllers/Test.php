<?php

namespace App\Controllers;
use App\Models\Log_IN;

class Test extends BaseController
{
	public function index()
	{
        helper('form');
        $data = array(
            "page_title" => "Bagudbud | Login"
        );
		return view('rider/test', $data);
	}

}

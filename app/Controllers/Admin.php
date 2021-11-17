<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/index', $data);
	}
	public function client()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/clients', $data);
	}
	public function applications()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/applications', $data);
	}
	public function deliveryPersonnels()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/delivery-personnels', $data);
	}
	public function messages()
	{
        $data = array(
            "page_title" => "Bagudbud | Admin"
        );
		return view('admin/index', $data);
	}

    


}

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

	public function deleteAccount()
	{
        // helper('form');
        $data = array(
            "page_title" => "Bagudbud | Delete account"
        );
		return view('client/delete-account', $data);
	}

	public function getUserData() {
		return json_encode([
			'first-name' => 'John',
			'last-name' => 'Doe',
			'date-of-birth' => '2021-01-01',
			'gender' => 'Male',
			'email' => 'example@example.com',
			'phone-number' => '09123456789',
			'shop-name' => 'Shop name',
			'product-name' => 'Food',
			'Municipality' => 'Baao',
			'barangay' => 'San Miguel',
			'zone-street' => 'Zone 1',
		]);
	}
}

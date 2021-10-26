<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
	public function index($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Forgot Password",
			"email" => $email
        );
		return view('forgotPassword/email', $data);
	}

    public function codeVerification($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Forgot Password",
			"email" => $email
        );
		return view('forgotPassword/code', $data);
	}
    public function newPassword($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Forgot Password",
			"email" => $email
        );
		return view('forgotPassword/newPassword', $data);
	}
}

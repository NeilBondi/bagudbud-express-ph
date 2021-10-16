<?php

namespace App\Controllers;
use App\Models\Client_Signup;
use CodeIgniter\HTTP\Header;

class ClientSignup extends BaseController
{
	public function index()
	{
        $data = array(
            "page_title" => "Bagudbud | Signup"
        );
		return view('client-signup', $data);
	}

	public function check_Email(){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo json_encode(['code' => 404, 'msg' => 'Invalid Email']);
            // echo '400';
        }else{
            // $this->load->model('Sign_IN');
            $Sign_IN = new Client_Signup();
            if($Sign_IN->email_checker($_POST['email'])){
                echo json_encode(['code' => 400, 'msg' => 'Email is Already Used']);
                // echo '404';
            }else{
                echo json_encode(['code' => 200, 'msg' => '']);
                // echo '200';
            }
        }
    }

	public function register(){//insert data on database and send email verification
       
		$fname = $this->request->getPost('first-name');
		$lname = $this->request->getPost('last-name');
	 
		$name = $fname.' '.$lname;

		$street = $this->request->getPost('zone-street');
		$barangay = $this->request->getPost('barangay');
		$address = $street.', '.$barangay;
		$municipality = $this->request->getPost('municipality');
		$c_num = $this->request->getPost('phone-number');
		$C_email = $this->request->getPost('email');
		$gender = $this->request->getPost('gender');
		$Bday = $this->request->getPost('birthdate');
		$password = $this->request->getPost('password');
		$b_name = $this->request->getPost('client-shop-name');
		$product_type = $this->request->getPost('product-name');

		$date = date_create($Bday);
		$xdate = date_format($date, 'Y-m-d');

		// creates a new password hash using a strong one-way hashing algorithm.
		$password = password_hash($password, PASSWORD_DEFAULT); 
		// $vkey = md5(time() . $name);
		//generate verifivation key
		$vkey = substr(md5(time() . $name), 0, 12);

		$data = [
			'Password' => $password,
			'Name' => $name,
			'Address' => $address,
			'Municipality' => $municipality,
			'Email' => $C_email,
			'Contact_num' => $c_num,
			'Gender' => $gender,
			'B_day' => $xdate,
			'B_name' => $b_name,
			'Product_type' => $product_type,
			'Vkey' => $vkey
		];

		//email template for message body
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		  <title>Verify your email address</title>
		  <style type="text/css" rel="stylesheet" media="all">
			/* Base ------------------------------ */
			*:not(br):not(tr):not(html) {
			  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			  -webkit-box-sizing: border-box;
			  box-sizing: border-box;
			}
			body {
			  width: 100% !important;
			  height: 100%;
			  margin: 0;
			  line-height: 1.4;
			  background-color: #F5F7F9;
			  color: #839197;
			  -webkit-text-size-adjust: none;
			}
			a {
			  color: #414EF9;
			}
		
			/* Layout ------------------------------ */
			.email-wrapper {
			  width: 100%;
			  margin: 0;
			  padding: 0;
			  background-color: #F5F7F9;
			}
			.email-content {
			  width: 100%;
			  margin: 0;
			  padding: 0;
			}
		
			/* Masthead ----------------------- */
			.email-masthead {
			  padding: 25px 0;
			  text-align: center;
			  background-color: #3cd87a;
			}
			.email-masthead_logo {
			  max-width: 400px;
			  border: 0;
			}
			.email-masthead_name {
			  font-size: 16px;
			  font-weight: bold;
			  color: #839197;
			  text-decoration: none;
			  text-shadow: 0 1px 0 white;
			}
		
			/* Body ------------------------------ */
			.email-body {
			  width: 100%;
			  margin: 0;
			  padding: 0;
			  border-top: 1px solid #E7EAEC;
			  border-bottom: 1px solid #E7EAEC;
			  background-color: #FFFFFF;
			}
			.email-body_inner {
			  width: 570px;
			  margin: 0 auto;
			  padding: 0;
			}
			.email-footer {
			  width: 570px;
			  margin: 0 auto;
			  padding: 0;
			  text-align: center;
			}
			.email-footer p {
			  color: #839197;
			}
			.body-action {
			  width: 100%;
			  margin: 30px auto;
			  padding: 0;
			  text-align: center;
			}
			.body-sub {
			  margin-top: 25px;
			  padding-top: 25px;
			  border-top: 1px solid #E7EAEC;
			}
			.content-cell {
			  padding: 35px;
			}
			.align-right {
			  text-align: right;
			}
		
			/* Type ------------------------------ */
			h1 {
			  margin-top: 0;
			  color: #292E31;
			  font-size: 19px;
			  font-weight: bold;
			  text-align: left;
			}
			h2 {
			  margin-top: 0;
			  color: #292E31;
			  font-size: 16px;
			  font-weight: bold;
			  text-align: left;
			}
			h3 {
			  margin-top: 0;
			  color: #292E31;
			  font-size: 14px;
			  font-weight: bold;
			  text-align: left;
			}
			p {
			  margin-top: 0;
			  color: #839197;
			  font-size: 16px;
			  line-height: 1.5em;
			  text-align: left;
			}
			p.sub {
			  font-size: 12px;
			}
			p.center {
			  text-align: center;
			}
		
			/* Buttons ------------------------------ */
			.button {
			  display: inline-block;
			  width: 200px;
			  background-color: #414EF9;
			  border-radius: 3px;
			  color: white;
			  font-size: 15px;
			  line-height: 45px;
			  text-align: center;
			  text-decoration: none;
			  -webkit-text-size-adjust: none;
			  mso-hide: all;
			}
			.button--green {
			  background-color: #28DB67;
			}
			.button--red {
			  background-color: #FF3665;
			}
			.button--blue {
			  background-color: #414EF9;
			}
		
			/*Media Queries ------------------------------ */
			@media only screen and (max-width: 600px) {
			  .email-body_inner,
			  .email-footer {
				width: 100% !important;
			  }
			}
			@media only screen and (max-width: 500px) {
			  .button {
				width: 100% !important;
			  }
			}
		  </style>
		</head>
		<body>
		  <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
			<tr>
			  <td align="center">
				<table class="email-content" width="100%" cellpadding="0" cellspacing="0">
				  <!-- Logo -->
				  <tr>
					<td class="email-masthead">
					  <a class="email-masthead_name">BAGUDBUD Express</a>
					</td>
				  </tr>
				  <!-- Email Body -->
				  <tr>
					<td class="email-body" width="100%">
					  <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
						<!-- Body content -->
						<tr>
						  <td class="content-cell">
							<h1>Verify your email address</h1>
							<p>Thanks for signing up! We\'re excited to have you as an early user.</p>
							<!-- Action -->
							<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
							  <tr>
								<td align="center">
								  <div>
									<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{action_url}}" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
									<v:fill type="tile" color="#414EF9" />
									<w:anchorlock/>
									<center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Verify Email</center>
								  </v:roundrect><![endif]-->
									<a href="'.base_url('ClientLogin/verify/'.$vkey.'').'" class="button button--blue">Verify Email</a>
								  </div>
								</td>
							  </tr>
							</table>
							<p>Thanks,<br>The Develapars Team</p>
							<!-- Sub copy -->
							<table class="body-sub">
							  <tr>
								<td>
								  <p class="sub">If you’re having trouble clicking the button.
								  </p>
								  <p class="sub"><a href="'.base_url('ClientLogin/verify/'.$vkey.'').'">Click Here</a></p>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td>
					  <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
						<tr>
						  <td class="content-cell">
							<p class="sub center">
							  Bagudbud Express 
							  <br>Nabua Camarines Sur
							</p>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
				</table>
			  </td>
			</tr>
		  </table>
		</body>
		</html>';

	$client = new Client_Signup();
		if($client->insert($data)){
			//send email process
			// $to = $C_email;
			// $subject = 'Account Verification';

			// $email = \Config\Services::email();

			// $email->setFrom('johdigay@my.cspc.edu.ph', 'BAGUDBUD express');
			// $email->setTo($to);
			// $email->setSubject($subject);
			// $email->setMessage($body);			

			// if($email->send()){
				//go to EmailVerification Page
				echo json_encode([
					'redirect' => base_url('/email-verification'),
					'user_email' => $C_email
				]);
				// headrer("Location: ".base_url('/email-verification')."")
					
			// }else{
			// 	$data = $email->printDebugger(['headers']);
			// 	echo json_encode(['code' => 505, 'msg' => $data]);
			// }
			 //end of send email process
	   }
	   else{
			echo json_encode(['code' => 404, 'msg' => 'Error']);
	   }

	}

	public function emailPage($data = null){
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Email Verification",
			"email" => $email
        );
		return view('email-verification', $data);
	}

	public function verify($data = null){// get the verification key and validate
		$vkey = $data;
		$validation = new Client_Signup();
		if ($validation->validation($vkey)){
			return view('client-login');
		}else{
			echo 'errror 404';
		}
   }


}

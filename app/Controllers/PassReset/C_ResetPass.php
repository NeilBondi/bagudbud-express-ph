<?php

namespace App\Controllers\PassReset;
use App\Controllers\BaseController;
use App\Models\ResetPass\CReset;

class C_ResetPass extends BaseController
{
    public function index(){
		$data = array(
            "page_title" => "Bagudbud | Forgot Password",
        );
        echo view('ResetPass/c_resetPassword', $data);
    }

    //send otp code
    public function sendOTP(){
        $session = \Config\Services::session(); //session start
        $c_email = $this->request->getPost('email');
       
        $check = new CReset();
        if($check->checkEmail($c_email)){
            $FiveDigitRandomNumber = mt_rand(10000,99999);

            $data = [
                'resetCode' => $FiveDigitRandomNumber
            ];
            $insert = new CReset();

                if($insert->insertOtpCode($data, $c_email)){
                    // send email process
                    // $to = $email;
                    // $subject = 'Password Reset OTP code';
                    $body = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;    line-height:2">
                            <div style="margin:50px auto;width:70%;padding:20px 0">
                            <div style="border-bottom:1px solid #eee">
                                <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Bagudbud Express</a>
                            </div>
                            <p style="font-size:1.1em">Hi,</p>
                            <p>Thank you for choosing Bagudbud Express. Use the following OTP to complete your Password Reset procedures. OTP is valid for 15 minutes</p>
                            <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$FiveDigitRandomNumber.'</h2>
                            <p style="font-size:0.9em;">Regards,<br />Bagudbud Express</p>
                            <hr style="border:none;border-top:1px solid #eee" />
                            <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                <p>Bagudbud Express</p>
                                <p>Nabua Camarines Sur</p>
                                <p>Rinconada</p>
                            </div>
                            </div>
                            </div>';
                    // $email = \Config\Services::email();

                    // $email->setFrom('johdigay@my.cspc.edu.ph', 'BAGUDBUD express');
                    // $email->setTo($to);
                    // $email->setSubject($subject);
                    // $email->setMessage($body);			

                    // if($email->send()){
                        // go to EmailVerification Page
                        // $session_Data = [
                        //     'OTPpass' => true,
                        // ];

                        $session->set('OTPpass', true); 
                        return json_encode([
                            'code' => 500,
                            'redirect' => base_url('/c_resetOTP'),
                            'user_email' => $c_email
                        ]);
                        // headrer("Location: ".base_url('/email-verification')."")
                            
                    // }else{
                    // 	$data = $email->printDebugger(['headers']);
                    // 	echo json_encode(['code' => 505, 'msg' => $data]);
                    // }
                    //end of send email process
                }else{
                    echo json_encode(['code' => 506, 'msg' => 'Please try again Later']);
                }
            

        }else{
            echo json_encode(['code' => 505, 'msg' => 'There\'s no Account in this Email']);
        }
    }

    //display otp page 
    public function displayOTP(){
        $session = session();
        $session->destroy();

        $data = array(
            "page_title" => "Bagudbud | Forgot Password",
        );
        return view('ResetPass/c_resetOTP', $data);
    }

    //verify otp code
    public function verifyOTP(){
        $session = \Config\Services::session();
        $verify = new CReset();

        $email = $this->request->getPost('email');
        $OTp = $this->request->getPost('otp');
        
        if($verify->verifiedOTP($OTp, $email)){
            $session_Data = [
                'OTPpass' => true,
            ];

            $session->set($session_Data); 
            echo json_encode([
                'code' => 500,
                'redirect' => base_url('/c_resetNewPass'),
                'user_email' => $email
            ]);
        }
        else{
            echo json_encode(['code' => 506, 'msg' => 'OTP code not match']);
        }
    }

    //display new password reset page
    public function displayResetPass(){
        $session = session();
        $session->destroy();

		$data = array(
            "page_title" => "Bagudbud | Forgot Password",
        );
        return view('ResetPass/c_resetNewPass', $data);
    }

    //update new password
    public function updatePass(){
        $email = $this->request->getPost('email');
        $nPass = $this->request->getPost('newPass');
        $num = 0;

        $data = [
            "Password" => $password = password_hash($nPass, PASSWORD_DEFAULT),
            "resetCode" => $num 
        ];

        $update = new CReset();
        if($update->updatePAss($data, $email)){
            echo json_encode(['code' => 400, 'msg' => 'You Can now login with your new Created Password']);
        }else{
            echo json_encode(['code' => 404, 'msg' => 'Error Please try Again Later']);
        }
    }
}
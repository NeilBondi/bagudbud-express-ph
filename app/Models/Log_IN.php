<?php

namespace App\Models;
use CodeIgniter\Model;

class Log_IN extends Model{

    //login process, check the password and email
    public function login_valid($email, $pass){

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM clients WHERE Email = '$email'");

        if($query->getNumRows() > 0){
           foreach ($query->getResultArray() as $row) { 

                    $date = date_create($row['createDate']);
		            $xdate = date_format($date, 'F j, Y, g:i a');

                    if(password_verify($pass, $row['Password'])){
                       if($row['Verified'] == 1){
                           return 200;
                       }else{
                           return 'This Account has not yet been Verified. An Email Verification was sent to this email on '. $xdate;
                       }
                    }else{
                        return 300;
                    }
                }
           }else{
            return 400;
        }
    }

    //get the user data in database and return array of data
    public function getUserData($email){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM clients WHERE Email = '$email'");

        foreach ($query->getResultArray() as $row) {
            $result = [
                'id'             => $row['Client_id'],
                'name'           => $row['Name'],
                'address'        => $row['Address'],
                'municipality'   => $row['Municipality'],
                'email'          => $row['Email'],
                'Contact_Num'    => $row['Contact_num'],
                'logged_in'      => TRUE
            ];
        }

        return $result;
    }

    //verify the email from gmail 
    public function validation($verifyKey){//verification key validation and account validation
        $db = \Config\Database::connect();

        $query = $db->query("SELECT Vkey, Verified FROM clients WHERE Verified = 0 AND Vkey = '$verifyKey' LIMIT 1");

        $result = $query->getNumRows();

        if($result == 1){
            $update = $db->query("UPDATE clients SET Verified = 1 WHERE Vkey = '$verifyKey' LIMIT 1");
            if($update){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
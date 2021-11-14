<?php

namespace App\Models;
use CodeIgniter\Model;

class RLog_IN extends Model{

     //login process, check the password and email
     public function login_valid($email, $pass){

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM delivery_personnel WHERE delP_Email = '$email'");

        if($query->getNumRows() > 0){
           foreach ($query->getResultArray() as $row) { 

                    $date = date_create($row['createDate']);
		            $xdate = date_format($date, 'F j, Y, g:i a');

                    if(password_verify($pass, $row['delP_Password'])){
                       if($row['delP_Status'] == 1){
                           return 200;
                       }else{
                           return 'This Account has not yet been Activated. Please wait for an email notification confirming  your account has been verified and activated ';
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
        $query = $db->query("SELECT * FROM delivery_personnel WHERE delP_Email = '$email'");

        foreach ($query->getResultArray() as $row) {
            $result = [
                'rid'             => $row['delP_ID'],
                // 'name'           => $row['delP_Name'],
                // 'address'        => $row['delP_Address'],
                // 'municipality'   => $row['delP_Municipality'],
                // 'email'          => $row['delP_Email'],
                // 'Contact_Num'    => $row['delP_Cnumber'],
                'logged_in'      => TRUE
            ];
        }

        return $result;
    }

}
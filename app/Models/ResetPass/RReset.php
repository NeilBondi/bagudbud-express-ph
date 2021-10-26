<?php

namespace App\Models\ResetPass;

use CodeIgniter\Model;

class RReset extends Model
{
   
    //check email on database
    public function checkEmail($email){

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM delivery_personnel WHERE delP_Email = '$email'");

        if($query->getNumRows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //insert OTP code 
    public function insertOtpCode($code, $email){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');

        $builder->where('delP_Email', $email);
        $builder->update($code);
        
        return true;
    }

    //check OTP code/ validate otp
    public function verifiedOTP($code, $email){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM delivery_personnel WHERE delP_Email = '$email'");

        if($query->getNumRows() > 0){
            foreach ($query->getResultArray() as $row) { 
                if($row['resetCode'] == $code){
                    return true;
                }else{
                    return false;
                }
            }
         }else{
             return false;
         }
    }

    public function updatePAss($nPass, $email){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');

        $builder->where('delP_Email', $email);
        if($builder->update($nPass)){
            return true;
        }else{
            return false;
        }
        
        
    }


}
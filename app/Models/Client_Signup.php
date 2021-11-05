<?php

namespace App\Models;
use CodeIgniter\Model;

class Client_Signup extends Model
{

    protected $table = 'clients';
    protected $primaryKey = 'Client_id';
    protected $DBGroup = 'default';
    protected $allowedFields = [
        'Password',
        'Name',
        'L_name',
        'Address',
        'Municipality',
        'Email',
        'Contact_num',
        'Gender',
        'B_day',
        'B_name',
        'Product_type',
        'Vkey'
    ];

    public function email_checker($email){ //check if email is already taken
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM clients WHERE Email = '$email' ");

        if($query->getNumRows() > 0){
            return true;
        }else{
            return false;
        }
    }

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
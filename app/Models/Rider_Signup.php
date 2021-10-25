<?php

namespace App\Models;

use CodeIgniter\BaseModel;
use CodeIgniter\Model;

class Rider_Signup extends Model{

    protected $table = 'delivery_personnel';
    protected $primaryKey = 'delP_ID';
    protected $DBGroup = 'default';
    protected $allowedFields = [
        'delP_Name',
        'delP_Gender',
        'delP_Bday',
        'delP_Address',
        'delP_Municipality',
        'delP_Email',
        'delP_Cnumber',
        'delP_Password',
        'vehicle_Type'
    ];


    public function email_checker($email){ //check if email is already taken
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM delivery_personnel WHERE delP_Email = '$email' ");

        if($query->getNumRows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
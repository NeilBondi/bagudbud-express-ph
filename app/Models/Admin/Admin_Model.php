<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class Admin_Model extends Model{


    //fetch the user data from db base on ID
    public function getAdminData($username){
        
        $db = \Config\Database::connect();
        $builder = $db->table('admin');

        $builder->where('username', $username);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
       
    }

    public function getAllApplications(){
        $db = \Config\Database::connect();
        $builder = $db->table('dp_applications');
        $builder->select('dp_applications.delP_ID, delP_fName, delP_lName, delP_Email, vehicle_Type, apply_Date');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = dp_applications.delP_ID');
        $query = $builder->get();
       return $query->getResultArray();
    }
}
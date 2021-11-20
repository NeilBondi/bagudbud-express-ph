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
}
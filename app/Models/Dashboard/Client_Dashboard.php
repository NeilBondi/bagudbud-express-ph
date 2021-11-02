<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

class Client_Dashboard extends Model{

    public function getCompleteData($id){
        //fetch the user data from db base on ID
        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
       
    }
    
}
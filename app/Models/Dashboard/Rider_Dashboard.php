<?php

namespace App\Models\Dashboard;
use CodeIgniter\Model;


class Rider_Dashboard extends Model{

    public function getAllRequest(){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('status', 1);
        $builder->orderBy('req_date', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    public function getAllAccepted($rider_id){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('status', 2);
        $builder->where('delP_ID', $rider_id);
        $builder->orderBy('req_date', 'ASC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    

}

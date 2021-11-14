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
        $builder->orderBy('accepted_date', 'ASC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    public function getAcceptedDetails($reqid){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('clients', 'clients.Client_id = client_request.Client_id');
        $builder->join('payment', ' payment.req_id = client_request.req_id', 'left');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
        // $builder->where('Client_id', $id);
        $builder->where('client_request.req_id', $reqid);
        // $builder->orderBy('accepted_date', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    public function updateTheRequest($reqid, $data){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('req_id', $reqid);
        // $builder->set('accepted_date', CURRENT_T);
        if($builder->update($data)){
            return true;
        }else{
            return false;
        }
    }

    

}

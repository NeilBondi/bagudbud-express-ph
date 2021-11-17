<?php

namespace App\Models;
use CodeIgniter\Model;

class TrackingModel extends Model{
    
    public function getTrackingDetails($trackingID){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id', 'left');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
        $builder->join('clients', 'clients.Client_id = client_request.Client_id', 'left');
        $builder->join('deliveries', 'deliveries.req_id = client_request.req_id');
        $builder->where('client_request.tracking_id', $trackingID);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    } 

    public function checkTracking($trackingID){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('tracking_id', $trackingID);
        $count = $builder->countAllResults();

        if($count > 0){
          return true;
        }else{
            return false;
        }

    }
}
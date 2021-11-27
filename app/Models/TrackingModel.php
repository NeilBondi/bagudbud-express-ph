<?php

namespace App\Models;
use CodeIgniter\Model;

class TrackingModel extends Model{
    
    public function getTrackingDetails($trackingID){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('tracking_id', $trackingID);
        $query = $builder->get();
        $data = $query->getResultArray();

        foreach($data as $row){
            if($row['status'] == 0 OR $row['status'] == 3){
                $cancess = $db->table('client_request');
                $cancess->select('*');
                $cancess->join('payment', ' payment.req_id = client_request.req_id', 'left');
                $cancess->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
                $cancess->join('clients', 'clients.Client_id = client_request.Client_id', 'left');
                $cancess->join('deliveries', 'deliveries.req_id = client_request.req_id');
                $cancess->where('client_request.tracking_id', $trackingID);
                $query = $cancess->get();

                $result = $query->getResultArray();
                return $result;
            }
            elseif($row['status'] == 1){
                $pending = $db->table('client_request');
                $pending->select('*');
                $pending->join('payment', ' payment.req_id = client_request.req_id', 'left');
                $pending->join('clients', 'clients.Client_id = client_request.Client_id', 'left');
                $pending->where('client_request.tracking_id', $trackingID);
                $query = $pending->get();

                $result = $query->getResultArray();
                return $result;
            }
            else{
                $accepted = $db->table('Client_request');
                $accepted->select('*');
                $accepted->join('payment', ' payment.req_id = client_request.req_id', 'left');
                $accepted->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
                $accepted->join('clients', 'clients.Client_id = client_request.Client_id', 'left');
                $accepted->where('client_request.tracking_id', $trackingID);
                $query = $accepted->get();

                $result = $query->getResultArray();
                return $result;

            }       
        } 
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
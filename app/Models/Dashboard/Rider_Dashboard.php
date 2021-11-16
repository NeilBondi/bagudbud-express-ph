<?php

namespace App\Models\Dashboard;
use CodeIgniter\Model;


class Rider_Dashboard extends Model{

     //fetch the user data from db base on ID
     public function getCompleteData($id){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');

        $builder->where('delP_ID', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
       
    }

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

     public function countAcceptedRequest($id){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('delP_ID', $id);
        $builder->where('status', 2);
        return $builder->countAllResults();
        
    }

    public function cancelDelivery($reqid, $delData){
        $db = \Config\Database::connect();
        $deliveriesDB = $db->table('canceledDeliveries');
        $builder = $db->table('client_request');

        $builder->where('req_id', $reqid);
        $builder->update(['status' => 0]);

        $deliveriesDB->insert($delData);
        return $db->insertID();
    }

    public function notification($data){
        $db = \Config\Database::connect();
        $notificatonDB = $db->table('notification');

        $notificatonDB->insert($data);
        return true;
    }

    //profile section
    public function editProfile($id, $data){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');

        $builder->where('delP_ID', $id);
        $builder->update($data);

        return true;        
    }

    public function deleteAccount($id){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        
        $builder->where('delP_ID', $id);
        $builder->delete();

        return true;        
    }

    public function checkCPassword($id, $password){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        // $builder->select('Password');
        $builder->where('delP_ID', $id);
        $query = $builder->get();

        foreach($query->getResultArray() as $row){
            if(password_verify($password, $row['delP_Password'])){
                return true;
            }else{
                return false;
            }
        }
    
    }

    public function updatePassword($id, $password){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        // $builder->select('Password');
        $builder->where('delP_ID', $id);
        $builder->update($password);

        return true;
    }
    //end profile

    

}

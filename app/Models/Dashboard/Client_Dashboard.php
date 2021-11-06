<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

class Client_Dashboard extends Model{


    //fetch the user data from db base on ID
    public function getCompleteData($id){
        

        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
       
    }

    //return the number of pending request based from user id
    public function countPendingRequest($id){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('Client_id', $id);
        return $builder->countAllResults();
        
    }

    //insert add request data to db and return the id of inserted data
    public function addRequest($data){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
      
        if($builder->insert($data)){
            return $db->insertID();
        }else{
            return false;
        }
         
    }

    //insert payment information data to db
    public function addPayment($data){
        $db = \Config\Database::connect();
        $builder = $db->table('payment');
      
        if($builder->insert($data)){
            return true;
        }else{
            return false;
        }
         
    }

    //display request list...
    public function getRequest($id){

        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id');
        $builder->where('Client_id', $id);
        $builder->orderBy('client_request.req_id', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //display request details...
    public function getRequestDetails($id){

        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id');
        $builder->where('client_request.req_id', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //delete && cancel request..
    public function deleteRequest($id){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('req_id', $id);
        $builder->delete();

        return true;        
    }

    //edit request..
    public function editRequest($requestdata, $paymentData, $reqid){

        $db = \Config\Database::connect();
        $request = $db->table('client_request');
        $payment = $db->table('payment');

        $request->where('req_id', $reqid);
        $request->update($requestdata);

        $payment->where('req_id', $reqid);
        $payment->update($paymentData);


        return true;
        
    }

    //profile section..........................

    //edit profile
    public function editProfile($id, $data){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $builder->update($data);

        return true;        
    }

    //delete account
    public function deleteAccount($id){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        
        $builder->where('Client_id', $id);
        $builder->delete();

        return true;        
    }

    public function checkCPassword($id, $password){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        // $builder->select('Password');
        $builder->where('Client_id', $id);
        $query = $builder->get();

        foreach($query->getResultArray() as $row){
            if(password_verify($password, $row['Password'])){
                return true;
            }else{
                return false;
            }
        }
    
    }

    public function updatePassword($id, $password){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        // $builder->select('Password');
        $builder->where('Client_id', $id);
        $builder->update($password);

        return true;
    }
    //END - profile section..........................
}
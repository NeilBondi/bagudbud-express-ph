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
        return $query->getResultArray();
       
    }
    function getAllRequest(){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('status', 1);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //fetch all clients with thier records
    public function getAllClients(){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        $builder->select('*');
        $builder->join('clientrecords', 'clientrecords.Client_id = clients.Client_id', 'left');
        $builder->orderBy('clients.Client_id', 'ASC');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    //notify client
    public function notify($data){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');

        $builder->insert($data);

        return true;
    }

    public function deleteC($id){
        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $builder->delete();

        return true;

    }

    public function deleteR($id){
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('req_id', $id);
        $builder->delete();

        return true;
    }

    public function getAllApplications(){
        $db = \Config\Database::connect();
        $builder = $db->table('dp_applications');
        $builder->select('dp_applications.delP_ID, delP_fName, delP_lName, delP_Email, vehicle_Type, apply_Date');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = dp_applications.delP_ID');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllDeliveryPersonnels(){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        $builder->select('*');
        $builder->where('delP_Status', 1);
        $builder->join('riderrecords', 'riderrecords.delP_ID = delivery_personnel.delP_ID');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function setPersonnelsStatus($id){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        
        $builder->where('delP_ID', $id);
        $builder->update(['delP_Status' => 1]);
        return true;
    }

    public function deleteApplication($id){
        $db = \Config\Database::connect();
        $builder = $db->table('dp_applications');
        
        $builder->where('delP_ID', $id);
        $builder->delete();
        return true;
    }

    public function deletePersonnel($id){
        $db = \Config\Database::connect();
        $builder = $db->table('delivery_personnel');
        
        $builder->where('delP_ID', $id);
        $builder->delete();
        return true;
    }


}
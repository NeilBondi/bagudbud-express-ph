<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

class Client_Dashboard extends Model
{


    //fetch the user data from db base on ID
    public function getCompleteData($id)
    {


        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //return the number of pending request based from user id
    public function countPendingRequest($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('Client_id', $id);
        $builder->where('status', 1);
        return $builder->countAllResults();
    }

    public function countAcceptedRequest($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('Client_id', $id);
        $builder->where('status', 2);
        return $builder->countAllResults();
    }

    //insert add request data to db and return the id of inserted data
    public function addRequest($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        if ($builder->insert($data)) {
            return $db->insertID();
        } else {
            return false;
        }
    }

    //update the record number of request in DB
    public function addrequestrecord($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clientrecords');

        $builder->where('Client_id', $id);
        $query = $builder->get();

        $data = $query->getResultArray();
        foreach ($data as $row) {
            $addnumber = $row['requestrecord'] + 1;
        }

        $builder->where('Client_id', $id);
        $builder->update(['requestrecord' => $addnumber]);
    }

    //insert payment information data to db
    public function addPayment($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('payment');

        if ($builder->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    //display request list...
    public function getRequest($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id');
        $builder->where('Client_id', $id);
        $builder->where('client_request.status', 1);
        $builder->orderBy('client_request.req_id', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //display accepted request list...
    public function getAccepted($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id', 'left');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
        $builder->where('Client_id', $id);
        $builder->where('client_request.status', 2);
        $builder->orderBy('accepted_date', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //display acceted details....
    public function getAcceptedDetails($reqid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('*');
        $builder->join('payment', ' payment.req_id = client_request.req_id', 'left');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID', 'left');
        // $builder->where('Client_id', $id);
        $builder->where('client_request.req_id', $reqid);
        // $builder->orderBy('accepted_date', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();
        return $data;
    }

    //display request details...
    public function getRequestDetails($id)
    {

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
    public function deleteRequest($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('req_id', $id);
        $builder->delete();

        return true;
    }

    //edit request..
    public function editRequest($requestdata, $paymentData, $reqid)
    {

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
    public function editProfile($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $builder->update($data);

        return true;
    }

    //delete account
    public function deleteAccount($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clients');

        $builder->where('Client_id', $id);
        $builder->delete();

        return true;
    }

    public function checkCPassword($id, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        // $builder->select('Password');
        $builder->where('Client_id', $id);
        $query = $builder->get();

        foreach ($query->getResultArray() as $row) {
            if (password_verify($password, $row['Password'])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updatePassword($id, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        // $builder->select('Password');
        $builder->where('Client_id', $id);
        $builder->update($password);

        return true;
    }
    //END - profile section..........................

    //tracking

    public function getTrackingDetails($trackingID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('tracking_id', $trackingID);
        $query = $builder->get();
        $data = $query->getResultArray();

        foreach ($data as $row) {
            if ($row['status'] == 0 or $row['status'] == 3) {
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
            } elseif ($row['status'] == 1) {
                $pending = $db->table('client_request');
                $pending->select('*');
                $pending->join('payment', ' payment.req_id = client_request.req_id', 'left');
                $pending->join('clients', 'clients.Client_id = client_request.Client_id', 'left');
                $pending->where('client_request.tracking_id', $trackingID);
                $query = $pending->get();

                $result = $query->getResultArray();
                return $result;
            } else {
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

    public function checkTracking($trackingID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->where('tracking_id', $trackingID);
        $count = $builder->countAllResults();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isPending($trackingID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');
        $builder->select('delP_ID');
        $builder->where('tracking_id', $trackingID);
        $result = $builder->get()->getResultArray();

        if ($result[0]['delP_ID'] === null) {
            return true;
        } else {
            return false;
        }
    }

    //end off tracking
    public function getSuccessDel($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deliveries');
        $builder->select('*');
        $builder->join('client_request', 'client_request.req_id = deliveries.req_id');
        $builder->where('deliveries.Client_id', $id);
        $builder->where('deliveries.classification', 1);
        $builder->orderBy('deliveries.cancelsuccess_date', 'DESC');


        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;

        // $builder->join('deliveries', 'deliveries')
    }

    public function getSuccessDelDetails($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deliveries');
        $builder->select('*');
        $builder->join('client_request', 'client_request.req_id = deliveries.req_id');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID');
        $builder->where('delivery_id', $id);
        $builder->where('deliveries.classification', 1);

        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;

        // $builder->join('deliveries', 'deliveries')
    }

    public function getCancelDel($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deliveries');
        $builder->select('*');
        $builder->join('client_request', 'client_request.req_id = deliveries.req_id');
        $builder->where('deliveries.Client_id', $id);
        $builder->where('deliveries.classification', 0);
        $builder->orderBy('deliveries.cancelsuccess_date', 'DESC');

        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;

        // $builder->join('deliveries', 'deliveries')
    }

    public function getCancelDelDetails($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deliveries');
        $builder->select('*');
        $builder->join('client_request', 'client_request.req_id = deliveries.req_id');
        $builder->join('delivery_personnel', 'delivery_personnel.delP_ID = client_request.delP_ID');
        $builder->where('delivery_id', $id);
        $builder->where('deliveries.classification', 0);

        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;

        // $builder->join('deliveries', 'deliveries')
    }

    public function getNotif($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('notification');

        $builder->where('Client_id', $id);
        $builder->orderBy('ndate', 'DESC');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    public function getNotifDetails($notifid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('notification');

        $builder->where('notif_id', $notifid);
        $query = $builder->get();
        $data = $query->getResultArray();

        foreach ($data as $row) {
            if ($row['status'] == 0) {
                $builder->where('notif_id', $notifid);
                $builder->update(['status' => 1]);
                return $data;
            } else {
                return $data;
            }
        }
    }

    public function deleteCancel($id, $reqid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('Client_id', $id);
        $builder->where('req_id', $reqid);

        $builder->delete();
        return true;
    }

    public function deleteSuccess($id, $reqid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('client_request');

        $builder->where('Client_id', $id);
        $builder->where('req_id', $reqid);

        $builder->delete();
        return true;
    }

    public function deleteNotif($id, $notifid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('notification');

        $builder->where('Client_id', $id);
        $builder->where('notif_id', $notifid);

        $builder->delete();
        return true;
    }

    public function countNotif($clientID)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->select('status');
        $builder->join('clients', 'clients.Client_id = notification.Client_id', 'left');
        $builder->where([
            'notification.Client_id' => $clientID,
            'status' => 0
        ]);

        return $builder->countAllResults();
    }
}

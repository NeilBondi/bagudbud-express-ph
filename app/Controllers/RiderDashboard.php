<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use  App\Models\Dashboard\Rider_Dashboard;

class RiderDashboard extends BaseController
{
	public function index()
	{
		// $dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('rid');

		if($id != null){
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				// 'logData' => $clientData//fetch session data
			);
			return view('rider/rider-request', $data);
		}else{
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				// 'logData' => $clientData//fetch session data
			);
			return view('rider-login', $data);
		}

	}

	//display handle the data of user pass to requests page
	public function deliveries() {

		// $dash = new Client_Dashboard();
		// $session = session();
		// $id = $session->get('rid');

		// $userDBdata = $dash->getCompleteData($id);
		// foreach ($userDBdata as $row) {
		// 	$clientData = array(
		// 		'id'           => $row['Client_id'],
		// 		'Name'         => $row['Name'],
		// 		'Address'      => $row['Address'],
		// 		'Municipality' => $row['Municipality'],
		// 		'Email'        => $row['Email'],
		// 		'Contact_num'  => $row['Contact_num'],
		// 		'B_name'  => $row['B_name'],
		// 	);
		// }
		
		// if($id != null){
		// 	$data = array(
		// 		"page_title" => "Bagudbud | Pending",
		// 		'logData' => $clientData,
		// 	);
		// 	return view('client-request-pending', $data);
		// }else{
		// 	$data = array(
		// 		"page_title" => "Bagudbud | Dashboard",
		// 		// 'logData' => $clientData//fetch session data
		// 	);
		// 	return view('client-login', $data);
		// }

		$data = array(
			"page_title" => "Bagudbud | Dashboard",
			// 'logData' => $clientData//fetch session data
		);
		return view('rider/rider-deliveries', $data);
		
	}

	public function displayAllRequest(){
		$model =  new Rider_Dashboard();
		$data['result'] = $model->getAllRequest();

		return view('rider/displayRequests', $data);
	}

	public function displayAllAccepted(){

		$session = session();
		$id = $session->get('rid');

		$model =  new Rider_Dashboard();
		$data['result'] = $model->getAllAccepted($id);

		return view('rider/displayAccepted', $data);
	}

	//display request details....
	public function details($reqid) {//pending details

		$session = session();
		$id = $session->get('rid');

		$model = new Rider_Dashboard();
		$data = array(
            "page_title" => "Bagudbud | Delivery Details",
			"request"    => $model->getAcceptedDetails($reqid),
        );
		return view('rider/request-details', $data);
	}

	public function acceptTheRequest(){
		helper('date');
		$session = session();
		$id = $session->get('rid');

		$reqid = $this->request->getPost('reqid');
		$model = new Rider_Dashboard();
		date_default_timezone_set('Asia/Manila');
		$time_stamp = date('Y-m-d H:i:s');
		$data = [
			'delP_ID' => $id,
			'status' => 2,
			'accepted_date' => $time_stamp
		];
		if($model->updateTheRequest($reqid, $data)){
			return json_encode([
				'code' => 202
			]);
		}else{
			return json_encode([
				'code' => 404
			]);
		}
		// echo $time_stamp;
	}

	//index for accepted request page....
	public function acceptedDetails($reqid) {//accepted details

		$model = new Rider_Dashboard();
		// $data['request'] = $model->getRequestDetails($id);
		$data = array(
            "page_title" => "Bagudbud | Delivery Details",
			"request"    => $model->getAcceptedDetails($reqid),
        );
		return view('rider/accepted-request-details', $data);
	}

	//delete or cancel request
	public function cancelDelivery(){
		$model = new Rider_Dashboard();
		$session = session();
		$id = $session->get('rid');

		$rdata = $model->getCompleteData($id);
		foreach($rdata as $row){
			$ridername = $row['delP_fName'].' '.$row['delP_lName'];
		}
		
		$reason = $this->request->getPost('reason');
		$req_id = $this->request->getPost('req_id');
		$c_id = $this->request->getPost('c_id');
		$trackingNum = $this->request->getPost('trackingNum');

		$deliveriesData = [
			'Client_id' => $c_id,
			'req_id' => $req_id,
			'reason' => $reason,
			'classification' => 0
		];

		$deliveriesID = $model->cancelDelivery($req_id, $deliveriesData);
		if(!$deliveriesID){
			return json_encode([
				'code' => 404
			]);
		}else{
			$notificationData = [
				'sender'     => $ridername,
				'Client_id' => $c_id,
				'delivery_id' => $deliveriesID,
				'body'        => 'The delivery of your parcel has been cancelled, check your cancelled request section for more information.',
				'tracking'  => $trackingNum,
				'status' => 0
			];
	
			if($model->notification($notificationData)){
				return json_encode([
					'code' => 202
				]);
			}else{
				return json_encode([
					'code' => 404
				]);
			}
		}
	}

	//success request
	public function successDelivery(){
		$model = new Rider_Dashboard();
		$session = session();
		$id = $session->get('rid');
		$model->addrequestrecord($id);

		$rdata = $model->getCompleteData($id);
		foreach($rdata as $row){
			$ridername = $row['delP_fName'].' '.$row['delP_lName'];
		}

		//validate image before upload
		$validated = $this->validate([
            'img' => [
                'uploaded[img]',
                'mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/PNG,image/JPEG,image/JPG]',
                'max_size[img,5096]',
            ],
        ]);

        if (!$validated) {
           return json_encode([
			   'code' => 404
		   ]);
        }else{
			$image = $this->request->getFile('img');//get the image from ajax submit

			$imagename = $image->getRandomName();
			$image->move('public/proofImages/', $imagename);//move image to folder storage


			$req_id = $this->request->getPost('req_id');
			$c_id = $this->request->getPost('cid');
			$trackingNum = $this->request->getPost('trackingNum');

			$deliveriesData = [
				'Client_id' => $c_id,
				'req_id' => $req_id,
				'reason' => '0',
				'image'  => $imagename,
				'classification' => 1
			];

			$deliveriesID = $model->successDelivery($req_id, $deliveriesData);
		if(!$deliveriesID){
			return json_encode([
				'code' => 405
			]);
		}else{
			$notificationData = [
				'sender'     => $ridername,
				'Client_id' => $c_id,
				'delivery_id' => $deliveriesID,
				'body'        => 'The delivery of your product is successfull, check your Success Request section for more information.',
				'tracking'  => $trackingNum,
				'status' => 0
			];
	
			if($model->notification($notificationData)){
				return json_encode([
					'code' => 202
				]);
			}else{
				return json_encode([
					'code' => 406
				]);
			}
		}
		}
		
		

		
	}
}

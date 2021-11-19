<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use  App\Models\Dashboard\Client_Dashboard;
use App\Libraries\Pricing;

class ClientDashboard extends BaseController
{
	public function index()
	{
		$dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('id');

		$userDBdata = $dash->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$clientData = array(
				'Name'         => $row['Name'],
				'Avatar'       => $row['Avatar'],
				'Address'      => $row['Address'],
				'Municipality' => $row['Municipality'],
				'B_name'  => $row['B_name'],
			);
		}

		if($id != null){
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				'logData' => $clientData//fetch session data
			);
			return view('client-dashboard', $data);
		}else{
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				// 'logData' => $clientData//fetch session data
			);
			return view('client-login', $data);
		}
	}

	//add recepient or add request..
	public function addRecepient(){

		$dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('id');
		$dash->addrequestrecord($id);

		//get data from ajax..
		$name = $this->request->getPost('name');
		$phoneNumber = $this->request->getPost('phone-number');
		$address = $this->request->getPost('address');
		$r_Municipality = $this->request->getPost('Municipality');
		$productName = $this->request->getPost('product-name');
		$productPrice = $this->request->getPost('product-price').'.00';
		$payment = $this->request->getPost('payment');
		//end
		
		//fetch data from model
		$userDBdata = $dash->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$client_municipality = $row['Municipality'];
		}

		$name_str = str_replace(' ', '', $name);//remove space from name
		$ran4number = mt_rand(1000, 9999);//generate random 4 digit num
		$tracking_number = $id.$name_str.$ran4number;//concat data serve as tracking num

		$status = 1;
		//array data for iserting 
		// 'coloumn_name'  =>  $value
		$insertdata = [
			'Client_id'          => $id,
			'tracking_id'        => $tracking_number,
			'product_name'       => $productName,
			'product_price'      => $productPrice,
			'recepient_name'     => ucwords($name),//name format
			'recepient_address'  => $address,
			'recepient_municipality'  => $r_Municipality,
			'recepient_contactNum'    => $phoneNumber,
			'status'             => $status
		];
		
		$r_id = $dash->addRequest($insertdata);//insert data and get returned last inserted array
		if(!$r_id){
			echo json_encode(['code' => 404, 'msg' => 'Something Went Wrong, Try again in a few seconds']);
		}else{
			//embed pricing function from library
			$price = new Pricing();
			
			$deliveryFee = $price->priceCalculator($client_municipality, $r_Municipality);
			$deliveryFee = number_format($deliveryFee, 2);

			$pstatus = 'unpaid';//default value for inserting data

			//array data for iserting 
			// 'coloumn_name'  =>  $value
			$paymentData = [
				'req_id'           => $r_id,
				'mode_of_payment'  => $payment,
				'delivery_fee'     => $deliveryFee,
				'pstatus'           => $pstatus
			];

			if($dash->addPayment($paymentData)){
				echo json_encode(['code' => 202, 'msg' => 'Request Added Successfully']);
			}else{
				echo json_encode(['code' => 404, 'msg' => 'Something Went Wrong!, Try again in a few minutes']);
			}		
		}	
	}

	//edit request 
	public function editRecepient(){

		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		//get data from ajax
		$reqid = $this->request->getPost('reqid');
		$name = $this->request->getPost('name');
		$phoneNumber = $this->request->getPost('phone-number');
		$address = $this->request->getPost('address');
		$Municipality = $this->request->getPost('Municipality');
		$productName = $this->request->getPost('product-name');
		$productPrice = $this->request->getPost('product-price');
		$payment = $this->request->getPost('payment');

		$userDBdata = $model->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$client_municipality = $row['Municipality'];
		}

		$insertdata = [
			'product_name'       => $productName,
			'product_price'      => $productPrice,
			'recepient_name'     => ucwords($name),//name format
			'recepient_address'  => $address,
			'recepient_municipality'  => $Municipality,
			'recepient_contactNum'    => $phoneNumber
		];

		$price = new Pricing();
			
			$deliveryFee = $price->priceCalculator($client_municipality, $Municipality);
			$deliveryFee = number_format($deliveryFee, 2);

		$paymentData = [
			'mode_of_payment'  => $payment,
			'delivery_fee'     => $deliveryFee,
		];

		
		if($model->editRequest($insertdata, $paymentData, $reqid)){
			return json_encode([
				'code' => 202,
				'msg'  => 'Edit Success'
			]);
		}else{
			return json_encode([
				'code' => 404,
				'msg' => 'Something Wrong, try Again later'
			]);
		}
	}

	//display handle the data of user pass to pedning page
	public function pending() {

		$dash = new Client_Dashboard();
		$session = session();
		$id = $session->get('id');

		$userDBdata = $dash->getCompleteData($id);
		foreach ($userDBdata as $row) {
			$clientData = array(
				'Name'         => $row['Name'],
				'Avatar'       => $row['Avatar'],
				'Address'      => $row['Address'],
				'Municipality' => $row['Municipality'],
				'B_name'  => $row['B_name'],
			);
		}
		
		if($id != null){
			$data = array(
				"page_title" => "Bagudbud | Pending",
				'logData' => $clientData,
			);
			return view('client-request-pending', $data);
		}else{
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				// 'logData' => $clientData//fetch session data
			);
			return view('client-login', $data);
		}
		
	}

	//display request....
	public function displayRequest(){
		$session = session();
		$id = $session->get('id');
		
		$model = new Client_Dashboard();
		$data['request'] = $model->getRequest($id);
    	return view('dashboardDeliveries/requestDisplay', $data);
	}

	public function displayAcceptedRequest(){
		$session = session();
		$id = $session->get('id');
		
		$model = new Client_Dashboard();
		$data['request'] = $model->getAccepted($id);
    	return view('dashboardDeliveries/requestAcceptedDisplay', $data);
	}

	//display request details....
	public function details($reqid) {//pending details
		$session = session();
		$id = $session->get('id');

		$model = new Client_Dashboard();
		$data = array(
            "page_title" => "Bagudbud | Delivery Details",
			"request"    => $model->getRequestDetails($reqid),
        );
		return view('delivery-details', $data);
	}

	//index for accepted request page....
	public function acceptedDetails($reqid) {//accepted details

		$model = new Client_Dashboard();
		// $data['request'] = $model->getRequestDetails($id);
		$data = array(
            "page_title" => "Bagudbud | Delivery Details",
			"request"    => $model->getAcceptedDetails($reqid)
        );
		return view('accepted-request-details', $data);
	}

	//delete or cancel request
	public function deleteRequest(){
		$model = new Client_Dashboard();
		$reqid = $this->request->getPost('reqid');
		
		if($model->deleteRequest($reqid)){
			return json_encode([
				'code' => 202,
			]);
		}else{
			return json_encode([
				'code' => 404,
			]);
		}

	}

	//for tracking
	public function tracking() {
		$data = array(
            "page_title" => "Bagudbud | Tracking",
        );
		return view('client/tracking', $data);
	}

	public function trackingDetails(){
		$session = session();
		$id = $session->get('id');

		$model = new Client_Dashboard();

		$trackingId = $this->request->getPost('trackingId');

		if($model->checkTracking($trackingId)){
			$data['request'] = $model->getTrackingDetails($trackingId);
    		return view('client/tracking-details', $data);
		}else{
			return '404';
		}
	}
	//end for tracking

	//return data to form for edit request ... as value to inputs
	public function temp() {
		$model = new Client_Dashboard();

		$reqid = $this->request->getGet('requestID');
		$data = $model->getRequestDetails($reqid);		

		foreach($data as $row){
			$newdata = [
				'name' => $row['recepient_name'],
				'p-num' => $row['recepient_contactNum'],
				'address' => $row['recepient_address'],
				'municipality' => $row['recepient_municipality'],
				'product-name' => $row['product_name'],
				'product-price' =>  $row['product_price'],
				'payment' =>  $row['mode_of_payment']
			];
		}

		return json_encode($newdata);
	}

	//countPending Request based from user ID
	public function countPending(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		return json_encode([
			'result' => $model->countPendingRequest($id),
		]);
	}

	//countAccepted Request based from user ID
	public function countAccepted(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		return json_encode([
			'result' => $model->countAcceptedRequest($id),
		]);
	}

	public function profile() {
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		if($id != null){
			$data = array(
				"page_title" => "Bagudbud | Profile",
			);
			return view('client/client-profile', $data);
		}else{
			$data = array(
				"page_title" => "Bagudbud | Dashboard",
				// 'logData' => $clientData//fetch session data
			);
			return view('client-login', $data);
		}
	}

	// success deliveries
	public function successDeliveries(){
		$data = array(
            "page_title" => "Bagudbud | Success Deliveries",
        );

		return view('client/success-deliveries', $data);
	}

	public function successDeliveryDetail($id){
		$model = new Client_Dashboard();
		$data = array(
            "page_title" => "Bagudbud | Success Deliveries",
			"request"    => $model->getSuccessDelDetails($id)
        );

		return view('client/success-delivery-details', $data);
	}

	public function displaySuccess(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		$data['request'] = $model->getSuccessDel($id);
    	return view('client/displaySuccesslist', $data);
		// return '<h1>hello</h1>';
	}
	// success deliveries

	public function cancelledDeliveries(){
		$data = array(
            "page_title" => "Bagudbud | Success Deliveries",
        );

		return view('client/cancelled-deliveries', $data);
	}

	public function cancelledDeliveryDetail($id){
		$model = new Client_Dashboard();

		$data = array(
            "page_title" => "Bagudbud | Success Deliveries",
			"request"    => $model->getCancelDelDetails($id)
        );

		return view('client/cancelled-delivery-details', $data);
	}

	//display Cancelled requests
	public function displayCancel(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		$data['request'] = $model->getCancelDel($id);
    	return view('client/displayCancellist', $data);
		// return '<h1>hello</h1>';
	}

	//delete cancelled request from deliveries
	public function deleteCancel(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		$reqid = $this->request->getPost('req_id');
		if($model->deleteCancel($id, $reqid)){
			return json_encode([
				'code' => 202
			]);
		}
	}

	public function successCancel(){
		$model = new Client_Dashboard();

		$session = session();
		$id = $session->get('id');

		$reqid = $this->request->getPost('req_id');
		$imagename = $this->request->getPost('image');

		if(file_exists('public/proofImages/'.$imagename)){
			unlink('public/proofImages/'.$imagename);
			
			$model->deleteSuccess($id, $reqid);
			
			return json_encode([
				'code' => 202
			]);
		}


	}

	

}

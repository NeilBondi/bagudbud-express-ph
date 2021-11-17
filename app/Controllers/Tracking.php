<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TrackingModel;

class Tracking extends BaseController
{
	public function index($data = null)
	{
		$email = $data;
		$data = array(
            "page_title" => "Bagudbud | Tracking",
			"email" => $email
        );
		return view('customer-tracking', $data);
	}

	public function trackingDetails(){
		$session = session();
		$id = $session->get('id');

		$model = new TrackingModel();

		$trackingId = $this->request->getPost('trackingId');

		if($model->checkTracking($trackingId)){
			$data['request'] = $model->getTrackingDetails($trackingId);
    		return view('trackingDetails', $data);
		}else{
			return '404';
		}
	}
}

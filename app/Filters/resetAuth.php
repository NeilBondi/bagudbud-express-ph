<?php

namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class resetAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if user not logged in
        if(! session()->get('OTPpass')){
        // then redirct to login page
         return redirect()->to('/client-login'); 
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }
}
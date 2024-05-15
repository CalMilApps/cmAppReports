<?php 

namespace App\Filters;
Use CodeIgniter\HTTP\RequestInterface;
Use CodeIgniter\HTTP\ResponseInterface;
Use CodeIgniter\Filters\FilterInterface;


class Auth_login implements FilterInterface
{
    // Your code here
    public function before(RequestInterface $request, $arguments = null){
        if(!session()->get('logged_in')){
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        
    }
}



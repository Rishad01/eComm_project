<?php
namespace App\Filters;
use \Codeigniter\Filters\FilterInterface;
use \Codeigniter\HTTP\RequestInterface;
use \Codeigniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('logged_user'));
        return redirect()->to(base_url('homepage/login'));
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
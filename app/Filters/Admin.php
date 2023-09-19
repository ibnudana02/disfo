<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if user not logged in
        if (session()->get('role') != '1') {
            // then redirct to login page
            return redirect()->to('/dashboard')->with('error', 'Tidak berhak mengakses!');;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        # code...
    }
}

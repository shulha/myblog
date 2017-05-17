<?php

namespace Mystore\Controller;

use Shulha\Framework\Controller\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
}

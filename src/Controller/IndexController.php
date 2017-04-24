<?php

namespace Myblog\Controller;

use Shulha\Framework\Controller\Controller;

/**
 * Class IndexController
 * @package Mystore
 */
class IndexController extends Controller
{
    /**
     * Index action
     */
    public function index(){

        return view('main');
    }
}
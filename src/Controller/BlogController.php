<?php

namespace Myblog\Controller;

use Myblog\Model\BlogModel;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Router\Exception\RouteNotFoundException;

/**
 * Class IndexController
 * @package Mystore
 */
class BlogController extends Controller
{
    /**
     * Index action
     */
    public function index(BlogModel $model){

        return view('blog/list', ['articles' => $model->get()]);
    }

    /**
     * Index action
     */
    public function single($id, BlogModel $model){

        $article = $model->find($id);

        if(empty($article)){
            throw new RouteNotFoundException(sprintf('Article with ID %s can not be found', $id));
        }

        return view('blog/single', compact('article'));
    }
}
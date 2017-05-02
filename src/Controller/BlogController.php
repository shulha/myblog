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

        return view('blog/list', ['articles' => $model->all()]);
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

    public function save(BlogModel $model)
    {
        $columns = ['title','text'];
        $values = ['test', 'save'];
        $article = $model->insert($columns, $values);
    }

    public function edit($id, BlogModel $model)
    {
        $columns = ['text', 'author'];
        $values = ['edited', 'edit'];
        $article = $model->update($id, $columns, $values);
    }
}
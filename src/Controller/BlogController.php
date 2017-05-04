<?php

namespace Myblog\Controller;

use Myblog\Model\BlogModel;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Router\Exception\RouteNotFoundException;
use Shulha\Framework\Security\Exception\NotPermittedException;
use Shulha\Framework\Security\Security;

/**
 * Class IndexController
 * @package Myblog
 */
class BlogController extends Controller
{
    /**
     * Index action
     */
    public function index(BlogModel $model){

	    $articles = $model->all();

        return view('blog/list', compact('articles'));
    }

    /**
     * Index action
     */
    public function single($id, BlogModel $model, Security $security){

        $article = $model->find($id);
        $canEdit = $security->checkPermission('blog.edit', $article, $security->getUser());

        if(empty($article)){
            throw new RouteNotFoundException(sprintf('Article with ID %s can not be found', $id));
        }

        return view('blog/single', compact('article', 'canEdit'));
    }

    /**
     * Edit post action
     */
    public function edit($id, BlogModel $model, Security $security){

        $article = $model->find($id);
        if(!$security->checkPermission('blog.edit', $article, $security->getUser())){
            throw new NotPermittedException('You can not access this page');
        }

        if(empty($article)){
            $article = $model->create();
        }

        return view('blog/edit', compact('article'));
    }

//    public function save(BlogModel $model)
//    {
//        $columns = ['title','text'];
//        $values = ['test', 'save'];
//        $article = $model->insert($columns, $values);
//    }
}

<?php

namespace Myblog\Controller;

use Myblog\Model\Categories;
use Shulha\Framework\Controller\Controller;

class CategoryController extends Controller
{
    public function menu($id, Categories $categories)
    {
        $categories = $categories->qb->table($categories->table)->where('parent_id', '=', $id)->get();

//        $categories = $categories->qb->query(" WITH RECURSIVE r AS (
//            SELECT id, parent_id, name
//            FROM categories
//            WHERE parent_id =" . $id . "
//
//            UNION
//
//            SELECT categories.id, categories.parent_id, categories.name
//            FROM categories
//            JOIN r
//            ON categories.parent_id = r.id
//        ) SELECT * FROM r;")->get();

//debug($categories);
//        $childs = array();
//
//        foreach($categories as $item)
//            $childs[$item->parent_id][] = $item;
//
//        foreach($categories as $item) if (isset($childs[$item->id]))
//            $item->childs = $childs[$item->id];
//debug($childs);
//        $tree = $childs[0];
//
//        print_r($tree);

//           debug($categories);
//        if ($categories) {
//            $goods = Goods::find(['category_id' => $category->id]);
//            $goods = Goods::where('category_id', '=', $category->id)->get();
//            dd($goods);
            return view('categories', compact('categories'));
//        }
//        else
//            return $this->redirect('blog');
    }

    public function index(Categories $categories)
    {
        $categories = $categories->qb->table($categories->table)->whereNull('parent_id')->get();

        return view('categories', compact('categories'));
    }
}

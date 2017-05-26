<?php

namespace Mystore\Controller;

use Mystore\Model\Category;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Response\JsonResponse;
use Shulha\Framework\Response\RedirectResponse;
use Shulha\Framework\Validation\Validator;

class CategoriesController extends Controller
{
    public function index(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->whereNull('parent_id')->get();

        return view('categories', compact('categories'));
    }

    public function create(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->select('id', 'name')->get();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request, Category $categories)
    {
        $parent_id = $request->parent_id ? $request->parent_id : null;
        $categories->insert(['name', 'parent_id', 'url'],
            [$request->name, $parent_id, url_slug($request->name)]);

        return $this->redirect('all_categories');
    }

    public function destroy($id, Category $categories)
    {
        $category=$categories->qb->table($categories->table)->find($id);
        $categories->delete($id);

        return $category->name;
    }

    public function edit($id, Category $categories)
    {
        $category=$categories->qb->table($categories->table)->find($id);
        $parent = $categories->qb->table($categories->table)->where('id', '=', $category->parent_id)->first();
        if($category->parent_id === null)
            $categories = $categories->qb->table($categories->table)->select('id', 'name')->get();
        else
            $categories = $categories->qb->table($categories->table)->whereNot('id', '=', $category->parent_id)
                ->whereNot('id', '=', $category->id)->select('id', 'name')->get();
//dd($categories);
        return view('admin.categories.edit', compact('category', 'parent', 'categories'));
    }

    public function update(Request $request, Category $categories, $id)
    {
        $validator = new Validator($request, [
            "name" => ["required"],
//            "price" => ["required", "numeric", "min:0"]
        ]);

        if (!$validator->validate()) {
            return new JsonResponse([
                "success" => false,
                "error" => $validator->getErrorList()
            ], 400);
        }

        $parent_id = $request->parent_id ? $request->parent_id : null;
        $categories->update($id, ['name', 'parent_id'], [$request->name, $parent_id]);

        return $this->redirect('all_categories');
    }
    /*
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return back()->with('message','Категория добавлена');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
//        return $category->title; // метод возвратит название удаленной категории, которую мы отобразим в окне alert
        return back()->with('message', "Категория \"$category->title\" удалена");
    }

    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $category->update($request->all());
        $category->save();
        return back()->with('message','Категория обновлена');
    }
  */

    public function allmenu(Category $categories)
    {

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

        $categories = $categories->qb->table($categories->table)->get();
//debug($categories);
        $childs = array();

        foreach ($categories as $category)
            $childs[$category->parent_id][] = $category;

        foreach ($categories as $category)
            if (isset($childs[$category->id]))
                $category->childs = $childs[$category->id];
//debug($childs);
        $tree = $childs[null];

//        debug($tree);
//        dd($this->tree_print($tree));
//        ob_end_flush();
//        debug($tree->childs[0][0]);
        return view('admin.categories.categories', compact('categories'));

    }

    public static function tree_print(&$tree)
    {
        ob_start();

        echo (view('admin.categories.tree_print', compact('tree')));

        return ob_get_contents();
    }

    public function menu($id, Category $categories)
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

        if ($categories) {
//            $goods = Goods::find(['category_id' => $category->id]);
//            $goods = Goods::where('category_id', '=', $category->id)->get();
//            dd($goods);
            return view('categories', compact('categories'));
        }
        else
            return new RedirectResponse('/product/' . $id, 200);
    }


}

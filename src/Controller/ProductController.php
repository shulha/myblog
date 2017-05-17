<?php

namespace Mystore\Controller;

use Mystore\Model\Products;
use Shulha\Framework\Controller\Controller;


class ProductController extends Controller
{

    public function index($id, Products $model)
    {

        $products = $model->qb->table($model->table)->where('category_id', '=', $id)->get();

//        dd($products);

        return view('categoryProduct', compact('products'));
    }

    public function show($id, Products $model)
    {
        $product = $model->find($id); // получаем все, что касается товара (название, цена....)
        $parameters = $model->parameters($id); //получаем все параметры
//        SELECT * FROM products p JOIN parameters_values pv ON p.id = pv.products_id JOIN parameters par ON pv.parameters_id = par.id

//        $parameters=$model->qb->query('SELECT * FROM products p JOIN parameters_values pv ON p.id = pv.products_id JOIN parameters par ON pv.parameters_id = par.id WHERE p.id ='. $id)

//        dd($parameters);
        $images=explode(';',$parameters[0]->preview); //ссылки на картинки передаем отдельным массивом
        return view('show',['items'=>$product,'parameters'=>$parameters,'images'=>$images]);
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
}
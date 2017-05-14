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
}
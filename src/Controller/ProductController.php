<?php

namespace Mystore\Controller;

use Mystore\Model\Category;
use Mystore\Model\Parameter;
use Mystore\Model\Parameter_value;
use Mystore\Model\Products;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Response\RedirectResponse;


class ProductController extends Controller
{

    public function index($id, Products $model)     //TODO slug
    {

        $products = $model->qb->table($model->table)->where('category_id', '=', $id)->get();

        return view('categoryProduct', compact('products'));
    }

    public function show($id, Products $model)
    {
        $product = $model->find($id); // получаем все, что касается товара (название, цена....)
        $parameters = $model->parameters($id); //получаем все параметры
//        SELECT * FROM products p JOIN parameters_values pv ON p.id = pv.products_id JOIN parameters par ON pv.parameters_id = par.id

//        $parameters=$model->qb->query('SELECT * FROM products p JOIN parameters_values pv ON p.id = pv.products_id JOIN parameters par ON pv.parameters_id = par.id WHERE p.id ='. $id)

//        var_dump($parameters);
        $input = [];
        foreach ($parameters as $item) {
            @$input[$item->title.' '.$item->unit][$item->id] .= $item->value ;
        }
        $input = ($parameters[0]->id) ? $input : null;
//        dd($input);

        $images = explode(';', $product->preview); //ссылки на картинки передаем отдельным массивом
        return view('product', ['items' => $product, 'parameters' => $input, 'images' => $images]);
    }

    public function create(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->select('id', 'name')->get();

        return view('admin.products.createProduct', compact('categories'));
    }

    public function store(Request $request, Products $item, Parameter_value $pv)
    {
        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->selected = $request->selected ? true : false;
        $item->price = $request->price;
        $item->storage = (int)$request->amount;

        $folder = "/images/";
        if ($request->hasFile('preview')) {
            $item->preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        $item->save();

        for($i = 0; $i < count($request->parameter); ++$i) {
            $pv->parameters_id = $request->parameter[$i];
            $pv->products_id = $item->id;
            $pv->value = $request->value[$i] ?? "N/A";
            $pv->save();
        }

        return $this->redirect('last_product');
    }

    public function last(Products $item)
    {
        $products = $item->qb->table($item->table)->orderBy('created_at', 'DESC')->limit(3)->get();

        return view('categoryProduct', compact('products'));
    }

    public function edit($id, Products $products, Parameter $param, Category $categories)
    {
        $item = $products->qb->table($products->table)->find($id);
//        dd($item);
        $category = $categories->qb->table($categories->table)->where('id', '=', $item->category_id)->first();
        $all_categories = $categories->qb->table($categories->table)->whereNot('id', '=', $category->id)->get();;
//        dd($all_categories);
        $parameters = $products->parameters($id);
//var_dump($parameters);
        $parameters_all = $param->all();
//dd($parameters_all);
//dd($item->preview);
        if (!empty($parameters) && strlen($item->preview) > 0) {
            $images = explode(';', $item->preview);
        } else {
            $images = [];
        }
//dd($images);
        return view('admin.products.editProduct',
            compact('item', 'parameters', 'images', 'parameters_all', 'category', 'all_categories'));
    }

    public function del_image(Request $request, Products $products)
    {
        $src = $request->src;
        $item_id = $request->item_id;
        $item = $products->find($item_id);
        $images = explode(";", $item->preview);
        $root = $_SERVER['DOCUMENT_ROOT']; //путь до картинок
        if (($key = array_search($src, $images)) >= 0) //находим ключ, значение, которого соответствует ссылке на картинку
        {
            unset($images[$key]); //удалем ссылку из массива
            if (file_exists($root . $src)) //проверяем существование файла
            {
                unlink($root . $src); //удаляем файл
            }
        }
        $url = implode(";", $images); //переделываем массив строку
        $item->update($item_id, ['preview'], [$url]); //сохраняем изменения

        return "OK";
    }

    public function update(Request $request, Products $products, Parameter_value $pv, $id)
    {
        $old_preview = $products->qb->table($products->table)->find($id)->preview;
        $selected = $request->selected ? true : false;
        $folder = "/images/";

//dd($request->category_id);
        if ($request->hasFile('preview')) {
            $new_preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        if (strlen($old_preview) == 0) {
            $preview = $new_preview;
        } elseif (strlen($new_preview) == 0){
            $preview = $old_preview;
        } else {
            $preview = $old_preview.';'.$new_preview;
        }


//        $out = array_combine($request->parameter ?? [], $request->value ?? []);
        // массив будет такой ['5'=>'300'], 5 - это id параметра, 300 - значение параметра

        $products->update($id,
            ['title', 'description', 'category_id', 'storage', 'selected', 'price', 'preview', 'updated_at'],
            [$request->title, $request->description, $request->category_id, $request->amount, $selected, $request->price, $preview, date('Y-m-j H:i:s', time())]
            );
//var_dump($request->parameters);
//dd(count($request->parameters));
        $pv->qb->table($pv->table)->where('products_id', $id)->delete();

        for($i = 0; $i < count($request->parameters); ++$i) {
            $pv->parameters_id = $request->parameters[$i];
            $pv->products_id = $id;
            $pv->value = $request->value[$i] ?? "N/A";
//            var_dump($request->parameters[$i]);
//            var_dump($request->value[$i]);
            $pv->save();
        }

        return new RedirectResponse('/product/show/'.$id, 200);
    }

    public function destroy($id, Products $products)
    {
        $product = $products->qb->table($products->table)->find($id);
        $products->delete($id);

        return $product->title;
    }
}
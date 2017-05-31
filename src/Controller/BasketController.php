<?php

namespace Mystore\Controller;

use Mystore\Model\BasketCookie;
use Mystore\Model\Orders;
use Mystore\Model\Products;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;

class BasketController extends Controller
{
    function index(BasketCookie $basket)
    {
        $orders = $basket->getAllOrders();
//        dd($orders);
        return view('basket',['orders'=>$orders]);
    }

    function checkout(Request $request, Orders $ord, Products $products, BasketCookie $basket)
    {
        if(!$orders = $basket->getAllOrders()) // проверяем, есть ли заказы
        {
            return $this->redirect(); //если заказ пустой, то редиректим на главную страницу
        }
//        var_dump($orders);
        $ids=[]; //все идентификаторы товаров
        $amount=[];//количество товаров
        $total_cost=0; //общая цена заказа
//var_dump($orders);
        $latest_order = $ord->latest();//получаем последний заказ
        $order_id=empty($latest_order->order_id)? 1 : $latest_order->order_id+1; //определяемся с новым заказом, увеличивая номер последнего заказа на 1
//var_dump($order_id);
//var_dump($order_id);
        foreach($orders as $total => $value) {
            foreach ($value as $order) {
//                var_dump($order);
                $ord->insert(['product_id', 'price', 'order_id', 'amount', 'name', 'address', 'phone'],
                    [$order->id, $order->price, $order_id, (int)$order->amount, $request->name, $request->address, $request->phone]);//сохраняем заказ в базу
//        foreach($orders as $order)
//        {
//            $ids[]=$order->item_id;//создаем массив из id заказанных товаров
//            $amount[$order->item_id]=$order->amount; //создаем массив с количеством каждого товара ['id товара'=>'количество товара']
//        }
//var_dump($ids);
//var_dump($amount);
//        $items = $products->qb->table($products->table)->whereIn('id',$ids)->get(); //выбираем все заказанные товары из базы
//        foreach($items as $item)
//        {
                /*
                $ord->insert(['product_id', 'price', 'order_id', 'amount', 'name', 'address', 'phone'],
                    [$item->id, $item->price, $order_id, $amount[$item->id], $request->name, $request->address, $request->phone]);//сохраняем заказ в базу
                $total_cost = $total_cost + $item->price * $amount[$item->id]; //считаем общую сумму заказа
                */
            }
                $total_cost = (float)$total;
        }
//        dd($total_cost);
        setcookie('basket',''); //удаляем куки
        $new_order = $ord->qb->table($ord->table)->where('order_id','=', $order_id)
//            ->setFetchMode( \PDO::FETCH_CLASS , get_class($ord) , [$ord->dbo] )->get();//получаем только, что добавленный заказ
            ->asObject(get_class($ord), [$ord->dbo])->get();//получаем только, что добавленный заказ
//            ->get();//получаем только, что добавленный заказ
//        var_dump($orders[0]->product_id);
//        dd($now_orders);
//        dd((explode(';', $orders[1]->items($orders[1]->product_id)->preview))[0]);
        return view('finish_order',['orders'=>$new_order,'total'=>$total_cost]);
    }


}

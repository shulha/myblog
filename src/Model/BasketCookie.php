<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;


class BasketCookie extends Model
{
    public function getAllOrders()
    {
        $all=[];
        $total=0;

        if(isset($_COOKIE['basket'])) // проверяем, есть ли заказы
        {
            $orders = $_COOKIE['basket'];
            $orders=json_decode($orders); //перекодируем строку из куки в массив с объектами
            foreach ($orders as $order){
                $ord = $this->product($order->item_id);
                $ord->preview = explode(';', $ord->preview)[0] ?? null;
                $ord->amount = $order->amount;
                $total += $ord->price*$ord->amount;
                $all[] = $ord;
            }
        }

//var_dump($total);
        $all_orders[(string)$total]=$all;
//        var_dump($all);
        return $all_orders;
    }

    public function product($id)
    {
        return $this->qb->query('SELECT * FROM products p WHERE p.id =' . $id)->first();
    }

}
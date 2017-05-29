<?php

namespace Mystore\Controller;

use Mystore\Model\Orders;
use Shulha\Framework\Controller\Controller;

class OrderController extends Controller
{
    public function orders(Orders $orders)
    {
        $all_orders = $orders->allorders();

        return view('admin.orders.orders',['orders'=>$all_orders]);
    }

    public function show(Orders $orders, $id)
    {
        $all_order = $orders->qb->table($orders->table)->where('order_id', '=', $id)
            ->asObject(get_class($orders), [$orders->dbo])->get();
//        dd($all_order);
        return view('admin.orders.show_order', ['orders'=>$all_order]);

    }
}

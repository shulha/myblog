<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;

class Orders extends Model
{
    public $table = 'orders';

    public function items($id) //этот метод нам понадобится чуть позже
    {
//        return $this->belongsTo('App\Items', 'item_id', 'id');   //связь один к одному
        return $this->qb->query('SELECT * FROM products WHERE id='. $id)->first();
    }

    public function allorders()
    {
//        return DB::table('orders')->groupBy('order_id')->select('order_id',DB::raw('sum(price) as summa'))->get();
        return $this->qb->query('SELECT order_id, sum(price) AS summa FROM orders GROUP BY order_id ORDER BY order_id DESC')->get();
    }
}

<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;

class Products extends Model
{
    public $table = 'products';

    public function parameters($id)
    {
        return $this->qb->query('SELECT par.title, pv.value, par.unit, pv.parameters_id, pv.id FROM products p 
                                 LEFT JOIN parameters_values pv ON p.id = pv.products_id
                                 LEFT JOIN parameters par ON pv.parameters_id = par.id 
                                 WHERE p.id ='. $id)->get();

//        $this->table->where('items.id','=',$id)
//            ->join('parameters_values','parameters_values.items_id','=','items.id')
//            ->join('parameters','parameters_values.parameters_id','=','parameters.id')
//            ->select('parameters.id','parameters.title','parameters_values.value','parameters.unit','items.preview')->get();
    }
}

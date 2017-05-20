<?php

namespace Mystore\Controller;

use Mystore\Model\Parameter;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Renderer\RendererBlade;
use Shulha\Framework\Request\Request;

class ParametersController extends Controller
{
    public function show(Parameter $param)
    {
        $parameters =$param->qb->table($param->table)->get();

        return RendererBlade::render('admin.products.parameters', compact('parameters'));
    }

    public function save(Request $request, Parameter $param)
    {
        $param->title = $request->title;
        $param->unit = $request->unit;
        $param->save();

        return [$param->id,$param->title,$param->unit];
    }
}

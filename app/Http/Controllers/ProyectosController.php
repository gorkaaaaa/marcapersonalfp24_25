<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function getIndex()
    {
        $arrayProyectos = Proyecto::all();
        return view('proyectos.index')
            ->with('proyectos', $arrayProyectos);
    }

    public function getShow($id)
    {
        return view('proyectos.show')
            ->with('proyecto',Proyecto::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {

        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        $arrayProyectos = Proyecto::all();
        return view('proyectos.edit')
            ->with('proyecto', $arrayProyectos[$id])
            ->with('id', $id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\App;

class productoscontroller extends Controller
{
    public function index()
    {
        return view('productos');
    }
    
    public function mostrar()
    {
        echo "Metodo mostrar";
    }

    public function crear()
    {
        return  view("crear");
    }

    public function show($post)
    {
        return "Aca se mando un Valor como parametro el  valor es: ". $post;
    }

}



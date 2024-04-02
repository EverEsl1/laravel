<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// public function index() {
//     $data = [
//         'title' => 'Home Page',
//         'description'=>'This is the Home page description.'
//     ];
//     return view('pages.index')->with($data); // with method to pass data


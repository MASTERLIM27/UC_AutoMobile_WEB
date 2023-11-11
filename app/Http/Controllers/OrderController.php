<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }
    public function store(Request $request)
    {
    }

    public function create()
    {
        return view('createOrder');
    }
}

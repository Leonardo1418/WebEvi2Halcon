<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string',
        ]);

        $order = Order::where('invoice_number', $request->invoice_number)
                      ->where('deleted', false)
                      ->with('photoEvidences')
                      ->first();

        return view('home', compact('order'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderformController extends Controller
{
    public function index(){
        return view('order', ['orders' => Order::all()]);
    } 

    public function submitForm(Request $request)
    {
        // Handle form submission logic here
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_value' => 'required|numeric',
            'date' => 'required|date',
        ]);
        
        return response()->json($validatedData);
    }
}

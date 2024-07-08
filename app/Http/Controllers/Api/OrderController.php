<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{        
    //new_order save process
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',  
            'order_value' => 'required|numeric'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => "All fields are mandatory",
                'error' => $validator->messages()
            ],422);
        }

        $orderId = $this->orderIdGenerate();
        $processId = $this->processIdGenerate();
                
        $order = Order::create([
            'order_id' => $orderId,
            'customer_name' => $request->customer_name,
            'order_value' => $request->order_value,
            'process_id' => $processId,
            'status' => "In Progress",
        ]);
        
        $validatedData = [
            'order_id' => $orderId,
            'order_date' => now()->format('Y-m-d H:i:s'), 
            'process_id' => $processId,
            'status' => "In Progress",
        ];

        $dataSubmit = $this-> dataSubmitProcess($request, $validatedData);

        if($dataSubmit[1] == 200){
            return response()->json([
                'message' => 'New Order Placed successfully',
                'order' => new OrderResource($order)
            ]);
        }else{
            return response()->json([
                'message' => 'New Order Placed failed'
            ]);
        }
        
        
    }
    // Generate Order ID
    private function orderIdGenerate()
    {        
        $prefix = 'ORDER-';
        $date = now()->format('Ymd');
        $uniqueNumber = Str::random(6); // Generate a random string

        return $prefix . $date . $uniqueNumber;
    }

    // Generate Process ID
    private function processIdGenerate()
    {        
        $processN = random_int(1, 10);
        return $processN;
    }

    // Submit data to third-party API
    public function dataSubmitProcess(Request $request, $validatedData)
    {
       
        // Third-party API
        $url = 'https://wibip.free.beeceptor.com/order';
        
        $data = [
            'Order_ID' => $validatedData['order_id'],
            'Customer_Name' => $request['customer_name'],
            'Order_Value' => $request['order_value'],
            'Order_Date' => $validatedData['order_date'],
            'Order_Status' => $validatedData['status'],
            'Process_ID' => $validatedData['process_id']
        ];

        // Third-party API handling
        $response = Http::post($url, $data);
        #echo $response;
        
        if ($response) {            // Currently 3rd party API seems not working
            return ['success',200];
        } else {
            return ['Failed',400];
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
            public function index()
            {
                return Orders::all();
            }

            public function store(Request $request)
            {
            $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            ]);
            $orders = Orders::create($validated);
            return response()->json($orders, 201);
            }  

            public function update(Request $request, $id)
            {
            $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            ]);
            $orders = Orders::findOrFail($id);
            $orders->update($validated);
            return response()->json($orders);
            }

            public function destroy($id)
            {
            $orders = Orders::findOrFail($id);
            $orders->delete();
            return response()->json(['message' => 'Product deleted
            successfully']);
            }
}

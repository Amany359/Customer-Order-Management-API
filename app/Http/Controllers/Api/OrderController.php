<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use App\Helpers\Helpers;
use App\Models\Order;
class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        
        $orders = $this->orderService->getAllOrders();
        return Helpers::jsonResponse(true, OrderResource::collection($orders), 'Orders retrieved successfully');
    }

    public function store(OrderRequest $request)
    {
        // استخدام createOrder
        $order = $this->orderService->createOrder($request->validated());
        return Helpers::jsonResponse(true, new OrderResource($order), 'Order created successfully', 201);
    }

    public function update(OrderRequest $request, $id)
    {
        
        $order = Order::findOrFail($id);

        
        $order = $this->orderService->updateOrder($order, $request->validated());
        return Helpers::jsonResponse(true, new OrderResource($order), 'Order updated successfully');
    }

    public function destroy($id)
    {
      
        $order = Order::findOrFail($id);

        
        $this->orderService->deleteOrder($order);
        return Helpers::jsonResponse(true, null, 'Order deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function register(CustomerRequest $request)
{
    $customer = $this->customerService->create($request->validated());

    
    return Helpers::jsonResponse(true, [
        'customer' => $customer,
        'token' => $customer->token, 
    ], 'Customer created successfully', 201);
}
}

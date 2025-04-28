<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function create(array $data)
    {
        
        $customer = Customer::create($data);
    
        
        $token = $customer->createToken('YourAppName')->plainTextToken;
     
        $customer->token = $token;
    
        return $customer;
    }
}

<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $paymentMethods = [
            [
                'name' => 'Cash',
                'description' => 'Cash payment',
            ],
            [
                'name' => 'Bank Transfer',
                'description' => 'Direct bank transfer payment',
            ],
            [
                'name' => 'Credit Card',
                'description' => 'Credit card payment',
            ],
            [
                'name' => 'Digital Wallet',
                'description' => 'Payment using digital wallet services',
            ],
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::create($method);
        }
    }
}

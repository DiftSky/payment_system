<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            for ($i = 1; $i <= 3; $i++) {
                $issueDate = Carbon::now()->subDays(rand(1, 30));
                Invoice::create([
                    'customer_id' => $customer->id,
                    'invoice_number' => 'INV-' . date('Y') . sprintf('%06d', rand(1, 999999)),
                    'issue_date' => $issueDate,
                    'due_date' => $issueDate->copy()->addDays(14),
                    'total_amount' => rand(100000, 1000000) / 100,
                    'status' => rand(0, 2) === 0 ? 'pending' : (rand(0, 1) === 0 ? 'paid' : 'overdue'),
                ]);
            }
        }
    }
}

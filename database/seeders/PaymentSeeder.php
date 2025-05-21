<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $paidInvoices = Invoice::where('status', 'paid')->get();
        $paymentMethods = PaymentMethod::all();

        foreach ($paidInvoices as $invoice) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'payment_method_id' => $paymentMethods->random()->id,
                'amount' => $invoice->total_amount,
                'payment_date' => Carbon::parse($invoice->issue_date)->addDays(rand(1, 7)),
                'notes' => 'Payment for invoice ' . $invoice->invoice_number,
            ]);
        }
    }
}

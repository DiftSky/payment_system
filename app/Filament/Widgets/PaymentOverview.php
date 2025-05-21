<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PaymentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCustomers = Customer::count();
        $totalInvoices = Invoice::count();
        $totalReceived = Payment::sum('amount');
        $pendingPayments = Invoice::where('status', 'pending')->sum('total_amount');

        return [
            Stat::make('Total Customers', $totalCustomers)
                ->description('Total registered customers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Total Invoices', $totalInvoices)
                ->description('Total invoices created')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning'),

            Stat::make('Total Payments Received', 'Rp ' . number_format($totalReceived, 0, ',', '.'))
                ->description('Total amount received')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Pending Payments', 'Rp ' . number_format($pendingPayments, 0, ',', '.'))
                ->description('Total pending amount')
                ->descriptionIcon('heroicon-m-clock')
                ->color('danger'),
        ];
    }
}

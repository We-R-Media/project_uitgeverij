<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class InvoiceService
{
    /**
     * Generate a unique invoice number in the format "202300001", "202300002", etc.
     *
     * @return string The generated invoice number.
     */
    public static function generateInvoiceNumber()
    {
        return DB::transaction(function () {
            $year = date('Y');

            $latestInvoice = Invoice::where('invoice_number', 'like', $year . '%')
                ->sharedLock()
                ->orderBy('invoice_number', 'desc')
                ->first();

            if ($latestInvoice) {
                $lastNumber = intval(substr($latestInvoice->invoice_number, -4));
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $invoiceNumber = $year . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

            DB::commit();

            return $invoiceNumber;
        });
    }
}

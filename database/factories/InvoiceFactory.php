<?php

namespace Database\Factories;

use App\Models\Advertiser;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    // protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $invoiceNumber = InvoiceService::generateInvoiceNumber();

        return [
            'title' => 'Factuur ' . $invoiceNumber,
            'invoice_number' => $invoiceNumber,
            'invoice_date' => fake()->optional(.9)->dateTimeThisCentury(),
            'post_method' => fake()->randomElement(['mail', 'post']),
            'first_reminder' => fake()->optional()->dateTimeThisCentury(),
            'second_reminder' => fake()->optional()->dateTimeThisCentury(),
            'third_reminder' => fake()->optional()->dateTimeThisCentury(),
            'payed_at' => fake()->optional()->dateTimeThisCentury(),
        ];
    }
}

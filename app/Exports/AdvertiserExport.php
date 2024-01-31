<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Advertiser;

class AdvertiserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function __construct($selectedAdvertiserIds)
    {
        $this->selectedAdvertiserIds = $selectedAdvertiserIds;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Retrieve the advertisers
        if (!empty($this->selectedAdvertiserIds)) {
            $advertisers = Advertiser::whereIn('id', $this->selectedAdvertiserIds)->get();
        } else {
            $advertisers = Advertiser::all();
        }

        // Transform the data
        $data = $advertisers->map(function ($advertiser) {
            $primaryContact = $advertiser->contacts->where('role', true)->first();

            $contactName = $primaryContact ? $primaryContact->initial . ' ' . $primaryContact->last_name : '';

            return [
                'ID' => $advertiser->id,
                'Bedrijfsnaam' => $advertiser->name,
                'Contactpersoon' => $contactName,
                'Adres' => $advertiser->address,
                'Postadres' => $advertiser->po_box,
                'Postcode' => $advertiser->postal_code,
                'Plaats' => $advertiser->city,
                'Provincie' => $advertiser->province,
                'Telefoon' => $advertiser->phone,
                'Mobiel' => $advertiser->phone_mobile,
                'Email' => $advertiser->email,
            ];
        });

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define the column headers
        return [
            'Klantnummer',
            'Bedrijfsnaam',
            'Contactpersoon',
            'Adres',
            'Postadres',
            'Postcode',
            'Plaats',
            'Provincie',
            'Telefoon',
            'Mobiel',
            'Email',
            // Add more headers as needed
        ];
    }

    /**
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // Apply styles to the entire sheet
        $columnCount = count($this->headings());
    
        $styles = [
            1 => [
                'font' => ['size' => 12, 'bold' => true],
                'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    
        // Loop through columns (A, B, C, ...)
        for ($i = 0; $i < $columnCount; $i++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 1);
            $styles[$columnLetter] = ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]];
        }
    
        return $styles;
    }
}

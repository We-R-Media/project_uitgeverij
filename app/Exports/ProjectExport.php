<?php

/* --- Sources 

https://docs.laravel-excel.com/2.1/reference-guide/formatting.html
https://docs.laravel-excel.com/3.0/exports/

--- */

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Project;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Font;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;



class ProjectExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithColumnFormatting
{
    private $selectedProjectIds;

    /* --- Retrieves variables from controller --- */

    public function __construct($selectedProjectIds)
    {
        $this->selectedProjectIds = $selectedProjectIds;
    }

    /* --- Sets up headers of the export file --- */

    /**
     * @return array
     */
    public function headings(): array {
        return [
            'Projectcode',
            'Naam uitgave',
            'Editie',
            'Streefomzet',
            'Omzet',
            'Deze week',
            'Vorige week',
        ];
    }

    /* --- Collects data from Eloquent models --- */

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (!empty($this->selectedProjectIds)) {
            $projects = Project::with('orderlines')
                ->whereIn('id', $this->selectedProjectIds)
                ->where('deactivated_at', null)
                ->orderBy('name')
                ->get();
        } else {
            $projects = Project::with('orderlines')
                ->where('deactivated_at', null)
                ->orderBy('name')
                ->get();
        }

        $data = $projects->map(function($project) {
            $totalPrice = $project->orderlines->sum('price_with_discount');
            $orderlinesThisWeek = $project->orderlines()
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();

            $orderlinesLastWeek = $project->orderlines()
            ->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])
            ->get();

            $totalPriceLastWeek = $orderlinesLastWeek->sum('price_with_discount');
            $totalPriceThisWeek = $orderlinesThisWeek->sum('price_with_discount');

            return [
                'Projectcode' => $project->name,
                'Naam Uitgave' => $project->release_name,
                'Editie' => $project->edition_name,
                'Streefomzet' => is_null($project->revenue_goals) || $project->revenue_goals === '' ? 0: $project->revenue_goals,
                'Omzet' => is_null($totalPrice) || $totalPrice === '' ? 0 : $totalPrice,
                'Deze week' => is_null($totalPriceThisWeek) || $totalPriceThisWeek === '' ? 0 : $totalPriceThisWeek,
                'Vorige week' => is_null($totalPriceLastWeek) || $totalPriceLastWeek === '' ? 0 : $totalPriceLastWeek,
            ];
        });

        return $data;
    }

    /* --- Listens for events after creating export file --- */

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => [self::class, 'afterSheet'],
        ];
    }

    /* --- Sets basic styling for headers --- */

    public function styles(Worksheet $sheet)
    {
        $columnCount = count($this->headings());
    
        $styles = [
            1 => [
                'font' => ['size' => 12, 'bold' => true],
                'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    
        for ($i = 0; $i < $columnCount; $i++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 1);
            $styles[$columnLetter] = ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]];
        }
    
        return $styles;
    }

    /* --- Event listener that runs after creating file, calculates total prices --- */

    public static function afterSheet(AfterSheet $event)
    {
        $lastRow = $event->getDelegate()->getHighestRow();


        $event->sheet->appendRows([
            [
                '', '', '', '',
            ],
            [
                '', '', '', 'Totaal:',
                '=SUM(E2:E'.$lastRow.')',
                '=SUM(F2:F'.$lastRow.')',
                '=SUM(G2:G'.$lastRow.')',
            ],
        ], $event->sheet->getStyle('E'.$lastRow + 2));

        $event->sheet->getDelegate()->getStyle('D2:G'.$lastRow)->getNumberFormat()->setFormatCode('€ #,##0.00');
        $event->sheet->getDelegate()->getStyle('D2:G'.$lastRow + 2)->getNumberFormat()->setFormatCode('€ #,##0.00');

        $event->sheet->getStyle('D' . $lastRow + 2)->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
    }

    /* --- Formatter for currencies within excel file --- */

    public function columnFormats(): array 
    {
        return [
            'E' => NumberFormat::FORMAT_CURRENCY_EUR_INTEGER,
            'F' => NumberFormat::FORMAT_CURRENCY_EUR_INTEGER,
            'G' => NumberFormat::FORMAT_CURRENCY_EUR_INTEGER,
        ];
    }
}

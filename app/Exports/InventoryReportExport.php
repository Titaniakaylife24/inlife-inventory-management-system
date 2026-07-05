<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class InventoryReportExport implements
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithStyles,
    WithEvents
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Product::with(['category', 'location']);

        // Search
        if ($this->request->filled('search')) {

            $search = $this->request->search;

            $query->where(function ($q) use ($search) {

                $q->where('code', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%");

            });

        }

        // Category
        if ($this->request->filled('category')) {

            $query->where('category_id', $this->request->category);

        }

        // Status
        if ($this->request->filled('status')) {

            $query->where('status', $this->request->status);

        }

        return $query->get()->map(function ($product) {

            return [

                $product->code,

                $product->name,

                $product->brand,

                optional($product->category)->name,

                optional($product->location)->name,

                $product->stock,

                $product->minimum_stock,

                $product->condition,

                $product->status,

                $product->updated_at->format('d M Y H:i'),

            ];

        });

    }

    public function headings(): array
    {
        return [

            'Asset Code',

            'Asset Name',

            'Brand',

            'Category',

            'Location',

            'Stock',

            'Minimum Stock',

            'Condition',

            'Status',

            'Last Updated',

        ];
    }

    public function styles(Worksheet $sheet)
{
    return [

        // Header tabel
        1 => [

            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '7E22CE',
                ],
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],

        ],

    ];
}

public function registerEvents(): array
{
    return [

        AfterSheet::class => function (AfterSheet $event) {

            $sheet = $event->sheet;

            $highestRow = $sheet->getHighestRow();

            $highestColumn = $sheet->getHighestColumn();

            // Border seluruh tabel
            $sheet->getStyle("A1:{$highestColumn}{$highestRow}")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);

            // Freeze Header
            $sheet->freezePane('A2');

            // Auto Filter
            $sheet->setAutoFilter(
                "A1:{$highestColumn}{$highestRow}"
            );

            // Tinggi Header
            $sheet->getRowDimension(1)
                ->setRowHeight(25);

            // Center beberapa kolom
            $sheet->getStyle("A:J")
                ->getAlignment()
                ->setVertical(Alignment::VERTICAL_CENTER);

        },

    ];
}


}
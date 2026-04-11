<?php

namespace App\Exports;

use App\Models\CalculatorEnquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CalculatorEnquiryExport implements FromCollection, WithHeadings
{
    private $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $search = $this->search;
        $allArr = [];
        
        $data = CalculatorEnquiry::when(!empty($search), function ($qry) use ($search) {
                $qry->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($data as $row) {
            array_push($allArr, [
                $row->created_at->format('j M Y, g:i A'),
                $row->name,
                $row->email,
                $row->phone,
                $row->project_type,
                $row->plot_area,
                $row->total_builtup,
                $row->total_floors,
                $row->location,
                $row->total_cost
            ]);
        }

        return collect($allArr);
    }

    public function headings(): array
    {
        return [
            'Date',
            'Customer Name',
            'Email',
            'Phone',
            'Project Type',
            'Plot Area (sq ft)',
            'Total Built-up (sq ft)',
            'Floors',
            'Location',
            'Total Estimated Cost (₹)'
        ];
    }
}

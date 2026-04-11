<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalculatorEnquiry;
use Illuminate\Http\Request;

use App\Exports\CalculatorEnquiryExport;
use Maatwebsite\Excel\Facades\Excel;

class CalculatorEnquiryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:calculator-enquiry-read', ['only' => ['index', 'show', 'export']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CalculatorEnquiry::orderBy('created_at', 'DESC')
                ->where('name', 'LIKE', "%{$request->search}%")
                ->paginate(10);
            return view('admin.enquiry.calculator.dataTable', compact('data'))->render();
        } else {
            $data = CalculatorEnquiry::orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.enquiry.calculator.index', compact('data'));
        }
    }

    public function show(Request $request)
    {
        $row = CalculatorEnquiry::where('id', $request->id)->first();
        if (!$row) return 'Not found';

        return '<div class="modal-header">
            <h4 class="modal-title">Calculator Enquiry Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h5 class="text-primary border-bottom pb-2">Customer Information</h5>
            <table class="table table-borderless table-sm">
                <tr><th>Date:</th><td>' . $row->created_at->format('j M Y, g:i A') . '</td><th>Name:</th><td>' . $row->name . '</td></tr>
                <tr><th>Email:</th><td>' . $row->email . '</td><th>Phone:</th><td>' . $row->phone . '</td></tr>
            </table>

            <h5 class="text-primary border-bottom pb-2 mt-3">Project Details</h5>
            <table class="table table-borderless table-sm">
                <tr><th>Project Type:</th><td>' . $row->project_type . '</td><th>Dimensions:</th><td>' . $row->plot_length . ' x ' . $row->plot_width . ' ft</td></tr>
                <tr><th>Plot Area:</th><td>' . $row->plot_area . ' sq ft</td><th>Built-up Area:</th><td>' . $row->builtup_per_floor . ' sq ft/floor</td></tr>
                <tr><th>Total Floors:</th><td>' . $row->total_floors . '</td><th>Total Built-up:</th><td>' . $row->total_builtup . ' sq ft</td></tr>
                <tr><th>Basement:</th><td>' . $row->basement_required . ($row->basement_required == "Yes" ? " (" . $row->basement_area . " sq ft)" : "") . '</td><th>Location:</th><td>' . $row->location . '</td></tr>
            </table>

            <h5 class="text-primary border-bottom pb-2 mt-3">Quality Selections</h5>
            <table class="table table-borderless table-sm">
                <tr><th>Structure:</th><td>' . $row->structure_quality . '</td><th>Finishing:</th><td>' . $row->finishing_quality . '</td></tr>
                <tr><th>MEP:</th><td>' . $row->mep_quality . '</td><th>Facade:</th><td>' . $row->facade_type . '</td></tr>
                <tr><th>External Dev:</th><td>' . $row->external_dev . '</td><th>Contingency:</th><td>' . $row->contingency . '</td></tr>
            </table>

            <h5 class="text-primary border-bottom pb-2 mt-3">Cost Estimation Summary</h5>
            <table class="table table-bordered table-sm mt-2">
                <thead class="bg-light">
                    <tr><th>Component</th><th>Amount (₹)</th></tr>
                </thead>
                <tbody>
                    <tr><td>Structure Cost</td><td>' . number_format($row->structure_cost, 2) . '</td></tr>
                    ' . ($row->basement_required == "Yes" ? '<tr><td>Basement Cost</td><td>' . number_format($row->basement_cost, 2) . '</td></tr>' : '') . '
                    <tr><td>Finishing Cost</td><td>' . number_format($row->finishing_cost, 2) . '</td></tr>
                    <tr><td>MEP Cost</td><td>' . number_format($row->mep_cost, 2) . '</td></tr>
                    <tr><td>Facade Cost</td><td>' . number_format($row->facade_cost, 2) . '</td></tr>
                    <tr><td>External Development</td><td>' . number_format($row->external_cost, 2) . '</td></tr>
                    <tr><td>Location Adjustment</td><td>' . number_format($row->location_factor, 2) . '</td></tr>
                    <tr><td>Contingency (' . $row->contingency . ')</td><td>' . number_format($row->contingency_amount, 2) . '</td></tr>
                    <tr class="table-info font-weight-bold">
                        <td>GRAND TOTAL</td>
                        <td>' . number_format($row->total_cost, 2) . '</td>
                    </tr>
                </tbody>
            </table>
        </div>';
    }

    public function export(Request $request)
    {
        $search = $request->search;
        $file_name = 'calculator_enquiries_' . date('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new CalculatorEnquiryExport($search), $file_name, \Maatwebsite\Excel\Excel::XLSX);
    }
}

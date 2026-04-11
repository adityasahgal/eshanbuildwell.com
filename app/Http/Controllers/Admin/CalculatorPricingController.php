<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalculatorPricing;
use Illuminate\Http\Request;

class CalculatorPricingController extends Controller
{
    /**
     * Show the calculator pricing management page.
     */
    public function index()
    {
        // Always keep exactly one row in the table; seed it if missing.
        $pricing = CalculatorPricing::firstOrCreate(
            ['id' => 1],
            [
                // Structure
                'structure_basic'    => 1100,
                'structure_standard' => 1450,
                'structure_premium'  => 1900,
                // Finishing
                'finishing_basic'    => 500,
                'finishing_standard' => 800,
                'finishing_premium'  => 1250,
                // MEP
                'mep_basic'          => 200,
                'mep_standard'       => 350,
                'mep_premium'        => 550,
                // Facade
                'facade_basic'       => 105,
                'facade_standard'    => 180,
                'facade_premium'     => 280,
                // External
                'external_basic'     => 0,
                'external_standard'  => 80,
                'external_premium'   => 150,
                // Location multipliers
                'location_metro'     => 1.10,
                'location_urban'     => 1.00,
                'location_hill'      => 1.20,
                'basement_multiplier'=> 1.50,
            ]
        );

        return view('admin.calculator_pricing.index', compact('pricing'));
    }

    /**
     * Update all calculator pricing fields.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Structure
            'structure_basic'    => 'required|integer|min:0',
            'structure_standard' => 'required|integer|min:0',
            'structure_premium'  => 'required|integer|min:0',
            // Finishing
            'finishing_basic'    => 'required|integer|min:0',
            'finishing_standard' => 'required|integer|min:0',
            'finishing_premium'  => 'required|integer|min:0',
            // MEP
            'mep_basic'          => 'required|integer|min:0',
            'mep_standard'       => 'required|integer|min:0',
            'mep_premium'        => 'required|integer|min:0',
            // Facade
            'facade_basic'       => 'required|integer|min:0',
            'facade_standard'    => 'required|integer|min:0',
            'facade_premium'     => 'required|integer|min:0',
            // External
            'external_basic'     => 'required|integer|min:0',
            'external_standard'  => 'required|integer|min:0',
            'external_premium'   => 'required|integer|min:0',
            // Location multipliers
            'location_metro'     => 'required|numeric|min:0.5|max:3',
            'location_urban'     => 'required|numeric|min:0.5|max:3',
            'location_hill'      => 'required|numeric|min:0.5|max:3',
            // Basement multiplier
            'basement_multiplier'=> 'required|numeric|min:1|max:5',
        ]);

        CalculatorPricing::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('calculator-pricing.index')
            ->with('status', 'success')
            ->with('message', 'Calculator prices updated successfully!');
    }
}

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
    /**
     * Show the calculator pricing management page.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->get('category', 'Residential');
        $availableCategories = ['Residential', 'Commercial', 'Industrial'];

        // Ensure all default categories exist in the database
        foreach ($availableCategories as $cat) {
            CalculatorPricing::firstOrCreate(
                ['category' => $cat],
                [
                    // Structure
                    'structure_basic'    => 1100,
                    'structure_standard' => 1400,
                    'structure_premium'  => 1800,
                    // Finishing
                    'finishing_basic'    => 500,
                    'finishing_standard' => 800,
                    'finishing_premium'  => 1200,
                    // MEP
                    'mep_basic'          => 200,
                    'mep_standard'       => 300,
                    'mep_premium'        => 450,
                    // Facade
                    'facade_basic'       => 150,
                    'facade_standard'    => 250,
                    'facade_premium'     => 400,
                    // External
                    'external_basic'     => 150,
                    'external_standard'  => 250,
                    'external_premium'   => 400,
                    // Location multipliers
                    'location_metro'     => 1.10,
                    'location_urban'     => 1.00,
                    'location_hill'      => 1.20,
                    'basement_multiplier'=> 1.50,
                    'contingency_rate'   => 5.00,
                ]
            );
        }

        $pricing = CalculatorPricing::where('category', $selectedCategory)->first();

        return view('admin.calculator_pricing.index', [
            'pricing' => $pricing,
            'selectedCategory' => $selectedCategory,
            'categories' => $availableCategories
        ]);
    }

    /**
     * Update calculator pricing fields for a specific category.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'category'           => 'required|string|in:Residential,Commercial,Industrial',
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
            'contingency_rate'   => 'required|numeric|min:0',
        ]);

        CalculatorPricing::updateOrCreate(
            ['category' => $validated['category']], 
            $validated
        );

        return redirect()->route('calculator-pricing.index', ['category' => $validated['category']])
            ->with('status', 'success')
            ->with('message', $validated['category'] . ' pricing updated successfully!');
    }
}

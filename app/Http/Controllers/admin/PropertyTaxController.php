<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyTax;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\NamunaForm;

class PropertyTaxController extends Controller
{
    public function index()
    {
        // Fetch all records with the property relation
        $propertyTaxes = PropertyTax::with('property')->get();

        return view('admin.pages.property_taxes.index', compact('propertyTaxes'));
    }

    public function create()
    {
        // Pass available properties to the view
        $properties = Property::get();
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('admin.pages.property_taxes.create', compact('properties','panchayats'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate request
        $request->validate([
            'property_id' => 'required',
            'street_name' => 'required',
            'year_of_income_construction' => 'required',
            'area_in_sqft' => 'required',
            'area_in_sq_mt' => 'required',
            'open_plot' => 'required',
            'residence' => 'required',
            'builders' => 'required',
            'depriciation_rate' => 'required',
            'weight_use_of_builders' => 'required',
            'capital_value' => 'required',
            'tax_rate' => 'required',
            'home_tax' => 'required',
            'lamp_tax' => 'required',
            'health_tax' => 'required',
            'water_tax' => 'required',
            'total' => 'required',
        ]);

        // Store the data
        PropertyTax::create([
            'property_id' => $request->property_id,
            'street_name' => $request->street_name,
            'year_of_income_construction' => $request->year_of_income_construction,
            'area_in_sqft' => $request->area_in_sqft,
            'area_in_sq_mt' => $request->area_in_sq_mt,
            'open_plot' => $request->open_plot,
            'residence' => $request->residence,
            'builders' => $request->builders,
            'depriciation_rate' => $request->depriciation_rate,
            'weight_use_of_builders' => $request->weight_use_of_builders,
            'tax_rate' => $request->tax_rate,
            'capital_value' => $request->capital_value,
            'home_tax' => $request->home_tax,
            'lamp_tax' => $request->lamp_tax,
            'health_tax' => $request->health_tax,
            'water_tax' => $request->water_tax,
            'total' => $request->total,
        ]);

        // Redirect with success message
        return redirect()->route('admin.propertyTax.create')->with('success', 'Property tax record added successfully.');
    }

    public function details(string $id)
    {
        $propertyTax =  PropertyTax::findOrFail($id);
        return view('admin.pages.property_taxes.property_taxes_details',compact('propertyTax'));
    }

    public function edit(string $id)
    {
        $propertyTax =  PropertyTax::findOrFail($id);
        $properties = Property::get();
        return view('admin.pages.property_taxes.edit',compact('propertyTax','properties'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'property_id' => 'required',
            'street_name' => 'required',
            'year_of_income_construction' => 'required',
            'area_in_sqft' => 'required',
            'area_in_sq_mt' => 'required',
            'open_plot' => 'required',
            'residence' => 'required',
            'builders' => 'required',
            'depriciation_rate' => 'required',
            'weight_use_of_builders' => 'required',
            'capital_value' => 'required',
            'tax_rate' => 'required',
            'home_tax' => 'required',
            'lamp_tax' => 'required',
            'health_tax' => 'required',
            'water_tax' => 'required',
            'total' => 'required',
        ]);

        // Find the existing property tax record by ID
        $propertyTax = PropertyTax::findOrFail($id);

        // Update the record with new data
        $propertyTax->update([
            'property_id' => $request->property_id,
            'street_name' => $request->street_name,
            'year_of_income_construction' => $request->year_of_income_construction,
            'area_in_sqft' => $request->area_in_sqft,
            'area_in_sq_mt' => $request->area_in_sq_mt,
            'open_plot' => $request->open_plot,
            'residence' => $request->residence,
            'builders' => $request->builders,
            'depriciation_rate' => $request->depriciation_rate,
            'weight_use_of_builders' => $request->weight_use_of_builders,
            'tax_rate' => $request->tax_rate,
            'capital_value' => $request->capital_value,
            'home_tax' => $request->home_tax,
            'lamp_tax' => $request->lamp_tax,
            'health_tax' => $request->health_tax,
            'water_tax' => $request->water_tax,
            'total' => $request->total,
        ]);

        // Redirect with success message
        return redirect()->route('admin.propertyTax.list')->with('success', 'Property tax record updated successfully.');
    }

    public function destroy(string $id)
    {
        $propertyTax = PropertyTax::findOrFail($id); // You might want to use findOrFail for safety
        $propertyTax->delete();
        return redirect()->route('admin.propertyTax.list')->with('success', 'Property tax record deleted successfully.');
    }

    public function namunaFormGet()
    {
        try {
            $namunaForm = NamunaForm::first(); // Get the first record or null
            return view('admin.pages.panchayat.namuna-form', compact('namunaForm'));
        } catch (\Exception $e) {
            // Log the error and return a debug-friendly message
            \Log::error('Namuna Form error: ' . $e->getMessage());
            abort(500, 'Something went wrong while loading the form.');
        }
    }
    public function saveNamuna(Request $request)
    {
        
        $request->validate([
            'start_year_before' => 'nullable|integer|min:1900|max:2099',
            'end_year_before' => 'nullable|integer|min:1900|max:2099',
            'start_year_after' => 'nullable|integer|min:1900|max:2099',
            'end_year_after' => 'nullable|integer|min:1900|max:2099',
        ]);
        // dd($request->all());
        if (!empty($request->id)) {
            $namunaForm = NamunaForm::find($request->id);
            if (!$namunaForm) {
                return back()->with('error', 'Form not found.');
            }
            //  dd($request->all());
            $namunaForm->start_year_before = $request->start_year_before;
            $namunaForm->end_year_before = $request->end_year_before;
            $namunaForm->start_year_after = $request->start_year_after;
            $namunaForm->end_year_after = $request->end_year_after;
            
            $namunaForm->save();
            return back()->with('success', 'Namuna Form data update successfully.');
        }else{
            $namunaForm = new NamunaForm();
            $namunaForm->start_year_before = $request->start_year_before;
            $namunaForm->end_year_before = $request->end_year_before;
            $namunaForm->start_year_after = $request->start_year_after;
            $namunaForm->end_year_after = $request->end_year_after;

            $namunaForm->save();
            return back()->with('success', 'Namuna Form data saved successfully.');
        }
        
    }

}

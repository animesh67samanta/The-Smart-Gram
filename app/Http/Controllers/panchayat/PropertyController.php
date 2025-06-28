<?php

namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::guard('admin')->user()->id;
        $properties = Property::where('panchayat_id', $userId) ->orderBy('sequence', 'asc')->get();
        $panchayats = Admin::where('user_type','panchayat')->orderby('id','asc')->find($userId);
        // dd($panchayats);
        return view('panchayat.pages.properties.property_list',compact('properties','panchayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('panchayat.pages.properties.property_create',compact('panchayats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $request->validate([
            'street_name' => 'required|string|max:255',
            'ct_survey_no' => 'required|string|max:100',
            'property_no' => 'required|string|max:50',
            'owner_name' => 'required|string|max:255',
            'property_user_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sequence' => 'nullable|number',
            'year_of_income_construction' => 'required',
            'area_in_sqft' => 'required',
            'area_in_sqmt' => 'required',
        ]);

        // Create the property
        $property = Property::create([
            'panchayat_id' => Auth::guard('admin')->user()->id,
            'street_name' => $request->street_name,
            'street_name_mr' => GoogleTranslate::trans($request->street_name, 'mr'),
            'ct_survey_no' => $request->ct_survey_no,
            'property_no' => $request->property_no,
            'owner_name' => $request->owner_name,
            'owner_name_mr' => GoogleTranslate::trans($request->owner_name, 'mr'),
            'property_user_name' => $request->property_user_name,
            'property_user_name_mr' =>GoogleTranslate::trans($request->property_user_name, 'mr'),
            'description' => $request->description,
            'description_mr' => GoogleTranslate::trans($request->description, 'mr'),
            'house_type' => $request->house_type,
            'year_of_income_construction' => $request->year_of_income_construction,
            'area_in_sqft' => $request->area_in_sqft,
            'area_in_sqmt' => round($request->area_in_sqmt, 2),
            'sequence' => $request->sequence,
        ]);
        // Add `house_type_mr` only if `description` is "House"
        if ($request->description === 'House') {
            $property['house_type_mr'] = GoogleTranslate::trans($request->house_type, 'mr');
        }
        return redirect()->route('panchayat.property.edit', $property->id)
        ->with('success', 'Property created successfully. You can now edit the details.');
    }
// ALTER TABLE `properties` ADD `sequence` BIGINT NULL DEFAULT NULL AFTER `status`, ADD INDEX `sequence` (`sequence`);
    public function uploadCsv(Request $request)
    {
         ini_set('max_execution_time', 3000); // 5 minutes
        ini_set('memory_limit', '556M');
        $request->validate([
            'csv_file' => 'required|file',
        ]);

        $panchayatId = optional(Auth::guard('admin')->user())->id;
        if (!$panchayatId) {
            abort(403, 'Unauthorized');
        }

        $file = $request->file('csv_file');
        $handle = fopen($file, 'r');
        $header = fgetcsv($handle);
        $count = 0;
        while (($data = fgetcsv($handle)) !== false) {
            if (count($header) !== count($data)) {
                continue; // Skip malformed row
            }

            $row = array_combine($header, $data);
            if (!$row) {
                continue;
            }

            try {
                $areaInSqmt = isset($row['area_in_sqft']) ? $row['area_in_sqft'] * 0.092903 : 0;
                // $propertyName = ($row['property_user_name'] ?? '') . ($row['property_no'] ?? '');

                $propertyData = [
                    'panchayat_id' => $panchayatId,
                    'street_name' => $row['street_name'] ?? '',
                    'street_name_mr' => GoogleTranslate::trans($row['street_name'] ?? '', 'mr'),
                    'ct_survey_no' => $row['ct_survey_no'] ?? '',
                    'property_no' => $row['property_no'] ?? '',
                    'owner_name' => $row['owner_name'] ?? '',
                    'owner_name_mr' => GoogleTranslate::trans($row['owner_name'] ?? '', 'mr'),
                    'property_user_name' => $row['property_user_name'] ?? '',
                    'property_user_name_mr' => GoogleTranslate::trans($row['property_user_name'] ?? '', 'mr'),
                    'description' => $row['description'] ?? '',
                    'description_mr' => GoogleTranslate::trans($row['description'] ?? '', 'mr'),
                    'house_type' => $row['house_type'] ?? '',
                    'year_of_income_construction' => $row['year_of_income_construction'] ?? '',
                    'area_in_sqft' => $row['area_in_sqft'] ?? 0,
                    'area_in_sqmt' => round($areaInSqmt, 2),
                    // 'sequence' => $row['sequence'] ?? null,
                    'sequence' => $count,

                ];

                if (strtolower(trim($row['description'] ?? '')) === 'house') {
                    $propertyData['house_type_mr'] = GoogleTranslate::trans($row['house_type'] ?? '', 'mr');
                }
               $count++;
                Property::create($propertyData);
            } catch (\Exception $e) {
                \Log::error('CSV row import failed: ' . $e->getMessage(), ['row' => $row]);
                continue;
            }
        }
        // return $propertyData;
        fclose($handle);

        return redirect()->back()->with('success', 'CSV uploaded and properties imported successfully.');
    }
  
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('panchayat.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        $panchayats = Admin::where('user_type','panchayat')->get();
        // dd($property);
        return view('panchayat.pages.properties.property_edit', compact('property','panchayats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'street_name' => 'required|string|max:255',
            'ct_survey_no' => 'required|string|max:100',
            'property_no' => 'required|string|max:50',
            'owner_name' => 'required|string|max:255',
            'property_user_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'house_type' => 'required|string|max:100',
            'year_of_income_construction' => 'required',
            'area_in_sqft' => 'required',
            'area_in_sqmt' => 'required',
        ]);

        // Find the property by ID
        $property = Property::findOrFail($id);
        // GoogleTranslate::trans($row['house_type'], 'mr');
        // Update the property attributes
        $property->update([
            'street_name' => $request->street_name,
            'street_name_mr' => $request->street_name_mr,
            'ct_survey_no' => $request->ct_survey_no,
            'property_no' => $request->property_no,
            'owner_name' => $request->owner_name,
            'owner_name_mr' => $request->owner_name_mr, 
            'property_user_name' => $request->property_user_name,
            'property_user_name_mr' => $request->property_user_name_mr, 
            'description' => $request->description,
            'description_mr' => $request->description_mr, 
            'house_type' => $request->house_type,
            'house_type_mr' => $request->house_type_mr,  
            'year_of_income_construction' => $request->year_of_income_construction,
            'area_in_sqft' => $request->area_in_sqft,
            'area_in_sqmt' => round($request->area_in_sqmt, 2),
            // 'property_name' => $request->property_user_name . $request->property_no,
        ]);

        return redirect()->route('panchayat.property.list')->with('success', 'Property updated successfully.');
    }
    public function viewDeatils(string $id)
    {
        $property = Property::findOrFail($id);
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('panchayat.pages.properties.property_details', compact('property','panchayats'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id); // You might want to use findOrFail for safety
        $property->delete();
        return redirect()->route('panchayat.property.list')->with('success', 'Property deleted successfully.');
    }

    
}

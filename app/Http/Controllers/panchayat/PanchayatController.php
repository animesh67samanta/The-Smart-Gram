<?php

namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\PanchayatTax;
use DB;
class PanchayatController extends Controller
{
    public function create(){
        return view('admin.pages.panchayat.panchayat_create');
    }

    public function register(Request $request){
        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' ensures the password matches confirm_password
        ]);

        // Create the Panchayat user and store it in the 'admin' table
        $panchayat = Admin::create([
            'name' => $request->name,
            'name_mr' =>  GoogleTranslate::trans($request->name, 'mr'),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_mr' =>  GoogleTranslate::trans($request->address, 'mr'),
            'password' => Hash::make($request->password),
            'user_type' => 'panchayat',
        ]);
        return redirect()->route('admin.panchayat.edit', $panchayat->id)->with('success', 'Panchayat created successfully. You can now edit the details.');

    }
    public function edit($id){
       $panchayat = Admin::findOrFail($id);
       return view('admin.pages.panchayat.panchayat_edit', compact('panchayat'));
    }
    // public function update(Request $request, $id)
    // {
    //     //dd($request->all());
    //     // Define validation rules
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255',
    //         'phone' => 'required',
    //         'address' => 'required',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     // Find the property by ID
    //     $admin = Admin::findOrFail($id);

    //     // Update the property attributes
    //     $admin->update([
    //         'name' => $request->name,
    //         'name_mr' => GoogleTranslate::trans($request->name, 'mr'),
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'address_mr' =>  $request->address_mr,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('admin.panchayat.list')->with('success', 'Panchayat updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            
        ]);
        // dd($request->all());   //ससा
        $admin = Admin::findOrFail($id);

        $admin->name = $request->name;
        $admin->name_mr = $request->name_mr;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->address_mr = $request->address_mr;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        
        // $admin->user_type = 'panchayat'; 

        $admin->save();

        return redirect()->route('admin.panchayat.list')->with('success', 'Panchayat updated successfully.');
    }
    public function list(){
        $panchayats = Admin::where('user_type','panchayat')->get();
        return view('admin.pages.panchayat.panchayat_list',compact('panchayats'));
    }

    // Tax Rates List
    public function listTax()
    {
        $panchayatTaxes = DB::table('panchayat_taxes')
            ->join('admins', 'panchayat_taxes.panchayat_id', '=', 'admins.id')
            ->select(
                'panchayat_taxes.*',
                'admins.name as panchayat_name'
            )
            ->get();
           
        return view('admin.pages.panchayat.panchayat_tax_list', compact('panchayatTaxes'));
    }

    // createTax
    public function createTax(){
        $panchayats = Admin::select('id','name')->where('user_type','panchayat')->get();
        // dd($panchayats);
        return view('admin.pages.panchayat.panchayat_tax_create',compact('panchayats'));
    }


  
    public function registerTax(Request $request)
    {
        $validated = $request->validate([
            'panchayat_id' => [
                'required',
                'exists:admins,id',
                Rule::unique('panchayat_taxes')->where(function ($query) {
                    return $query->whereNotNull('panchayat_id');
                }),
            ],

            // RCC
            'rcc_open_plot_readireckoner_rate' => 'nullable|numeric',
            'rcc_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'rcc_depreciation_rate' => 'nullable|numeric',
            'rcc_usage_rate' => 'nullable|numeric',
            'rcc_tax_rate' => 'nullable|numeric',
            'rcc_health_tax' => 'nullable|numeric',
            'rcc_lamp_tax' => 'nullable|numeric',
            'rcc_water_tax' => 'nullable|numeric',

            // Flat
            'flat_open_plot_readireckoner_rate' => 'nullable|numeric',
            'flat_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'flat_depreciation_rate' => 'nullable|numeric',
            'flat_usage_rate' => 'nullable|numeric',
            'flat_tax_rate' => 'nullable|numeric',
            'flat_health_tax' => 'nullable|numeric',
            'flat_lamp_tax' => 'nullable|numeric',
            'flat_water_tax' => 'nullable|numeric',

            // Mud Brick
            'mud_brick_open_plot_readireckoner_rate' => 'nullable|numeric',
            'mud_brick_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'mud_brick_depreciation_rate' => 'nullable|numeric',
            'mud_brick_usage_rate' => 'nullable|numeric',
            'mud_brick_tax_rate' => 'nullable|numeric',
            'mud_brick_health_tax' => 'nullable|numeric',
            'mud_brick_lamp_tax' => 'nullable|numeric',
            'mud_brick_water_tax' => 'nullable|numeric',

            // Sticks
            'sticks_open_plot_readireckoner_rate' => 'nullable|numeric',
            'sticks_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'sticks_depreciation_rate' => 'nullable|numeric',
            'sticks_usage_rate' => 'nullable|numeric',
            'sticks_tax_rate' => 'nullable|numeric',
            'sticks_health_tax' => 'nullable|numeric',
            'sticks_lamp_tax' => 'nullable|numeric',
            'sticks_water_tax' => 'nullable|numeric',

            // Commercial
            'commercial_open_plot_readireckoner_rate' => 'nullable|numeric',
            'commercial_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'commercial_depreciation_rate' => 'nullable|numeric',
            'commercial_usage_rate' => 'nullable|numeric',
            'commercial_tax_rate' => 'nullable|numeric',
            'commercial_health_tax' => 'nullable|numeric',
            'commercial_lamp_tax' => 'nullable|numeric',
            'commercial_water_tax' => 'nullable|numeric',

            // MIDC
            'midc_open_plot_readireckoner_rate' => 'nullable|numeric',
            'midc_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'midc_depreciation_rate' => 'nullable|numeric',
            'midc_usage_rate' => 'nullable|numeric',
            'midc_tax_rate' => 'nullable|numeric',
            'midc_health_tax' => 'nullable|numeric',
            'midc_lamp_tax' => 'nullable|numeric',
            'midc_water_tax' => 'nullable|numeric',

            // Open Plot
            'open_plot_readireckoner_rate' => 'nullable|numeric',
            'open_plot_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'open_plot_depreciation_rate' => 'nullable|numeric',
            'open_plot_usage_rate' => 'nullable|numeric',
            'open_plot_tax_rate' => 'nullable|numeric',

            // Special
            'special_tax' => 'nullable|string',
            'special_tax_rate' => 'nullable|numeric',
        ]);

        // Translate special tax to Marathi
        $specialTaxMr = null;
        if (!empty($validated['special_tax'])) {
            try {
                $specialTaxMr = GoogleTranslate::trans($validated['special_tax'], 'mr');
            } catch (\Exception $e) {
                $specialTaxMr = null;
            }
        }

        // Insert into DB
        DB::table('panchayat_taxes')->insert([
            'panchayat_id' => $validated['panchayat_id'],
            
            // RCC
            'rcc_open_plot_readireckoner_rate' => $validated['rcc_open_plot_readireckoner_rate'] ?? null,
            'rcc_builtup_area_readireckoner_rate' => $validated['rcc_builtup_area_readireckoner_rate'] ?? null,
            'rcc_depreciation_rate' => $validated['rcc_depreciation_rate'] ?? null,
            'rcc_usage_rate' => $validated['rcc_usage_rate'] ?? null,
            'rcc_tax_rate' => $validated['rcc_tax_rate'] ?? null,
            'rcc_health_tax' => $validated['rcc_health_tax'] ?? null,
            'rcc_lamp_tax' => $validated['rcc_lamp_tax'] ?? null,
            'rcc_water_tax' => $validated['rcc_water_tax'] ?? null,

            // Flat
            'flat_open_plot_readireckoner_rate' => $validated['flat_open_plot_readireckoner_rate'] ?? null,
            'flat_builtup_area_readireckoner_rate' => $validated['flat_builtup_area_readireckoner_rate'] ?? null,
            'flat_depreciation_rate' => $validated['flat_depreciation_rate'] ?? null,
            'flat_usage_rate' => $validated['flat_usage_rate'] ?? null,
            'flat_tax_rate' => $validated['flat_tax_rate'] ?? null,
            'flat_health_tax' => $validated['flat_health_tax'] ?? null,
            'flat_lamp_tax' => $validated['flat_lamp_tax'] ?? null,
            'flat_water_tax' => $validated['flat_water_tax'] ?? null,

            // Mud Brick
            'mud_brick_open_plot_readireckoner_rate' => $validated['mud_brick_open_plot_readireckoner_rate'] ?? null,
            'mud_brick_builtup_area_readireckoner_rate' => $validated['mud_brick_builtup_area_readireckoner_rate'] ?? null,
            'mud_brick_depreciation_rate' => $validated['mud_brick_depreciation_rate'] ?? null,
            'mud_brick_usage_rate' => $validated['mud_brick_usage_rate'] ?? null,
            'mud_brick_tax_rate' => $validated['mud_brick_tax_rate'] ?? null,
            'mud_brick_health_tax' => $validated['mud_brick_health_tax'] ?? null,
            'mud_brick_lamp_tax' => $validated['mud_brick_lamp_tax'] ?? null,
            'mud_brick_water_tax' => $validated['mud_brick_water_tax'] ?? null,

            // Sticks
            'sticks_open_plot_readireckoner_rate' => $validated['sticks_open_plot_readireckoner_rate'] ?? null,
            'sticks_builtup_area_readireckoner_rate' => $validated['sticks_builtup_area_readireckoner_rate'] ?? null,
            'sticks_depreciation_rate' => $validated['sticks_depreciation_rate'] ?? null,
            'sticks_usage_rate' => $validated['sticks_usage_rate'] ?? null,
            'sticks_tax_rate' => $validated['sticks_tax_rate'] ?? null,
            'sticks_health_tax' => $validated['sticks_health_tax'] ?? null,
            'sticks_lamp_tax' => $validated['sticks_lamp_tax'] ?? null,
            'sticks_water_tax' => $validated['sticks_water_tax'] ?? null,

            // Commercial
            'commercial_open_plot_readireckoner_rate' => $validated['commercial_open_plot_readireckoner_rate'] ?? null,
            'commercial_builtup_area_readireckoner_rate' => $validated['commercial_builtup_area_readireckoner_rate'] ?? null,
            'commercial_depreciation_rate' => $validated['commercial_depreciation_rate'] ?? null,
            'commercial_usage_rate' => $validated['commercial_usage_rate'] ?? null,
            'commercial_tax_rate' => $validated['commercial_tax_rate'] ?? null,
            'commercial_health_tax' => $validated['commercial_health_tax'] ?? null,
            'commercial_lamp_tax' => $validated['commercial_lamp_tax'] ?? null,
            'commercial_water_tax' => $validated['commercial_water_tax'] ?? null,

            // MIDC
            'midc_open_plot_readireckoner_rate' => $validated['midc_open_plot_readireckoner_rate'] ?? null,
            'midc_builtup_area_readireckoner_rate' => $validated['midc_builtup_area_readireckoner_rate'] ?? null,
            'midc_depreciation_rate' => $validated['midc_depreciation_rate'] ?? null,
            'midc_usage_rate' => $validated['midc_usage_rate'] ?? null,
            'midc_tax_rate' => $validated['midc_tax_rate'] ?? null,
            'midc_health_tax' => $validated['midc_health_tax'] ?? null,
            'midc_lamp_tax' => $validated['midc_lamp_tax'] ?? null,
            'midc_water_tax' => $validated['midc_water_tax'] ?? null,

            // Open Plot
            'open_plot_readireckoner_rate' => $validated['open_plot_readireckoner_rate'] ?? null,
            'open_plot_builtup_area_readireckoner_rate' => $validated['open_plot_builtup_area_readireckoner_rate'] ?? null,
            'open_plot_depreciation_rate' => $validated['open_plot_depreciation_rate'] ?? null,
            'open_plot_usage_rate' => $validated['open_plot_usage_rate'] ?? null,
            'open_plot_tax_rate' => $validated['open_plot_tax_rate'] ?? null,

            // Special
            'special_tax' => $validated['special_tax'] ?? null,
            'special_tax_mr' => $specialTaxMr,
            'special_tax_rate' => $validated['special_tax_rate'] ?? null,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.panchayat.tax.create')->with('success', 'Panchayat Tax added successfully.');
    }


    public function editTax($id){
        
        $panchayatTaxes = DB::table('panchayat_taxes')
        ->join('admins', 'panchayat_taxes.panchayat_id', '=', 'admins.id')
        ->select(
            'panchayat_taxes.*',
            'admins.name as panchayat_name'
        )
        ->where('panchayat_taxes.id', $id)
        ->first(); 
    
        return view('admin.pages.panchayat.panchayat_tax_edit', compact('panchayatTaxes'));
    }
    public function updateTax(Request $request, $id)
    {
        $validated = $request->validate([
            // RCC fields
            'rcc_open_plot_readireckoner_rate' => 'nullable|numeric',
            'rcc_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'rcc_depreciation_rate' => 'nullable|numeric',
            'rcc_usage_rate' => 'nullable|numeric',
            'rcc_tax_rate' => 'nullable|numeric',
            'rcc_health_tax' => 'nullable|numeric',
            'rcc_lamp_tax' => 'nullable|numeric',
            'rcc_water_tax' => 'nullable|numeric',
            // Flat fields
            'flat_open_plot_readireckoner_rate' => 'nullable|numeric',
            'flat_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'flat_depreciation_rate' => 'nullable|numeric',
            'flat_usage_rate' => 'nullable|numeric',
            'flat_tax_rate' => 'nullable|numeric',
            'flat_health_tax' => 'nullable|numeric',
            'flat_lamp_tax' => 'nullable|numeric',
            'flat_water_tax' => 'nullable|numeric',
            // Mud Brick House fields
            'mud_brick_open_plot_readireckoner_rate' => 'nullable|numeric',
            'mud_brick_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'mud_brick_depreciation_rate' => 'nullable|numeric',
            'mud_brick_usage_rate' => 'nullable|numeric',
            'mud_brick_tax_rate' => 'nullable|numeric',
            'mud_brick_health_tax' => 'nullable|numeric',
            'mud_brick_lamp_tax' => 'nullable|numeric',
            'mud_brick_water_tax' => 'nullable|numeric',
            // House of Sticks fields
            'sticks_open_plot_readireckoner_rate' => 'nullable|numeric',
            'sticks_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'sticks_depreciation_rate' => 'nullable|numeric',
            'sticks_usage_rate' => 'nullable|numeric',
            'sticks_tax_rate' => 'nullable|numeric',
            'sticks_health_tax' => 'nullable|numeric',
            'sticks_lamp_tax' => 'nullable|numeric',
            'sticks_water_tax' => 'nullable|numeric',
            // Commercial fields
            'commercial_open_plot_readireckoner_rate' => 'nullable|numeric',
            'commercial_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'commercial_depreciation_rate' => 'nullable|numeric',
            'commercial_usage_rate' => 'nullable|numeric',
            'commercial_tax_rate' => 'nullable|numeric',
            'commercial_health_tax' => 'nullable|numeric',
            'commercial_lamp_tax' => 'nullable|numeric',
            'commercial_water_tax' => 'nullable|numeric',
            // MIDC fields
            'midc_open_plot_readireckoner_rate' => 'nullable|numeric',
            'midc_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'midc_depreciation_rate' => 'nullable|numeric',
            'midc_usage_rate' => 'nullable|numeric',
            'midc_tax_rate' => 'nullable|numeric',
            'midc_health_tax' => 'nullable|numeric',
            'midc_lamp_tax' => 'nullable|numeric',
            'midc_water_tax' => 'nullable|numeric',
            
            // Open Plot
            'open_plot_readireckoner_rate' => 'nullable|numeric',
            'open_plot_builtup_area_readireckoner_rate' => 'nullable|numeric',
            'open_plot_depreciation_rate' => 'nullable|numeric',
            'open_plot_usage_rate' => 'nullable|numeric',
            'open_plot_tax_rate' => 'nullable|numeric',

            // Special
            'special_tax' => 'nullable|string',
            'special_tax_mr' => 'nullable|string',
            'special_tax_rate' => 'nullable|numeric',
        ]);
        // dd($request->all());
        DB::table('panchayat_taxes')->where('id', $id)->update(array_merge(
            $validated,
            ['updated_at' => now()]
        ));
    
        $updatedTax = DB::table('panchayat_taxes')->where('id', $id)->first();
    
        return redirect()->route('admin.panchayat.tax.edit', $id)
            ->with('panchayatTaxes', $updatedTax)
            ->with('success', 'Panchayat Tax updated successfully.');
    }
    
}

<?php
namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Models\HealthTax;
use App\Models\HomeTax;
use App\Models\LampTax;
use App\Models\NamunaForm;
use App\Models\Penalty;
use App\Models\Property;
use App\Models\TransectionHistory;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TaxCalculationController extends Controller
{

    public function hometaxList()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $uniquePropertyIds = Property::has('hometax')->select('id')->where('panchayat_id', $panchayatId)
            ->distinct()->get()->toArray();
            // ->pluck('property_id');
                //   dd($uniquePropertyIds);
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;
    
        $allResponsiveData = [];
        
        
        
       
        foreach ($uniquePropertyIds as $property) {
            //  dd();
            $homeTaxes = HomeTax::with('property')
                ->where('property_id', $property['id'])
                ->where('year', $currentYear)
                # ->where('home_taxes.panchayat_id', $panchayatId)
                ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
                ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
                ->select(
                    'home_taxes.*',
                    'home_taxes.id as homeTaxId',
                    'admins.name as panchayat_name',
                    'admins.name_mr as panchayat_name_mr',
                    'admins.address as panchayat_address',
                    'admins.address_mr as panchayat_address_mr',
                    'panchayat_taxes.*'
                )
                ->orderBy('home_taxes.id', 'desc')
                ->get()
                ->map(function ($details) {
                    $property = $details->property;

                    $open_plot_readireckoner_rate = null;
                    $builtup_area_readireckoner_rate = null;
                    $depreciation = null;
                    $usage_rate = null;
                    $home_tax_rate = null;
                    $health_tax_rate = null;
                    $lamp_tax_rate = null;
                    $water_tax_rate = null;

                    if ($property) {
                        if ($property->description === 'House' && $property->house_type === 'RCC') {
                            $open_plot_readireckoner_rate = $details->rcc_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->rcc_builtup_area_readireckoner_rate;
                            $depreciation = $details->rcc_depreciation_rate;
                            $usage_rate = $details->rcc_usage_rate;
                            $home_tax_rate = $details->rcc_tax_rate;
                            $health_tax_rate = $details->rcc_health_tax;
                            $lamp_tax_rate = $details->rcc_lamp_tax;
                            $water_tax_rate = $details->rcc_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'Flat') {
                            $open_plot_readireckoner_rate = $details->flat_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->flat_builtup_area_readireckoner_rate;
                            $depreciation = $details->flat_depreciation_rate;
                            $usage_rate = $details->flat_usage_rate;
                            $home_tax_rate = $details->flat_tax_rate;
                            $health_tax_rate = $details->flat_health_tax;
                            $lamp_tax_rate = $details->flat_lamp_tax;
                            $water_tax_rate = $details->flat_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'Mud brick house') {
                            $open_plot_readireckoner_rate = $details->mud_brick_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->mud_brick_builtup_area_readireckoner_rate;
                            $depreciation = $details->mud_brick_depreciation_rate;
                            $usage_rate = $details->mud_brick_usage_rate;
                            $home_tax_rate = $details->mud_brick_tax_rate;
                            $health_tax_rate = $details->mud_brick_health_tax;
                            $lamp_tax_rate = $details->mud_brick_lamp_tax;
                            $water_tax_rate = $details->mud_brick_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'House of sticks') {
                            $open_plot_readireckoner_rate = $details->sticks_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->sticks_builtup_area_readireckoner_rate;
                            $depreciation = $details->sticks_depreciation_rate;
                            $usage_rate = $details->sticks_usage_rate;
                            $home_tax_rate = $details->sticks_tax_rate;
                            $health_tax_rate = $details->sticks_health_tax;
                            $lamp_tax_rate = $details->sticks_lamp_tax;
                            $water_tax_rate = $details->sticks_water_tax;
                        } elseif ($property->description === 'MIDC') {
                            $open_plot_readireckoner_rate = $details->midc_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->midc_builtup_area_readireckoner_rate;
                            $depreciation = $details->midc_depreciation_rate;
                            $usage_rate = $details->midc_usage_rate;
                            $home_tax_rate = $details->midc_tax_rate;
                            $health_tax_rate = $details->midc_health_tax;
                            $lamp_tax_rate = $details->midc_lamp_tax;
                            $water_tax_rate = $details->midc_water_tax;
                        } elseif ($property->description === 'Commercial') {
                            $open_plot_readireckoner_rate = $details->commercial_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->commercial_builtup_area_readireckoner_rate;
                            $depreciation = $details->commercial_depreciation_rate;
                            $usage_rate = $details->commercial_usage_rate;
                            $home_tax_rate = $details->commercial_tax_rate;
                            $health_tax_rate = $details->commercial_health_tax;
                            $lamp_tax_rate = $details->commercial_lamp_tax;
                            $water_tax_rate = $details->commercial_water_tax;
                        }
                        elseif ($property->description == "Open plot") {
                            $open_plot_readireckoner_rate = $details->open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->open_plot_builtup_area_readireckoner_rate;
                            $depreciation = $details->open_plot_depreciation_rate;
                            $usage_rate = $details->open_plot_usage_rate;
                            $home_tax_rate = $details->open_plot_tax_rate;
                        }
                    }

                    $details->open_plot_readireckoner_rate = $open_plot_readireckoner_rate;
                    $details->builtup_area_readireckoner_rate = $builtup_area_readireckoner_rate;
                    $details->depreciation = $depreciation;
                    $details->usage_rate = $usage_rate;
                    $details->home_tax_rate = $home_tax_rate;
                    $details->health_tax_rate = $health_tax_rate;
                    $details->lamp_tax_rate = $lamp_tax_rate;
                    $details->water_tax_rate = $water_tax_rate;

                    return $details;
                });

            $homeTaxes = $homeTaxes->first();
          
            $previousYearTax = HomeTax::where('property_id', $property['id'])
            ->where('year', $previousYear)->where('panchayat_id', $panchayatId)->get()->toArray();
            
            if(empty($homeTaxes)){
                return redirect()->back()->with(['message'=>'selected year data not found'])->withInput();
            }
        
            $squareMeter = $homeTaxes->property->area_in_sqmt;
            $open_plot_readireckoner_rate = $homeTaxes->open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $homeTaxes->builtup_area_readireckoner_rate;
            $depreciation = $homeTaxes->depreciation;
            $usage_rate = $homeTaxes->usage_rate;
            $home_tax_rate = $homeTaxes->home_tax_rate;

            // Calculate Capital Value
            $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
            (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

            // Calculate home tax
            $homeTax = (($capitalValue / 1000) * $home_tax_rate);

            // Get Total Tax including additional fixed taxes
            if ($homeTaxes->property->description == "Open plot") {
                $getTotalTax = $homeTax;
            }else{
                $getTotalTax = $homeTax +
                ($homeTaxes->health_tax_rate ?? 0) +
                ($homeTaxes->lamp_tax_rate ?? 0) +
                ($homeTaxes->water_tax_rate ?? 0) +
                ($homeTaxes->special_tax_rate ?? 0);
            }
             //dd($homeTaxes);
            $responseData = [
                'property_no' => $homeTaxes->property->property_no,
                'property_user_name' => $homeTaxes->property->property_user_name,
                'area_in_sqmt' => $homeTaxes->property->area_in_sqmt,
                'house_type' => $homeTaxes->property->house_type,
                'owner_name_mr' => $homeTaxes->property->owner_name_mr,
                'owner_name' => $homeTaxes->property->owner_name,
                'description' => $homeTaxes->property->description,
                'id' => $homeTaxes->homeTaxId,
                'year' => $homeTaxes->year,
                'calculated_home_tax' => $homeTaxes->calculated_home_tax ?? 0.00,
                'home_pay_tax_amount' => $homeTaxes->home_pay_tax_amount ?? 0.00,
                'home_due_tax_amount' => $homeTaxes->home_due_tax_amount ?? 0.00,
                'tax_discount' => $homeTaxes->tax_discount ?? 0.00,
                'tax_penalty' => $homeTaxes->tax_penalty ?? 0.00,
                'property_id' => $homeTaxes->property_id,
                'panchayat_id' => $homeTaxes->panchayat_id,
                'panchayat_name' => $homeTaxes->panchayat_name,
                'panchayat_name_mr' => $homeTaxes->panchayat_name_mr,
                'panchayat_address' => $homeTaxes->panchayat_address,
                'panchayat_address_mr' => $homeTaxes->panchayat_address_mr,
                'special_tax' => $homeTaxes->special_tax ?? 0.00,
                'special_tax_mr' => $homeTaxes->special_tax_mr ?? 0.00,
                'special_tax_rate' => $homeTaxes->special_tax_rate ?? 0.00,
                'open_plot_readireckoner_rate' => $homeTaxes->open_plot_readireckoner_rate ?? 0.00,
                'builtup_area_readireckoner_rate' => $homeTaxes->builtup_area_readireckoner_rate ?? 0.00,
                'depreciation' => $homeTaxes->depreciation ?? 0.00,
                'usage_rate' => $homeTaxes->usage_rate ?? 0.00,
                'home_tax_rate' => $homeTaxes->home_tax_rate ?? 0.00,
                'health_tax_rate' => $homeTaxes->health_tax_rate ?? 0.00,
                'lamp_tax_rate' => $homeTaxes->lamp_tax_rate ?? 0.00,
                'water_tax_rate' => $homeTaxes->water_tax_rate ?? 0.00,
                'capital_value' => round($capitalValue, 0, 2) ?? 0.00,
                'home_tax' => round($homeTax, 0, 2) ?? 0.00,
                'total_tax_amount' => round($getTotalTax, 0, 2) ?? 0.00 ,
                'previous_calculated_home_tax' => round(($previousYearTax[0]['calculated_home_tax'] ?? 0), 2),
                'previous_home_pay_tax_amount' => round(($previousYearTax[0]['home_pay_tax_amount'] ?? 0), 2),
                'previous_home_due_tax_amount' => round(($previousYearTax[0]['home_due_tax_amount'] ?? 0), 2),
                'previous_tax_discount' => round(($previousYearTax[0]['tax_discount'] ?? 0), 2),
                'previous_tax_penalty' => round(($previousYearTax[0]['tax_penalty'] ?? 0), 2),
                'total_paid_amount' => ($previousYearTax[0]['home_pay_tax_amount'] ?? 0 + $homeTaxes->home_pay_tax_amount ?? 0),
                'total_due_amount' => ($previousYearTax[0]['calculated_home_tax'] ?? 0 + $homeTaxes->calculated_home_tax ?? 0) - ($previousYearTax[0]['home_pay_tax_amount'] ?? 0 + $homeTaxes->home_pay_tax_amount ?? 0),
                'total_calculate_tax' => $previousYearTax[0]['calculated_home_tax'] ?? 0 + $homeTaxes->calculated_home_tax ??0,
                
                
            ];
            
            // Push the current property's data into the allResponsiveData array
            $allResponsiveData[] = $responseData;
        }
            //dd($allResponsiveData);
       
       
        return view('panchayat.pages.hometax.index', compact('allResponsiveData'));
    }


    // Create - Show form for creating a new record
    public function hometaxCreate()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->orderBy('sequence', 'asc') ->get();
        
        return view('panchayat.pages.hometax.create', compact('properties'));
    }

    // Store - Save the new home tax record
    public function hometaxStore(Request $request)
    {
        //dd($request->all());
        // Validate the request
        $request->validate([
            'year'                            => 'required',
            'property_id'                     => 'required',
        ]);
        // Check if bill already generated
        $existingHomeTax = HomeTax::where('property_id', $request->property_id)
        ->where('year', $request->year)
        ->first();
        if ($existingHomeTax) {
        return back()->with('error', 'Bill already generated for this property and year.');
        }

        // Fetch the property based on the selected property_id
        $property    = Property::findOrFail($request->property_id);
         
        $squareMeter = $property->area_in_sqmt;
        $panchayatTaxes = DB::table('panchayat_taxes')->where('panchayat_id', Auth::guard('panchayat')->user()->id)->first();
       
        if ($property->description == "House" && $property->house_type == "RCC") {
            $open_plot_readireckoner_rate = $panchayatTaxes->rcc_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->rcc_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->rcc_depreciation_rate;
            $usage_rate = $panchayatTaxes->rcc_usage_rate;
            $home_tax_rate = $panchayatTaxes->rcc_tax_rate;
            $health_tax_rate = $panchayatTaxes->rcc_health_tax;
            $lamp_tax_rate = $panchayatTaxes->rcc_lamp_tax;
            $water_tax_rate = $panchayatTaxes->rcc_water_tax;

        }
        elseif ($property->description == "House" && $property->house_type == "Flat") {
            $open_plot_readireckoner_rate = $panchayatTaxes->flat_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->flat_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->flat_depreciation_rate;
            $usage_rate = $panchayatTaxes->flat_usage_rate;
            $home_tax_rate = $panchayatTaxes->flat_tax_rate;
            $health_tax_rate = $panchayatTaxes->flat_health_tax;
            $lamp_tax_rate = $panchayatTaxes->flat_lamp_tax;
            $water_tax_rate = $panchayatTaxes->flat_water_tax;
        }
        elseif ($property->description == "House" && $property->house_type == "Mud brick house") {
            $open_plot_readireckoner_rate = $panchayatTaxes->mud_brick_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->mud_brick_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->mud_brick_depreciation_rate;
            $usage_rate = $panchayatTaxes->mud_brick_usage_rate;
            $home_tax_rate = $panchayatTaxes->mud_brick_tax_rate;
            $health_tax_rate = $panchayatTaxes->mud_brick_health_tax;
            $lamp_tax_rate = $panchayatTaxes->mud_brick_lamp_tax;
            $water_tax_rate = $panchayatTaxes->mud_brick_water_tax;
        }
        elseif ($property->description == "House" && $property->house_type == "House of sticks") {
            $open_plot_readireckoner_rate = $panchayatTaxes->sticks_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->sticks_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->sticks_depreciation_rate;
            $usage_rate = $panchayatTaxes->sticks_usage_rate;
            $home_tax_rate = $panchayatTaxes->sticks_tax_rate;
            $health_tax_rate = $panchayatTaxes->sticks_health_tax;
            $lamp_tax_rate = $panchayatTaxes->sticks_lamp_tax;
            $water_tax_rate = $panchayatTaxes->sticks_water_tax;
        }
        elseif ($property->description == "MIDC") {
            $open_plot_readireckoner_rate = $panchayatTaxes->midc_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->midc_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->midc_depreciation_rate;
            $usage_rate = $panchayatTaxes->midc_usage_rate;
            $home_tax_rate = $panchayatTaxes->midc_tax_rate;
            $health_tax_rate = $panchayatTaxes->midc_health_tax;
            $lamp_tax_rate = $panchayatTaxes->midc_lamp_tax;
            $water_tax_rate = $panchayatTaxes->midc_water_tax;
        }
        elseif ($property->description == "Commercial") {
            $open_plot_readireckoner_rate = $panchayatTaxes->commercial_open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->commercial_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->commercial_depreciation_rate;
            $usage_rate = $panchayatTaxes->commercial_usage_rate;
            $home_tax_rate = $panchayatTaxes->commercial_tax_rate;
            $health_tax_rate = $panchayatTaxes->commercial_health_tax;
            $lamp_tax_rate = $panchayatTaxes->commercial_lamp_tax;
            $water_tax_rate = $panchayatTaxes->commercial_water_tax;
        }
        elseif ($property->description == "Open plot") {
            $open_plot_readireckoner_rate = $panchayatTaxes->open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $panchayatTaxes->open_plot_builtup_area_readireckoner_rate;
            $depreciation = $panchayatTaxes->open_plot_depreciation_rate;
            $usage_rate = $panchayatTaxes->open_plot_usage_rate;
            $home_tax_rate = $panchayatTaxes->open_plot_tax_rate;
        }
        else {
            return back()->with('error', 'Unsupported property description or house type. Please check the property details.');
        }

        // Calculate Capital Value
        $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
            (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

        // Calculate home tax
        $homeTax = (($capitalValue / 1000) * $home_tax_rate);

        // Get Total Tax including additional fixed taxes
        if ($property->description == "Open plot") {
            $getTotalTax = $homeTax;
        }else{
            $getTotalTax = $homeTax +
            ($health_tax_rate ?? 0) +
            ($lamp_tax_rate ?? 0) +
            ($water_tax_rate ?? 0) +
            ($panchayatTaxes->special_tax_rate ?? 0);
        }
        $TotalTax = round($getTotalTax);
        
       
        // Insert data into the database including the calculated home tax
        $homeTax = HomeTax::create([

            'panchayat_id'                    => Auth::guard('panchayat')->user()->id,
            'property_id'                     => $request->property_id,
            'year'                            => $request->year,
            'calculated_home_tax'             => $TotalTax, 
            
        ]); 

        return redirect()->route('panchayat.hometaxes.details', $homeTax->id)->with('success', 'Home tax record created successfully.');
    }

    public function homeTaxCalculationDetails($id)
    {
        $details = HomeTax::with('property')
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->where('home_taxes.id', $id)
            ->select(
                'home_taxes.*',
                'admins.name as panchayat_name',
                'panchayat_taxes.*'
            )
            ->first();

            $property = $details->property;
            $panchayatTaxes = $details; 
            
            $open_plot_readireckoner_rate = null;
            $builtup_area_readireckoner_rate = null;
            $depreciation = null;
            $usage_rate = null;
            $home_tax_rate = null;
            $health_tax_rate = null;
            $lamp_tax_rate = null;
            $water_tax_rate = null;

            if ($property->description == 'House' && $property->house_type == 'RCC') {
                $open_plot_readireckoner_rate = $panchayatTaxes->rcc_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->rcc_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->rcc_depreciation_rate;
                $usage_rate = $panchayatTaxes->rcc_usage_rate;
                $home_tax_rate = $panchayatTaxes->rcc_tax_rate;
                $health_tax_rate = $panchayatTaxes->rcc_health_tax;
                $lamp_tax_rate = $panchayatTaxes->rcc_lamp_tax;
                $water_tax_rate = $panchayatTaxes->rcc_water_tax;
            }
            elseif ($property->description == 'House' && $property->house_type == 'Flat') {
                $open_plot_readireckoner_rate = $panchayatTaxes->flat_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->flat_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->flat_depreciation_rate;
                $usage_rate = $panchayatTaxes->flat_usage_rate;
                $home_tax_rate = $panchayatTaxes->flat_tax_rate;
                $health_tax_rate = $panchayatTaxes->flat_health_tax;
                $lamp_tax_rate = $panchayatTaxes->flat_lamp_tax;
                $water_tax_rate = $panchayatTaxes->flat_water_tax;
            }
            elseif ($property->description == 'House' && $property->house_type == 'Mud brick house') {
                $open_plot_readireckoner_rate = $panchayatTaxes->mud_brick_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->mud_brick_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->mud_brick_depreciation_rate;
                $usage_rate = $panchayatTaxes->mud_brick_usage_rate;
                $home_tax_rate = $panchayatTaxes->mud_brick_tax_rate;
                $health_tax_rate = $panchayatTaxes->mud_brick_health_tax;
                $lamp_tax_rate = $panchayatTaxes->mud_brick_lamp_tax;
                $water_tax_rate = $panchayatTaxes->mud_brick_water_tax;
            }
            elseif ($property->description == 'House' && $property->house_type == 'House of sticks') {
                $open_plot_readireckoner_rate = $panchayatTaxes->sticks_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->sticks_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->sticks_depreciation_rate;
                $usage_rate = $panchayatTaxes->sticks_usage_rate;
                $home_tax_rate = $panchayatTaxes->sticks_tax_rate;
                $health_tax_rate = $panchayatTaxes->sticks_health_tax;
                $lamp_tax_rate = $panchayatTaxes->sticks_lamp_tax;
                $water_tax_rate = $panchayatTaxes->sticks_water_tax;
                
            }
            elseif ($property->description == 'MIDC') {
                $open_plot_readireckoner_rate = $panchayatTaxes->midc_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->midc_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->midc_depreciation_rate;
                $usage_rate = $panchayatTaxes->midc_usage_rate;
                $home_tax_rate = $panchayatTaxes->midc_tax_rate;
                $health_tax_rate = $panchayatTaxes->midc_health_tax;
                $lamp_tax_rate = $panchayatTaxes->midc_lamp_tax;
                $water_tax_rate = $panchayatTaxes->midc_water_tax;
            }
            elseif ($property->description == 'Commercial') {
                $open_plot_readireckoner_rate = $panchayatTaxes->commercial_open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->commercial_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->commercial_depreciation_rate;
                $usage_rate = $panchayatTaxes->commercial_usage_rate;
                $home_tax_rate = $panchayatTaxes->commercial_tax_rate;
                $health_tax_rate = $panchayatTaxes->commercial_health_tax;
                $lamp_tax_rate = $panchayatTaxes->commercial_lamp_tax;
                $water_tax_rate = $panchayatTaxes->commercial_water_tax;
            }
            elseif ($property->description == "Open plot") {
                $open_plot_readireckoner_rate = $panchayatTaxes->open_plot_readireckoner_rate;
                $builtup_area_readireckoner_rate = $panchayatTaxes->open_plot_builtup_area_readireckoner_rate;
                $depreciation = $panchayatTaxes->open_plot_depreciation_rate;
                $usage_rate = $panchayatTaxes->open_plot_usage_rate;
                $home_tax_rate = $panchayatTaxes->open_plot_tax_rate;
            }
            else {
                return back()->with('error', 'Unsupported property description or house type. Please check the property details.');
            }

        $capitalValue = ($details->property->area_in_sqmt * $open_plot_readireckoner_rate) +
        (($details->property->area_in_sqmt * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

        // Calculate home tax
        $homeTax = (($capitalValue / 1000) * $home_tax_rate);
        $homeTax = round($homeTax);
        // Get Total Tax including additional fixed taxes
        if ($property->description == "Open plot") {
            $TotalTax = $homeTax;
        }else{
            $TotalTax = $homeTax +
            ($health_tax_rate ?? 0.00) +
            ($lamp_tax_rate ?? 0.00) +
            ($water_tax_rate ?? 0.00) +
            ($panchayatTaxes->special_tax_rate ?? 0.00);
        }
        $getTotalTax = round($TotalTax);
            // Pass values to view
            return view('panchayat.pages.hometax.details', compact(
                'details',
                'open_plot_readireckoner_rate',
                'builtup_area_readireckoner_rate',
                'usage_rate',
                'home_tax_rate',
                'depreciation',
                'health_tax_rate', 'lamp_tax_rate', 'water_tax_rate',
                'capitalValue', 'homeTax', 'getTotalTax','id'
            ));
    }


    // Edit - Show form for editing a specific home tax
    public function hometaxEdit(HomeTax $hometax)
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.hometax.edit', compact('hometax', 'properties'));
    }

    public function hometaxUpdate(Request $request, HomeTax $hometax)
    {

        $request->validate([
            'square_meter'                    => 'required',
            'open_plot_readireckoner_rate'    => 'required',
            'builtup_area_readireckoner_rate' => 'required',
            'depreciation'                    => 'required',
            'usage_rate'                      => 'required',
            'home_tax_rate'                   => 'required',
        ]);

        // Calculate capital value
        $openPlotReadiReckonerRate    = $request->open_plot_readireckoner_rate;
        $buildUpAreaReadiReckonerRate = $request->builtup_area_readireckoner_rate;
        $squareMeter                  = $request->square_meter;
        $capitalValue                 = ($openPlotReadiReckonerRate * $squareMeter) +
        ($buildUpAreaReadiReckonerRate * $squareMeter * $request->depreciation * $request->usage_rate);

        // Calculate home tax
        $homeTaxValue = ($request->home_tax_rate) * ($capitalValue / 1000);

        // Update the existing HomeTax record
        $hometax->update([
            'property_id'                     => $request->property_id,
            'square_meter'                    => $request->square_meter,
            'open_plot_readireckoner_rate'    => $request->open_plot_readireckoner_rate,
            'builtup_area_readireckoner_rate' => $request->builtup_area_readireckoner_rate,
            'depreciation'                    => $request->depreciation,
            'usage_rate'                      => $request->usage_rate,
            'home_tax_rate'                   => $request->home_tax_rate,
            'calculated_home_tax'             => $homeTaxValue, // Update the calculated home tax here
            'home_due_tax_amount'             => $homeTaxValue - ($hometax->home_pay_tax_ampunt),
        ]);

        // Return success message
        return redirect()->route('panchayat.hometaxes.details')->with('success', 'Home tax record updated successfully.');
    }

    public function hometaxDestroy(HomeTax $hometax)
    {
        $hometax->delete();
        return redirect()->route('panchayat.pages.hometax.index')->with('success', 'Home tax record deleted successfully.');
    }
    public function homeTaxPaymentCreate($id)
    {
        $homeTax = HomeTax::with('property')->where('id', $id)->first();

        return view('panchayat.pages.hometax.hometax_payment_create', compact('homeTax'));
    }

    

    public function homeTaxPaymentStore(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'home_pay_tax_amount' => 'required|numeric',
        ]);

        $homeTax = HomeTax::with('property')->findOrFail($id);

        $property_id = $homeTax->property_id;
        $panchayat_id = Auth::guard('panchayat')->user()->id;

        // Original tax before discount/penalty
        $originalTax = $homeTax->calculated_home_tax;

        // Get values from request
        $paidTax = floatval($request->home_pay_tax_amount);
        $discount = floatval($request->tax_discount ?? 0);
        $penalty = floatval($request->tax_penalty ?? 0);

        // Adjust tax based on discount or penalty
        $adjustedTax = $originalTax;

        if ($request->option === 'discount') {
            $adjustedTax -= $discount;
        } elseif ($request->option === 'penalty') {
            $adjustedTax += $penalty;
        }

        // Calculate remaining due
        $dueTax = $adjustedTax - $paidTax;

        // Store updated payment info
        HomeTax::where('property_id', $property_id)
            ->where('panchayat_id', $panchayat_id)
            ->where('year', $homeTax->year)
            ->update([
                'home_pay_tax_amount' => $paidTax,
                'home_due_tax_amount' => $dueTax,
                'tax_discount' => $discount > 0 ? $discount : null,
                'tax_penalty' => $penalty > 0 ? $penalty : null,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('panchayat.hometaxes.index')
            ->with('success', 'Home tax record updated successfully.');
    }
    public function homeTaxPaymentDuePayment(HomeTax $hometax)
    {

        $panchayatId = Auth::guard('panchayat')->user();
        $properties  = Property::where('panchayat_id', $panchayatId->id)->where('id', $hometax->property_id)->get();
        $previousYearTax = HomeTax::where('property_id', $hometax->property_id)
            ->where('year', '<', $hometax->year)
            ->where('panchayat_id', $panchayatId->id)
            ->orderBy('year', 'desc')
            ->first();
        // dd($previousYearTax, $hometax);
        return view('panchayat.pages.hometax.due_create', compact('previousYearTax', 'hometax'));
    }

    
    public function homeTaxPaymentDueStore(Request $request, HomeTax $hometax)
    {
        $request->validate([
            'payment_amount' => 'required|numeric|min:0',
            'option' => 'nullable|in:discount,penalty,none',
        ]);

        $adminId = Auth::guard('panchayat')->user()->id;

        $totalPayment = floatval($request->payment_amount ?? 0);
        $discount = floatval($request->tax_discount ?? 0);
        $penalty = floatval($request->tax_penalty ?? 0);
        $transectionTotal = $totalPayment - $discount + $penalty;

        // Get previous year tax record if exists
        $previousYearTax = HomeTax::where('property_id', $hometax->property_id)
                                ->where('year', $hometax->year - 1)
                                ->first();

        // Calculate previous year due if record exists
        $previousYearDue = 0;
        if ($previousYearTax) {
            $previousPaid = $previousYearTax->home_pay_tax_amount ?? 0;
            $previousYearDue = max(0, $previousYearTax->calculated_home_tax - $previousPaid); // Ensure due is not negative
        }

        // Determine payment distribution
        if ($previousYearTax && $previousYearDue > 0) {
            // First pay previous year due completely
            if ($totalPayment <= $previousYearDue) {
                $previousYearPayment = $totalPayment;
                $currentYearPayment = 0;
            } else {
                // After paying previous due, pay current year
                $previousYearPayment = $previousYearDue;
                $currentYearPayment = $totalPayment - $previousYearPayment;
            }
        } else {
            // No previous due, pay current year directly
            $currentYearPayment = $totalPayment;
            $previousYearPayment = 0;
        }

        // Process current year tax
        $currentExistingPaid = $hometax->home_pay_tax_amount ?? 0;
        $currentTotalPaid = $currentExistingPaid + $currentYearPayment;

        // Adjust current year tax with discount/penalty
        $adjustedCurrentTax = $hometax->calculated_home_tax;
        
        if ($request->option === 'discount') {
            $adjustedCurrentTax -= $discount;
        } elseif ($request->option === 'penalty') {
            $adjustedCurrentTax += $penalty;
        }
    
        // Ensure due amount is never negative
        $currentDueTax = max(0, $adjustedCurrentTax - $currentTotalPaid);

        // Update current year tax record
        $hometax->update([
            'home_pay_tax_amount' => $currentTotalPaid,
            'home_due_tax_amount' => $currentDueTax,
            'tax_discount' => $discount > 0 ? $discount : null,
            'tax_penalty' => $penalty > 0 ? $penalty : null,
            'updated_at' => now(),
        ]);

        // Update previous year tax record if applicable
        if ($previousYearTax && $previousYearPayment > 0) {
            $previousExistingPaid = $previousYearTax->home_pay_tax_amount ?? 0;
            $previousTotalPaid = $previousExistingPaid + $previousYearPayment;
            $previousDueTax = max(0, $previousYearTax->calculated_home_tax - $previousTotalPaid); // Ensure due is not negative

            $previousYearTax->update([
                'home_pay_tax_amount' => $previousTotalPaid,
                'home_due_tax_amount' => $previousDueTax,
                'updated_at' => now(),
            ]);
        }
        
        TransectionHistory::create([
            'home_taxes_id' => $hometax->id,
            'property_id' => $hometax->property_id,
            'panchayat_id' => $adminId,
            'amount' => $transectionTotal,
            'status' => 'success',
        ]);
        
        return redirect()->route('panchayat.hometaxes.index')
                        ->with('success', 'Payment processed successfully');
    }

    public function checkPreviousTax($id)
    {
        $currentTax = HomeTax::findOrFail($id);
        $previousTax = HomeTax::where('property_id', $currentTax->property_id)
                            ->where('year', $currentTax->year - 1)
                            ->first();

        return response()->json([
            'has_previous' => $previousTax ? true : false,
            'previous_year' => $previousTax ? $previousTax->year : null,
            'current_year' => $currentTax->year
        ]);
    }

    public function destroyHomeTax($id, Request $request)
    {
        $currentTax = HomeTax::findOrFail($id);
        $deletePrevious = $request->input('delete_previous', false);

        try {
            DB::beginTransaction();

            // Delete current tax record
            $currentTax->delete();

            // Delete previous year tax if checkbox was checked
            if ($deletePrevious) {
                HomeTax::where('property_id', $currentTax->property_id)
                    ->where('year', $currentTax->year - 1)
                    ->delete();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Tax record deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete tax record: ' . $e->getMessage()
            ], 500);
        }
    }





    //Health Tax
    public function healthtaxList()
    {
        $healthTaxes = HealthTax::orderby('id', 'desc')->with('property')->get();
        return view('panchayat.pages.healthtax.health_tax_list', compact('healthTaxes'));
    }
    public function healthTaxPaymentCreate()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.healthtax.health_tax_payment_create', compact('properties'));
    }
    public function healthTaxPaymentStore(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $request->validate([
            'year'             => 'required',
            'property_id'      => 'required',
            'total_health_tax' => 'required',
            'pay_tax_amount'   => 'required',

        ]);

        HealthTax::create([
            'panchayat_id'     => Auth::guard('panchayat')->user()->id,
            'property_id'      => $request->property_id,
            'year'             => $request->year,
            'total_health_tax' => $request->total_health_tax,
            'pay_tax_amount'   => $request->pay_tax_amount,
            'due_tax_amount'   => $request->total_health_tax - $request->pay_tax_amount,
        ]);
        // Return success message
        return redirect()->route('panchayat.healthtaxes.payment.index')->with('success', 'Health tax record updated successfully.');
    }

    public function healthTaxPaymentDueCreate(HealthTax $healthtax)
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.healthtax.health_tax_due_create', compact('properties', 'healthtax'));
    }

    public function healthTaxPaymentDueStore(Request $request, HealthTax $healthtax)
    {
        //dd($request->all());
        $request->validate([

            'pay_tax_amount' => 'required',

        ]);
        $panchayatId = Auth::guard('panchayat')->user()->id;

        $healthTaxDue = HealthTax::where('panchayat_id', Auth::guard('panchayat')->user()->id)->where('property_id', $healthtax->property_id)->where('year', $healthtax->year)->update([
            'pay_tax_amount' => $request->pay_tax_amount + $healthtax->pay_tax_amount,
            'due_tax_amount' => ($healthtax->total_health_tax - ($request->pay_tax_amount + $healthtax->pay_tax_amount)),
        ]);
        return redirect()->route('panchayat.healthtaxes.payment.index')->with('success', 'Health tax record updated successfully.');
    }
    //Lamp Tax
    public function lamptaxList()
    {
        $lampTaxes = LampTax::orderby('id', 'desc')->with('property')->get();
        return view('panchayat.pages.lamptax.lamp_tax_list', compact('lampTaxes'));
    }
    public function lampTaxPaymentCreate()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.lamptax.lamp_tax_payment_create', compact('properties'));
    }
    public function lampTaxPaymentStore(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $request->validate([
            'year'           => 'required',
            'property_id'    => 'required',
            'total_lamp_tax' => 'required',
            'pay_tax_amount' => 'required',

        ]);

        $tax_payment = LampTax::where('property_id', $request->property_id)->where('panchayat_id', Auth::guard('panchayat')->user()->id)->where('year', $request->year)->first();
        //    dd( $tax_payment );

        LampTax::create([
            'panchayat_id'   => Auth::guard('panchayat')->user()->id,
            'property_id'    => $request->property_id,
            'year'           => $request->year,
            'total_lamp_tax' => $request->total_lamp_tax,
            'pay_tax_amount' => $request->pay_tax_amount,
            'due_tax_amount' => $request->total_lamp_tax - $request->pay_tax_amount,
        ]);

        return redirect()->route('panchayat.lamptaxes.payment.index')->with('success', 'Lamp tax record updated successfully.');

    }
    public function lampTaxPaymentDueCreate(LampTax $lamptax)
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.lamptax.lamp_tax_due_create', compact('properties', 'lamptax'));
    }
    public function lampTaxPaymentDueStore(Request $request, LampTax $lamptax)
    {
        //dd($request->all());
        $request->validate([

            'pay_tax_amount' => 'required',

        ]);
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $lampTaxDue  = LampTax::where('panchayat_id', Auth::guard('panchayat')->user()->id)->where('property_id', $lamptax->property_id)->where('year', $lamptax->year)->update([
            'pay_tax_amount' => $request->pay_tax_amount + $lamptax->pay_tax_amount,
            'due_tax_amount' => ($lamptax->total_lamp_tax - ($request->pay_tax_amount + $lamptax->pay_tax_amount)),
        ]);
        return redirect()->route('panchayat.lamptaxes.payment.index')->with('success', 'Lamp tax record updated successfully.');
    }
    //Penalty
    public function penaltyList()
    {
        $penalties = Penalty::orderby('id', 'desc')->get();
        return view('panchayat.pages.penalty.penalty_list', compact('penalties'));
    }
    public function penaltyPaymentCreate()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.penalty.penalty_payment_create', compact('properties'));
    }
    public function penaltyPaymentStore(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $request->validate([
            'year'             => 'required',
            'property_id'      => 'required',
            'penalty'          => 'required',
            'penalty_discount' => 'required',

        ]);
        Penalty::create([
            'panchayat_id'     => Auth::guard('panchayat')->user()->id,
            'property_id'      => $request->property_id,
            'year'             => $request->year,
            'penalty'          => $request->penalty,
            'penalty_discount' => $request->penalty_discount,
            'total_penalty'    => ($request->penalty * $request->penalty_discount) / 100,
        ]);
        return redirect()->route('panchayat.penalty.index')->with('success', 'Penalty created successfully.');

    }

    // public function namunaNineBulk(){
    //     $panchayatId = Auth::guard('admin')->user()->id;
    //     $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderby('sequence', 'asc')->get();
       
    //     return view('panchayat.pages.namuna_eight_nine.namuna_nine_bulk', compact('properties'));
    // }


// ALTER TABLE `properties` ADD COLUMN `property_no_sortable` VARCHAR(255) GENERATED ALWAYS AS ( REGEXP_REPLACE( REGEXP_REPLACE( `property_no`, '([0-9]+)', LPAD('\\1', 10, '0') ), '[^0-9]', '' ) ) VIRTUAL, ADD INDEX `property_no_sortable_index` (`property_no_sortable`);

    public function namunaNineBulk(Request $request)
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;

        $properties = Property::whereHas('hometax')
            ->where('panchayat_id', $panchayatId)
            ->orderBy('sequence', 'asc')
            ->paginate(300);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('panchayat.pages.namuna_eight_nine.namuna_nine_property_table', compact('properties'))->render(),
                'pagination' => $properties->links('pagination::bootstrap-4')->render(),
                'first_item' => $properties->firstItem(),
                'last_item' => $properties->lastItem(),
                'total' => $properties->total()
            ]);
        }

        
        // dd($properties);
        return view('panchayat.pages.namuna_eight_nine.namuna_nine_bulk', compact('properties'));
    }
    public function namunaNineBulkDownload(Request $request)
    {
       
        $request->validate([
            'property_id' => 'required|array',
            'property_id.*' => 'exists:properties,id',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);
    
        $allResponsiveData = [];
        
        $previousYear = $request->year - 1;
        $currentYear = $request->year;
        $panchayatId = Auth::guard('panchayat')->user()->id;
       
        foreach ($request->property_id as $propertyId) {
            $homeTaxes = HomeTax::with('property')
                ->where('property_id', $propertyId)
                ->where('year', $currentYear)
                ->where('home_taxes.panchayat_id', $panchayatId)
                ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
                ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
                ->select(
                    'home_taxes.*',
                    'admins.name as panchayat_name',
                    'admins.name_mr as panchayat_name_mr',
                    'admins.address as panchayat_address',
                    'admins.address_mr as panchayat_address_mr',
                    'panchayat_taxes.*'
                )
                ->orderBy('home_taxes.id', 'desc')
                ->get()
                ->map(function ($details) {
                    $property = $details->property;

                    $open_plot_readireckoner_rate = null;
                    $builtup_area_readireckoner_rate = null;
                    $depreciation = null;
                    $usage_rate = null;
                    $home_tax_rate = null;
                    $health_tax_rate = null;
                    $lamp_tax_rate = null;
                    $water_tax_rate = null;

                    if ($property) {
                        if ($property->description === 'House' && $property->house_type === 'RCC') {
                            $open_plot_readireckoner_rate = $details->rcc_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->rcc_builtup_area_readireckoner_rate;
                            $depreciation = $details->rcc_depreciation_rate;
                            $usage_rate = $details->rcc_usage_rate;
                            $home_tax_rate = $details->rcc_tax_rate;
                            $health_tax_rate = $details->rcc_health_tax;
                            $lamp_tax_rate = $details->rcc_lamp_tax;
                            $water_tax_rate = $details->rcc_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'Flat') {
                            $open_plot_readireckoner_rate = $details->flat_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->flat_builtup_area_readireckoner_rate;
                            $depreciation = $details->flat_depreciation_rate;
                            $usage_rate = $details->flat_usage_rate;
                            $home_tax_rate = $details->flat_tax_rate;
                            $health_tax_rate = $details->flat_health_tax;
                            $lamp_tax_rate = $details->flat_lamp_tax;
                            $water_tax_rate = $details->flat_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'Mud brick house') {
                            $open_plot_readireckoner_rate = $details->mud_brick_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->mud_brick_builtup_area_readireckoner_rate;
                            $depreciation = $details->mud_brick_depreciation_rate;
                            $usage_rate = $details->mud_brick_usage_rate;
                            $home_tax_rate = $details->mud_brick_tax_rate;
                            $health_tax_rate = $details->mud_brick_health_tax;
                            $lamp_tax_rate = $details->mud_brick_lamp_tax;
                            $water_tax_rate = $details->mud_brick_water_tax;
                        } elseif ($property->description === 'House' && $property->house_type === 'House of sticks') {
                            $open_plot_readireckoner_rate = $details->sticks_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->sticks_builtup_area_readireckoner_rate;
                            $depreciation = $details->sticks_depreciation_rate;
                            $usage_rate = $details->sticks_usage_rate;
                            $home_tax_rate = $details->sticks_tax_rate;
                            $health_tax_rate = $details->sticks_health_tax;
                            $lamp_tax_rate = $details->sticks_lamp_tax;
                            $water_tax_rate = $details->sticks_water_tax;
                        } elseif ($property->description === 'MIDC') {
                            $open_plot_readireckoner_rate = $details->midc_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->midc_builtup_area_readireckoner_rate;
                            $depreciation = $details->midc_depreciation_rate;
                            $usage_rate = $details->midc_usage_rate;
                            $home_tax_rate = $details->midc_tax_rate;
                            $health_tax_rate = $details->midc_health_tax;
                            $lamp_tax_rate = $details->midc_lamp_tax;
                            $water_tax_rate = $details->midc_water_tax;
                        } elseif ($property->description === 'Commercial') {
                            $open_plot_readireckoner_rate = $details->commercial_open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->commercial_builtup_area_readireckoner_rate;
                            $depreciation = $details->commercial_depreciation_rate;
                            $usage_rate = $details->commercial_usage_rate;
                            $home_tax_rate = $details->commercial_tax_rate;
                            $health_tax_rate = $details->commercial_health_tax;
                            $lamp_tax_rate = $details->commercial_lamp_tax;
                            $water_tax_rate = $details->commercial_water_tax;
                        }
                        elseif ($property->description == "Open plot") {
                            $open_plot_readireckoner_rate = $details->open_plot_readireckoner_rate;
                            $builtup_area_readireckoner_rate = $details->open_plot_builtup_area_readireckoner_rate;
                            $depreciation = $details->open_plot_depreciation_rate;
                            $usage_rate = $details->open_plot_usage_rate;
                            $home_tax_rate = $details->open_plot_tax_rate;
                        }
                    }

                    $details->open_plot_readireckoner_rate = $open_plot_readireckoner_rate;
                    $details->builtup_area_readireckoner_rate = $builtup_area_readireckoner_rate;
                    $details->depreciation = $depreciation;
                    $details->usage_rate = $usage_rate;
                    $details->home_tax_rate = $home_tax_rate;
                    $details->health_tax_rate = $health_tax_rate;
                    $details->lamp_tax_rate = $lamp_tax_rate;
                    $details->water_tax_rate = $water_tax_rate;

                    return $details;
                });

            $homeTaxes = $homeTaxes->first();
            $panchayatId = Auth::guard('panchayat')->user()->id;
            $previousYearTax = HomeTax::where('property_id', $propertyId)
            ->where('year', $previousYear)->where('panchayat_id', $panchayatId)->get()->toArray();
            
            if(empty($homeTaxes)){
                return redirect()->back()->with(['message'=>'selected year data not found'])->withInput();
            }
        
            $squareMeter = $homeTaxes->property->area_in_sqmt;
            $open_plot_readireckoner_rate = $homeTaxes->open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $homeTaxes->builtup_area_readireckoner_rate;
            $depreciation = $homeTaxes->depreciation;
            $usage_rate = $homeTaxes->usage_rate;
            $home_tax_rate = $homeTaxes->home_tax_rate;

            // Calculate Capital Value
            $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
            (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

            // Calculate home tax
            $homeTax = (($capitalValue / 1000) * $home_tax_rate);

            // Get Total Tax including additional fixed taxes
            if ($homeTaxes->property->description == "Open plot") {
                $getTotalTax = $homeTax;
            }else{
                $getTotalTax = $homeTax +
                ($homeTaxes->health_tax_rate ?? 0) +
                ($homeTaxes->lamp_tax_rate ?? 0) +
                ($homeTaxes->water_tax_rate ?? 0) +
                ($homeTaxes->special_tax_rate ?? 0);
            }

            $responseData = [
                'property_no' => $homeTaxes->property->property_no,
                'owner_name_mr' => $homeTaxes->property->owner_name_mr,
                'owner_name' => $homeTaxes->property->owner_name,
                'description' => $homeTaxes->property->description,
                'id' => $homeTaxes->id,
                'year' => $homeTaxes->year,
                'calculated_home_tax' => $homeTaxes->calculated_home_tax ?? 0.00,
                'home_pay_tax_amount' => $homeTaxes->home_pay_tax_amount ?? 0.00,
                'home_due_tax_amount' => $homeTaxes->home_due_tax_amount ?? 0.00,
                'tax_discount' => $homeTaxes->tax_discount ?? 0.00,
                'tax_penalty' => $homeTaxes->tax_penalty ?? 0.00,
                'property_id' => $homeTaxes->property_id,
                'panchayat_id' => $homeTaxes->panchayat_id,
                'panchayat_name' => $homeTaxes->panchayat_name,
                'panchayat_name_mr' => $homeTaxes->panchayat_name_mr,
                'panchayat_address' => $homeTaxes->panchayat_address,
                'panchayat_address_mr' => $homeTaxes->panchayat_address_mr,
                'special_tax' => $homeTaxes->special_tax ?? 0.00,
                'special_tax_mr' => $homeTaxes->special_tax_mr ?? 0.00,
                'special_tax_rate' => $homeTaxes->special_tax_rate ?? 0.00,
                'open_plot_readireckoner_rate' => $homeTaxes->open_plot_readireckoner_rate ?? 0.00,
                'builtup_area_readireckoner_rate' => $homeTaxes->builtup_area_readireckoner_rate ?? 0.00,
                'depreciation' => $homeTaxes->depreciation ?? 0.00,
                'usage_rate' => $homeTaxes->usage_rate ?? 0.00,
                'home_tax_rate' => $homeTaxes->home_tax_rate ?? 0.00,
                'health_tax_rate' => $homeTaxes->health_tax_rate ?? 0.00,
                'lamp_tax_rate' => $homeTaxes->lamp_tax_rate ?? 0.00,
                'water_tax_rate' => $homeTaxes->water_tax_rate ?? 0.00,
                'capital_value' => round($capitalValue, 0, 2) ?? 0.00,
                'home_tax' => round($homeTax, 0, 2) ?? 0.00,
                'total_tax_amount' => round($getTotalTax, 0, 2) ?? 0.00 ,
                'previous_home_tax_amount' => round(($previousYearTax[0]['calculated_home_tax'] ?? 0), 2),
            ];
            
            // Push the current property's data into the allResponsiveData array
            $allResponsiveData[] = $responseData;
        }
        $specialTax = $homeTaxes->special_tax_mr;
        // dd($allResponsiveData);
        return view('panchayat.pages.namuna_eight_nine.namuna_nine_details_bulk', compact('allResponsiveData', 'specialTax'));
    }

    public function namunaNineSelect()
    {
       
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderBy('sequence', 'asc')->get();
       
        return view('panchayat.pages.namuna_eight_nine.namuna_nine', compact('properties'));
    }
    public function namunaNineDetails(Request $request)
    {
         // dd($request->all());
        $request->validate([
            'property_id' => 'required',
            'year'        => 'required',
        ]);

        // Check if previous year data exists
        $previousYear = $request->year - 1;
        $hasPreviousYearData = HomeTax::where('property_id', $request->property_id)
                                    ->where('year', $previousYear)
                                    ->exists();

        if (!$hasPreviousYearData) {
            // Return a form to insert previous year data
            return view('panchayat.pages.namuna_eight_nine.previous_year_form', [
                'property_id' => $request->property_id,
                'year' => $request->year,
                'previous_year' => $previousYear
            ])->with('success', 'Lamp tax record updated successfully.');
        }

        $currentYear = $request->year;
        $date = null;
        $date = $date ? \Carbon\Carbon::parse($date) : \Carbon\Carbon::now();

        $year = $date->year;

        if ($date->month < 4) {
            // If before April, financial year starts from previous year
            $startYear = $year - 1;
            $endYear = $year;
        } else {
            // From April onwards, current year is start
            $startYear = $year;
            $endYear = $year + 1;
        }
        // return $this->convertToMarathiDigits($startYear . ' - ' . $endYear);

        $homeTaxes = HomeTax::with('property')
            ->where('property_id', $request->property_id)
            // ->whereIn('year', [$currentYear, $previousYear])
            ->where('year', $request->year)
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->select(
                'home_taxes.*',
                'admins.name as panchayat_name',
                'admins.name_mr as panchayat_name_mr',
                'admins.address as panchayat_address',
                'admins.address_mr as panchayat_address_mr',
                'panchayat_taxes.*'
            )
            ->orderBy('home_taxes.id', 'desc')
            ->get()
            ->map(function ($details) {
                $property = $details->property;

                $open_plot_readireckoner_rate = null;
                $builtup_area_readireckoner_rate = null;
                $depreciation = null;
                $usage_rate = null;
                $home_tax_rate = null;
                $health_tax_rate = null;
                $lamp_tax_rate = null;
                $water_tax_rate = null;

                if ($property) {
                    if ($property->description === 'House' && $property->house_type === 'RCC') {
                        $open_plot_readireckoner_rate = $details->rcc_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->rcc_builtup_area_readireckoner_rate;
                        $depreciation = $details->rcc_depreciation_rate;
                        $usage_rate = $details->rcc_usage_rate;
                        $home_tax_rate = $details->rcc_tax_rate;
                        $health_tax_rate = $details->rcc_health_tax;
                        $lamp_tax_rate = $details->rcc_lamp_tax;
                        $water_tax_rate = $details->rcc_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'Flat') {
                        $open_plot_readireckoner_rate = $details->flat_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->flat_builtup_area_readireckoner_rate;
                        $depreciation = $details->flat_depreciation_rate;
                        $usage_rate = $details->flat_usage_rate;
                        $home_tax_rate = $details->flat_tax_rate;
                        $health_tax_rate = $details->flat_health_tax;
                        $lamp_tax_rate = $details->flat_lamp_tax;
                        $water_tax_rate = $details->flat_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'Mud brick house') {
                        $open_plot_readireckoner_rate = $details->mud_brick_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->mud_brick_builtup_area_readireckoner_rate;
                        $depreciation = $details->mud_brick_depreciation_rate;
                        $usage_rate = $details->mud_brick_usage_rate;
                        $home_tax_rate = $details->mud_brick_tax_rate;
                        $health_tax_rate = $details->mud_brick_health_tax;
                        $lamp_tax_rate = $details->mud_brick_lamp_tax;
                        $water_tax_rate = $details->mud_brick_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'House of sticks') {
                        $open_plot_readireckoner_rate = $details->sticks_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->sticks_builtup_area_readireckoner_rate;
                        $depreciation = $details->sticks_depreciation_rate;
                        $usage_rate = $details->sticks_usage_rate;
                        $home_tax_rate = $details->sticks_tax_rate;
                        $health_tax_rate = $details->sticks_health_tax;
                        $lamp_tax_rate = $details->sticks_lamp_tax;
                        $water_tax_rate = $details->sticks_water_tax;
                    } elseif ($property->description === 'MIDC') {
                        $open_plot_readireckoner_rate = $details->midc_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->midc_builtup_area_readireckoner_rate;
                        $depreciation = $details->midc_depreciation_rate;
                        $usage_rate = $details->midc_usage_rate;
                        $home_tax_rate = $details->midc_tax_rate;
                        $health_tax_rate = $details->midc_health_tax;
                        $lamp_tax_rate = $details->midc_lamp_tax;
                        $water_tax_rate = $details->midc_water_tax;
                    } elseif ($property->description === 'Commercial') {
                        $open_plot_readireckoner_rate = $details->commercial_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->commercial_builtup_area_readireckoner_rate;
                        $depreciation = $details->commercial_depreciation_rate;
                        $usage_rate = $details->commercial_usage_rate;
                        $home_tax_rate = $details->commercial_tax_rate;
                        $health_tax_rate = $details->commercial_health_tax;
                        $lamp_tax_rate = $details->commercial_lamp_tax;
                        $water_tax_rate = $details->commercial_water_tax;
                    }
                    elseif ($property->description == "Open plot") {
                        $open_plot_readireckoner_rate = $details->open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->open_plot_builtup_area_readireckoner_rate;
                        $depreciation = $details->open_plot_depreciation_rate;
                        $usage_rate = $details->open_plot_usage_rate;
                        $home_tax_rate = $details->open_plot_tax_rate;
                    }
                }

                $details->open_plot_readireckoner_rate = $open_plot_readireckoner_rate;
                $details->builtup_area_readireckoner_rate = $builtup_area_readireckoner_rate;
                $details->depreciation = $depreciation;
                $details->usage_rate = $usage_rate;
                $details->home_tax_rate = $home_tax_rate;
                $details->health_tax_rate = $health_tax_rate;
                $details->lamp_tax_rate = $lamp_tax_rate;
                $details->water_tax_rate = $water_tax_rate;

                return $details;
            });

        $homeTaxes = $homeTaxes->first();
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $previousYearTax = HomeTax::where('property_id', $request->property_id)
        ->where('year', $previousYear)->where('panchayat_id', $panchayatId)->get()->toArray();
            //   dd($previousYearTax);
        if(empty($homeTaxes)){
            return redirect()->back()->with(['message'=>'selected year data not found'])->withInput();
        }
    
        $squareMeter = $homeTaxes->property->area_in_sqmt;
        $open_plot_readireckoner_rate = $homeTaxes->open_plot_readireckoner_rate;
        $builtup_area_readireckoner_rate = $homeTaxes->builtup_area_readireckoner_rate;
        $depreciation = $homeTaxes->depreciation;
        $usage_rate = $homeTaxes->usage_rate;
        $home_tax_rate = $homeTaxes->home_tax_rate;

        // Calculate Capital Value
        $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
        (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

        // Calculate home tax
        $homeTax = (($capitalValue / 1000) * $home_tax_rate);

        // Get Total Tax including additional fixed taxes
        if ($homeTaxes->property->description == "Open plot") {
            $getTotalTax = $homeTax;
        }else{
            $getTotalTax = $homeTax +
            ($homeTaxes->health_tax_rate ?? 0) +
            ($homeTaxes->lamp_tax_rate ?? 0) +
            ($homeTaxes->water_tax_rate ?? 0) +
            ($homeTaxes->special_tax_rate ?? 0);
        }

        $responseData = [
            'year1' => $this->convertToMarathiDigits($startYear),
            'year2' => $this->convertToMarathiDigits($endYear),
            'property_no' => $homeTaxes->property->property_no,
            'owner_name_mr' => $homeTaxes->property->owner_name_mr,
            'owner_name' => $homeTaxes->property->owner_name,
            'description' => $homeTaxes->property->description,
            'id' => $homeTaxes->id,
            'year' => $homeTaxes->year,
            'calculated_home_tax' => $homeTaxes->calculated_home_tax ?? 0.00,
            'home_pay_tax_amount' => $homeTaxes->home_pay_tax_amount ?? 0.00,
            'home_due_tax_amount' => $homeTaxes->home_due_tax_amount ?? 0.00,
            'tax_discount' => $homeTaxes->tax_discount ?? 0.00,
            'tax_penalty' => $homeTaxes->tax_penalty ?? 0.00,
            'property_id' => $homeTaxes->property_id,
            'panchayat_id' => $homeTaxes->panchayat_id,
            'panchayat_name' => $homeTaxes->panchayat_name,
            'panchayat_name_mr' => $homeTaxes->panchayat_name_mr,
            'panchayat_address' => $homeTaxes->panchayat_address,
            'panchayat_address_mr' => $homeTaxes->panchayat_address_mr,
            'special_tax' => $homeTaxes->special_tax ?? 0.00,
            'special_tax_mr' => $homeTaxes->special_tax_mr ?? 0.00,
            'special_tax_rate' => $homeTaxes->special_tax_rate ?? 0.00,
            'open_plot_readireckoner_rate' => $homeTaxes->open_plot_readireckoner_rate ?? 0.00,
            'builtup_area_readireckoner_rate' => $homeTaxes->builtup_area_readireckoner_rate ?? 0.00,
            'depreciation' => $homeTaxes->depreciation ?? 0.00,
            'usage_rate' => $homeTaxes->usage_rate ?? 0.00,
            'home_tax_rate' => $homeTaxes->home_tax_rate ?? 0.00,
            'health_tax_rate' => $homeTaxes->health_tax_rate ?? 0.00,
            'lamp_tax_rate' => $homeTaxes->lamp_tax_rate ?? 0.00,
            'water_tax_rate' => $homeTaxes->water_tax_rate ?? 0.00,
            'capital_value' => round($capitalValue, 0, 2) ?? 0.00,
            'home_tax' => round($homeTax, 0, 2) ?? 0.00,
            'total_tax_amount' => round($getTotalTax, 0, 2) ?? 0.00 ,
            // 'previous_home_tax_amount' => round($request->calculated_home_tax ?? 0, 2) ?? 0.00,
            'previous_home_tax_amount' => round(
                $request->calculated_home_tax ?? 
                ($previousYearTax[0]['calculated_home_tax'] ?? 0),
                2
            ),
            'previous_health_tax_amount' => round($request->calculated_health_tax ?? 0, 2) ?? 0.00,
            'previous_lamp_tax_amount' => round($request->calculated_lamp_tax ?? 0, 2) ?? 0.00,
            'previous_total_tax_amount' => round($request->total_tax ?? 0, 2) ?? 0.00,
            
        ];


        //   dd($homeTaxes);


        return view('panchayat.pages.namuna_eight_nine.namuna_nine_details', compact('responseData'));
    }

    public function storePreviousYearData(Request $request)
    {
            // dd($request->all());
        $request->validate([
            'property_id' => 'required',
            'year' => 'required',
            'calculated_home_tax' => 'required|numeric',
            'home_pay_tax_amount' => 'nullable|numeric',
            'home_due_tax_amount' => 'nullable|numeric',
            'total_tax' => 'required|numeric',

            
        ]);

        // Create previous year record
        HomeTax::create([
            'property_id' => $request->property_id,
            'year' => $request->year - 1, // Store as previous year
            'calculated_home_tax' => $request->total_tax,
            'home_pay_tax_amount' => $request->home_pay_tax_amount,
            'home_due_tax_amount' => $request->home_due_tax_amount,
            'panchayat_id' => Auth::guard('admin')->user()->id
        
        ]);

        // Redirect back to the original request with the original year
        return redirect()->route('panchayat.namuna.nine.details.get', [
            'property_id' => $request->property_id,
            'year' => $request->year,
            'calculated_home_tax' => $request->calculated_home_tax ?? '',
            'calculated_health_tax' => $request->calculated_health_tax ?? '',
            'calculated_lamp_tax' => $request->calculated_lamp_tax ?? '',
            'total_tax' => $request->total_tax ?? '',
            'home_pay_tax_amount' => $request->home_pay_tax_amount ?? '',
            'home_due_tax_amount' => $request->home_due_tax_amount ?? ''
        ]);
    }

    
    public function namunaEightSelect()
    {
        $panchayatId = Auth::guard('panchayat')->user()->id;
        $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderby('sequence', 'asc')->get();
       
        return view('panchayat.pages.namuna_eight_nine.namuna_eight', compact('properties'));
    }

    public function namunaEightDetails(Request $request)
    {

        $request->validate([
            'property_id' => 'required',
            // 'year'        => 'required',
        ]);
        //   dd($request->all());
         $taxYearPayment = NamunaForm::first();
        $taxYear = [
            'start_year_before' => $this->convertToMarathiDigits($taxYearPayment->start_year_before),
                'end_year_before' => $this->convertToMarathiDigits($taxYearPayment->end_year_before),
                'start_year_after' => $this->convertToMarathiDigits($taxYearPayment->start_year_after),
                'end_year_after' => $this->convertToMarathiDigits($taxYearPayment->end_year_after),
        ];
        $homeTaxes = HomeTax::with('property')
        ->where('property_id', $request->property_id)
        // ->where('year', $request->year)
        ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
        ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
        ->select(
            'home_taxes.*',
            'admins.name as panchayat_name',
            'admins.name_mr as panchayat_name_mr',
            'admins.address as panchayat_address',
            'admins.address_mr as panchayat_address_mr',
            'panchayat_taxes.*'
        )
        ->orderBy('home_taxes.id', 'desc')
        ->get()
        ->map(function ($details) {
            $property = $details->property;

            $open_plot_readireckoner_rate = null;
            $builtup_area_readireckoner_rate = null;
            $depreciation = null;
            $usage_rate = null;
            $home_tax_rate = null;
            $health_tax_rate = null;
            $lamp_tax_rate = null;
            $water_tax_rate = null;

            if ($property) {
                if ($property->description === 'House' && $property->house_type === 'RCC') {
                    $open_plot_readireckoner_rate = $details->rcc_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->rcc_builtup_area_readireckoner_rate;
                    $depreciation = $details->rcc_depreciation_rate;
                    $usage_rate = $details->rcc_usage_rate;
                    $home_tax_rate = $details->rcc_tax_rate;
                    $health_tax_rate = $details->rcc_health_tax;
                    $lamp_tax_rate = $details->rcc_lamp_tax;
                    $water_tax_rate = $details->rcc_water_tax;
                } elseif ($property->description === 'House' && $property->house_type === 'Flat') {
                    $open_plot_readireckoner_rate = $details->flat_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->flat_builtup_area_readireckoner_rate;
                    $depreciation = $details->flat_depreciation_rate;
                    $usage_rate = $details->flat_usage_rate;
                    $home_tax_rate = $details->flat_tax_rate;
                    $health_tax_rate = $details->flat_health_tax;
                    $lamp_tax_rate = $details->flat_lamp_tax;
                    $water_tax_rate = $details->flat_water_tax;
                } elseif ($property->description === 'House' && $property->house_type === 'Mud brick house') {
                    $open_plot_readireckoner_rate = $details->mud_brick_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->mud_brick_builtup_area_readireckoner_rate;
                    $depreciation = $details->mud_brick_depreciation_rate;
                    $usage_rate = $details->mud_brick_usage_rate;
                    $home_tax_rate = $details->mud_brick_tax_rate;
                    $health_tax_rate = $details->mud_brick_health_tax;
                    $lamp_tax_rate = $details->mud_brick_lamp_tax;
                    $water_tax_rate = $details->mud_brick_water_tax;
                } elseif ($property->description === 'House' && $property->house_type === 'House of sticks') {
                    $open_plot_readireckoner_rate = $details->sticks_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->sticks_builtup_area_readireckoner_rate;
                    $depreciation = $details->sticks_depreciation_rate;
                    $usage_rate = $details->sticks_usage_rate;
                    $home_tax_rate = $details->sticks_tax_rate;
                    $health_tax_rate = $details->sticks_health_tax;
                    $lamp_tax_rate = $details->sticks_lamp_tax;
                    $water_tax_rate = $details->sticks_water_tax;
                } elseif ($property->description === 'MIDC') {
                    $open_plot_readireckoner_rate = $details->midc_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->midc_builtup_area_readireckoner_rate;
                    $depreciation = $details->midc_depreciation_rate;
                    $usage_rate = $details->midc_usage_rate;
                    $home_tax_rate = $details->midc_tax_rate;
                    $health_tax_rate = $details->midc_health_tax;
                    $lamp_tax_rate = $details->midc_lamp_tax;
                    $water_tax_rate = $details->midc_water_tax;
                } elseif ($property->description === 'Commercial') {
                    $open_plot_readireckoner_rate = $details->commercial_open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->commercial_builtup_area_readireckoner_rate;
                    $depreciation = $details->commercial_depreciation_rate;
                    $usage_rate = $details->commercial_usage_rate;
                    $home_tax_rate = $details->commercial_tax_rate;
                    $health_tax_rate = $details->commercial_health_tax;
                    $lamp_tax_rate = $details->commercial_lamp_tax;
                    $water_tax_rate = $details->commercial_water_tax;
                } elseif ($property->description == "Open plot") {
                    $open_plot_readireckoner_rate = $details->open_plot_readireckoner_rate;
                    $builtup_area_readireckoner_rate = $details->open_plot_builtup_area_readireckoner_rate;
                    $depreciation = $details->open_plot_depreciation_rate;
                    $usage_rate = $details->open_plot_usage_rate;
                    $home_tax_rate = $details->open_plot_tax_rate;
                }
            }

            $details->open_plot_readireckoner_rate = $open_plot_readireckoner_rate;
            $details->builtup_area_readireckoner_rate = $builtup_area_readireckoner_rate;
            $details->depreciation = $depreciation;
            $details->usage_rate = $usage_rate;
            $details->home_tax_rate = $home_tax_rate;
            $details->health_tax_rate = $health_tax_rate;
            $details->lamp_tax_rate = $lamp_tax_rate;
            $details->water_tax_rate = $water_tax_rate;
            return $details;
        });

        $homeTaxes = $homeTaxes->first();
        $squareMeter = $homeTaxes->property->area_in_sqmt;
        $open_plot_readireckoner_rate = $homeTaxes->open_plot_readireckoner_rate;
        $builtup_area_readireckoner_rate = $homeTaxes->builtup_area_readireckoner_rate;
        $depreciation = $homeTaxes->depreciation;
        $usage_rate = $homeTaxes->usage_rate;
        $home_tax_rate = $homeTaxes->home_tax_rate;

        // // Calculate Capital Value
         $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
        (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

        // // // Calculate home tax
        $homeTax = (($capitalValue / 1000) * $home_tax_rate);

        // // // Get Total Tax including additional fixed taxes
        if ($homeTaxes->property->description == "Open plot") {
            $getTotalTax = $homeTax;
        }else{
            $getTotalTax = $homeTax +
            ($homeTaxes->health_tax_rate ?? 0) +
            ($homeTaxes->lamp_tax_rate ?? 0) +
            ($homeTaxes->water_tax_rate ?? 0) +
            ($homeTaxes->special_tax_rate ?? 0);
        }
        $homeTaxes->capital_value =  $capitalValue;
         $homeTaxes->total_home_tax =  round($homeTax);
        $homeTaxes->total_tax_amount = round($getTotalTax);
        
        return view('panchayat.pages.namuna_eight_nine.namuna_eight_details', compact('homeTaxes', 'taxYear'));

    }

    public function namunaEightBulk(Request $request){
        // \DB::enableQueryLog();
        $panchayatId = Auth::guard('panchayat')->user()->id;
         $properties = Property::whereHas('hometax')
            ->where('panchayat_id', $panchayatId)
            ->orderBy('sequence', 'asc')
            ->paginate(300);
            
        // $queries = \DB::getQueryLog();

        // dd($queries);
        if ($request->ajax()) {
            return response()->json([
                'table' => view('panchayat.pages.namuna_eight_nine.namuna_nine_property_table', compact('properties'))->render(),
                'pagination' => $properties->links('pagination::bootstrap-4')->render(),
                'first_item' => $properties->firstItem(),
                'last_item' => $properties->lastItem(),
                'total' => $properties->total()
            ]);
        }
        return view('panchayat.pages.namuna_eight_nine.namuna_eight_bulk', compact('properties'));

    }

    public function namunaEightBulkDownload(Request $request){
       
        $request->validate([
            'property_id' => 'required|array',
            'property_id.*' => 'exists:properties,id',
            // 'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);
    
        $allResponsiveData = [];
        $taxYearPayment = NamunaForm::first();
        $taxYear = [
            'start_year_before' => $this->convertToMarathiDigits($taxYearPayment->start_year_before),
                'end_year_before' => $this->convertToMarathiDigits($taxYearPayment->end_year_before),
                'start_year_after' => $this->convertToMarathiDigits($taxYearPayment->start_year_after),
                'end_year_after' => $this->convertToMarathiDigits($taxYearPayment->end_year_after),
        ];
        $panchayatId = Auth::guard('panchayat')->user()->id;
        foreach ($request->property_id as $propertyId) {

            $homeTaxes = HomeTax::with('property')
            ->where('property_id', $propertyId)
            // ->where('year', $request->year)
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->select(
                'home_taxes.*',
                'admins.name as panchayat_name',
                'admins.name_mr as panchayat_name_mr',
                'admins.address as panchayat_address',
                'admins.address_mr as panchayat_address_mr',
                'panchayat_taxes.*'
            )
            ->orderBy('home_taxes.id', 'desc')
            ->get()
            ->map(function ($details) {
                $property = $details->property;

                $open_plot_readireckoner_rate = null;
                $builtup_area_readireckoner_rate = null;
                $depreciation = null;
                $usage_rate = null;
                $home_tax_rate = null;
                $health_tax_rate = null;
                $lamp_tax_rate = null;
                $water_tax_rate = null;

                if ($property) {
                    if ($property->description === 'House' && $property->house_type === 'RCC') {
                        $open_plot_readireckoner_rate = $details->rcc_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->rcc_builtup_area_readireckoner_rate;
                        $depreciation = $details->rcc_depreciation_rate;
                        $usage_rate = $details->rcc_usage_rate;
                        $home_tax_rate = $details->rcc_tax_rate;
                        $health_tax_rate = $details->rcc_health_tax;
                        $lamp_tax_rate = $details->rcc_lamp_tax;
                        $water_tax_rate = $details->rcc_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'Flat') {
                        $open_plot_readireckoner_rate = $details->flat_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->flat_builtup_area_readireckoner_rate;
                        $depreciation = $details->flat_depreciation_rate;
                        $usage_rate = $details->flat_usage_rate;
                        $home_tax_rate = $details->flat_tax_rate;
                        $health_tax_rate = $details->flat_health_tax;
                        $lamp_tax_rate = $details->flat_lamp_tax;
                        $water_tax_rate = $details->flat_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'Mud brick house') {
                        $open_plot_readireckoner_rate = $details->mud_brick_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->mud_brick_builtup_area_readireckoner_rate;
                        $depreciation = $details->mud_brick_depreciation_rate;
                        $usage_rate = $details->mud_brick_usage_rate;
                        $home_tax_rate = $details->mud_brick_tax_rate;
                        $health_tax_rate = $details->mud_brick_health_tax;
                        $lamp_tax_rate = $details->mud_brick_lamp_tax;
                        $water_tax_rate = $details->mud_brick_water_tax;
                    } elseif ($property->description === 'House' && $property->house_type === 'House of sticks') {
                        $open_plot_readireckoner_rate = $details->sticks_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->sticks_builtup_area_readireckoner_rate;
                        $depreciation = $details->sticks_depreciation_rate;
                        $usage_rate = $details->sticks_usage_rate;
                        $home_tax_rate = $details->sticks_tax_rate;
                        $health_tax_rate = $details->sticks_health_tax;
                        $lamp_tax_rate = $details->sticks_lamp_tax;
                        $water_tax_rate = $details->sticks_water_tax;
                    } elseif ($property->description === 'MIDC') {
                        $open_plot_readireckoner_rate = $details->midc_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->midc_builtup_area_readireckoner_rate;
                        $depreciation = $details->midc_depreciation_rate;
                        $usage_rate = $details->midc_usage_rate;
                        $home_tax_rate = $details->midc_tax_rate;
                        $health_tax_rate = $details->midc_health_tax;
                        $lamp_tax_rate = $details->midc_lamp_tax;
                        $water_tax_rate = $details->midc_water_tax;
                    } elseif ($property->description === 'Commercial') {
                        $open_plot_readireckoner_rate = $details->commercial_open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->commercial_builtup_area_readireckoner_rate;
                        $depreciation = $details->commercial_depreciation_rate;
                        $usage_rate = $details->commercial_usage_rate;
                        $home_tax_rate = $details->commercial_tax_rate;
                        $health_tax_rate = $details->commercial_health_tax;
                        $lamp_tax_rate = $details->commercial_lamp_tax;
                        $water_tax_rate = $details->commercial_water_tax;
                    } elseif ($property->description == "Open plot") {
                        $open_plot_readireckoner_rate = $details->open_plot_readireckoner_rate;
                        $builtup_area_readireckoner_rate = $details->open_plot_builtup_area_readireckoner_rate;
                        $depreciation = $details->open_plot_depreciation_rate;
                        $usage_rate = $details->open_plot_usage_rate;
                        $home_tax_rate = $details->open_plot_tax_rate;
                    }
                }

                $details->open_plot_readireckoner_rate = $open_plot_readireckoner_rate;
                $details->builtup_area_readireckoner_rate = $builtup_area_readireckoner_rate;
                $details->depreciation = $depreciation;
                $details->usage_rate = $usage_rate;
                $details->home_tax_rate = $home_tax_rate;
                $details->health_tax_rate = $health_tax_rate;
                $details->lamp_tax_rate = $lamp_tax_rate;
                $details->water_tax_rate = $water_tax_rate;
                return $details;
            });

            //   dd($homeTaxes->first());
            $homeTaxes = $homeTaxes->first();
            $squareMeter = $homeTaxes->property->area_in_sqmt;
            $open_plot_readireckoner_rate = $homeTaxes->open_plot_readireckoner_rate;
            $builtup_area_readireckoner_rate = $homeTaxes->builtup_area_readireckoner_rate;
            $depreciation = $homeTaxes->depreciation;
            $usage_rate = $homeTaxes->usage_rate;
            $home_tax_rate = $homeTaxes->home_tax_rate;

            // // Calculate Capital Value
            $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
            (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);

            // // // Calculate home tax
            $homeTax = (($capitalValue / 1000) * $home_tax_rate);

            // // // Get Total Tax including additional fixed taxes
            if ($homeTaxes->property->description == "Open plot") {
                $getTotalTax = $homeTax;
            }else{
                $getTotalTax = $homeTax +
                ($homeTaxes->health_tax_rate ?? 0) +
                ($homeTaxes->lamp_tax_rate ?? 0) +
                ($homeTaxes->water_tax_rate ?? 0) +
                ($homeTaxes->special_tax_rate ?? 0);
            }
            $homeTaxes->capital_value =  $capitalValue;
            $homeTaxes->total_home_tax =  round($homeTax);
            $homeTaxes->total_tax_amount = round($getTotalTax);
            $specialTax = $homeTaxes->special_tax_mr;

            $responseData = [
                'sl_no' => $homeTaxes->property->id,
                'property_no' => $homeTaxes->property->property_no,
                'area_in_sqft' => $homeTaxes->property->area_in_sqft,
                'street_name' => $homeTaxes->property->street_name_mr,
                'property_user_name' => $homeTaxes->property->property_user_name_mr,
                'ct_survey_no' => $homeTaxes->property->ct_survey_no,
                'description' => $homeTaxes->property->description,
                'description_mr' => $homeTaxes->property->description_mr,
                'house_type' => $homeTaxes->property->house_type,
                'house_type_mr' => $homeTaxes->property->house_type_mr,
                'area_in_sqmt' => $homeTaxes->property->area_in_sqmt,
                'year_of_income_construction' => $homeTaxes->property->year_of_income_construction,
                'owner_name_mr' => $homeTaxes->property->owner_name_mr,
                'owner_name' => $homeTaxes->property->owner_name,
                'description' => $homeTaxes->property->description,
                'id' => $homeTaxes->id,
                'year' => $homeTaxes->year,
                'calculated_home_tax' => $homeTaxes->calculated_home_tax ?? 0.00,
                'home_pay_tax_amount' => $homeTaxes->home_pay_tax_amount ?? 0.00,
                'home_due_tax_amount' => $homeTaxes->home_due_tax_amount ?? 0.00,
                'tax_discount' => $homeTaxes->tax_discount ?? 0.00,
                'tax_penalty' => $homeTaxes->tax_penalty ?? 0.00,
                'property_id' => $homeTaxes->property_id,
                'panchayat_id' => $homeTaxes->panchayat_id,
                'panchayat_name' => $homeTaxes->panchayat_name,
                'panchayat_name_mr' => $homeTaxes->panchayat_name_mr,
                'panchayat_address' => $homeTaxes->panchayat_address,
                'panchayat_address_mr' => $homeTaxes->panchayat_address_mr,
                'special_tax' => $homeTaxes->special_tax ?? 0.00,
                'special_tax_mr' => $homeTaxes->special_tax_mr ?? 0.00,
                'special_tax_rate' => $homeTaxes->special_tax_rate ?? 0.00,
                'open_plot_readireckoner_rate' => $homeTaxes->open_plot_readireckoner_rate ?? 0.00,
                'builtup_area_readireckoner_rate' => $homeTaxes->builtup_area_readireckoner_rate ?? 0.00,
                'depreciation' => $homeTaxes->depreciation ?? 0.00,
                'usage_rate' => $homeTaxes->usage_rate ?? 0.00,
                'home_tax_rate' => $homeTaxes->home_tax_rate ?? 0.00,
                'health_tax_rate' => $homeTaxes->health_tax_rate ?? 0.00,
                'lamp_tax_rate' => $homeTaxes->lamp_tax_rate ?? 0.00,
                'water_tax_rate' => $homeTaxes->water_tax_rate ?? 0.00,
                'capital_value' => round($capitalValue, 0, 2) ?? 0.00,
                'home_tax' => round($homeTax, 0, 2) ?? 0.00,
                'total_tax_amount' => round($getTotalTax, 0, 2) ?? 0.00 ,
            ];
            $allResponsiveData[] = $responseData;
        }
     
        return view('panchayat.pages.namuna_eight_nine.namuna_eight_bulk_details', compact('allResponsiveData', 'specialTax','taxYear'));
    }

    public function homeTaxDemandBill($id){

        $taxDetails = HomeTax::find($id);
        $adminId = Auth::guard('panvchayat')->user()->id;
        
        // $homeTaxes = HomeTax::with('property')
        //     ->where('property_id', $taxDetails->property_id)
        //     ->where('year', $taxDetails->year)
        //     ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
        //     ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
        if ($taxDetails->panchayat_id != $adminId) {
            return back()->with('error', 'You are not authorized to access this record');
        }
        $homeTaxes = HomeTax::join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->where('home_taxes.property_id', $taxDetails->property_id)
            ->with('property') 
            ->where('home_taxes.panchayat_id', $adminId)
            ->where('home_taxes.year', $taxDetails->year)
            ->select(
                'home_taxes.*',
                'admins.name_mr as panchayat_name_mr',
                'admins.address_mr as panchayat_address_mr',
                'admins.digital_signature as panchayat_digital_signature',
                'panchayat_taxes.*'
            )
            ->get()
            ->map(function ($details) {
                $property = $details->property;

                if ($property) {
                    $typeMap = [
                        'RCC' => 'rcc',
                        'Flat' => 'flat',
                        'Mud brick house' => 'mud_brick',
                        'House of sticks' => 'sticks',
                    ];

                    $prefix = $property->description === 'MIDC' ? 'midc' : ($property->description === 'Open plot' ? 'open_plot' : 
                    ($property->description === 'Commercial' ? 'commercial' :
                    ($typeMap[$property->house_type] ?? null)));
                    if ($property->description === 'Open plot') {
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate_data = $details->{$prefix . '_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                        }
                    }else{
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate_data = $details->{$prefix . '_open_plot_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                            $details->health_tax_rate = $details->{$prefix . '_health_tax'};
                            $details->lamp_tax_rate = $details->{$prefix . '_lamp_tax'};
                            $details->water_tax_rate = $details->{$prefix . '_water_tax'};
                        }
                    }
                }

                return $details;
            });

        $tax = $homeTaxes->first();

        //    dd($tax);
        return view('panchayat.pages.hometax.demand_bill', compact('tax'));
    }

   
    public function homeTaxPaymentRecipt($id)
    {
        $taxDetails = HomeTax::find($id);
        //  dd($taxDetails); 
        $adminId = Auth::guard('panchayat')->user()->id;

        if ($taxDetails->panchayat_id != $adminId) {
            return back()->with('error', 'You are not authorized to access this record');
        }
        $previousYearTax = HomeTax::where('property_id', $taxDetails->property_id)
                                ->where('year', $taxDetails->year - 1)
                                ->first();
        
        $homeTaxes = HomeTax::with('property')
            ->where('property_id', $taxDetails->property_id)
            ->where('year', $taxDetails->year)
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->select(
                'home_taxes.*',
                'admins.name_mr as panchayat_name_mr',
                'admins.address_mr as panchayat_address_mr',
                'panchayat_taxes.*'
            )
            ->get()
            ->map(function ($details) {
                $property = $details->property;

                if ($property) {
                    $typeMap = [
                        'RCC' => 'rcc',
                        'Flat' => 'flat',
                        'Mud brick house' => 'mud_brick',
                        'House of sticks' => 'sticks',
                    ];

                    $prefix = $property->description === 'MIDC' ? 'midc' : ($property->description === 'Open plot' ? 'open_plot' : 
                    ($property->description === 'Commercial' ? 'commercial' :
                    ($typeMap[$property->house_type] ?? null)));
                    if ($property->description === 'Open plot') {
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate_data_val = $details->{$prefix . '_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                        }
                    }else{
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate_val = $details->{$prefix . '_open_plot_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                            $details->health_tax_rate = $details->{$prefix . '_health_tax'};
                            $details->lamp_tax_rate = $details->{$prefix . '_lamp_tax'};
                            $details->water_tax_rate = $details->{$prefix . '_water_tax'};
                        }
                    }
                }

                return $details;
            });

        $tax = $homeTaxes->first();
        // dd($tax);
        $squareMeter = $tax->property->area_in_sqmt;
        $capitalValue = ($squareMeter * $tax->open_plot_readireckoner_rate_val) +
            (($squareMeter * $tax->builtup_area_readireckoner_rate * $tax->depreciation) * $tax->usage_rate);
        $homeTax = (($capitalValue / 1000) * $tax->home_tax_rate);

        $tax->capital_value = $capitalValue;
        $tax->total_home_tax = round($homeTax);
        $tax->recipt_id = $id;
        
        $pay_bill_date = Carbon::parse($taxDetails->created_at)->format('d-m-Y');
        // Translator instance
        $translator = new GoogleTranslate('mr');

        // Marathi date
        $pay_bill_date_mr = $this->convertToMarathiDigits($translator->translate($pay_bill_date));

        // In-words
        $in_word_data = $this->convertNumberToWords($tax->home_pay_tax_amount ?? 0.00);
        $in_word = $translator->translate($in_word_data);

        // Helper function to format and convert number to Marathi digits
        $formatToMarathi = function ($number) {
            return $this->convertToMarathiDigits(number_format($number ?? 0, 2, '.', ''));
        };
        
        // Final tax array
        // $tax = [
        //     'panchayat_address_mr' => $tax->panchayat_address_mr ?? '',
        //     'recipt_id' => $this->convertToMarathiDigits($tax->recipt_id ?? 0.00),
        //     'owner_name_mr' => optional($tax->property)->owner_name_mr ?? '',
        //     'property_no' => $tax->property->property_no,
        //     'year' => $this->convertToMarathiDigits($tax->year ?? 0.00),
        //     'total_home_tax' => $formatToMarathi($tax->total_home_tax),
        //     'lamp_tax_rate' => $this->convertToMarathiDigits(
        //         $tax->property->description != 'Open plot' ? ($tax->lamp_tax_rate ?? 0.00) : 0.00
        //     ),
        //     'health_tax_rate' => $this->convertToMarathiDigits($tax->property->description != 'Open plot' ?($tax->health_tax_rate ?? 0.00) : 0.00),
        //     'water_tax_rate' => $this->convertToMarathiDigits($tax->property->description != 'Open plot' ?($tax->water_tax_rate ?? 0.00) : 0.00),
        //     'special_tax_rate' => $this->convertToMarathiDigits($tax->property->description != 'Open plot' ?($tax->special_tax_rate ?? 0.00) : 0.00),
        //     'calculated_home_tax' => $this->convertToMarathiDigits($tax->calculated_home_tax ?? 0.00),
        //     'tax_penalty' => $formatToMarathi($tax->tax_penalty),
        //     'tax_discount' => $formatToMarathi($tax->tax_discount),
        //     'home_pay_tax_amount' => $this->convertToMarathiDigits($tax->home_pay_tax_amount ?? 0.00),
        //     'created_at' => $pay_bill_date_mr ?? '',
        //     'home_pay_tax_amount_in_word' => $in_word,
        // ];

        //    dd($tax, $previousYearTax);
        $recivedAmount = TransectionHistory::where('home_taxes_id', $id)
        ->where('property_id', $taxDetails->property_id)
        ->where('panchayat_id',$taxDetails->panchayat_id)
        ->orderBy('id', 'desc')
        ->first();
        //  dd($previousYearTax);
        $recInWord = $this->convertNumberToWords($recivedAmount->amount);
        return view('panchayat.pages.hometax.payment_recipt', compact('tax', 'previousYearTax', 'recInWord', 'recivedAmount'));
    }


    public function homeTaxPaymentChalan($id)
    {
        $taxDetails = HomeTax::find($id);
        $homeTaxes = HomeTax::with('property')
            ->where('property_id', $taxDetails->property_id)
            ->where('year', $taxDetails->year)
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->select(
                'home_taxes.*',
                'admins.name_mr as panchayat_name_mr',
                'admins.address_mr as panchayat_address_mr',
                'panchayat_taxes.*'
            )
            ->get()
            ->map(function ($details) {
                $property = $details->property;

                if ($property) {
                    $typeMap = [
                        'RCC' => 'rcc',
                        'Flat' => 'flat',
                        'Mud brick house' => 'mud_brick',
                        'House of sticks' => 'sticks',
                    ];

                    $prefix = $property->description === 'MIDC' ? 'midc' : ($property->description === 'Open plot' ? 'open_plot' : 
                    ($property->description === 'Commercial' ? 'commercial' :
                    ($typeMap[$property->house_type] ?? null)));
                    if ($property->description === 'Open plot') {
                       
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate = $details->{$prefix . '_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                        }
                    }else{
                        if ($prefix) {
                            $details->open_plot_readireckoner_rate = $details->{$prefix . '_open_plot_readireckoner_rate'};
                            $details->builtup_area_readireckoner_rate = $details->{$prefix . '_builtup_area_readireckoner_rate'};
                            $details->depreciation = $details->{$prefix . '_depreciation_rate'};
                            $details->usage_rate = $details->{$prefix . '_usage_rate'};
                            $details->home_tax_rate = $details->{$prefix . '_tax_rate'};
                            $details->health_tax_rate = $details->{$prefix . '_health_tax'};
                            $details->lamp_tax_rate = $details->{$prefix . '_lamp_tax'};
                            $details->water_tax_rate = $details->{$prefix . '_water_tax'};
                        }
                    }
                }

                return $details;
            });

        $tax = $homeTaxes->first();
        $panchayatId = Auth::guard('panchayat')->user()->id;
        
        // Get previous year tax data
        $previousYearTax = HomeTax::where('property_id', $taxDetails->property_id)
            ->where('year', $taxDetails->year - 1)
            ->where('panchayat_id', $panchayatId)
            ->first();

        $squareMeter = $tax->property->area_in_sqmt;
        $capitalValue = ($squareMeter * $tax->open_plot_readireckoner_rate) +
            (($squareMeter * $tax->builtup_area_readireckoner_rate * $tax->depreciation) * $tax->usage_rate);
        $homeTax = (($capitalValue / 1000) * $tax->home_tax_rate);

        $tax->capital_value = $capitalValue;
        $tax->total_home_tax = round($homeTax);
        $tax->recipt_id = $id;
        
        $pay_bill_date = Carbon::parse($taxDetails->created_at)->format('d-m-Y');
        // Translator instance
        $translator = new GoogleTranslate('mr');

        // Marathi date
        $pay_bill_date_mr = $this->convertToMarathiDigits($translator->translate($pay_bill_date));

        // In-words
        $in_word_data = $this->convertNumberToWords($tax->home_pay_tax_amount ?? 0.00);
        $in_word = $translator->translate($in_word_data);

        // Helper function to format and convert number to Marathi digits
        $formatToMarathi = function ($number) {
            return $this->convertToMarathiDigits(number_format($number ?? 0.00, 2, '.', ''));
        };
       
        // Prepare tax data array
        $taxData = [
            'panchayat_address_mr' => $tax->panchayat_address_mr ?? '',
            'recipt_id' => $this->convertToMarathiDigits($tax->recipt_id ?? 0.00),
            'owner_name_mr' => optional($tax->property)->owner_name_mr ?? '',
            'property_no' => $tax->property->property_no,
            'year' => $this->convertToMarathiDigits($tax->year ?? 0.00),
            'total_home_tax' => $formatToMarathi($tax->total_home_tax),
            'lamp_tax_rate' => $this->convertToMarathiDigits($tax->lamp_tax_rate ?? 0.00),
            'health_tax_rate' => $this->convertToMarathiDigits($tax->health_tax_rate ?? 0.00),
            'water_tax_rate' => $this->convertToMarathiDigits($tax->water_tax_rate ?? 0.00),
            'special_tax_rate' => $this->convertToMarathiDigits($tax->special_tax_rate ?? 0.00),
            'calculated_home_tax' => $this->convertToMarathiDigits($tax->calculated_home_tax ?? 0.00),
            'tax_penalty' => $formatToMarathi($tax->tax_penalty),
            'tax_discount' => $formatToMarathi($tax->tax_discount),
            'home_pay_tax_amount' => $this->convertToMarathiDigits($tax->home_pay_tax_amount ?? 0.00),
            'created_at' => $pay_bill_date_mr ?? '',
            'home_pay_tax_amount_in_word' => $in_word,
            
            // Previous year tax data
            'previous_year' => $previousYearTax ? $this->convertToMarathiDigits($taxDetails->year - 1) : '',
            'previous_calculated_home_tax' => $previousYearTax ? $this->convertToMarathiDigits($previousYearTax->calculated_home_tax ?? 0.00) : '',
            'previous_home_pay_tax_amount' => $previousYearTax ? $this->convertToMarathiDigits($previousYearTax->home_pay_tax_amount ?? 0.00) : '',
            'previous_home_due_tax_amount' => $previousYearTax ? $this->convertToMarathiDigits($previousYearTax->home_due_tax_amount ?? 0.00) : '',
            'previous_tax_penalty' => $previousYearTax ? $formatToMarathi($previousYearTax->tax_penalty) : '',
            'previous_tax_discount' => $previousYearTax ? $formatToMarathi($previousYearTax->tax_discount) : '',
        ];
            // dd($taxData);
        return view('panchayat.pages.hometax.payment_chalan', compact('taxData'));
    }





    public function convertToMarathiDigits($string)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $marathi = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return str_replace($english, $marathi, $string);
    }

    public function convertNumberToWords($number)
    {
        $words = array(
            '0' => 'zero', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
            '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven',
            '12' => 'twelve', '13' => 'thirteen', '14' => 'fourteen', '15' => 'fifteen', '16' => 'sixteen',
            '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty',
            '40' => 'forty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninety'
        );

        if (!is_numeric($number)) {
            return 'Invalid number';
        }

        $number = round($number, 2);
        $no = floor($number);
        $point = round(($number - $no) * 100);
        $result = '';

        // Handle numbers less than 1000 (standard format)
        if ($no < 1000) {
            $result = $this->convertUnder1000($no, $words);
        }
        // Handle numbers between 1000 and 99,999 (thousands)
        elseif ($no < 100000) {
            $thousands = floor($no / 1000);
            $remainder = $no % 1000;
            $result = $this->convertUnder1000($thousands, $words) . ' thousand';
            if ($remainder > 0) {
                $result .= ' ' . $this->convertUnder1000($remainder, $words);
            }
        }
        // Handle numbers ≥ 1,00,000 (lakhs)
        elseif ($no < 10000000) {
            $lakhs = floor($no / 100000);
            $remainder = $no % 100000;
            $result = $this->convertUnder1000($lakhs, $words) . ' lakh';
            if ($remainder > 0) {
                $result .= ' ' . $this->convertNumberToWords($remainder); // Recursively handle remaining amount
            }
        }
        // Handle numbers ≥ 1,00,00,000 (crores)
        else {
            $crores = floor($no / 10000000);
            $remainder = $no % 10000000;
            $result = $this->convertUnder1000($crores, $words) . ' crore';
            if ($remainder > 0) {
                $result .= ' ' . $this->convertNumberToWords($remainder); // Recursively handle remaining amount
            }
        }

        $result .= ' rupees';

        // Handle decimal part (paise)
        if ($point > 0) {
            $pointWord = $this->convertUnder1000($point, $words);
            $result .= ' and ' . $pointWord . ' paise';
        }

        return ucfirst(trim($result)) . ' only';
    }

    // Helper function to convert numbers under 1000
    private function convertUnder1000($number, $words)
    {
        $result = '';
        if ($number < 20) {
            $result = $words[$number];
        } elseif ($number < 100) {
            $tens = floor($number / 10) * 10;
            $units = $number % 10;
            $result = $words[$tens];
            if ($units > 0) {
                $result .= ' ' . $words[$units];
            }
        } elseif ($number < 1000) {
            $hundreds = floor($number / 100);
            $remainder = $number % 100;
            $result = $words[$hundreds] . ' hundred';
            if ($remainder > 0) {
                $result .= ' ' . $this->convertUnder1000($remainder, $words);
            }
        }
        return $result;
    }


    // public function taxStore()
    // {
    //     // return 1;
    //     //dd($request->all());
    //     // Validate the request
    //     // $request->validate([
    //     //     'year'                            => 'required',
    //     //     'property_id'                     => 'required',
    //     // ]);
    //     // Check if bill already generated
    //     $proNos = range(5422, 6603);

    //         // dd($proNos);
    //     foreach($proNos as $proNo){

    //         $existingHomeTax = HomeTax::where('property_id', $proNo)
    //         ->where('year', 2024)
    //         ->first();
    //         if ($existingHomeTax) {
    //         return back()->with('error', 'Bill already generated for this property and year.');
    //         }
    
    //         // Fetch the property based on the selected property_id
    //         $property    = Property::findOrFail($proNo);
             
    //         $squareMeter = $property->area_in_sqmt;
    //         $panchayatTaxes = DB::table('panchayat_taxes')->where('panchayat_id', Auth::guard('admin')->user()->id)->first();
           
    //         if ($property->description == "House" && $property->house_type == "RCC") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->rcc_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->rcc_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->rcc_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->rcc_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->rcc_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->rcc_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->rcc_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->rcc_water_tax;
    
    //         }
    //         elseif ($property->description == "House" && $property->house_type == "Flat") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->flat_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->flat_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->flat_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->flat_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->flat_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->flat_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->flat_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->flat_water_tax;
    //         }
    //         elseif ($property->description == "House" && $property->house_type == "Mud brick house") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->mud_brick_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->mud_brick_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->mud_brick_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->mud_brick_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->mud_brick_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->mud_brick_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->mud_brick_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->mud_brick_water_tax;
    //         }
    //         elseif ($property->description == "House" && $property->house_type == "House of sticks") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->sticks_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->sticks_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->sticks_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->sticks_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->sticks_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->sticks_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->sticks_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->sticks_water_tax;
    //         }
    //         elseif ($property->description == "MIDC") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->midc_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->midc_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->midc_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->midc_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->midc_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->midc_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->midc_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->midc_water_tax;
    //         }
    //         elseif ($property->description == "Commercial") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->commercial_open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->commercial_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->commercial_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->commercial_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->commercial_tax_rate;
    //             $health_tax_rate = $panchayatTaxes->commercial_health_tax;
    //             $lamp_tax_rate = $panchayatTaxes->commercial_lamp_tax;
    //             $water_tax_rate = $panchayatTaxes->commercial_water_tax;
    //         }
    //         elseif ($property->description == "Open plot") {
    //             $open_plot_readireckoner_rate = $panchayatTaxes->open_plot_readireckoner_rate;
    //             $builtup_area_readireckoner_rate = $panchayatTaxes->open_plot_builtup_area_readireckoner_rate;
    //             $depreciation = $panchayatTaxes->open_plot_depreciation_rate;
    //             $usage_rate = $panchayatTaxes->open_plot_usage_rate;
    //             $home_tax_rate = $panchayatTaxes->open_plot_tax_rate;
    //         }
    //         // else {
    //         //     return back()->with('error', 'Unsupported property description or house type. Please check the property details.');
    //         // }
    
    //         // Calculate Capital Value
    //         $capitalValue = ($squareMeter * $open_plot_readireckoner_rate) +
    //             (($squareMeter * $builtup_area_readireckoner_rate * $depreciation) * $usage_rate);
    
    //         // Calculate home tax
    //         $homeTax = (($capitalValue / 1000) * $home_tax_rate);
    
    //         // Get Total Tax including additional fixed taxes
    //         if ($property->description == "Open plot") {
    //             $getTotalTax = $homeTax;
    //         }else{
    //             $getTotalTax = $homeTax +
    //             ($health_tax_rate ?? 0) +
    //             ($lamp_tax_rate ?? 0) +
    //             ($water_tax_rate ?? 0) +
    //             ($panchayatTaxes->special_tax_rate ?? 0);
    //         }
    //         $TotalTax = round($getTotalTax);
            
           
    //         // Insert data into the database including the calculated home tax
    //         $homeTax = HomeTax::create([
    
    //             'panchayat_id'                    => Auth::guard('admin')->user()->id,
    //             'property_id'                     => $proNo,
    //             'year'                            => 2024,
    //             'calculated_home_tax'             => $TotalTax, 
                
    //         ]); 
    //     }

    //     return 'done';
    //     // return redirect()->route('panchayat.hometaxes.details', $homeTax->id)->with('success', 'Home tax record created successfully.');
    // }



}

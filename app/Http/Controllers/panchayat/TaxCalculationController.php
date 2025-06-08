<?php
namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Models\HealthTax;
use App\Models\HomeTax;
use App\Models\LampTax;
use App\Models\Penalty;
use App\Models\Property;
use App\Models\PanchayatTaxes;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;
use DB;

class TaxCalculationController extends Controller
{

    public function hometaxList()
    {
        $adminId = Auth::guard('admin')->user()->id;
        $homeTaxes = HomeTax::with('property')
            ->join('admins', 'home_taxes.panchayat_id', '=', 'admins.id')
            ->join('panchayat_taxes', 'home_taxes.panchayat_id', '=', 'panchayat_taxes.panchayat_id')
            ->where('home_taxes.panchayat_id', $adminId)
            ->where('home_taxes.year', '>', 2024)
             ->select(
                'panchayat_taxes.*',
                'home_taxes.*',
                'admins.name as panchayat_name',
            )
            ->orderBy('home_taxes.id', 'desc')
            // ->take(1)
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

                // Attach calculated values
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
        //    dd($homeTaxes);
        return view('panchayat.pages.hometax.index', compact('homeTaxes'));
    }


    // Create - Show form for creating a new record
    public function hometaxCreate()
    {
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        
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
        $panchayatTaxes = DB::table('panchayat_taxes')->where('panchayat_id', Auth::guard('admin')->user()->id)->first();
       
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

            'panchayat_id'                    => Auth::guard('admin')->user()->id,
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
            ($health_tax_rate ?? 0) +
            ($lamp_tax_rate ?? 0) +
            ($water_tax_rate ?? 0) +
            ($panchayatTaxes->special_tax_rate ?? 0);
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
        $panchayatId = Auth::guard('admin')->user()->id;
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
        $panchayat_id = Auth::guard('admin')->user()->id;

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
    public function homeTaxPaymentDueCreate(HomeTax $hometax)
    {

        $panchayatId = Auth::guard('admin')->user();
        $properties  = Property::where('panchayat_id', $panchayatId->id)->get();

        return view('panchayat.pages.hometax.due_create', compact('properties', 'hometax'));
    }

    public function homeTaxPaymentDueStore(Request $request, HomeTax $hometax)
    {
        $request->validate([
            'home_pay_tax_amount' => 'required|numeric',
        ]);
    
        $adminId = Auth::guard('admin')->user()->id;
    
        $paidNow = floatval($request->home_pay_tax_amount);
        $discount = floatval($request->tax_discount ?? 0);
        $penalty = floatval($request->tax_penalty ?? 0);
    
        $existingPaidTax = $hometax->home_pay_tax_amount ?? 0;
        $totalPaid = $existingPaidTax + $paidNow;
    
        // Adjust original tax with discount/penalty
        $adjustedTax = $hometax->calculated_home_tax;
    
        if ($request->option === 'discount') {
            $adjustedTax -= $discount;
        } elseif ($request->option === 'penalty') {
            $adjustedTax += $penalty;
        }
    
        $dueTax = $adjustedTax - $totalPaid;
    
        // Update the HomeTax record
        $hometax->update([
            'home_pay_tax_amount' => $totalPaid,
            'home_due_tax_amount' => $dueTax,
            'tax_discount' => $discount > 0 ? $discount : null,
            'tax_penalty' => $penalty > 0 ? $penalty : null,
            'updated_at' => now(),
        ]);
    
        return redirect()->route('panchayat.hometaxes.index')->with('success', 'Home tax record updated successfully.');
    }
    
    //Health Tax
    public function healthtaxList()
    {
        $healthTaxes = HealthTax::orderby('id', 'desc')->with('property')->get();
        return view('panchayat.pages.healthtax.health_tax_list', compact('healthTaxes'));
    }
    public function healthTaxPaymentCreate()
    {
        $panchayatId = Auth::guard('admin')->user()->id;
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
            'panchayat_id'     => Auth::guard('admin')->user()->id,
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
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.healthtax.health_tax_due_create', compact('properties', 'healthtax'));
    }

    public function healthTaxPaymentDueStore(Request $request, HealthTax $healthtax)
    {
        //dd($request->all());
        $request->validate([

            'pay_tax_amount' => 'required',

        ]);
        $panchayatId = Auth::guard('admin')->user()->id;

        $healthTaxDue = HealthTax::where('panchayat_id', Auth::guard('admin')->user()->id)->where('property_id', $healthtax->property_id)->where('year', $healthtax->year)->update([
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
        $panchayatId = Auth::guard('admin')->user()->id;
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

        $tax_payment = LampTax::where('property_id', $request->property_id)->where('panchayat_id', Auth::guard('admin')->user()->id)->where('year', $request->year)->first();
        //    dd( $tax_payment );

        LampTax::create([
            'panchayat_id'   => Auth::guard('admin')->user()->id,
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
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::where('panchayat_id', $panchayatId)->get();
        return view('panchayat.pages.lamptax.lamp_tax_due_create', compact('properties', 'lamptax'));
    }
    public function lampTaxPaymentDueStore(Request $request, LampTax $lamptax)
    {
        //dd($request->all());
        $request->validate([

            'pay_tax_amount' => 'required',

        ]);
        $panchayatId = Auth::guard('admin')->user()->id;
        $lampTaxDue  = LampTax::where('panchayat_id', Auth::guard('admin')->user()->id)->where('property_id', $lamptax->property_id)->where('year', $lamptax->year)->update([
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
        $panchayatId = Auth::guard('admin')->user()->id;
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
            'panchayat_id'     => Auth::guard('admin')->user()->id,
            'property_id'      => $request->property_id,
            'year'             => $request->year,
            'penalty'          => $request->penalty,
            'penalty_discount' => $request->penalty_discount,
            'total_penalty'    => ($request->penalty * $request->penalty_discount) / 100,
        ]);
        return redirect()->route('panchayat.penalty.index')->with('success', 'Penalty created successfully.');

    }

    public function namunaNineBulk(){
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderby('id', 'desc')->get();
       
        return view('panchayat.pages.namuna_eight_nine.namuna_nine_bulk', compact('properties'));
    }

    public function namunaNineSelect()
    {
        // $panchayatId = Auth::guard('admin')->user()->id;
        // $properties  = Property::where('panchayat_id', $panchayatId)->orderby('id', 'desc')->get();
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderby('id', 'desc')->get();
       
        return view('panchayat.pages.namuna_eight_nine.namuna_nine', compact('properties'));
    }

    public function namunaNineBulkDownload(Request $request)
    {
        
        $request->validate([
            'property_id' => 'required|array',
            'property_id.*' => 'exists:properties,id',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $responseData = [];
        $previousYear = $request->year - 1;
        
        foreach ($request->property_id as $propertyId) {
            // Get current year data
            $currentYearTax = HomeTax::with('property')
                ->where('property_id', $propertyId)
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
                ->first();

            // Get previous year data
            $previousYearTax = HomeTax::with('property')
                ->where('property_id', $propertyId)
                ->where('year', $previousYear)
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
                ->first();

            if ($currentYearTax || $previousYearTax) {
                $propertyData = [
                    'property_id' => $propertyId,
                    'property_no' => $currentYearTax->property->property_no ?? $previousYearTax->property->property_no,
                    'owner_name' => $currentYearTax->property->owner_name ?? $previousYearTax->property->owner_name,
                    'owner_name_mr' => $currentYearTax->property->owner_name_mr ?? $previousYearTax->property->owner_name_mr,
                    'current_year' => $request->year,
                    'previous_year' => $previousYear,
                    'current_year_data' => null,
                    'previous_year_data' => null,
                    'comparison' => []
                ];

                // Process current year data
                if ($currentYearTax) {
                    $currentTax = $this->calculateTaxDetails($currentYearTax);
                    $propertyData['current_year_data'] = $currentTax;
                }

                // Process previous year data
                if ($previousYearTax) {
                    $previousTax = $this->calculateTaxDetails($previousYearTax);
                    $propertyData['previous_year_data'] = $previousTax;
                }

                // Calculate comparison metrics if both years exist
                if ($currentYearTax && $previousYearTax) {
                    $propertyData['comparison'] = [
                        'home_tax_diff' => $currentTax['total_tax'] - $previousTax['total_tax'],
                        'home_tax_percentage_diff' => $previousTax['total_tax'] > 0 ? 
                            (($currentTax['total_tax'] - $previousTax['total_tax'])) / $previousTax['total_tax'] * 100 : 0,
                        'capital_value_diff' => $currentTax['capital_value'] - $previousTax['capital_value'],
                        'capital_value_percentage_diff' => $previousTax['capital_value'] > 0 ? 
                            (($currentTax['capital_value'] - $previousTax['capital_value']) / $previousTax['capital_value'] * 100) : 0,
                    ];
                }

                $responseData[] = $propertyData;
            }
        }
        
        if (empty($responseData)) {
            return redirect()
                ->back()
                ->with(['message' => 'No data found for selected properties and years'])
                ->withInput();
        }

        // if ($request->has('download')) {
            return $this->generateComparisonPdf($responseData);
        // }
    }

    
    private function calculateTaxDetails($homeTax)
    {
        $squareMeter = $homeTax->property->area_in_sqmt;
        $openPlotRate = $homeTax->open_plot_readireckoner_rate;
        $builtupAreaRate = $homeTax->builtup_area_readireckoner_rate;
        $depreciation = $homeTax->depreciation;
        $usageRate = $homeTax->usage_rate;
        $homeTaxRate = $homeTax->home_tax_rate;

        // Calculate Capital Value
        $capitalValue = ($squareMeter * $openPlotRate) +
            (($squareMeter * $builtupAreaRate * $depreciation) * $usageRate);

        // Calculate home tax
        $homeTaxAmount = (($capitalValue / 1000) * $homeTaxRate);

        // Calculate total tax
        if ($homeTax->property->description == "Open plot") {
            $totalTax = $homeTaxAmount;
        } else {
            $totalTax = $homeTaxAmount +
                ($homeTax->health_tax_rate ?? 0) +
                ($homeTax->lamp_tax_rate ?? 0) +
                ($homeTax->water_tax_rate ?? 0) +
                ($homeTax->special_tax_rate ?? 0);
        }

        return [
            'id' => $homeTax->id,
            'year' => $homeTax->year,
            'capital_value' => $capitalValue,
            'home_tax_amount' => $homeTaxAmount,
            'health_tax' => $homeTax->health_tax_rate ?? 0,
            'lamp_tax' => $homeTax->lamp_tax_rate ?? 0,
            'water_tax' => $homeTax->water_tax_rate ?? 0,
            'special_tax' => $homeTax->special_tax_rate ?? 0,
            'total_tax' => $totalTax,
            'panchayat_name' => $homeTax->panchayat_name,
            'panchayat_name_mr' => $homeTax->panchayat_name_mr,
            'panchayat_address' => $homeTax->panchayat_address,
            'panchayat_address_mr' => $homeTax->panchayat_address_mr,
        ];
    }

    private function generateComparisonPdf($properties)
    {
        // dd($properties);
        $pdf = Pdf::loadView('panchayat.pages.namuna_eight_nine.bulk_pdf', [
            'properties' => $properties,
            'currentDate' => now()->format('d-m-Y')
        ]);
        
        return $pdf->download('tax_comparison_report_'.date('YmdHis').'.pdf');
    }
    public function namunaNineDetails(Request $request)
    {
        //  dd($request->all());
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

        $homeTaxes = HomeTax::with('property')
            ->where('property_id', $request->property_id)
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
            //  dd($homeTaxes);
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
            'previous_home_tax_amount' => round($request->calculated_home_tax ?? 0, 2) ?? 0.00,
            'previous_health_tax_amount' => round($request->calculated_health_tax ?? 0, 2) ?? 0.00,
            'previous_lamp_tax_amount' => round($request->calculated_lamp_tax ?? 0, 2) ?? 0.00,
            'previous_total_tax_amount' => round($request->total_tax ?? 0, 2) ?? 0.00
        ];


        //  dd($responseData);


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
        $panchayatId = Auth::guard('admin')->user()->id;
        $properties  = Property::whereHas('hometax')->where('panchayat_id', $panchayatId)->orderby('id', 'desc')->get();
       
        return view('panchayat.pages.namuna_eight_nine.namuna_eight', compact('properties'));
    }

    public function namunaEightDetails(Request $request)
    {

        $request->validate([
            'property_id' => 'required',
            // 'year'        => 'required',
        ]);
        //   dd($request->all());
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
        
        return view('panchayat.pages.namuna_eight_nine.namuna_eight_details', compact('homeTaxes'));

    }
   


    public function homeTaxDemandBill($id){
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

        //   dd($tax);
        return view('panchayat.pages.hometax.demand_bill', compact('tax'));
    }

   
    public function homeTaxPaymentRecipt($id)
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
            return $this->convertToMarathiDigits(number_format($number ?? 0, 2, '.', ''));
        };

        // Final tax array
        $tax = [
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
        ];

        //   dd($tax);
        return view('panchayat.pages.hometax.payment_recipt', compact('tax'));
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
            '0' => 'zero','1' => 'one','2' => 'two','3' => 'three','4' => 'four','5' => 'five',
            '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven',
            '12' => 'twelve','13' => 'thirteen','14' => 'fourteen','15' => 'fifteen','16' => 'sixteen',
            '17' => 'seventeen','18' => 'eighteen','19' =>'nineteen','20' => 'twenty','30' => 'thirty',
            '40' => 'forty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninety'
        );

        $digits = ['', 'hundred', 'thousand', 'lakh', 'crore'];

        if (!is_numeric($number)) {
            return 'Invalid number';
        }

        $number = round($number, 2);
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $str = [];
        $i = 0;

        while ($no > 0) {
            $divider = ($i == 2) ? 10 : 100;
            $part = $no % $divider;
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;

            if ($part) {
                $word = '';
                if ($part < 21) {
                    $word = $words[$part];
                } else {
                    $word = $words[floor($part / 10) * 10] . ' ' . $words[$part % 10];
                }
                $str[] = $word . ' ' . $digits[count($str)];
            }
        }

        $str = array_reverse($str);
        $result = implode(' ', $str);

        if ($point > 0) {
            $pointWord = '';
            if ($point < 21) {
                $pointWord = $words[$point];
            } else {
                $pointWord = $words[floor($point / 10) * 10] . ' ' . $words[$point % 10];
            }
            $result .= ' and ' . $pointWord . ' paise';
        }

        return ucfirst(trim($result));
    }
}

<?php
namespace App\Http\Controllers\panchayat;

use App\Http\Controllers\Controller;
use App\Imports\BirthCertificateImport;
use App\Imports\DeathCertificateImport;
use App\Models\Admin;
use App\Models\BirthCertificate;
use App\Models\DeathCertificate;
use App\Models\MarriageCertificate;
use Illuminate\Support\Facades\Validator;
use App\Models\OldCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Stichoza\GoogleTranslate\GoogleTranslate;
use DB;

class CertificateController extends Controller
{

    public function birthCertificateCreate()
    {
        return view('panchayat.pages.certificate.birth_certificate_create');
    }
    public function birthCertificateStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'panchayat_id'         => 'nullable|integer',
            'childname'            => 'required|string|max:255',
            'dob'                  => 'required|date',
            'gender'               => 'required',
            'father_name'          => 'required|string|max:255',
            'mother_name'          => 'required|string|max:255',
            'birth_place'          => 'required',
            'permanent_address'    => 'required',
            'registration_number'  => 'required|string|max:100',
            'registration_date'    => 'required|date',
            'issue_date'           => 'required|date',
            'number'               => 'required|max:50',
            'remarks'              => 'nullable',
            'parent_address'       => 'required',
            'parent_nationality'   => 'required',
            'adhar_card_no_father' => 'required',
            'adhar_card_no_mother' => 'required',

        ]);

        // Create a new certificate record using an associative array
        $birthCertificate = BirthCertificate::create([
            'panchayat_id'           => Auth::guard('admin')->user()->id,
            'childname'              => $request->childname,
            'childname_mr'           => GoogleTranslate::trans($request->childname, 'mr'),
            'dob'                    => $request->dob,
            'gender'                 => $request->gender,
            'gender_mr'              => GoogleTranslate::trans($request->gender, 'mr'),
            'father_name'            => $request->father_name,
            'father_name_mr'         => GoogleTranslate::trans($request->father_name, 'mr'),
            'mother_name'            => $request->mother_name,
            'mother_name_mr'         => GoogleTranslate::trans($request->mother_name, 'mr'),
            'birth_place'            => $request->birth_place,
            'birth_place_mr'         => GoogleTranslate::trans($request->birth_place, 'mr'),
            'permanent_address'      => $request->permanent_address,
            'permanent_address_mr'   => GoogleTranslate::trans($request->permanent_address, 'mr'),
            'registration_number'    => $request->registration_number,
            'registration_number_mr' => GoogleTranslate::trans($request->registration_number, 'mr'),
            'registration_date'      => $request->registration_date,
            'issue_date'             => $request->issue_date,
            'remarks'                => $request->remarks,
            'remarks_mr'             => GoogleTranslate::trans($request->remarks, 'mr'),
            'number'                 => $request->number,
            'parent_address'         => $request->parent_address,
            'parent_address_mr'      => GoogleTranslate::trans($request->parent_address, 'mr'),
            'parent_nationality'     => $request->parent_nationality,
            'parent_nationality_mr'  => GoogleTranslate::trans($request->parent_nationality, 'mr'),
            'adhar_card_no_father'   => $request->adhar_card_no_father,
            'adhar_card_no_mother'   => $request->adhar_card_no_mother,

        ]);
        return redirect()->route('panchayat.birthCertificate.edit', $birthCertificate->id)
            ->with('success', 'Certificate created successfully. You can now edit the details.');
    }

    public function birthCertificateList()
    {
        $birthCertificates = BirthCertificate::orderBy('id', 'desc')->where('panchayat_id', Auth::guard('admin')->user()->id)->get();
        return view('panchayat.pages.certificate.birth_certificate_list', compact('birthCertificates'));
    }
    public function birthCertificateDetails($id)
    {
        $details = BirthCertificate::with('panchayat')->findOrFail($id);
        $officer = Admin::where('panchayat_id', Auth::guard('admin')->user()->id)->where('user_type', 'officer')->first();
        return view('panchayat.pages.certificate.birth_certificate_details', compact('details', 'officer'));
    }
    public function birthCertificateAllValues($id)
    {
        $details = BirthCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.certificate.birth_certificate_all_values', compact('details'));
    }

    public function birthCertificateEdit($id)
    {
        $birthCertificate = BirthCertificate::findOrFail($id);
        return view('panchayat.pages.certificate.birth_certificate_edit', compact('birthCertificate'));
    }

    public function birthCertificateUpdate(Request $request, $id)
    {

        $request->validate([
            'panchayat_id'         => 'nullable|integer',
            'childname'            => 'required|string|max:255',
            'dob'                  => 'required|date',
            'gender'               => 'required',
            'father_name'          => 'required|string|max:255',
            'mother_name'          => 'required|string|max:255',
            'birth_place'          => 'required',
            'permanent_address'    => 'required',
            'registration_number'  => 'required|string|max:100',
            'registration_date'    => 'required|date',
            'issue_date'           => 'required|date',
            'number'               => 'required|max:50',
            'remarks'              => 'nullable',
            'parent_address'       => 'required',
            'parent_nationality'   => 'required',
            'adhar_card_no_father' => 'required',
            'adhar_card_no_mother' => 'required',

        ]);

        // Find the certificate by ID and update it
        $birthCertificate = BirthCertificate::findOrFail($id);
        $birthCertificate->update([
            'panchayat_id'           => Auth::guard('admin')->user()->id,
            'childname'              => $request->childname,
            'childname_mr'           => $request->childname_mr,
            'dob'                    => $request->dob,
            'gender'                 => $request->gender,
            'gender_mr'              => $request->gender_mr,
            'father_name'            => $request->father_name,
            'father_name_mr'         => $request->father_name_mr,
            'mother_name'            => $request->mother_name,
            'mother_name_mr'         => $request->mother_name_mr,
            'birth_place'            => $request->birth_place,
            'birth_place_mr'         => $request->birth_place_mr,
            'permanent_address'      => $request->permanent_address,
            'permanent_address_mr'   => $request->permanent_address_mr,
            'registration_number'    => $request->registration_number,
            'registration_number_mr' => $request->registration_number_mr,
            'registration_date'      => $request->registration_date,
            'issue_date'             => $request->issue_date,
            'remarks'                => $request->remarks,
            'remarks_mr'             => $request->remarks_mr,
            'number'                 => $request->number,
            'parent_address'         => $request->parent_address,
            'parent_address_mr'      => $request->parent_address_mr,
            'parent_nationality'     => $request->parent_nationality,
            'parent_nationality_mr'  => $request->parent_nationality_mr,
            'adhar_card_no_father'   => $request->adhar_card_no_father,
            'adhar_card_no_mother'   => $request->adhar_card_no_mother,
        ]);
        return redirect()->route('panchayat.birthCertificate.list')->with('success', 'Certificate updated successfully.');
    }

    public function birthCertificateBulkUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        try {
            $import = new BirthCertificateImport();
            Excel::import($import, $request->file('file'));
            Log::info('Bulk import completed.');
            return redirect()->back()->with('success', 'Data imported successfully!');
        } catch (\Exception $e) {
            Log::error('Error during import: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function deathCertificateList()
    {
        $deathCertificates = DeathCertificate::orderBy('id', 'desc')->where('panchayat_id', Auth::guard('admin')->user()->id)->get();
        return view('panchayat.pages.certificate.death_certificate_list', compact('deathCertificates'));
    }

    public function deathCertificateCreate()
    {
        return view('panchayat.pages.certificate.death_certificate_create');
    }
    public function deathCertificateStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'panchayat_id'           => 'nullable|integer',
            'name'                   => 'required|string|max:255',
            'dob'                    => 'required|date',
            'gender'                 => 'required',
            'father_or_husband_name' => 'required|string|max:255',
            'death_place'            => 'required',
            'permanent_address'      => 'required',
            'registration_number'    => 'required|string|max:100',
            'registration_date'      => 'required|date',
            'remarks'                => 'nullable',
            'issue_date'             => 'required',
            'nationality'            => 'required',
            'adhar_card_no_deceased' => 'required',

        ]);
        $translator = new GoogleTranslate('mr');

        $dobFormatted = Carbon::parse($request->dob)->format('Y-m-d');
        $registrationDateFormatted = Carbon::parse($request->registration_date)->format('Y-m-d');
        $issueDateFormatted = Carbon::parse($request->issue_date)->format('Y-m-d');

        $dob_mr = $this->convertToMarathiDigits($translator->translate($dobFormatted));
        $registration_date_mr = $this->convertToMarathiDigits($translator->translate($registrationDateFormatted));
        $issue_date_mr = $this->convertToMarathiDigits($translator->translate($issueDateFormatted));

        $registration_no = $this->convertToMarathiDigits($request->registration_number);
        $aadhar_card = $this->convertToMarathiDigits($request->adhar_card_no_deceased);
       
        $deathCertificate = DeathCertificate::create([
            'panchayat_id'              => Auth::guard('admin')->user()->id,
            'name'                      => $request->name,
            'name_mr'                   => GoogleTranslate::trans($request->name, 'mr'),
            'dob'                       => $request->dob,
            'gender'                    => $request->gender,
            'gender_mr'                 => GoogleTranslate::trans($request->gender, 'mr'),
            'father_or_husband_name'    => $request->father_or_husband_name,
            'father_or_husband_name_mr' => GoogleTranslate::trans($request->father_or_husband_name, 'mr'),
            'mother_name'               => $request->mother_name,
            'mother_name_mr'            => GoogleTranslate::trans($request->mother_name, 'mr'),
            'death_place'               => $request->death_place,
            'death_place_mr'            => GoogleTranslate::trans($request->death_place, 'mr'),
            'permanent_address'         => $request->permanent_address,
            'permanent_address_mr'      => GoogleTranslate::trans($request->permanent_address, 'mr'),
            'registration_number'       => $request->registration_number,
            'registration_date'         => $request->registration_date,
            'remarks'                   => $request->remarks,
            'remarks_mr'                => GoogleTranslate::trans($request->remarks, 'mr'),
            'issue_date'                => $request->issue_date,
            'nationality'               => $request->nationality,
            'nationality_mr'            => GoogleTranslate::trans($request->nationality, 'mr'),
            'adhar_card_no_deceased'    => $request->adhar_card_no_deceased,
            
            'dob_mr' => $dob_mr,
            'registration_date_mr' => $registration_date_mr,
            'issue_date_mr' => $issue_date_mr,
            'registration_number_mr' => $registration_no,
            'adhar_card_no_deceased_mr' => $aadhar_card,

        ]);

        return redirect()->route('panchayat.deathCertificate.edit', $deathCertificate->id)
            ->with('success', 'Certificate created successfully. You can now edit the details.');
    }

    public function deathCertificateDetails($id)
    {

        $details = DeathCertificate::with('panchayat')->findOrFail($id);
        $officer = Admin::where('panchayat_id', Auth::guard('admin')->user()->id)->where('user_type', 'officer')->first();
        // dd($details);
        return view('panchayat.pages.certificate.death_certificate_details', compact('details', 'officer'));
    }

    public function deathCertificateEdit($id)
    {
        $deathCertificate = DeathCertificate::findOrFail($id);
        return view('panchayat.pages.certificate.death_certificate_edit', compact('deathCertificate'));
    }
    public function deathCertificateUpdate(Request $request, $id)
    {
        $request->validate([
            'name'                   => 'required|string|max:255',
            'dob'                    => 'required|date',
            'gender'                 => 'required',
            'father_or_husband_name' => 'required|string|max:255',
            'death_place'            => 'required',
            'permanent_address'      => 'required',
            'registration_number'    => 'required|string|max:100',
            'registration_date'      => 'required|date',
            'remarks'                => 'nullable|string',
            'issue_date'             => 'required|date',
            'nationality'            => 'required|string|max:255',
            'adhar_card_no_deceased' => 'required|string|max:255',
        ]);

        $translator = new GoogleTranslate('mr');

        $dobFormatted = Carbon::parse($request->dob)->format('Y-m-d');
        $registrationDateFormatted = Carbon::parse($request->registration_date)->format('Y-m-d');
        $issueDateFormatted = Carbon::parse($request->issue_date)->format('Y-m-d');

        $dob_mr = $this->convertToMarathiDigits($translator->translate($dobFormatted));
        $registration_date_mr = $this->convertToMarathiDigits($translator->translate($registrationDateFormatted));
        $issue_date_mr = $this->convertToMarathiDigits($translator->translate($issueDateFormatted));

        $registration_no = $this->convertToMarathiDigits($request->registration_number);
        $aadhar_card = $this->convertToMarathiDigits($request->adhar_card_no_deceased);
        $deathCertificate = DeathCertificate::findOrFail($id);
        // dd(Auth::guard('admin')->user()->id);
        $deathCertificate->update([
            'panchayat_id'              => Auth::guard('admin')->user()->id,
            'name'                      => $request->name,
            'name_mr'                   => $request->name_mr,
            'dob'                       => $request->dob,
            'gender'                    => $request->gender,
            'gender_mr'                 => $request->gender_mr,
            'father_or_husband_name'    => $request->father_or_husband_name,
            'father_or_husband_name_mr' => $request->father_or_husband_name_mr,
            'mother_name'               => $request->mother_name,
            'mother_name_mr'            => $request->mother_name_mr,
            'death_place'               => $request->death_place,
            'death_place_mr'            => $request->death_place_mr,
            'permanent_address'         => $request->permanent_address,
            'permanent_address_mr'      => $request->permanent_address_mr,
            'registration_number'       => $request->registration_number,
            'registration_date'         => $request->registration_date,
            'remarks'                   => $request->remarks,
            'remarks_mr'                => $request->remarks_mr,
            'issue_date'                => $request->issue_date,
            'nationality'               => $request->nationality,
            'nationality_mr'            => $request->nationality_mr,
            'adhar_card_no_deceased'    => $request->adhar_card_no_deceased,
            'dob_mr' => $dob_mr,
            'registration_date_mr' => $registration_date_mr,
            'issue_date_mr' => $issue_date_mr,
            'registration_number_mr' => $registration_no,
            'adhar_card_no_deceased_mr' => $aadhar_card,

        ]);
        // dd($deathCertificate); 
        return redirect()->route('panchayat.deathCertificate.list')->with('success', 'Certificate updated successfully.');
    }
    public function deathCertificateAllValues($id)
    {
        $details = DeathCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.certificate.death_certificate_all_values', compact('details'));
    }
    // public function deathCertificateBulkUpload(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xls,xlsx',
    //     ]);

    //     try {
    //         $import = new DeathCertificateImport();
    //         Excel::import($import, $request->file('file'));
    //         Log::info('Bulk import completed.');
    //         return redirect()->back()->with('success', 'Data imported successfully!');
    //     } catch (\Exception $e) {
    //         Log::error('Error during import: ' . $e->getMessage());
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }


    public function deathCertificateBulkUpload(Request $request)
    {
        ini_set('max_execution_time', 10000); // 5 minutes
        ini_set('memory_limit', '5000M');
        
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file));
        $header = array_shift($csvData);
   
        $translator = new GoogleTranslate('mr');
        $successCount = 0;
        $errorCount = 0;
        $errors = [];
        // dd(12);
        $id = Auth::guard('admin')->user()->id;
        DB::beginTransaction();
        try {
             
            foreach ($csvData as $row) {
                $row = array_combine($header, $row);
           
                try {
                    // Validate required fields
                    if (empty($row['name']) || empty($row['date_of_death']) || empty($row['gender']) || 
                        empty($row['father_or_husband_name']) || empty($row['death_place']) || 
                        empty($row['mother_name']) ||
                        empty($row['permanent_address']) || empty($row['registration_number']) || 
                        empty($row['registration_date']) || empty($row['issue_date']) || 
                        empty($row['nationality']) || empty($row['adhar_card_no_deceased'])) {
                        throw new \Exception("Required fields missing");
                    }

                    // Format dates
                    $dobFormatted = Carbon::parse($row['date_of_death'])->format('Y-m-d');
                    // dd($dobFormatted);
                    $registrationDateFormatted = Carbon::parse($row['registration_date'])->format('Y-m-d');
                    $issueDateFormatted = Carbon::parse($row['issue_date'])->format('Y-m-d');

                    // Marathi translations
                    $dob_mr = $this->convertToMarathiDigits($translator->translate($dobFormatted));
                    $registration_date_mr = $this->convertToMarathiDigits($translator->translate($registrationDateFormatted));
                    $issue_date_mr = $this->convertToMarathiDigits($translator->translate($issueDateFormatted));
                    $registration_no = $this->convertToMarathiDigits($row['registration_number']);
                    $aadhar_card = $this->convertToMarathiDigits($row['adhar_card_no_deceased']);
                    $data = [];
                    $data = [
                        'panchayat_id'              => $id,
                        'name'                      => $row['name'],
                        'name_mr'                   => GoogleTranslate::trans($row['name'], 'mr'),
                        'dob'                       => $dobFormatted,
                        'dob_mr'                    => $dob_mr,
                        'gender'                    => $row['gender'],
                        'gender_mr'                 => GoogleTranslate::trans($row['gender'], 'mr'),
                        'father_or_husband_name'    => $row['father_or_husband_name'],
                        'father_or_husband_name_mr' => GoogleTranslate::trans($row['father_or_husband_name'], 'mr'),
                        'mother_name'               => $row['mother_name'] ?? null,
                        'mother_name_mr'            => !empty($row['mother_name']) ? GoogleTranslate::trans($row['mother_name'], 'mr') : null,
                        'death_place'               => $row['death_place'],
                        'death_place_mr'            => GoogleTranslate::trans($row['death_place'], 'mr'),
                        'permanent_address'         => $row['permanent_address'],
                        'permanent_address_mr'      => GoogleTranslate::trans($row['permanent_address'], 'mr'),
                        'registration_number'       => $row['registration_number'],
                        'registration_number_mr'    => $registration_no,
                        'registration_date'         => $registrationDateFormatted,
                        'registration_date_mr'      => $registration_date_mr,
                        'remarks'                   => $row['remarks'] ?? null,
                        'remarks_mr'                => !empty($row['remarks']) ? GoogleTranslate::trans($row['remarks'], 'mr') : null,
                        'issue_date'                => $issueDateFormatted,
                        'issue_date_mr'             => $issue_date_mr,
                        'nationality'               => $row['nationality'],
                        'nationality_mr'            => GoogleTranslate::trans($row['nationality'], 'mr'),
                        'adhar_card_no_deceased'    => $row['adhar_card_no_deceased'],
                        'adhar_card_no_deceased_mr' => $aadhar_card,
                    ];
                    
                    // dd($data);
                    DeathCertificate::create($data);
                   
                    $successCount++;
                } catch (\Exception $e) {
                    $errorCount++;
                    Log::error('DeathCertificate Insert Error', [
                        'row_data' => $data,
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                    $errors[] = "Row " . ($successCount + $errorCount) . ": " . $e->getMessage();
                    continue;
                }
            }
            // exit;
            DB::commit();

            $message = "Bulk upload completed. Success: {$successCount}, Errors: {$errorCount}";
            if ($errorCount > 0) {
                return redirect()->back()
                    ->with('warning', $message)
                    ->with('errors', $errors);
            }

            return redirect()->back()
                ->with('success', $message);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Bulk upload failed: ' . $e->getMessage());
        }
    }


   


    public function oldCertificateList()
    {

        $oldCertificates = OldCertificate::where('panchayat_id', Auth::guard('admin')->user()->id, )->get();
        return view('panchayat.pages.certificate.old_certificate_list', compact('oldCertificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function oldCertificateCreate()
    {
        return view('panchayat.pages.certificate.old_certificate_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function oldCertificateStore(Request $request)
    {
        //dd($request->all());
        // dd(Auth::guard('admin')->user()->id);

        // Validate the request data
        $request->validate([
            'name'   => 'required|string|max:255',
            'mobile' => 'required', // Validate as a 10-digit mobile number
            'type'   => 'required',
            'image'  => 'required|image|max:2448', // Validate image formats with max size 2.4MB
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = substr($request->name, 0, 3) . $request->mobile . '.' . $request->image->extension();
            $request->image->move(public_path('images/certificates'), $imagePath);
        }

        // Create the old certificate record
        $oldCertificate = OldCertificate::create([
            'panchayat_id' => Auth::guard('admin')->user()->id,
            'user_name'    => substr($request->name, 0, 3) . $request->mobile,
            'name'         => $request->name,
            'mobile'       => $request->mobile,
            'type'         => $request->type,
            'image'        => $imagePath,

        ]);

        return redirect()->route('panchayat.oldCertificate.create')->with('success', 'Certificate uploaded successfully.');
    }
    public function marriageCertificateList()
    {
        $marriageCertificates = MarriageCertificate::orderBy('id', 'desc')->where('panchayat_id', Auth::guard('admin')->user()->id)->get();
        return view('panchayat.pages.certificate.marriage_certificate_list', compact('marriageCertificates'));
    }

    public function marriageCertificateCreate()
    {
        return view('panchayat.pages.certificate.marriage_certificate_create');
    }

    public function marriageCertificateStore(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $request->validate([
            'panchayat_id'               => 'nullable|integer',
            'groom_name'                 => 'required|string|max:255',
            'groom_image'                => 'nullable|image|mimes:jpeg,png,jpg,gif', // Image validation
            'groom_address'              => 'required|string|max:255',
            'groom_religion'             => 'nullable|string|max:255',
            'groom_nationality'          => 'nullable|string|max:255',
            'groom_gurdian_name'         => 'nullable|string|max:255',
            'groom_gurdian_address'      => 'nullable|string|max:255',
            'bride_name'                 => 'required|string|max:255',
            'bride_name_before_marriage' => 'required|string|max:255',
            'bride_image'                => 'nullable|image|mimes:jpeg,png,jpg,gif', // Image validation
            'bride_address'              => 'required|string|max:255',
            'bride_religion'             => 'nullable|string|max:255',
            'bride_nationality'          => 'nullable|string|max:255',
            'bride_gurdian_name'         => 'nullable|string|max:255',
            'bride_gurdian_address'      => 'nullable|string|max:255',
            'date_of_marriage'           => 'nullable|date',
            'registration_number'        => 'required|string|max:255',
            'registration_date'          => 'required|date',
            'issue_date'                 => 'required|date',
            'remarks'                    => 'nullable|string|max:255',
        ]);

        // Handle groom image
        $groomImagePath = null;
        if ($request->hasFile('groom_image')) {
            $groomImage     = $request->file('groom_image');
            $groomImageName = time() . '_' . $groomImage->getClientOriginalName(); // Generate unique name
            $groomImage->move(public_path('groom_images'), $groomImageName);       // Move the image to the public folder
            $groomImagePath = 'groom_images/' . $groomImageName;                   // Store the public path
        }

        // Handle bride image
        $brideImagePath = null;
        if ($request->hasFile('bride_image')) {
            $brideImage     = $request->file('bride_image');
            $brideImageName = time() . '_' . $brideImage->getClientOriginalName(); // Generate unique name
            $brideImage->move(public_path('bride_images'), $brideImageName);       // Move the image to the public folder
            $brideImagePath = 'bride_images/' . $brideImageName;                   // Store the public path
        }

        // Create a new marriage certificate record using an associative array
        $marriageCertificate = MarriageCertificate::create([
            'panchayat_id'                  => Auth::guard('admin')->user()->id,
            'groom_name'                    => $request->groom_name,
            'groom_name_mr'                 => GoogleTranslate::trans($request->groom_name, 'mr'),
            'groom_image'                   => $groomImagePath, // Save the public path of the image
            'groom_address'                 => $request->groom_address,
            'groom_address_mr'              => GoogleTranslate::trans($request->groom_address, 'mr'),
            'groom_religion'                => $request->groom_religion,
            'groom_religion_mr'             => GoogleTranslate::trans($request->groom_religion, 'mr'),
            'groom_nationality'             => $request->groom_nationality,
            'groom_nationality_mr'          => GoogleTranslate::trans($request->groom_nationality, 'mr'),
            'groom_gurdian_name'            => $request->groom_gurdian_name,
            'groom_gurdian_name_mr'         => GoogleTranslate::trans($request->groom_gurdian_name, 'mr'),
            'groom_gurdian_address'         => $request->groom_gurdian_address,
            'groom_gurdian_address_mr'      => GoogleTranslate::trans($request->groom_gurdian_address, 'mr'),
            'bride_name'                    => $request->bride_name,
            'bride_name_mr'                 => GoogleTranslate::trans($request->bride_name, 'mr'),
            'bride_name_before_marriage'    => $request->bride_name_before_marriage,
            'bride_name_before_marriage_mr' => GoogleTranslate::trans($request->bride_name_before_marriage, 'mr'),
            'bride_image'                   => $brideImagePath, // Save the public path of the image
            'bride_address'                 => $request->bride_address,
            'bride_address_mr'              => GoogleTranslate::trans($request->bride_address, 'mr'),
            'bride_religion'                => $request->bride_religion,
            'bride_religion_mr'             => GoogleTranslate::trans($request->bride_religion, 'mr'),
            'bride_nationality'             => $request->bride_nationality,
            'bride_nationality_mr'          => GoogleTranslate::trans($request->bride_nationality, 'mr'),
            'bride_gurdian_name'            => $request->bride_gurdian_name,
            'bride_gurdian_name_mr'         => GoogleTranslate::trans($request->bride_gurdian_name, 'mr'),
            'bride_gurdian_address'         => $request->bride_gurdian_address,
            'bride_gurdian_address_mr'      => GoogleTranslate::trans($request->bride_gurdian_address, 'mr'),
            'date_of_marriage'              => $request->date_of_marriage,
            'registration_number'           => $request->registration_number,
            'registration_number_mr'        => GoogleTranslate::trans($request->registration_number, 'mr'),
            'registration_date'             => $request->registration_date,
            'issue_date'                    => $request->issue_date,
            'remarks'                       => $request->remarks,
            'remarks_mr'                    => GoogleTranslate::trans($request->remarks, 'mr'),
        ]);

        // Redirect to the desired route with success message
        return redirect()->route('panchayat.marriageCertificate.edit', $marriageCertificate->id)
            ->with('success', 'Certificate created successfully. You can now edit the details.');
    }

    public function marriageCertificateDetails($id)
    {

        // $details =  marriageCertificate::with('panchayat')->latest()->first();
        $details = MarriageCertificate::with('panchayat')->findOrFail($id);
        $officer = Admin::where('panchayat_id', Auth::guard('admin')->user()->id)->where('user_type', 'officer')->first();
        return view('panchayat.pages.certificate.marriage_certificate_details', compact('details', 'officer'));
    }

    public function marriageCertificateEdit($id)
    {
        $marriageCertificate = MarriageCertificate::findOrFail($id);
        return view('panchayat.pages.certificate.marriage_certificate_edit', compact('marriageCertificate'));
    }
    public function marriageCertificateUpdate(Request $request, $id)
    {
        //dd($request->all());
        $marriageCertificate = MarriageCertificate::findOrFail($id);

        // Validate the request data
        $request->validate([
            'groom_name'                 => 'required|string|max:255',
            'groom_image'                => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'groom_address'              => 'required|string|max:255',
            'bride_name'                 => 'required|string|max:255',
            'bride_name_before_marriage' => 'required|string|max:255',
            'bride_image'                => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'bride_address'              => 'required|string|max:255',
            'date_of_marriage'           => 'nullable|date',
            'registration_number'        => 'required|string|max:255',
            'registration_date'          => 'required|date',
            'issue_date'                 => 'required|date',
            'remarks'                    => 'nullable|string|max:255',
        ]);

        // Handle groom image
        if ($request->hasFile('groom_image')) {
            $groomImage     = $request->file('groom_image');
            $groomImageName = time() . '_' . $groomImage->getClientOriginalName();
            $groomImage->move(public_path('groom_images'), $groomImageName);
            $marriageCertificate->groom_image = 'groom_images/' . $groomImageName;
        }

        // Handle bride image
        if ($request->hasFile('bride_image')) {
            $brideImage     = $request->file('bride_image');
            $brideImageName = time() . '_' . $brideImage->getClientOriginalName();
            $brideImage->move(public_path('bride_images'), $brideImageName);
            $marriageCertificate->bride_image = 'bride_images/' . $brideImageName;
        }

        // Update the other fields
        $marriageCertificate->update([
            'groom_name'                    => $request->groom_name,
            'groom_name_mr'                 => $request->groom_name_mr,
            'groom_address'                 => $request->groom_address,
            'groom_address_mr'              => $request->groom_address_mr,
            'groom_religion'                => $request->groom_religion,
            'groom_religion_mr'             => $request->groom_religion_mr,
            'groom_nationality'             => $request->groom_nationality,
            'groom_nationality_mr'          => $request->groom_nationality_mr,
            'groom_gurdian_name'            => $request->groom_gurdian_name,
            'groom_gurdian_name_mr'         => $request->groom_gurdian_name_mr,
            'groom_gurdian_address'         => $request->groom_gurdian_address,
            'groom_gurdian_address_mr'      => $request->groom_gurdian_address_mr,
            'bride_name_before_marriage'    => $request->bride_name_before_marriage,
            'bride_name_before_marriage_mr' => $request->bride_name_before_marriage_mr,
            'bride_name'                    => $request->bride_name,
            'bride_name_mr'                 => $request->bride_name_mr,
            'bride_address'                 => $request->bride_address,
            'bride_address_mr'              => $request->bride_address_mr,
            'bride_religion'                => $request->bride_religion,
            'bride_religion_mr'             => $request->bride_religion_mr,
            'bride_nationality'             => $request->bride_nationality,
            'bride_nationality_mr'          => $request->bride_nationality_mr,
            'bride_gurdian_name'            => $request->bride_gurdian_name,
            'bride_gurdian_name_mr'         => $request->bride_gurdian_name_mr,
            'bride_gurdian_address'         => $request->bride_gurdian_address,
            'bride_gurdian_address_mr'      => $request->bride_gurdian_address_mr,
            'date_of_marriage'              => $request->date_of_marriage,
            'registration_number'           => $request->registration_number,
            'registration_number_mr'        => $request->registration_number_mr,
            'registration_date'             => $request->registration_date,
            'issue_date'                    => $request->issue_date,
            'remarks'                       => $request->remarks,
            'remarks_mr'                    => $request->remarks_mr,
        ]);

        // Redirect with success message
        return redirect()->route('panchayat.marriageCertificate.list')->with('success', 'Marriage certificate updated successfully.');
    }
    public function marriageCertificateAllValues($id)
    {
        $details = MarriageCertificate::with('panchayat')->findOrFail($id);
        return view('panchayat.pages.certificate.marriage_certificate_all_values', compact('details'));
    }

    public function convertToMarathiDigits($string)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $marathi = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return str_replace($english, $marathi, $string);
    }
}

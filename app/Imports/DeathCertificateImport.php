<?php

namespace App\Imports;

use App\Models\DeathCertificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class DeathCertificateImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private function parseDate($value)
    {
        try {
            // Check for null or empty value
            if (empty($value)) {
                throw new \Exception('Date value is empty.');
            }

            // Check if the value is numeric (Excel date format)
            if (is_numeric($value)) {
                // Convert Excel numeric date to a standard format
                return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d');
            }

            // Define possible date formats to try
            $formats = ['d-m-Y', 'Y-m-d', 'm/d/Y'];

            // Try each format until one works
            foreach ($formats as $format) {
                $parsedDate = \Carbon\Carbon::createFromFormat($format, $value);
                if ($parsedDate !== false) {
                    return $parsedDate->format('Y-m-d');
                }
            }

            // If none of the formats match, log the issue
            throw new \Exception('Unable to parse date format.');
        } catch (\Exception $e) {
            Log::error("Date parsing failed for value: {$value} - Error: " . $e->getMessage());
            return null; // Return null if parsing fails
        }
    }

    /**
     * Define the model for the imported row.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $skipFirstRow = true;

    public function model(array $row)
    {
        // Skip the first row (heading row)
        if ($this->skipFirstRow) {
            $this->skipFirstRow = false;
            return null; // Skip the first row only
        }

        // Check for required fields: childname, dob, gender, father_name, mother_name, etc.
        // if (empty($row[0]) || empty($row[2]) || empty($row[3])) {
        //     Log::warning('Skipping row due to missing essential fields: ' . json_encode($row));
        //     return null;
        // }

        // Handle null values and set defaults where necessary
        $name = $row[0] ?: 'Unknown';  // Default if child name is empty
        $adhar_card_no_deceased = $row[2] ?: 'Unknown';  // Default if  adhar card number is empty
        $dob = $this->parseDate($row[3]) ?: '1900-01-01';  // Default if date of birth is invalid
        $gender = $row[4] ?: 'Unknown';  // Default if gender is null
        $registration_number = $row[6] ?: 'Unknown';
        $death_place = $row[9] ?: 'Unknown';  // Default if birth place is null
        $father_or_husband_name  = $row[11] ?: 'Unknown';  // Default if father name is null
        $mother_name = $row[13] ?: 'Unknown';  // Default if mother name is null
        $permanent_address = $row[15] ?: 'Unknown';  // Default if address is null
          // Default if registration number is null
        $nationality = $row[17] ?: 'Unknown';  // Default if parent nationality is null
        $remarks = $row[19] ?: 'No remarks';  // Default if remarks are null



        try {
            // Parsing dates, adding a fallback if parsing fails
            $registration_date = $this->parseDate($row[8]) ?: '1900-01-01';
            $issue_date = $this->parseDate($row[21]) ?: '1900-01-01';
        } catch (\Exception $e) {
            Log::error('Error parsing dates for row: ' . json_encode($row) . ' - ' . $e->getMessage());
            return null; // Skip this row if dates are invalid
        }

        // Return the BirthCertificate instance
        return new DeathCertificate([
            'panchayat_id' => Auth::guard('admin')->user()->id,
            'name' => $name,
            'name_mr' => $row[1] ?: GoogleTranslate::trans($name, 'mr'),
            'adhar_card_no_deceased' => $adhar_card_no_deceased,
            'dob' => $dob,
            'gender' => $gender,
            'gender_mr' => $row[5] ?: GoogleTranslate::trans($gender, 'mr'),
            'father_or_husband_name' => $father_or_husband_name,
            'father_or_husband_name_mr' => $row[12] ?: GoogleTranslate::trans($father_or_husband_name, 'mr'),
            'mother_name' => $mother_name,
            'mother_name_mr' => $row[14] ?: GoogleTranslate::trans($mother_name, 'mr'),
            'death_place' => $death_place,
            'death_place_mr' => $row[10] ?: GoogleTranslate::trans($death_place, 'mr'),
            'permanent_address' => $permanent_address,
            'permanent_address_mr' => $row[16] ?: GoogleTranslate::trans($permanent_address, 'mr'),
            'registration_number' => $registration_number,
            'registration_number_mr' => $row[6] ?: GoogleTranslate::trans($registration_number, 'mr'),
            'registration_date' => $registration_date,
            'issue_date' => $issue_date,

            'remarks' => $remarks,
            'remarks_mr' => $row[20] ?: GoogleTranslate::trans($remarks, 'mr'),
            'nationality' => $nationality,
            'nationality_mr' => $row[18] ?: GoogleTranslate::trans($nationality, 'mr'),

        ]);
    }

}


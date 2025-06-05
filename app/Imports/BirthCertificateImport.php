<?php
namespace App\Imports;

use App\Models\BirthCertificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;


class BirthCertificateImport implements ToModel
{
    /**
     * Parse a date value, supporting Excel numeric and standard date formats.
     *
     * @param mixed $value
     * @return string|null
     * @throws \Exception
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
        if (empty($row[0]) || empty($row[2]) || empty($row[3])) {
            Log::warning('Skipping row due to missing essential fields: ' . json_encode($row));
            return null; // Skip this row if essential fields are missing
        }

        // Handle null values and set defaults where necessary
        $childname = $row[0] ?: 'Unknown';  // Default if child name is empty
        $dob = $this->parseDate($row[2]) ?: '1900-01-01';  // Default if date of birth is invalid
        $gender = $row[3] ?: 'Unknown';  // Default if gender is null
        $father_name = $row[5] ?: 'Unknown';  // Default if father name is null
        $mother_name = $row[7] ?: 'Unknown';  // Default if mother name is null
        $birth_place = $row[9] ?: 'Unknown';  // Default if birth place is null
        $permanent_address = $row[11] ?: 'Unknown';  // Default if address is null
        $registration_number = $row[13] ?: 'Unknown';  // Default if registration number is null
        $remarks = $row[18] ?: 'No remarks';  // Default if remarks are null
        $parent_address = $row[20] ?: 'Unknown';  // Default if parent address is null
        $parent_nationality = $row[22] ?: 'Unknown';  // Default if parent nationality is null

        try {
            // Parsing dates, adding a fallback if parsing fails
            $registration_date = $this->parseDate($row[15]) ?: NULL;
            $issue_date = $this->parseDate($row[16]) ?: NULL;
        } catch (\Exception $e) {
            Log::error('Error parsing dates for row: ' . json_encode($row) . ' - ' . $e->getMessage());
            return null; // Skip this row if dates are invalid
        }

        // Return the BirthCertificate instance
        return new BirthCertificate([
            'panchayat_id' => Auth::guard('admin')->user()->id,
            'childname' => $childname,
            'childname_mr' => $row[1] ?: GoogleTranslate::trans($childname, 'mr'),
            'dob' => $dob,
            'gender' => $gender,
            'gender_mr' => $row[4] ?: GoogleTranslate::trans($gender, 'mr'),
            'father_name' => $father_name,
            'father_name_mr' => $row[6] ?: GoogleTranslate::trans($father_name, 'mr'),
            'mother_name' => $mother_name,
            'mother_name_mr' => $row[8] ?: GoogleTranslate::trans($mother_name, 'mr'),
            'birth_place' => $birth_place,
            'birth_place_mr' => $row[10] ?: GoogleTranslate::trans($birth_place, 'mr'),
            'permanent_address' => $permanent_address,
            'permanent_address_mr' => $row[12] ?: GoogleTranslate::trans($permanent_address, 'mr'),
            'registration_number' => $registration_number,
            'registration_number_mr' => $row[14] ?: GoogleTranslate::trans($registration_number, 'mr'),
            'registration_date' => $registration_date,
            'issue_date' => $issue_date,
            'number' => $row[17] ?: 'Not provided',
            'remarks' => $remarks,
            'remarks_mr' => $row[19] ?: GoogleTranslate::trans($remarks, 'mr'),
            'parent_address' => $parent_address,
            'parent_address_mr' => $row[21] ?: GoogleTranslate::trans($parent_address, 'mr'),
            'parent_nationality' => $parent_nationality,
            'parent_nationality_mr' => $row[23] ?: GoogleTranslate::trans($parent_nationality, 'mr'),
            'adhar_card_no_father' => $row[24] ?: 'Not provided',
            'adhar_card_no_mother' => $row[25] ?: 'Not provided',
        ]);
    }

}

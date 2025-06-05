@extends('panchayat.layouts.main')
@section('title', 'Edit Death Certificate')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Death Certificate</div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Death Certificate</h2>

                        <form action="{{ route('panchayat.deathCertificate.update', $deathCertificate->id) }}" method="POST" id="certificateForm">
                            @csrf
                            @method('POST')
                            <div id="keyboardContainer" class="simple-keyboard"></div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Person Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $deathCertificate->name) }}">
                            </div>

                            <div class="mb-3">
                                <label for="name_mr" class="form-label">Person Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="name_mr" name="name_mr" value="{{ old('name_mr', $deathCertificate->name_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="adhar_card_no_deceased" class="form-label">Adhar Card Number of Person</label>
                                <input type="text" class="form-control" id="adhar_card_no_deceased" name="adhar_card_no_deceased" value="{{ old('adhar_card_no_deceased', $deathCertificate->adhar_card_no_deceased) }}">
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Death</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $deathCertificate->dob) }}">
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="" disabled>Select Gender</option>
                                    <option value="male" {{ old('gender', $deathCertificate->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $deathCertificate->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $deathCertificate->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="gender_mr" class="form-label">Gender in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="gender_mr" name="gender_mr" value="{{ old('gender_mr', $deathCertificate->gender_mr) }}">
                            </div>


                            {{-- <div class="mb-3">
                                <label for="dob" class="form-label">Date of Death</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $deathCertificate->dob) }}" required>
                            </div> --}}

                            <div class="mb-3">
                                <label for="father_or_husband_name" class="form-label">Father or Husband Name</label>
                                <input type="text" class="form-control" id="father_or_husband_name" name="father_or_husband_name" value="{{ old('father_or_husband_name', $deathCertificate->father_or_husband_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="father_or_husband_name_mr" class="form-label">Father or Husband Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="father_or_husband_name_mr" name="father_or_husband_name_mr" value="{{ old('father_or_husband_name_mr', $deathCertificate->father_or_husband_name_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="mother_name" class="form-label">Mother Name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $deathCertificate->mother_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="mother_name_mr" class="form-label">Mother Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="mother_name_mr" name="mother_name_mr" value="{{ old('mother_name_mr', $deathCertificate->mother_name_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="death_place" class="form-label">Death Place</label>
                                <input type="text" class="form-control" id="death_place" name="death_place" value="{{ old('death_place', $deathCertificate->death_place) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="death_place_mr" class="form-label">Death Place in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="death_place_mr" name="death_place_mr" value="{{ old('death_place_mr', $deathCertificate->death_place_mr) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="permanent_address" class="form-label">Permanent Address</label>
                                <textarea class="form-control" id="permanent_address" name="permanent_address" required>{{ old('permanent_address', $deathCertificate->permanent_address) }}</textarea>
                            </div>


                            <div class="mb-3">
                                <label for="permanent_address_mr" class="form-label">Permanent Address in Marathi</label>
                                <textarea class="form-control marathi-input" id="permanent_address_mr" name="permanent_address_mr" required>{{ old('permanent_address_mr', $deathCertificate->permanent_address_mr) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="registration_number" class="form-label">Registration Number</label>
                                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number', $deathCertificate->registration_number) }}" required>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="registration_number_mr" class="form-label">Registration Number in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="registration_number_mr" name="registration_number_mr" value="{{ old('registration_number_mr', $deathCertificate->registration_number_mr) }}">
                            </div> --}}

                            <div class="mb-3">
                                <label for="registration_date" class="form-label">Registration Date</label>
                                <input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ old('registration_date', $deathCertificate->registration_date) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks">{{ old('remarks', $deathCertificate->remarks) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="remarks_mr" class="form-label">Remarks in Marathi</label>
                                <textarea class="form-control marathi-input" id="remarks_mr" name="remarks_mr">{{ old('remarks', $deathCertificate->remarks_mr) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="issue_date" class="form-label">Issue Date</label>
                                <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date', $deathCertificate->issue_date) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality', $deathCertificate->nationality) }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="nationality_mr" class="form-label">Nationality in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="nationality_mr" name="nationality_mr" value="{{ old('nationality_mr', $deathCertificate->nationality_mr) }}">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn admin-btn-decorate">Update</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('deathCertificateForm').addEventListener('submit', function (event) {
        const dob = document.getElementById('dob').value;
        const registrationDate = document.getElementById('registration_date').value;

        if (new Date(dob) >= new Date(registrationDate)) {
            event.preventDefault();
            alert('The Date of Death must be before the Registration Date.');
        }
    });
</script>

@endsection

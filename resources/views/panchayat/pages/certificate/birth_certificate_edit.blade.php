@extends('panchayat.layouts.main')
@section('title', 'Edit Birth Certificate')
@section('content')


    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">BirthCertificate</div>
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
                            <h2>Edit Birth Certificate</h2>

                            <form id="certificateForm" action="{{ route('panchayat.birthCertificate.update', $birthCertificate->id) }}" method="POST" id="certificateForm">
                                @csrf
                                @method('POST')
                                <div id="keyboardContainer" class="simple-keyboard keyboard-position"></div>
                                <!-- Child Name -->
                                <div class="mb-3">
                                    <label for="childname" class="form-label">Child Name</label>
                                    <input type="text" class="form-control" id="childname" name="childname" value="{{ $birthCertificate->childname }}" required>
                                </div>


                                <!-- Child Name in Marathi -->
                                <div class="mb-3">
                                    <label for="childname" class="form-label">Child Name in Marathi</label>
                                    <input type="text" class="form-control marathi-input" id="childname_mr" name="childname_mr" value="{{ $birthCertificate->childname_mr }}" required>
                                </div>

                                <!-- Date of Birth -->
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control marathi-input" id="dob" name="dob" value="{{ $birthCertificate->dob }}" required>
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="male" {{ $birthCertificate->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $birthCertificate->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $birthCertificate->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                     <!-- Gender in Marathi-->
                                     <div class="mb-3">
                                        <label for="gender_mr" class="form-label">Gender in Marathi</label>
                                        <input type="text" class="form-control marathi-input" id="gender_mr" name="gender_mr" value="{{ $birthCertificate->gender_mr }}" required>
                                    </div>


                                <!-- Father's Name -->
                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $birthCertificate->father_name }}" required>
                                </div>

                                <!-- Father's Name Marathi-->
                                   <div class="mb-3">
                                    <label for="father_name_mr" class="form-label">Father's Name Marathi</label>
                                    <input type="text" class="form-control marathi-input" id="father_name_mr" name="father_name_mr" value="{{ $birthCertificate->father_name_mr }}" required>
                                </div>

                                <!-- Father's Adhar Card No -->
                                <div class="mb-3">
                                    <label for="adhar_card_no_father" class="form-label">Father's Adhar Card No</label>
                                    <input type="text" class="form-control" id="adhar_card_no_father" name="adhar_card_no_father" value="{{ $birthCertificate->adhar_card_no_father }}" required>
                                </div>

                                <!-- Mother's Name -->
                                <div class="mb-3">
                                    <label for="mother_name" class="form-label">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $birthCertificate->mother_name }}" required>
                                </div>

                                <!-- Mother's Name Marathi-->
                                <div class="mb-3">
                                    <label for="mother_name_mr" class="form-label">Mother's Name Marathi</label>
                                    <input type="text" class="form-control marathi-input" id="mother_name_mr" name="mother_name_mr" value="{{ $birthCertificate->mother_name_mr }}" required>
                                </div>

                                  <!-- Father's Adhar Card No -->
                                  <div class="mb-3">
                                    <label for="adhar_card_no_mother" class="form-label">Mother's Adhar Card No</label>
                                    <input type="text" class="form-control" id="adhar_card_no_mother" name="adhar_card_no_mother" value="{{ $birthCertificate->adhar_card_no_mother }}" required>
                                </div>

                                <!-- Birth Place -->
                                <div class="mb-3">
                                    <label for="birth_place" class="form-label">Birth Place</label>
                                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ $birthCertificate->birth_place }}" required>
                                </div>

                                <!-- Birth Place in Marathi-->
                                <div class="mb-3">
                                    <label for="birth_place_mr" class="form-label">Birth Place in Marathi</label>
                                    <input type="text" class="form-control marathi-input" id="birth_place_mr" name="birth_place_mr" value="{{ $birthCertificate->birth_place_mr }}" required>
                                </div>

                                <!-- Permanent Address -->
                                <div class="mb-3">
                                    <label for="permanent_address" class="form-label">Permanent Address</label>
                                    <textarea class="form-control" id="permanent_address" name="permanent_address" required>{{ $birthCertificate->permanent_address }}</textarea>
                                </div>

                                <!-- Permanent Address in Marathi-->
                                <div class="mb-3">
                                    <label for="permanent_address_mr" class="form-label">Permanent Address in Marathi</label>
                                    <textarea class="form-control marathi-input" id="permanent_address_mr" name="permanent_address_mr" required>{{ $birthCertificate->permanent_address_mr }}</textarea>
                                </div>

                                <!-- Registration Number -->
                                <div class="mb-3">
                                    <label for="registration_number" class="form-label">Registration Number</label>
                                    <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $birthCertificate->registration_number }}" required>
                                </div>


                                <!-- Registration Number in Marathi-->
                                <div class="mb-3">
                                    <label for="registration_number" class="form-label">Registration Number in Marathi</label>
                                    <input type="text" class="form-control marathi-input" id="registration_number_mr" name="registration_number_mr" value="{{ $birthCertificate->registration_number_mr }}" required>
                                </div>

                                <!-- Registration Date -->
                                <div class="mb-3">
                                    <label for="registration_date" class="form-label">Registration Date</label>
                                    <input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ $birthCertificate->registration_date }}" required>
                                </div>

                                <!-- Remarks -->
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks">{{ $birthCertificate->remarks }}</textarea>
                                </div>
                                   <!-- Remarks in Marathi-->
                                   <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks in Marathi</label>
                                    <textarea class="form-control marathi-input" id="remarks_mr" name="remarks_mr">{{ $birthCertificate->remarks_mr }}</textarea>
                                </div>

                                <!-- Issue Date -->
                                <div class="mb-3">
                                    <label for="issue_date" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ $birthCertificate->issue_date }}" required>
                                </div>

                                <!-- Number -->
                                <div class="mb-3">
                                    <label for="number" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="number" name="number" value="{{ $birthCertificate->number }}" required>
                                </div>

                                <!-- Parent Address -->
                                <div class="mb-3">
                                    <label for="parent_address" class="form-label">Parent Address</label>
                                    <textarea class="form-control" id="parent_address" name="parent_address" required>{{ $birthCertificate->parent_address }}</textarea>
                                </div>

                                <!-- Parent Address in Marathi -->
                                <div class="mb-3">
                                    <label for="parent_address_mr" class="form-label">Parent Address in Marathi</label>
                                    <textarea class="form-control marathi-input" id="parent_address_mr" name="parent_address_mr" required>{{ $birthCertificate->parent_address_mr }}</textarea>
                                </div>


                                <!-- Parent Nationality -->
                                <div class="mb-3">
                                    <label for="parent_nationality" class="form-label">Parent Nationality</label>
                                    <input type="text" class="form-control" id="parent_nationality" name="parent_nationality" value="{{ $birthCertificate->parent_nationality }}" required>
                                </div>

                                     <!-- Parent Nationality in Marathi -->
                                     <div class="mb-3">
                                        <label for="parent_nationality" class="form-label">Parent Nationality in Marathi</label>
                                        <input type="text" class="form-control marathi-input" id="parent_nationality_mr" name="parent_nationality_mr" value="{{ $birthCertificate->parent_nationality_mr }}" required>
                                    </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn admin-btn-decorate">
                                        Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript validation -->
    <script>
        document.getElementById('certificateForm').addEventListener('submit', function (event) {
            const dob = document.getElementById('dob').value;
            const registrationDate = document.getElementById('registration_date').value;

            if (new Date(dob) >= new Date(registrationDate)) {
                event.preventDefault();
                alert('The Date of Birth must be before the Registration Date.');
            }
        });
    </script>


@endsection

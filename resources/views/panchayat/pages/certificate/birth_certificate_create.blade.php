@extends('panchayat.layouts.main')
@section('title', 'BirthCertificate Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">BirthCertificate</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Creation</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Create Birth Certificate</h2>

                            <form id="birthCertificateForm" action="{{ route('panchayat.birthCertificate.store') }}" method="POST">
                                @csrf

                                <!-- Child Name -->
                                <div class="mb-3">
                                    <label for="childname" class="form-label">Child Name</label>
                                    <input type="text" class="form-control" id="childname" name="childname" required>
                                </div>

                                <!-- Date of Birth -->
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <!-- Father's Name -->
                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" required>
                                </div>

                                   <!-- Father's Adhar Card No -->
                                   <div class="mb-3">
                                    <label for="adhar_card_no_father" class="form-label">Father's Adhar Card No</label>
                                    <input type="text" class="form-control" id="adhar_card_no_father" name="adhar_card_no_father" required>
                                </div>


                                <!-- Mother's Name -->
                                <div class="mb-3">
                                    <label for="mother_name" class="form-label">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                                </div>

                                   <!-- Mother's Adhar Card No -->
                                   <div class="mb-3">
                                    <label for="adhar_card_no_mother" class="form-label">Mother's Adhar Card No</label>
                                    <input type="text" class="form-control" id="adhar_card_no_mother" name="adhar_card_no_mother" required>
                                </div>

                                <!-- Birth Place -->
                                <div class="mb-3">
                                    <label for="birth_place" class="form-label">Birth Place</label>
                                    <input type="text" class="form-control" id="birth_place" name="birth_place" required>
                                </div>

                                <!-- Permanent Address -->
                                <div class="mb-3">
                                    <label for="permanent_address" class="form-label">Permanent Address</label>
                                    <textarea class="form-control" id="permanent_address" name="permanent_address" required></textarea>
                                </div>

                                <!-- Registration Number -->
                                <div class="mb-3">
                                    <label for="registration_number" class="form-label">Registration Number</label>
                                    <input type="text" class="form-control" id="registration_number" name="registration_number" required>
                                </div>

                                <!-- Registration Date -->
                                <div class="mb-3">
                                    <label for="registration_date" class="form-label">Registration Date</label>
                                    <input type="date" class="form-control" id="registration_date" name="registration_date" required>
                                </div>

                                <!-- Remarks -->
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks"></textarea>
                                </div>

                                <!-- Issue Date -->
                                <div class="mb-3">
                                    <label for="issue_date" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" id="issue_date" name="issue_date" required>
                                </div>

                                <!-- Number -->
                                <div class="mb-3">
                                    <label for="number" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="number" name="number" required>
                                </div>

                                <!-- Parent Address -->
                                <div class="mb-3">
                                    <label for="parent_address" class="form-label">Parent Address</label>
                                    <textarea class="form-control" id="parent_address" name="parent_address" required></textarea>
                                </div>

                                <!-- Parent Nationality -->
                                <div class="mb-3">
                                    <label for="parent_nationality" class="form-label">Parent Nationality</label>
                                    <input type="text" class="form-control" id="parent_nationality" name="parent_nationality" required>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn admin-btn-decorate">
                                        Submit
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
        document.getElementById('birthCertificateForm').addEventListener('submit', function (event) {
            const dob = document.getElementById('dob').value;
            const registrationDate = document.getElementById('registration_date').value;

            if (new Date(dob) >= new Date(registrationDate)) {
                event.preventDefault();
                alert('The Date of Birth must be before the Registration Date.');
            }
        });
    </script>
@endsection

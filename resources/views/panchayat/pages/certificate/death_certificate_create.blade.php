@extends('panchayat.layouts.main')
@section('title', 'DeathCertificate Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">DeathCertificate</div>
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
                            <h2>Create Death Certificate</h2>

                            <form action="{{ route('panchayat.deathCertificate.store') }}" id="deathCertificateForm" method="POST">

                                    @csrf


                                    <!--  Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Person Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <!--  Adhar Card Number of Deceased -->
                                    <div class="mb-3">
                                        <label for="adhar_card_no_deceased" class="form-label">Adhar Card Number of Deceased</label>
                                        <input type="text" class="form-control" id="adhar_card_no_deceased" name="adhar_card_no_deceased" required>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Death</label>
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

                                    <!-- Husband or Father Name -->
                                    <div class="mb-3">
                                        <label for="father_or_husband_name" class="form-label">Father or Husband Name</label>
                                        <input type="text" class="form-control" id="father_or_husband_name" name="father_or_husband_name" required>
                                    </div>


                                    <!-- Mother Name -->
                                    <div class="mb-3">
                                        <label for="mother_name" class="form-label">Mother Name</label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                                    </div>




                                    <!-- Death Place -->
                                    <div class="mb-3">
                                        <label for="death_place" class="form-label">Death Place</label>
                                        <input type="text" class="form-control" id="death_place" name="death_place" required>
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


                                    <!-- Nationality -->
                                    <div class="mb-3">
                                        <label for="nationality" class="form-label">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality" required>
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

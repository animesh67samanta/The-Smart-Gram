@extends('panchayat.layouts.main')
@section('title', 'Edit Marriage Certificate')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Marriage Certificate</div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-2">
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


                        <form action="{{ route('panchayat.marriageCertificate.update', $marriageCertificate->id) }}" method="POST" enctype="multipart/form-data" id="certificateForm">
                            @csrf
                            @method('POST')
                            <div id="keyboardContainer" class="simple-keyboard"></div>
                            <!-- Groom Details -->
                            <h4>Groom Details</h4>

                            <div class="mb-3">
                                <label for="groom_name" class="form-label">Groom Name</label>
                                <input type="text" class="form-control" id="groom_name" name="groom_name" value="{{ $marriageCertificate->groom_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="groom_name_mr" class="form-label">Groom Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="groom_name_mr" name="groom_name_mr" value="{{ $marriageCertificate->groom_name_mr }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="groom_image" class="form-label">Groom Image</label>
                                @if($marriageCertificate->groom_image)
                                <img src="{{ asset($marriageCertificate->groom_image) }}" alt="Groom Image" class="img-thumbnail mt-2" width="150">
                                @endif
                                <input type="file" class="form-control" id="groom_image" name="groom_image" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="groom_address" class="form-label">Groom Address</label>
                                <textarea class="form-control" id="groom_address" name="groom_address" required>{{ $marriageCertificate->groom_address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="groom_address" class="form-label">Groom Address in Marathi</label>
                                <textarea class="form-control marathi-input" id="groom_address_mr" name="groom_address_mr" required>{{ $marriageCertificate->groom_address_mr }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="groom_religion" class="form-label">Groom Religion</label>
                                <input type="text" class="form-control" id="groom_religion" name="groom_religion" value="{{ $marriageCertificate->groom_religion }}">
                            </div>

                            <div class="mb-3">
                                <label for="groom_religion_mr" class="form-label">Groom Religion in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="groom_religion_mr" name="groom_religion_mr" value="{{ $marriageCertificate->groom_religion_mr }}">
                            </div>

                            <div class="mb-3">
                                <label for="groom_nationality" class="form-label">Groom Nationality</label>
                                <input type="text" class="form-control" id="groom_nationality" name="groom_nationality" value="{{ $marriageCertificate->groom_nationality }}">
                            </div>
                            <div class="mb-3">
                                <label for="groom_nationality" class="form-label">Groom Nationality in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="groom_nationality_mr" name="groom_nationality_mr" value="{{ $marriageCertificate->groom_nationality_mr }}">
                            </div>

                            <div class="mb-3">
                                <label for="groom_gurdian_name" class="form-label">Groom Guardian Name</label>
                                <input type="text" class="form-control" id="groom_gurdian_name" name="groom_gurdian_name" value="{{ $marriageCertificate->groom_gurdian_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="groom_gurdian_name" class="form-label">Groom Guardian Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="groom_gurdian_name_mr" name="groom_gurdian_name_mr" value="{{ $marriageCertificate->groom_gurdian_name_mr }}">
                            </div>

                            <div class="mb-3">
                                <label for="groom_gurdian_address" class="form-label">Groom Guardian Address</label>
                                <textarea class="form-control" id="groom_gurdian_address" name="groom_gurdian_address">{{ $marriageCertificate->groom_gurdian_address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="groom_gurdian_address_mr" class="form-label">Groom Guardian Address in Marathi</label>
                                <textarea class="form-control marathi-input" id="groom_gurdian_address_mr" name="groom_gurdian_address_mr">{{ $marriageCertificate->groom_gurdian_address_mr }}</textarea>
                            </div>

                            <!-- Bride Details -->
                            <h4>Bride Details</h4>
                            <div class="mb-3">
                                <label for="bride_name_before_marriage" class="form-label">Bride Name Before Marriage</label>
                                <input type="text" class="form-control" id="bride_name_before_marriage" name="bride_name_before_marriage" value="{{ $marriageCertificate->bride_name_before_marriage }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="bride_name_before_marriage_mr" class="form-label">Bride Name Before Marriage in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="bride_name_before_marriage_mr" name="bride_name_before_marriage_mr" value="{{ $marriageCertificate->bride_name_before_marriage_mr }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="bride_name" class="form-label">Bride Name After Marriage</label>
                                <input type="text" class="form-control" id="bride_name" name="bride_name" value="{{ $marriageCertificate->bride_name }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="bride_name_mr" class="form-label">Bride Name After Marriage in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="bride_name_mr" name="bride_name_mr" value="{{ $marriageCertificate->bride_name_mr }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="bride_image" class="form-label">Bride Image</label>
                                @if($marriageCertificate->bride_image)
                                <img src="{{ asset($marriageCertificate->bride_image) }}" alt="Bride Image" class="img-thumbnail mt-2" width="150">
                                @endif
                                <input type="file" class="form-control" id="bride_image" name="bride_image" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="bride_address" class="form-label">Bride Address</label>
                                <textarea class="form-control" id="bride_address" name="bride_address" required>{{ $marriageCertificate->bride_address }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bride_address_mr" class="form-label">Bride Address in Marathi</label>
                                <textarea class="form-control marathi-input" id="bride_address_mr" name="bride_address_mr" required>{{ $marriageCertificate->bride_address_mr }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bride_religion" class="form-label">Bride Religion</label>
                                <input type="text" class="form-control" id="bride_religion" name="bride_religion" value="{{ $marriageCertificate->bride_religion }}">
                            </div>

                            <div class="mb-3">
                                <label for="bride_religion_mr" class="form-label">Bride Religion in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="bride_religion_mr" name="bride_religion_mr" value="{{ $marriageCertificate->bride_religion_mr }}">
                            </div>


                            <div class="mb-3">
                                <label for="bride_nationality" class="form-label">Bride Nationality</label>
                                <input type="text" class="form-control" id="bride_nationality" name="bride_nationality" value="{{ $marriageCertificate->bride_nationality }}">
                            </div>

                            <div class="mb-3">
                                <label for="bride_nationality_mr" class="form-label">Bride Nationality in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="bride_nationality" name="bride_nationality_mr" value="{{ $marriageCertificate->bride_nationality_mr }}">
                            </div>


                            <div class="mb-3">
                                <label for="bride_gurdian_name" class="form-label">Bride Guardian Name</label>
                                <input type="text" class="form-control" id="bride_gurdian_name" name="bride_gurdian_name" value="{{ $marriageCertificate->bride_gurdian_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="bride_gurdian_name_mr" class="form-label">Bride Guardian Name in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="bride_gurdian_name_mr" name="bride_gurdian_name_mr" value="{{ $marriageCertificate->bride_gurdian_name_mr }}">
                            </div>


                            <div class="mb-3">
                                <label for="bride_gurdian_address" class="form-label">Bride Guardian Address</label>
                                <textarea class="form-control" id="bride_gurdian_address" name="bride_gurdian_address">{{ $marriageCertificate->bride_gurdian_address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="bride_gurdian_address_mr" class="form-label">Bride Guardian Address in Marathi</label>
                                <textarea class="form-control marathi-input" id="bride_gurdian_address_mr" name="bride_gurdian_address_mr">{{ $marriageCertificate->bride_gurdian_address_mr }}</textarea>
                            </div>

                            <!-- Additional Details -->
                            <h4>Marriage Details</h4>

                            <div class="mb-3">
                                <label for="date_of_marriage" class="form-label">Date of Marriage</label>
                                <input type="date" class="form-control" id="date_of_marriage" name="date_of_marriage" value="{{ $marriageCertificate->date_of_marriage }}">
                            </div>

                            <div class="mb-3">
                                <label for="registration_number" class="form-label">Registration Number</label>
                                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $marriageCertificate->registration_number }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="registration_number_mr" class="form-label">Registration Number in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="registration_number_mr" name="registration_number_mr" value="{{ $marriageCertificate->registration_number_mr }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="registration_date" class="form-label">Registration Date</label>
                                <input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ $marriageCertificate->registration_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="issue_date" class="form-label">Issue Date</label>
                                <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ $marriageCertificate->issue_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $marriageCertificate->remarks }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="issue_date" class="form-label">Remarks in Marathi</label>
                                <input type="text" class="form-control marathi-input" id="remarks_mr" name="remarks_mr" value="{{ $marriageCertificate->remarks_mr }}" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn admin-btn-decorate">Update Certificate</button>
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

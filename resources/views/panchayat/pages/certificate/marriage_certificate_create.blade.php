@extends('panchayat.layouts.main')
@section('title', 'MarriageCertificate Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Marriage Certificate</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-2">
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
                            <h2>Create Marriage Certificate</h2>

                            <form action="{{ route('panchayat.marriageCertificate.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Groom Name -->
                                <div class="mb-3">
                                    <label for="groom_name" class="form-label">Groom Name</label>
                                    <input type="text" class="form-control" id="groom_name" name="groom_name" required>
                                </div>

                                <!-- Groom Image -->
                                <div class="mb-3">
                                    <label for="groom_image" class="form-label">Groom Image</label>
                                    <input type="file" class="form-control" id="groom_image" name="groom_image" accept="image/*">
                                </div>

                                <!-- Groom Address -->
                                <div class="mb-3">
                                    <label for="groom_address" class="form-label">Groom Address</label>
                                    <textarea class="form-control" id="groom_address" name="groom_address" required></textarea>
                                </div>

                                <!-- Groom Religion -->
                                <div class="mb-3">
                                    <label for="groom_religion" class="form-label">Groom Religion</label>
                                    <input type="text" class="form-control" id="groom_religion" name="groom_religion">
                                </div>

                                <!-- Groom Nationality -->
                                <div class="mb-3">
                                    <label for="groom_nationality" class="form-label">Groom Nationality</label>
                                    <input type="text" class="form-control" id="groom_nationality" name="groom_nationality">
                                </div>

                                <!-- Groom Guardian Name -->
                                <div class="mb-3">
                                    <label for="groom_gurdian_name" class="form-label">Groom Guardian Name</label>
                                    <input type="text" class="form-control" id="groom_gurdian_name" name="groom_gurdian_name">
                                </div>

                                <!-- Groom Guardian Address -->
                                <div class="mb-3">
                                    <label for="groom_gurdian_address" class="form-label">Groom Guardian Address</label>
                                    <textarea class="form-control" id="groom_gurdian_address" name="groom_gurdian_address"></textarea>
                                </div>

                                <!-- Bride Name Before Marriage-->
                                <div class="mb-3">
                                    <label for="bride_name_before_marriage" class="form-label">Bride Name Before Marraige</label>
                                    <input type="text" class="form-control" id="bride_name_before_marriage" name="bride_name_before_marriage" required>
                                </div>

                                <!-- Bride Name -->
                                <div class="mb-3">
                                    <label for="bride_name" class="form-label">Bride Name After Marraige</label>
                                    <input type="text" class="form-control" id="bride_name" name="bride_name" required>
                                </div>

                                <!-- Bride Image -->
                                <div class="mb-3">
                                    <label for="bride_image" class="form-label">Bride Image</label>
                                    <input type="file" class="form-control" id="bride_image" name="bride_image" accept="image/*">
                                </div>

                                <!-- Bride Address -->
                                <div class="mb-3">
                                    <label for="bride_address" class="form-label">Bride Address</label>
                                    <textarea class="form-control" id="bride_address" name="bride_address" required></textarea>
                                </div>

                                <!-- Bride Religion -->
                                <div class="mb-3">
                                    <label for="bride_religion" class="form-label">Bride Religion</label>
                                    <input type="text" class="form-control" id="bride_religion" name="bride_religion">
                                </div>

                                <!-- Bride Nationality -->
                                <div class="mb-3">
                                    <label for="bride_nationality" class="form-label">Bride Nationality</label>
                                    <input type="text" class="form-control" id="bride_nationality" name="bride_nationality">
                                </div>

                                <!-- Bride Guardian Name -->
                                <div class="mb-3">
                                    <label for="bride_gurdian_name" class="form-label">Bride Guardian Name</label>
                                    <input type="text" class="form-control" id="bride_gurdian_name" name="bride_gurdian_name">
                                </div>

                                <!-- Bride Guardian Address -->
                                <div class="mb-3">
                                    <label for="bride_gurdian_address" class="form-label">Bride Guardian Address</label>
                                    <textarea class="form-control" id="bride_gurdian_address" name="bride_gurdian_address"></textarea>
                                </div>

                                <!-- Date of Marriage -->
                                <div class="mb-3">
                                    <label for="date_of_marriage" class="form-label">Date of Marriage</label>
                                    <input type="date" class="form-control" id="date_of_marriage" name="date_of_marriage">
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

                                <!-- Issue Date -->
                                <div class="mb-3">
                                    <label for="issue_date" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" id="issue_date" name="issue_date" required>
                                </div>

                                <!-- Remarks -->
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks"></textarea>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

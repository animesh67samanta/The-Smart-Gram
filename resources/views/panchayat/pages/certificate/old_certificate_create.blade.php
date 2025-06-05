@extends('panchayat.layouts.main')
@section('title', 'OldCertificate Create')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">OldCertificate</div>
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
                            <h2>Create Old Certificate</h2>

                            <form action="{{ route('panchayat.oldCertificate.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf


                                    <!-- Child Name -->
                                    <div class="mb-3">
                                        <label for="childname" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="number" name="mobile" required>
                                    </div>

                                    <!-- Gender -->
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Type</label>
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="" disabled selected>Select Type</option>
                                            <option value="birth-certificate">Birth Certificate</option>
                                            <option value="death-certificate">Death Certificate</option>
                                            <option value="marriage-certificate">Marriage Certificate</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
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
@endsection

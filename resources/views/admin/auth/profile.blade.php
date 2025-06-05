@extends('admin.layouts.main')
@section('title', 'Admin Profile')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        {{-- <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body card-design">
                                    <div class="d-flex flex-column align-items-center text-center">

                                        <div class="mt-3">
                                            <h4>{{ Auth::guard('admin')->user()->name }}</h4>
                                            <p class="mb-1">{{ Auth::guard('admin')->user()->Email }}</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <form action="{{ route('admin.profile.update') }}" method="post"
                                    class="jQueryValidationForm profile_update">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="inpuut1"
                                                    value="{{ Auth::guard('admin')->user()->name }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inpuut2" name="email"
                                                    value="{{ Auth::guard('admin')->user()->email }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inpuut4" name="phone"
                                                    value="{{ Auth::guard('admin')->user()->phone }}" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inpuut5" name="address"
                                                    value="{{ Auth::guard('admin')->user()->address }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="submit" class="btn btn-light px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        {{-- <div class="col-lg-4"></div> --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <form action="{{ route('admin.password.update') }}"
                                    class="jQueryValidationForm change-password-form" method="post">
                                    @csrf
                                    <div class="card-body profile-input">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Old Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="input37"
                                                    name="old_password" placeholder="Old Password" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">New Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="input38" name="password"
                                                    placeholder="Choose Password" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirm Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="input39"
                                                    name="confirm_password" placeholder="Confirm Password" required>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="submit" class="btn btn-light px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {

                // for profile update
                $('.profile_update').on('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    let formData = $(this).serialize(); // Serialize the form data

                    $.ajax({
                        url: '{{ route('admin.profile.update') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                toastr.success('Password updated successfully!');
                            } else {
                                toastr.error(response.message || 'Failed to update password.');
                            }
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                // Validation error occurred
                                let errors = response.responseJSON.errors;
                                for (let field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        toastr.error(errors[field][0]);
                                    }
                                }
                            } else {
                                toastr.error('An error occurred. Please try again.');
                            }
                        }
                    });
                });

                // for password change
                $('.change-password-form').on('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    let formData = $(this).serialize(); // Serialize the form data

                    $.ajax({
                        url: '{{ route('admin.password.update') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                toastr.success('Password updated successfully!');
                            } else {
                                toastr.error(response.message || 'Failed to update password.');
                            }
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                // Validation error occurred
                                let errors = response.responseJSON.errors;
                                for (let field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        toastr.error(errors[field][0]);
                                    }
                                }
                            } else {
                                toastr.error('An error occurred. Please try again.');
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

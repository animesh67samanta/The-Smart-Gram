@extends('officer.layouts.main')
@section('title', 'Officer Dashboard')
<style>
    .card-body{
        font-size: 15px !important;
    }
</style>

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col-md-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    
                                    <p class="mb-0">Total Birth Certificate Approved</p>
                                    <h4 class="my-1">{{$totalBirthCertificate}}</h4>
                                    {{-- <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>$34 Since last week
                                    </p> --}}
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-user'></i>
                                </div>
                            </div>
                            {{-- <div id="chart1"></div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Death Certificate Approved</p>
                                    <h4 class="my-1">{{$totalDeathCertificate}}</h4>
                                    {{-- <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week
                                    </p> --}}
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-user'></i>
                                </div>
                            </div>
                            {{-- <div id="chart2"></div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Marriage Certificate Approved</p>
                                    <h4 class="my-1">{{$totalMarriageCertificate}}</h4>
                                    {{-- <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week
                                    </p> --}}
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-user'></i>
                                </div>
                            </div>
                            {{-- <div id="chart2"></div> --}}
                        </div>
                    </div>
                </div>
               
            </div>
            <!--end row-->
            
        </div>
    </div>
    <!--end page wrapper -->

    @push('js')
        <script src="{{ asset('admin/assets/js/index.js') }}"></script>
        <script>
            new PerfectScrollbar('.product-list');
            new PerfectScrollbar('.customers-list');
        </script>
    @endpush
@endsection


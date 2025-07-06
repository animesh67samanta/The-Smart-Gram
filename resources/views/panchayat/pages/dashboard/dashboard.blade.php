@extends('panchayat.layouts.main')
@section('title', 'Panchayat Dashboard')
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
                                    <p class="mb-0">Total Usesrs</p>
                                    <h4 class="my-1">0</h4>
                                    
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
                                    <p class="mb-0">Total Property</p>
                                    <h4 class="my-1">{{$totalProperty}}</h4>
                                   
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-home-alt'></i>
                                </div>
                            </div>
                            
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

@extends('admin.layouts.main')
@section('title', 'Admin Dashboard')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Usesrs</p>
                                    <h4 class="my-1">{{ $totalUserCount }}</h4>
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
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Property</p>
                                    <h4 class="my-1">{{ $propertyCount }}</h4>
                                    {{-- <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week
                                    </p> --}}
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-home-alt'></i>
                                </div>
                            </div>
                            {{-- <div id="chart2"></div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Certificate</p>
                                    <h4 class="my-1">{{ $certificateCount }}</h4>
                                    {{-- <p class="mb-0 font-13"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last
                                        week</p> --}}
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bx-certification'></i>
                                </div>
                            </div>
                            {{-- <div id="chart3"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="row ">

                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">New Panchayat</h5>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($panchayats as $key=> $panchayat)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $panchayat->name ?? 'null' }}</td>
                                                <td>{{ $panchayat->email ?? 'null' }}</td>
                                                <td>{{ $panchayat->phone ?? 'null' }}</td>
                                                <td>{{ $panchayat->address ?? 'null' }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            {{-- <div class="row">
                <div class="col-xl-8 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Transaction History</h5>
                                    <p class="mb-0 font-13"><i class='bx bxs-calendar'></i>in last 30 days revenue</p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown"> <i
                                            class='bx bx-dots-horizontal-rounded font-22  text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Payment Name</th>
                                            <th>Date & Time</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-1.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Michle Jhon</h6>
                                                        <p class="mb-0 font-13">Refrence Id #8547846</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 10, 2021</td>
                                            <td>+256.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-2.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Pauline Bird</h6>
                                                        <p class="mb-0 font-13">Refrence Id #9653248</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 12, 2021</td>
                                            <td>+566.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">In Progress</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-3.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Ralph Alva</h6>
                                                        <p class="mb-0 font-13">Refrence Id #7689524</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 14, 2021</td>
                                            <td>+636.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Declined</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-4.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from John Roman</h6>
                                                        <p class="mb-0 font-13">Refrence Id #8335884</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 15, 2021</td>
                                            <td>+246.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-7.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from David Buckley</h6>
                                                        <p class="mb-0 font-13">Refrence Id #7865986</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 16, 2021</td>
                                            <td>+876.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">In Progress</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-8.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Lewis Cruz</h6>
                                                        <p class="mb-0 font-13">Refrence Id #8576420</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 18, 2021</td>
                                            <td>+536.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-9.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from James Caviness</h6>
                                                        <p class="mb-0 font-13">Refrence Id #3775420</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 18, 2021</td>
                                            <td>+536.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-10.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Peter Costanzo</h6>
                                                        <p class="mb-0 font-13">Refrence Id #3768920</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 19, 2021</td>
                                            <td>+536.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-11.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Johnny Seitz</h6>
                                                        <p class="mb-0 font-13">Refrence Id #9673520</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 20, 2021</td>
                                            <td>+86.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Declined</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-12.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Lewis Cruz</h6>
                                                        <p class="mb-0 font-13">Refrence Id #8576420</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 18, 2021</td>
                                            <td>+536.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-13.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from David Buckley</h6>
                                                        <p class="mb-0 font-13">Refrence Id #8576420</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 22, 2021</td>
                                            <td>+854.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">In Progress</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="assets/images/avatars/avatar-14.png"
                                                            class="rounded-circle" width="46" height="46"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">Payment from Thomas Wheeler</h6>
                                                        <p class="mb-0 font-13">Refrence Id #4278620</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Jan 18, 2021</td>
                                            <td>+536.00</td>
                                            <td>
                                                <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Bounce Rate</p>
                                    <h4 class="mb-0">48.32%</h4>
                                </div>
                                <div class="ms-auto">
                                    <p class="mb-0 font-13 text-white">+12.34 Increase</p>
                                    <p class="mb-0 font-13">From Last Week</p>
                                </div>
                            </div>
                        </div>
                        <div id="chart12"></div>
                    </div>
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Pageviews</p>
                                    <h4 class="mb-0">52.64%</h4>
                                </div>
                                <div class="ms-auto">
                                    <p class="mb-0 font-13 text-white">+21.34 Increase</p>
                                    <p class="mb-0 font-13">From Last Week</p>
                                </div>
                            </div>
                        </div>
                        <div id="chart13"></div>
                    </div>
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">New Sessions</p>
                                    <h4 class="mb-0">68.23%</h4>
                                </div>
                                <div class="ms-auto">
                                    <p class="mb-0 font-13 text-white">+18.42 Increase</p>
                                    <p class="mb-0 font-13">From Last Week</p>
                                </div>
                            </div>
                        </div>
                        <div id="chart14"></div>
                    </div>
                </div>
            </div> --}}
            <!--end row-->

        </div>
    </div>
    <!--end page wrapper -->

@endsection
@push('js')
    <script src="{{ asset('admin/assets/js/index.js') }}"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
@endpush

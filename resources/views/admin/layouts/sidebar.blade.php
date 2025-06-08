<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        {{-- <div>
            <h4 class="logo-text">TheSmartGram</h4>
        </div> --}}
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title ">डॅशबोर्ड / Dashboard</div>
            </a>

        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">पंचायत व्यवस्थापन / Panchayat Management</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.panchayat.list')}}"><i class=' bx bx-food-menu'></i>यादी / List</a>
                </li>
                <li> 
                    <a href="{{route('admin.panchayat.create')}}"><i class='bx bx-user-plus'></i>जोडा / Add</a>
                </li>
                <li> 
                    <a href="{{route('admin.panchayat.tax.list')}}"><i class='bx bxs-component'></i>कर दर यादी / Tax Rate List</a>
                </li>
                <li> 
                    <a href="{{route('admin.panchayat.tax.create')}}"><i class='bx bx-coin-stack'></i>कर दर जोडा / Add Tax Rate</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">अधिकारी व्यवस्थापन / Officer Management</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.officer.list')}}"><i class='bx bx-user-circle'></i>यादी / List</a>
                </li>
                <li> <a href="{{route('admin.officer.create')}}"><i class='bx bx-user-plus'></i>जोडा / Add</a>
                </li>
            </ul>
        </li> 


    </ul>
    <!--end navigation-->
</div>

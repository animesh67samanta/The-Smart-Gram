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
            <a href="{{route('officer.officer.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title "> डॅशबोर्ड / Dashboard</div>
            </a>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">प्रमाणपत्र डाउनलोड मंजूर / Certificate Download Approve</div>
            </a>
            <ul>
                <li> <a href="{{route('officer.birthCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>जन्म प्रमाणपत्र / Birth Certificate</a>
                </li>
                <li> <a href="{{route('officer.deathCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>मृत्यू प्रमाणपत्र / Death Certificate</a>
                </li>
                <li> <a href="{{route('officer.marriageCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>विवाह प्रमाणपत्र / Marriage Certificate</a>
                </li>
            </ul>
        </li>




    </ul>
    <!--end navigation-->
</div>

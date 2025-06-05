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
            <a href="{{route('panchayat.officer.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title ">{{ GoogleTranslate::trans('Dashboard', 'mr') }}/Dashboard</div>
            </a>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">{{ GoogleTranslate::trans('Certificate Download Approve', 'mr') }}/Certificate Download Approve</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.birthCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>{{ GoogleTranslate::trans('Birth Certificate', 'mr') }}/Birth Certificate</a>
                </li>
                <li> <a href="{{route('panchayat.deathCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>{{ GoogleTranslate::trans('Death Certificate', 'mr') }}/Death Certificate</a>
                </li>
                <li> <a href="{{route('panchayat.marriageCertificate.approval.list')}}"><i class='bx bx-home-alt'></i>{{ GoogleTranslate::trans('Marriage Certificate', 'mr') }}/Marriage Certificate</a>
                </li>
            </ul>
        </li>




    </ul>
    <!--end navigation-->
</div>

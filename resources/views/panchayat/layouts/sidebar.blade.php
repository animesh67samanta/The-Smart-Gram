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
            <a href="{{route('panchayat.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title ">{{ GoogleTranslate::trans('Dashboard', 'mr') }}/Dashboard</div>
            </a>

        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">{{ GoogleTranslate::trans('Property Management', 'mr') }}/Property Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.property.list')}}"><i class='bx bx-home-alt'></i>{{ GoogleTranslate::trans('List', 'mr') }}/List</a>
                </li>
                <li> <a href="{{route('panchayat.property.create')}}"><i class='bx bx-home-alt'></i>{{ GoogleTranslate::trans('Add', 'mr') }}/Add</a>
                </li>
            </ul>
        </li>
{{--
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Property Tax Management</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.propertyTax.list')}}"><i class='bx bx-home-alt'></i>List</a>
                </li>
                <li> <a href="{{route('admin.propertyTax.create')}}"><i class='bx bx-home-alt'></i>Add</a>
                </li>
            </ul>
        </li> --}}

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-money"></i>
                </div>
                <div class="menu-title">{{ GoogleTranslate::trans('Tax Management', 'mr') }}/Tax Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.hometaxes.index')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans(' Tax Calculation List', 'mr') }}/ Tax Calculation List</a>
                </li>
                <li> <a href="{{route('panchayat.hometaxes.create')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans(' Tax Payment Create', 'mr') }}/ Tax Payment Create</a>
                </li>
                {{-- <li> <a href="{{route('panchayat.hometaxes.due.create')}}"><i class='bx bx-money'></i>Home Tax Payment Due</a>
                </li> --}}

                {{-- <li> <a href="{{route('panchayat.healthtaxes.payment.index')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Health Tax Payment Create', 'mr') }}/Health Tax Calculation List</a>
                </li>
                <li> <a href="{{route('panchayat.healthtaxes.payment.create')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Health Tax Calculation Create', 'mr') }}/Health Tax Calculation Create</a>

                </li>
                <li> <a href="{{route('panchayat.lamptaxes.payment.index')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Lamp Tax Calculation List', 'mr') }}/Lamp Tax Calculation List</a>
                </li>
                <li> <a href="{{route('panchayat.lamptaxes.payment.create')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Lamp Tax Calculation Create', 'mr') }}/Lamp Tax Calculation Create</a>
                </li>
                <li> <a href="{{route('panchayat.penalty.index')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Penalty List', 'mr') }}/Penalty List</a>
                </li>
                <li> <a href="{{route('panchayat.penalty.payment.create')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Penalty Calculation Create', 'mr') }}/Penalty Calculation Create</a>
                </li> --}}
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-money"></i>
                </div>
                <div class="menu-title">{{ GoogleTranslate::trans('Namuna Eight & Nine', 'mr') }}/Namuna Eight & Nine</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.namuna.eight.select')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Namuna Eight', 'mr') }}/Namuna Eight</a>
                </li>
                <li> <a href="{{route('panchayat.namuna.nine.select')}}"><i class='bx bx-money'></i>{{ GoogleTranslate::trans('Namuna Nine', 'mr') }}/Namuna Nine</a>
                </li>



            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-certification"></i>
                </div>
                <div class="menu-title">{{ GoogleTranslate::trans('Certificate Management', 'mr') }}/Certificate Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.birthCertificate.list')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Birth Certificate List', 'mr') }}/Birth Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.birthCertificate.create')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Birth Certificate Manage', 'mr') }}/Birth Certificate Manage</a>
                </li>
                <li> <a href="{{route('panchayat.deathCertificate.list')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Death Certificate List', 'mr') }}/Death Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.deathCertificate.create')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Death Certificate Manage', 'mr') }}/Death Certificate Manage</a>
                </li>
                <li> <a href="{{route('panchayat.marriageCertificate.list')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Marriage Certificate List', 'mr') }}/Marriage Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.marriageCertificate.create')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Marriage Certificate Manage', 'mr') }}/Marriage Certificate Manage</a>
                </li>
                <li> <a href="{{route('panchayat.oldCertificate.list')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Old Certificate List', 'mr') }}/Old Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.oldCertificate.create')}}"><i class='bx bx-certification'></i>{{ GoogleTranslate::trans('Old Certificate Upload', 'mr') }}/Old Certificate Upload</a>
                </li>
            </ul>
        </li>
       



    </ul>
    <!--end navigation-->
</div>

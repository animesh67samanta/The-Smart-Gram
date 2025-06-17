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
                <div class="menu-title ">डॅशबोर्ड / Dashboard</div>
            </a>

        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-building-house"></i>
                </div>
                <div class="menu-title">मालमत्ता व्यवस्थापन / Property Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.property.list')}}"><i class='bx bx-home-alt'></i> यादी / List</a>
                </li>
                <li> <a href="{{route('panchayat.property.create')}}"><i class='bx bx-home-alt'></i>जोडा / Add</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-coin-stack"></i>
                </div>
                <div class="menu-title">कर व्यवस्थापन / Tax Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.hometaxes.index')}}"><i class='bx bx-list-ul'></i>कर गणना यादी / Tax Calculation List</a>
                </li>
                <li> <a href="{{route('panchayat.hometaxes.create')}}"><i class='bx bx-list-plus'></i> / Tax Payment Create</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bxs-donate-heart"></i>
                </div>
                <div class="menu-title">नामुना आठ आणि नऊ / Namuna Eight & Nine</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.namuna.eight.select')}}"><i class='bx bxs-file-pdf'></i>ननचे एट / Namuna Eight</a>
                </li>
                <li> <a href="{{route('panchayat.namunaEightBulk')}}"><i class='bx bxs-file-pdf'></i>ननचे एट मोठ्या प्रमाणात/ Namuna Eight Bulk</a>
                </li>
                <li> <a href="{{route('panchayat.namuna.nine.select')}}"><i class='bx bxs-file-pdf'></i>नऊ नऊ / Namuna Nine</a>
                </li>
                <li> <a href="{{route('panchayat.namuna.nine.bulk')}}"><i class='bx bxs-file-pdf'></i>नऊ नऊ मोठ्या प्रमाणात/ Namuna Nine Bulk</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-certification"></i>
                </div>
                <div class="menu-title"> प्रमाणपत्र व्यवस्थापन / Certificate Management</div>
            </a>
            <ul>
                <li> <a href="{{route('panchayat.birthCertificate.list')}}"><i class='bx bxs-certification'></i>जन्म प्रमाणपत्र यादी / Birth Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.birthCertificate.create')}}"><i class='bx bxs-certification'></i>जन्म प्रमाणपत्र व्यवस्थापित / Birth Certificate Manage</a>
                </li>
                <li> <a href="{{route('panchayat.deathCertificate.list')}}"><i class='bx bxs-certification'></i>मृत्यू प्रमाणपत्र यादी / Death Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.deathCertificate.create')}}"><i class='bx bxs-certification'></i> मृत्यू प्रमाणपत्र व्यवस्थापित / Death Certificate Manage </a>
                </li>
                <li> <a href="{{route('panchayat.marriageCertificate.list')}}"><i class='bx bxs-certification'></i>विवाह प्रमाणपत्र यादी / Marriage Certificate List </a>
                </li>
                <li> <a href="{{route('panchayat.marriageCertificate.create')}}"><i class='bx bxs-certification'></i>विवाह प्रमाणपत्र व्यवस्थापित / Marriage Certificate Manage</a>
                </li>
                <li> <a href="{{route('panchayat.oldCertificate.list')}}"><i class='bx bxs-certification'></i>जुनी प्रमाणपत्र यादी / Old Certificate List</a>
                </li>
                <li> <a href="{{route('panchayat.oldCertificate.create')}}"><i class='bx bxs-certification'></i> जुने प्रमाणपत्र अपलोड / Old Certificate Upload</a>
                </li>
            </ul>
        </li>
       



    </ul>
    <!--end navigation-->
</div>

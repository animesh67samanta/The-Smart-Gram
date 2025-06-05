<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The smart gram marraige certificate</title>
    <!--  css -->
    {{-- <link rel="stylesheet" type="text/css" href="css/style.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('certificate_css/css/marriage_style.css') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    /*@media print {*/
    /*    @page {*/
    /*        margin: 0;*/
    /* Remove default margins */
    /*    }*/

    /*    body {*/
    /*        margin: 1cm;*/
    /* Adjust body margins as needed */
    /*    }*/

    /* Hide default browser header and footer */
    /*    body::before,*/
    /*    body::after {*/
    /*        content: none;*/
    /*    }*/
    /*}*/
</style>

<body>
    <section class="">
        <div class="container-fluid">
            <div class="marrige">
                <div class="row">
                    <div class="col-sm-3 col-2">
                        <div class="h-100 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('certificate_css/images/national-symbol.png') }}"
                                class="main-img">
                        </div>
                    </div>
                    <div class="col-sm-6 col-7">
                        <div class="marrige_headings text-center">
                            <h3 class="" style="color:blue;">{{ $details->panchayat->name_mr }},
                                {{ $details->panchayat->address_mr }}
                            </h3>
                            <h3 class="" style="color:blue;">{{ $details->panchayat->name }},{{ $details->panchayat->address }}</h3>
                            <h5 class="fw-bold" style="color:blue;">नमुना इ</h5>
                            <h5 class="fw-bold" style="color:blue;">FORM E</h5>
                            <h5 class="fw-bold mt-1" style="color:blue;">महाराष्ट्र शासन आरोग्य विभाग</h5>
                            <h4 class="fw-bold" style="color:blue;">GOVERNMENT OF MAHARASHTRA HEALTH DEPARTMENT</h4>
                            <h1 class="fw-bold" style="color:green;">विवाह नोंद प्रमाणपत्र</h1>
                            <h1 class="fw-bold" style="color:green;">MARRIAGE CERTIFICATE</h1>
                        </div>
                    </div>
                    <div class="col-sm-3 col-3">
                        <div class="h-100 d-flex justify-content-center align-items-center" style="flex-direction:column; ">
                            <div class="pride_img mt-2">
                                <img src="{{ asset($details->groom_image) }}" alt="Groom Image"
                                    class="img-fluid client-image">
                            </div>
                            <div class="pride_img mt-2">
                                <img src="{{ asset($details->bride_image) }}" alt="Bride Image"
                                    class="img-fluid client-image">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-12 mx-auto">
                        <div class="marrige_para text-center">
                            <p>प्रमाणित करणेत येते की, खालील माहिती ग्रामपंचायत {{ $details->panchayat->name_mr }}, {{ $details->panchayat->address_mr }}, राज्य महाराष्ट्र येथील विवाहाच्या मुळ अभिलेखाच्या नोंद वहीतून घेण्यात आलेली आहे.</p>
                            <p>THIS IS TO CERTIFY THAT, THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE
                                ORIGINAL MARRIAGE RECORDS REGISTER OF GRAMPANCHAYAT {{ $details->panchayat->name }}, {{ $details->panchayat->address }},
                                STATE MAHARASHTRA.</p>
                        </div>
                    </div>
                </div>
                <!------------------------marriage------------------------------->
                <div class="marrige_box mt-3">
                    <div class="row marriage_flex">
                        <div class="col-6">
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचे नाव :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_name_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>GROOM NAME :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचा पत्ता :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_address_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>GROOM ADDRESS :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_address }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचा धर्म :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_religion_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>GROOM RELEGION :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_religion }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचे वडील/पालकांचे नाव
                                        </p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_gurdian_name_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>पत्ता :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_gurdian_address_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>GROOM FATHER'S/GUARDIANS NAME </p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_gurdian_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>& ADDRESS :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_gurdian_address }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वधूचे नांव :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_name_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>BRIDE NAME :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वधूचे लग्ना आधीचे नाव :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_name_before_marriage_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>BRIDE NAME BEFORE MARRIAGE :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_name_before_marriage }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वधूचा पत्ता :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_address_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>Bride ADDRESS :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_address }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचा धर्म :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_religion_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>BRIDE RELEGION :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_religion }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वधुच्या वडीलाचे/पालकाचे नांव व :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_gurdian_name_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>पत्ता :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_gurdian_address_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>BRIDE FATHER'S/GUARDIANS NAME :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_gurdian_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>ADDRESS :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_gurdian_address }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>विवाह दिनांक :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ GoogleTranslate::trans($details->date_of_marriage, 'mr') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>DATE OF MARRIAGE :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->date_of_marriage }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>शेरा :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->remarks_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>REMARK :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->remarks }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>दिनांक :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ GoogleTranslate::trans($details->issue_date, 'mr') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>DATE:</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->issue_date }}</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!--right-side-->
                        <div class="col-sm-5 col-6 right_side_row">
                            <!--------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचे राष्ट्रीयत्व :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_nationality_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>GROOM NATIONALITY :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->groom_nationality }}</p>
                                    </div>
                                </div>
                            </div>

                            <!---------------------------------------------->
                            <div class="row  mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>वराचे राष्ट्रीयत्व :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_nationality_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>BRIDE NATIONALITY :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->bride_nationality }}</p>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>नोंदणी क्रमांक :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->registration_number_mr }}</p>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>REGIST NUMBER :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->registration_number }}</p>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>नोंदणी दिनांक :</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->registration_date }}</p>
                                    </div>
                                </div>
                            </div>
                            <!----------------------------------->
                            <div class="row mb-1">
                                <div class="col-7">
                                    <div class="bio_data">
                                        <p>REGIST DATE:</p>
                                    </div>
                                </div>
                                <div class="col-5 px-0">
                                    <div class="bio_data">
                                        <p>{{ $details->registration_date }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------->
                            <div class="qrcode mx-auto">
                                {!! QrCode::size(100)->generate('https://thesmartgram.com/marriageCertificate/'.$details->id) !!}
                            </div>
                            <!------------------------------------->
                            @if($officer->digital_signature)
                            
                            <div class="digital_sign">
                                <img src="{{ asset($officer->digital_signature) }}" alt="Officer-signature" class="digital_signature">
                                <br>
                                {{$details->approve_time}}

                            </div>
                            @endif




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<section class="container d-none">-->
    <!--    <div class="form-body">-->
    <!--        <div class="pt-2 death-form text-center">-->
    <!--            <h3 class=""style="color:blue;">{{ $details->panchayat->name_mr }},-->
    <!--                {{ $details->panchayat->address_mr }}</h3>-->
    <!--            <h3 class=""style="color:blue;">{{ $details->panchayat->name }},{{ $details->panchayat->address }}</h3>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-9">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-4">-->
    <!--                        <div class=" d-flex justify-content-center align-items-center">-->
    <!--                            <img src="images/national-symbol.png" class="img-fluid main-img">-->
    <!--                            <img src="{{ asset('certificate_css/images/national-symbol.png') }}"-->
    <!--                                class="img-fluid main-img">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-8">-->
    <!--                        <div class="pt-2 death-form d-flex justify-content-center text-center">-->
    <!--                            <div class="m-0">-->
    <!--                                  <h5 class="fw-bold" style="color:blue;" >नमुना इ</h5>-->
    <!--                                <h5 class="fw-bold" style="color:blue;" >FORM E</h5> -->
    <!--                                <h5 class="fw-bold mt-1" style="color:blue;" >महाराष्ट्र शासन आरोग्य विभाग</h5>-->
    <!--                                <h5 class="fw-bold" style="color:blue;" >GOVERNMENT OF MAHARASHTRA HEALTH DEPARTMENT</h5>-->
    <!--                                <div class="py-1">-->
    <!--                                    <h1 class="fw-bold"style="color:green;">विवाह नोंद प्रमाणपत्र</h1>-->
    <!--                                    <h1 class="fw-bold"style="color:green;">MARRIAGE CERTIFICATE</h1>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="px-0">-->
    <!--                    <p class="fw-bold">प्रमाणित करणेत येते की, खालील माहिती ग्रामपंचायत {{ $details->panchayat->name_mr }}, {{ $details->panchayat->address_mr }}, राज्य महाराष्ट्र येथील विवाहाच्या मुळ अभिलेखाच्या नोंद वहीतून घेण्यात आलेली आहे.</p>-->
    <!--                    <p class="fw-bold">THIS IS TO CERTIFY THAT, THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE-->
    <!--                        ORIGINAL MARRIAGE RECORDS REGISTER OF GRAMPANCHAYAT {{ $details->panchayat->name }}, {{ $details->panchayat->address }},-->
    <!--                        STATE MAHARASHTRA.</p>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-3">-->

    <!--                    <div class="blank-img-box mt-2"><img src="{{ asset($details->groom_image) }}" alt="Groom Image"-->
    <!--                        class="img-fluid client-image">-->
    <!--                    </div>-->
    <!--                    <div class="blank-img-box mt-2">-->
    <!--                        <img src="{{ asset($details->bride_image) }}" alt="Bride Image"-->
    <!--                        class="img-fluid client-image">-->
    <!--                    </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="certificate">-->

    <!--            <div class="row">-->
    <!--                <div class="col-3">-->
    <!--                    <p>वराचे नाव :</p>-->
    <!--                </div>-->
    <!--                <div class="col-9">-->
    <!--                    <p class="fw-bold">{{ $details->groom_name_mr }}</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="row mt-1">-->
    <!--                <div class="col-3">-->
    <!--                    <p>GROOM NAME :</p>-->
    <!--                </div>-->
    <!--                <div class="col-9">-->
    <!--                    <p class="fw-bold">{{ $details->groom_name }}</p>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--            <div class="mt-1">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>वराचा पत्ता :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="fw-bold">{{ $details->groom_address_mr }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mt-1">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>GROOM ADDRESS :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="-fw-bold">{{ $details->groom_address }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--            <div class="row mt-1">-->
    <!--                <div class="col-sm-6">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>वराचा धर्म :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p class="fw-bold">{{ $details->groom_religion_mr }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>GROOM RELEGION :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p class="fw-bold">{{ $details->groom_religion }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>वराचे राष्ट्रीयत्व :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p>{{ $details->groom_nationality_mr }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>GROOM NATIONALITY :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p>{{ $details->groom_nationality }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="row">-->
    <!--                <div class="col-7">-->

    <!--                    <div class="mt-1">-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>{{ $details->groom_gurdian_name_mr }}</p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="fw-bold">लक्ष्मणप्रसाद पृथ्वीचंद गुप्ता</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="row mt-1">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>पत्ता :</p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="-fw-bold">{{ $details->groom_gurdian_address_mr }}</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="mt-1">-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>GROOM FATHER'S/GUARDIANS NAME & </p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="fw-bold">{{ $details->groom_gurdian_name }}</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="row mt-1">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>ADDRESS :</p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="-fw-bold">{{ $details->groom_gurdian_address }}</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="mt-1">-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>वधूचे नांव :</p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="fw-bold">{{ $details->bride_name_mr }}</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="row mt-1">-->
    <!--                            <div class="col-5">-->
    <!--                                <p>BRIDE NAME :</p>-->
    <!--                            </div>-->
    <!--                            <div class="col-7">-->
    <!--                                <p class="-fw-bold">{{ $details->bride_name }}</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--                <div class="col-5 mt-2">-->
    <!--                    {!! QrCode::size(100)->generate('https://thesmartgram.com/marriageCertificate/'.$details->id) !!}-->
    <!--                </div>-->
    <!--            </div>-->


    <!--            <div class="mt-1">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>वधूचा पत्ता :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="fw-bold">{{ $details->bride_address_mr }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mt-1">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>Bride ADDRESS :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="-fw-bold">{{ $details->bride_address }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--            <div class="row mt-1">-->
    <!--                <div class="col-sm-6">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>वराचा धर्म :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p class="fw-bold">{{ $details->bride_religion_mr }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>BRIDE RELEGION :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p class="fw-bold">{{ $details->bride_religion }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>वराचे राष्ट्रीयत्व :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p>{{ $details->bride_nationality_mr }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-6">-->
    <!--                            <p>BRIDE NATIONALITY :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <p>{{ $details->bride_nationality }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="mt-1">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>वधुच्या वडीलाचे/पालकाचे नांव व</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="fw-bold">{{ $details->bride_gurdian_name_mr }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mt-1">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>पत्ता :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="-fw-bold">{{ $details->bride_gurdian_address_mr }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="mt-1">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>BRIDE FATHER'S/GUARDIANS NAME & </p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="fw-bold">{{ $details->bride_gurdian_name }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mt-1">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>ADDRESS :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p class="-fw-bold">{{ $details->bride_gurdian_address }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="row mt-1">-->
    <!--                <div class="col-4">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>विवाह दिनांक :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="fw-bold">{{ GoogleTranslate::trans($details->date_of_marriage, 'mr') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>DATE OF MARRIAGE :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="-fw-bold">{{ $details->date_of_marriage }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--                <div class="col-4">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>नोंदणी क्रमांक :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="fw-bold">{{ $details->registration_number_mr }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>REGIST NUMBER :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="-fw-bold">{{ $details->registration_number }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--                <div class="col-4">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>नोंदणी दिनांक :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="fw-bold">{{ $details->registration_date }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-7">-->
    <!--                            <p>REGIST DATE :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-5">-->
    <!--                            <p class="-fw-bold">{{ $details->registration_date }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->



    <!--            <div class="mt-1">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>शेरा :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p>{{ $details->remarks_mr }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--                <div class="row mt-1">-->
    <!--                    <div class="col-3">-->
    <!--                        <p>REMARK :</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        <p>{{ $details->remarks }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--            <div class="row">-->
    <!--                <div class="col-7">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-3">-->
    <!--                            <p>दिनांक :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-9">-->
    <!--                            <p>{{ GoogleTranslate::trans($details->issue_date, 'mr') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="row mt-1">-->
    <!--                        <div class="col-3">-->
    <!--                            <p>DATE :</p>-->
    <!--                        </div>-->
    <!--                        <div class="col-9">-->
    <!--                            <p>{{ $details->issue_date }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->


    <!--                </div>-->
    <!--                @if($officer->digital_signature)-->
    <!--                    <div class="col-5 time_date">-->
    <!--                        <img src="{{ asset($officer->digital_signature) }}" alt="Officer-signature"class="signature">-->
    <!--                        <br>-->
    <!--                        {{$details->approve_time}}-->

    <!--                    </div>-->
    <!--                @endif-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <div class="d-flex justify-content-center py-2">
        <button class="btn btn-primary " id="no-print" onclick="window.print()">Print Certificate</button>
    </div>
</body>

</html>
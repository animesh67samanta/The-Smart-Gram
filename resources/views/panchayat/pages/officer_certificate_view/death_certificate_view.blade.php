<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The smart gram death certificate</title>

    <!--  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('certificate_css/css/style.css') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <select class="form-select changeLang" style="display: none;">
        <option value="mr" {{ session()->get('locale') == 'mr' ? 'selected' : '' }}>Marathi</option>
    </select>
</head>
<style>
    @media print {
        @page {
            margin: 0;
            /* Remove default margins */
        }

        body {
            margin: 1cm;
            /* Adjust body margins as needed */
        }

        /* Hide default browser header and footer */
        body::before,
        body::after {
            content: none;
        }
    }
</style>

<body>
    <section class="container d-flex justify-content-center">
        <div class="form-body">
            <div class="pt-2 death-form text-center">
                <h3 class="fw-bold">{{ $details->panchayat->name_mr  }},
                    {{ $details->panchayat->address_mr }}</h3>
                <h3 class="fw-bold fst-italic">{{ $details->panchayat->name }},{{ $details->panchayat->address }}</h3>

            </div>

            <div class="pt-2 death-form d-flex justify-content-center text-center">
                <div class=" d-flex justify-content-center align-items-center">
                    {{-- <img src="images/national-symbol.png" class="img-fluid"> --}}
                    <img src="{{ asset('certificate_css/images/national-symbol.png') }}" class="img-fluid">

                </div>
                <div>
                    <h5 class="fw-bold">नमुना क्रमांक{{ GoogleTranslate::trans($details->id, 'mr') }}</h5>
                    <h5 class="fw-bold fst-italic">FORM NUMBER {{ $details->id }}</h5>
                    <h5 class="fw-bold mt-1">महाराष्ट्र शासन आरोग्य विभाग</h5>
                    <h5 class="fw-bold fst-italic">GOVERNMENT OF MAHARASHTRA HEALTH DEPARTMENT</h5>
                    <div class="py-1">
                        <h1 class="fw-bold">मृत्यू प्रमाणपत्र</h1>
                        <h1 class="fw-bold">DEATH CERTIFICATE</h1>
                    </div>
                    <p class="fw-bold">जन्म आणि मृत्यू नोंदणी अधिनियम १९६९ च्या कलम १२/१७ व महाराष्ट्र जन्म अणि मृत्यू
                        नोंदणी नियम २००० चे नियम ८ / १३ अन्वये दिलेले मृत्यू प्रमाणपत्र</p>
                    <p class="fw-bold">ISSUED UNDER RULE 8/13 OF MAHARASHTRA BIRTH DEATH REGESTRATION ACT 2000 AND div
                        12/17 REGESTRATION OF BIRTH DEATH ACT 1969</p>
                </div>
                <div class=" d-flex justify-content-center align-items-center">
                    {{-- <img src="images/second-logo.png" class="img-fluid"> --}}
                    <img src="{{ asset('certificate_css/images/second-logo.png') }}" class="img-fluid">
                </div>

            </div>

            <div class="pt-2 death-form text-center">
                <p class="fw-bold">प्रमाणित करणेत येते की, खालील माहिती ग्रामपंचायत {{ $details->panchayat->name_mr }},{{ $details->panchayat->address_mr }},
                    राज्य महाराष्ट्र येथील मृत्यूच्या मुळ अभिलेखाच्या नोंद वहीतून घेण्यात आलेली आहे.</p>
                <p class="fw-bold">THIS IS TO CERTIFY THAT, THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE ORIGINAL
                    DEATH RECORDS REGISTER OF GRAMPANCHAYAT {{ $details->panchayat->name }}, {{ $details->panchayat->address }}, STATE MAHARASHTRA.
                </p>
            </div>





            <div class="container certificate">


                <div class="row">
                    <div class="col-3 text-nowrap">
                        <p>मृताचे नांव :</p>
                    </div>
                    <div class="col-9 ">
                        <p>{{ $details->name_mr }}</p>
                    </div>



                    <div class="row mt-1">
                        <div class="col-3">
                            <p>NAME OF DEAD PERSON :</p>
                        </div>
                        <div class="col-9">
                            <p>{{ $details->name }}</p>
                        </div>
                    </div>
                </div>



                <div class="row mt-1">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-5 text-nowrap">
                                <p>मृत्यू दिनांक :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ GoogleTranslate::trans($details->dob, 'mr') }}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-5 text-nowrap">
                                <p>DATE OF DEATH :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->dob }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-5 text-nowrap">
                                <p>लिंग :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->gender_mr }}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-5 text-nowrap">
                                <p>SEX :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->gender }}</p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-1">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-5 text-nowrap">
                                <p>नोंदणी क्रमांक :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->registration_number_mr }}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-5 text-nowrap">
                                <p>REGISTRATION NUMBER :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->registration_number }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-5 text-nowrap">
                                <p>नोंदणी दिनांक :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ GoogleTranslate::trans($details->registration_date, 'mr') }}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-5 text-nowrap">
                                <p>REGISTRATION DATE :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->registration_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="row">
                        <div class="col-3 text-nowrap">
                            <p>मृत्यूचे ठिकाण :</p>
                        </div>
                        <div class="col-9 text-nowrap">
                            <p>{{ $details->death_place_mr }}</p>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-3 text-nowrap">
                            <p>DEATH PLACE :</p>
                        </div>
                        <div class="col-9 text-nowrap">
                            <p>{{ $details->death_place }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                          <div class="mt-1">
                            <div class="row">
                                <div class="col-7">
                                    <p>वडिलांचे / नवऱ्याचे नांव :</p>
                                </div>
                                <div class="col-5">
                                    <p>{{ $details->father_or_husband_name_mr }}</p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-7">
                                    <p>FATHERS/HUSBAND NAME :</p>
                                </div>
                                <div class="col-5">
                                    <p>{{ $details->father_or_husband_name }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="mt-1">
                            <div class="row">
                                <div class="col-5 text-nowrap">
                                    <p>आईचे नांव :</p>
                                </div>
                                <div class="col-7 text-nowrap">
                                    <p>{{ $details->mother_name_mr }}</p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-5 text-nowrap">
                                    <p>MOTHERS NAME :</p>
                                </div>
                                <div class="col-7 text-nowrap">
                                    <p>{{ $details->mother_name }}</p>
                                </div>
                            </div>
                        </div>



                        <div class="mt-1">
                            <div class="row">
                                <div class="col-5">
                                    <p>मृताचा कायमचा पत्ता :</p>
                                </div>
                                <div class="col-7 ">
                                    <p>{{ $details->permanent_address_mr }}</p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-5 ">
                                    <p>PERMANENT ADDRESS :</p>
                                </div>
                                <div class="col-7 ">
                                    <p>{{ $details->permanent_address }}</p>
                                </div>
                            </div>
                        </div>



                        <div class="mt-1">
                            <div class="row">
                                <div class="col-5 text-nowrap text-nowrap">
                                    <p>राष्ट्रीयत्व :</p>
                                </div>
                                <div class="col-7 text-nowrap text-nowrap">
                                    <p>{{ $details->nationality_mr }}</p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-5 text-nowrap text-nowrap">
                                    <p>NATIONALITY :</p>
                                </div>
                                <div class="col-7 text-nowrap text-nowrap">
                                    <p>{{ $details->nationality }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-5 text-nowrap">



                        {!! QrCode::size(100)->generate('https://smartgram.fusiontechlab.site/deathCertificate/' . $details->id) !!}

                    </div> --}}
                </div>




                <div class="mt-1">
                    <div class="row">
                        <div class="col-3 text-nowrap">
                            <p>शेरा :</p>
                        </div>
                        <div class="col-9 text-nowrap">
                            <p>{{ $details->remarks_mr }}</p>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-3 text-nowrap">
                            <p>REMARK :</p>
                        </div>
                        <div class="col-9 text-nowrap">
                            <p>{{ $details->remarks }}</p>
                        </div>
                    </div>


                </div>







                <div class="row mt-1">
                    <div class="col-7 text-nowrap">
                        <div class="row">
                            <div class="col-5 text-nowrap">
                                <p>दिनांक :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ GoogleTranslate::trans($details->issue_date, 'mr') }}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-5 text-nowrap">
                                <p>DATE :</p>
                            </div>
                            <div class="col-7 text-nowrap">
                                <p>{{ $details->issue_date }}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center py-5">
        <a href="{{ route('panchayat.deathCertificate.approval.list') }}" class="btn btn-primary btn-sm">
            Back to list
        </a>
    </div>
    {{-- <script>
        document.getElementById("print").addEventListener("click", function() {
            // Save the original content of the page
            var originalContent = document.body.innerHTML;

            // Get the content of the section to print
            var printContent = document.getElementById("content").innerHTML;

            // Replace the page content with the section content
            document.body.innerHTML = printContent;

            // Trigger the print function
            window.print();

            // Restore the original page content after printing
            document.body.innerHTML = originalContent;
        });
    </script> --}}
</body>

</html>

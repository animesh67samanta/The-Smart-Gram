<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The smart gram birth certificate</title>

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
  

        /* Hide default browser header and footer */
        body::before,
        body::after {
            content: none;
        }
    }
</style>

<body>
<section class="body">
    <section class="container-fluid-fluid d-flex justify-content-center px-0" id ="content">
        <div class="form-body">
            <div class="death-form text-center">
                <h3 class="fw-bold" style="color:blue;">{{ $details->panchayat->name_mr }}, {{ $details->panchayat->address_mr }}</h3>
                <h3 class="fw-bold " style="color:blue;">{{ $details->panchayat->name}},{{ $details->panchayat->address}}</h3>
            </div>
            <div class="death-form d-flex justify-content-center text-center">
                <div class=" d-flex justify-content-center align-items-center">
                    {{-- <img src="images/national-symbol.png" class="img-fluid"> --}}
                    <img src="{{ asset('certificate_css/images/national-symbol.png') }}" class="img-fluid">

                </div>
                <div>
                    <h5 class="fw-bold" style="color:blue;">नमुना क्रमांक ५</h5>
                    <h5 class="fw-bold" style="color:blue;">FORM NUMBER 5</h5>
                    <h5 class="fw-bold mt-1" style="color:blue;">महाराष्ट्र शासन आरोग्य विभाग</h5>
                    <h5 class="fw-bold" style="color:blue;">GOVERNMENT OF MAHARASHTRA HEALTH DEPARTMENT</h5>
                    <div>
                        <h1 class="fw-bold" style="color:green;">जन्म प्रमाणपत्र</h1>
                        <h1 class="fw-bold" style="color:green;">BIRTH CERTIFICATE</h1>
                    </div>
                    <p class="fw-bold">महाराष्ट्र जन्म आणि मृत्यू नोंदणी नियम २००० च्या नियम ८/१३ नुसार व जन्म आणि मृत्यु अधिनियम १९६९ च्या कलम  १२/१७ अन्वये दिलेले जन्म प्रमाणपत्र <p>
                    <p class="fw-bold">ISSUED UNDER RULE 8/13 OF MAHARASHTRA BIRTH DEATH REGESTRATION ACT 2000 AND SECTION
                        12/17 REGESTRATION OF BIRTH DEATH ACT 1969</p>
                </div>
                <div class=" d-flex justify-content-center align-items-center" style="position: relative;right: 10px;">
                    <img src="{{ asset('certificate_css/images/second-logo.png') }}" class="img-fluid">
                </div>

            </div>

            <div class="pt-2 death-form text-center">
                <p class="fw-bold">प्रमाणित करणेत येते की, खालील माहिती ग्रामपंचायत {{ $details->panchayat->name_mr}}, {{ $details->panchayat->address_mr}},
                    राज्य महाराष्ट्र येथील जन्माच्या मुळ अभिलेखाच्या नोंद वहीतून घेण्यात आलेली आहे.</p>
                <p class="fw-bold">THIS IS TO CERTIFY THAT, THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE ORIGINAL
                    BIRTH RECORDS REGISTER OF GRAMPANCHAYAT {{ $details->panchayat->name}}, {{ $details->panchayat->address}}, STATE MAHARASHTRA.
                </p>
            </div>




  
  
  
  
  
  
  <!--===========================================================-->
  <!--===========================================================-->
  <section>
      <div class="container px-0">
         
        <!------------------------------->
        
          <div class="row bio_row mt-2">
              <div class="col-7">
                  <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>नाव :</p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->childname_mr}}</p>
                        </div>
                  </div>
                  <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>NAME :</p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->childname}}</p>
                        </div>
                  </div>
                  
                  
                  <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>जन्म दिनाक : </p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->dob }}</p>
                        </div>
                  </div>
                <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>DATE OF BIRTH :</p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->dob }}</p>
                        </div>
                  </div>
                  <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>नोंदणी क्रमांक :</p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->registration_number_mr }}</p>
                        </div>
                  </div>
                 <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>REGISTRATION NUMBER :</p>
                        </div>
                        <div class="col-4 px-0">
                          <p>{{ $details->registration_number}}</p>
                        </div>
                  </div>
                  <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                           <p>जन्म ठिकाण :</p>
 
                        </div>
                        <div class="col-4 px-0">
                         <p>{{ $details->birth_place_mr }}</p>
                        </div>
                  </div>
                   <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                           <p>BIRTH PLACE :</p>
                        </div>
                        <div class="col-4 px-0">
                         <p>{{ $details->birth_place}}</p>
                        </div>
                  </div>
                   <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>वडिलाचे नाव :</p>
                        </div>
                        <div class="col-4 px-0">
                            <p>{{ $details->father_name_mr }}</p>
                        </div>
                  </div>
                   <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>FATHER'S NAME :</p>
                        </div>
                        <div class="col-4 px-0">
                            <p>{{ $details->father_name}}</p>
                        </div>
                  </div>
                   <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>आईचे नांव :</p>
                        </div>
                        <div class="col-4 px-0">
                            <p>{{ $details->mother_name_mr }}</p>
                        </div>
                  </div>
                   <!---------------------->
                  <div class="row mb-1">
                        <div class="col-8">
                            <p>MOTHER'S NAME :</p>
                        </div>
                        <div class="col-4 px-0">
                           <p>{{ $details->mother_name}}</p>
                        </div>
                  </div>
                  <!------------------------>
                  <div class="row mb-1">
                    <div class="col-8">
                        <p>आई / वडिलांचा कायमचा पत्ता :</p>
                    </div>
                    <div class="col-4 px-0">
                        <p>{{ $details->parent_address_mr }}</p>
                    </div>
                </div>
                <!------------------------------>
                <div class="row mb-1">
                    <div class="col-8">
                        <p>FATHERS/MOTHERS ADDRESS :</p>
                    </div>
                    <div class="col-4 px-0">
                        <p>{{ $details->parent_address}}</p>
                    </div>
                </div>
                <!----------------------------------->
                <div class="row mb-1">
                    <div class="col-8">
                        <p>आई वडिलांचे राष्ट्रीयत्व :</p>
                    </div>
                    <div class="col-4 px-0">
                     <p>{{ $details->parent_nationality_mr }}</p>
                    </div>
                </div>
                <!---------------------------------->

            <div class="row mb-1">
                <div class="col-8">
                    <p>FATHERS/MOTHERS NATIONALITY :</p>
                </div>
                <div class="col-4 px-0">
                    <p>{{ $details->parent_nationality}}</p>
                </div>
            </div>
            <!------------------------------------->
            <div class="row mb-1">
                <div class="col-8">
                    <p>शेरा :</p>
                </div>
                <div class="col-4 px-0">
                    <p>{{ $details->remarks_mr }}</p>
                </div>
            </div>
        <!----------------------------->
            <div class="row mb-1">
                <div class="col-8">
                    <p>REMARK :</p>
                </div>
                <div class="col-4 px-0">
                    <p>{{ $details->remarks}}</p>
                </div>
            </div>
            <!--------------------------------->
                <div class="row mb-1">
                    <div class="col-8">
                        <p>दिनांक :</p>
                    </div>
                    <div class="col-4 px-0">
                        <p>{{ GoogleTranslate::trans($details->issue_date, 'mr') }}</p>
                    </div>
                </div>
<!-------------------------->
              <div class="row mb-1">
                  <div class="col-8">
                      <p>DATE :</p>
                  </div>
                  <div class="col-4 px-0">
                      <p>{{ $details->issue_date}}</p>
                  </div>
              </div>
                
                  
              </div>
              <!--right-side -->
              <div class="col-5 right_side_row" >
                    <div class="row mb-1">
                        <div class="col-8">
                            <p>लिंग :</p>
                        </div>
                        <div class="col-4 px-0">
                            <p>{{ $details->gender_mr }}</p>
                        </div>
                    </div>
<!----------------------------------------------->
                    <div class="row mb-1">
                        <div class="col-8">
                            <p>SEX :</p>
                        </div>
                        <div class="col-4 px-0 ">
                            <p>{{ $details->gender}}</p>
                        </div>
                    </div>
                    <!--------------------------------->
                    <div class="row mb-1">
                        <div class="col-8">
                            <p>नोंदणी दिनांक :</p>
                        </div>
                        <div class="col-4 px-0 ">
                            <p>{{ $details->registration_date }}</p>
                        </div>
                    </div>
                    <!--------------------------------------->
                    <div class="row mb-1">
                        <div class="col-8 ">
                            <p>REGISTRATION DATE :</p>
                        </div>
                        <div class="col-4 px-0 ">
                            <p>{{ $details->registration_date}}</p>
                        </div>
                    </div>
                    <!--------------------------->
                    <div class="right_qr">
                        {!! QrCode::size(100)->generate('https://thesmartgram.com/birthCertificate/'.$details->id) !!}
                    </div>
                    <!------------------------ signature-->
                    @if($officer->digital_signature)
                    
                            <div class="digital_sign">
                                <img src="{{ asset( $officer->digital_signature) }}" alt="Officer-signature"class="digital_signature">
                                <br>
                                {{$details->approve_time}}
                            </div>

                        @endif
                    
                    
                    
                    
              </div>
          </div>
      </div>
  </section>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
        </div>
    </section>
    <div class="d-flex justify-content-center py-5">
        <button class="btn btn-primary no-print" id="print" >Download Certificate</button>
    </div>
    </section>

    <script>
   
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
            // document.body.innerHTML = originalContent;
        });
  
    </script>

</body>

</html>

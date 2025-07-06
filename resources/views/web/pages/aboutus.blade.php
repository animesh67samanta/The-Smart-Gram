@extends('web.layouts.main')
@section('title', 'Web Page About us')
@section('content')
  <!-- about us-->
  
  <div class="container-fluid banner gx-0 p-0 position-relative" style="overflow:hidden;">
    <img src="{{asset('web/assets/images/aboutus-banner.jpg')}}" class="img-fluid w-100" alt="about-banner" style="object-fit:cover; height:320px; filter:brightness(0.85);">
    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
      {{-- <h1 class="display-4 fw-bold text-white text-shadow" style="text-shadow:2px 2px 8px #000;">आमच्याबद्दल</h1> --}}
    </div>
  </div>

  <section class="main-section container py-5">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-md-6">
        <div class="rounded-4 overflow-hidden shadow-sm border border-2 border-primary">
          <img src="{{asset('web/assets/images/man-with-computer.jpg')}}" class="img-fluid w-100" alt="online-payment" style="object-fit:cover; min-height:260px;">
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-light rounded-4 p-4 shadow-sm h-100 d-flex flex-column justify-content-center">
          <h5 class="text-primary fw-bold mb-3">आम्ही आमच्या सेवा डिजिटल पद्धतीने पुरवतो</h5>
          <p class="mb-0" style="text-align:justify;">
            आम्ही thesmartgram.com ही एक आघाडीची सॉफ्टवेअर कंपनी आहोत. गावपातळीवरील ग्रामपंचायतीचे दैनंदिन कामकाज सोपे, सरळ आणि पारदर्शक करण्यासाठी आम्ही कटिबद्ध आहोत. पंचायत कर्मचाऱ्यांना दैनंदिन काम सोपे व्हावे, नागरिकांनाही आवश्यक सुविधा वेळेवर उपलब्ध करून देता येतील.
            <br>
            सर्व आवश्यक कागदपत्रे एकाच छताखाली ग्रामपंचायत नमुना क्र. 8, 9. ग्रामपंचायतीमधील जुन्या नोंदी सुरक्षित करणे, दस्तऐवज व्यवस्थापन, डेटा प्रोसेसिंग, आजीवन डेटा सेव्हिंग, जन्म, मृत्यू, विवाह, बुक बाइंडिंग, जुन्या रेकॉर्डचे स्कॅनिंग. अचूक जन्म, मृत्यू, विवाह रेकॉर्ड स्कॅन कॉपी एका क्लिकवर उपलब्ध, इ.
          </p>
        </div>
      </div>
    </div>

    <div class="row align-items-center g-5 flex-md-row-reverse">
      <div class="col-md-6">
        <div class="rounded-4 overflow-hidden shadow-sm border border-2 border-primary">
          <img src="{{asset('web/assets/images/people-with-certificate.jpg')}}" class="img-fluid w-100" alt="online-payment" style="object-fit:cover; min-height:260px;">
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-light rounded-4 p-4 shadow-sm h-100 d-flex flex-column justify-content-center">
          <h5 class="text-primary fw-bold mb-3">आम्ही आमचे गाव डिजिटल करू</h5>
          <p class="mb-0" style="text-align:justify;">
            स्मार्ट व्हिलेज म्हणजे एक असा उपक्रम जो ग्रामीण भागातील लोकांसाठी डिजिटल तंत्रज्ञानाच्या साहाय्याने जीवन सोपे आणि सुलभ बनवतो. या उपक्रमामध्ये नागरिकांना विविध ऑनलाइन सेवा पुरवल्या जातात, ज्या त्यांच्या दैनंदिन गरजा पूर्ण करण्यास सहाय्य करतात.
            <br><br>
            स्मार्ट व्हिलेज वेबसाइटद्वारे नागरिकांना घरबसल्या जन्म, मृत्यू, जात प्रमाणपत्र यांसारखी प्रमाणपत्रे ऑनलाईन अर्ज करून मिळू शकतात. यामुळे सरकारी कार्यालयांमध्ये प्रत्यक्ष जाण्याची आवश्यकता कमी होते आणि वेळ वाचतो.
            <br><br>
            या व्यतिरिक्त, या वेबसाइटद्वारे कर भरण्याची प्रक्रियाही अधिक सोपी आणि डिजिटल बनवली जाते. ग्रामस्थांना मालमत्ता कर, पाणी कर, आणि इतर प्रकारचे कर ऑनलाईन भरता येतात. यामुळे आर्थिक व्यवहार अधिक पारदर्शक होतात आणि ग्रामीण भागातील नागरिकांना त्यांच्या आर्थिक जबाबदाऱ्या सुलभपणे पूर्ण करता येतात.
            <br><br>
            स्मार्ट व्हिलेज वेबसाइटमध्ये सुरक्षित पेमेंट गेटवेचा समावेश असल्याने आर्थिक व्यवहार करताना कोणताही धोका निर्माण होत नाही. ही प्रणाली अत्यंत वापरण्यास सोपी आहे, त्यामुळे डिजिटल तंत्रज्ञानाशी नव्याने परिचित लोकही सहज वापर करू शकतात.
            <br><br>
            या डिजिटल सुविधांमुळे कागदपत्रांचे कामकाज कमी होते, चुका टाळता येतात, आणि ग्रामीण भागातील नागरिकांना सरकारी सेवा त्यांच्याच दारात मिळतात. या उपक्रमामुळे ग्रामस्थ अधिक स्वावलंबी होतात, आणि गावाचा सर्वांगीण विकास साधता येतो.
            <br><br>
            स्मार्ट व्हिलेज हे डिजिटल भारताच्या संकल्पनेचा एक भाग आहे, ज्यामुळे ग्रामीण भागातील लोकांचे जीवन अधिक सुलभ, पारदर्शक, आणि तंत्रज्ञानाने समृद्ध होऊ शकते. ही आधुनिक यंत्रणा गावांमध्ये प्रगतीचे नवे पर्व घडवून आणते.
          </p>
        </div>
      </div>
    </div>
  </section>


    @endsection


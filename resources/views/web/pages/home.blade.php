@extends('web.layouts.main')
@section('title', 'Web Page Home')
@section('content')
<style>
  .lead{
    letter-spacing: 1px;
  }
</style>
<body>
    <!-- header end -->
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('web/assets/images/banner-hindi-one.jpg')}}" class="d-block w-100 img-fluid">
          </div>
          <div class="carousel-item">
             <img src="{{asset('web/assets/images/banner-hindi-one.jpg')}}" class="d-block w-100 img-fluid">
          </div>
    
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

<div class="scroll-container">
    <div class="scroll-text">
         <p>डिजिटल सेवा हे एक महत्त्वपूर्ण उपकरण बनले आहे, ज्यामुळे नागरिकांना सरकारी सेवा सहज आणि वेगाने मिळवता येतात. विवाह, मृत्यू, आणि जन्म प्रमाणपत्राची नोंदणी घरबसल्या करता येते, तसेच कर भरण्याची प्रक्रिया देखील ऑनलाइन केली जाऊ शकते. यामुळे वेळ आणि श्रमाची बचत होते, तसेच लोकांना सरकारी सेवांपर्यंत सहज पोहोचता येते. डिजिटल माध्यमांचा वापर करून, अधिक लोकांना सुविधा मिळवून देणे आणि प्रशासनात पारदर्शकता आणणे, हे सरकारचे प्रमुख उद्दिष्ट आहे.</p>
        
    </div>
</div>

  <!-- our service -->
    <section class="main-section container margin-top">
      <h2 class="text-primary fw-bold">आमची सेवा</h2>
      <div class="owl-carousel service-carousel owl-theme">
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/barcode-scanning-certificate.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold"> बारकोडसह जन्म, मृत्यू आणि विवाह प्रमाणपत्र</h5>
              <p class="card-content-box-text">जन्म, मृत्यू आणि विवाह प्रमाणपत्रांवर बारकोड दिसेल. तुम्ही जगात कुठूनही बारकोड स्कॅन केल्यास, तुम्हाला प्रमाणपत्राची मूळ प्रत दिसेल. त्यावर अधिकृत डिजिटल स्वाक्षरी, तारीख आणि वेळ उपलब्ध आहे. पूर्ण सुरक्षितता. ग्रामपंचायत लॉगिन आणि अधिकारी लॉगिन स्वतंत्र.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/Village-form-fillup.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 2">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold">नमुना क्रमांक ८ आणि ९</h5>
              <p class="card-content-box-text">नमुना क्रमांक ८ तयार करणे, Home tax update करणे, नमुना नंबर, नवीन मालमत्ता समाविष्ट करणे, इत्यादी. नमुना नंबर ८ आणि ९ शी संबंधित सर्व कामे.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/tax-management.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 3">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold">कर व्यवस्थापन</h5>
              <p class="card-content-box-text">ग्रामपंचायतींना मिळणाऱ्या करात वाढ करण्यासाठी ग्रामपंचायत हद्दीतील सर्व घरांचे सर्वेक्षण करून ग्रामपंचायत करात वाढ करता येईल. आणि ग्रामपंचायतीचे उत्पन्न अचूक कर आकारणीने वाढवता येते.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/document-managment.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 3">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold">ग्रामपंचायत दस्तऐवज व्यवस्थापन</h5>
              <p class="card-content-box-text">दैनंदिन वापरातील दस्तऐवज जसे की प्रोसीडिंग बुक आणि इतर पुस्तकांची पद्धतशीरपणे मांडणी केली जाते.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/data-processing.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 3">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold">सोप्या कामासाठी डेटा प्रोसेसिंग</h5>
              <p class="card-content-box-text">तुम्हाला हवी असलेली कोणतीही नोंदणी फक्त एका क्लिकवर उपलब्ध आहे.
                जुनी नोंदणी प्रत मोबाईलवर उपलब्ध आहे. तुम्हाला पुन्हा पुन्हा नोंदणी रजिस्टरमध्ये जाण्याची गरज नाही.
              </p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <img src="{{asset('web/assets/images/document-scanner.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 3">
            <div class="card-content-box-body p-xl-2 p-lg-2 p-1">
              <h5 class="card-content-box-title text-primary fw-bold">दस्तऐवज स्कॅनिंग:</h5>
              <p class="card-content-box-text">ग्रामपंचायतीमधील जुने जन्म, मृत्यू, लग्नाच्या नोंदी जे जीर्ण अवस्थेत आहेत परंतु अत्यंत महत्त्वाचे आहेत, आम्ही त्या नोंदी जसेच्या तसे स्कॅन करतो आणि डेटा lifetime  डिजिटल स्वरूपात जतन करून पुस्तक बांधणी सुद्धा करतो. ही सर्व कामे तुमच्या ऑफिस मध्ये होईल.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  

  <!-- about us-->
  <section class="about-section py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{asset('web/assets/images/about-section.jpg')}}" class="img-fluid rounded shadow" alt="About Us">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title text-primary fw-bold mb-4">आमच्याबद्दल</h2>
                <p class="lead">आम्ही thesmartgram.com ही एक आघाडीची सॉफ्टवेअर कंपनी आहोत. गावपातळीवरील ग्रामपंचायतीचे दैनंदिन कामकाज सोपे, सरळ आणि पारदर्शक करण्यासाठी आम्ही कटिबद्ध आहोत. पंचायत कर्मचाऱ्यांना दैनंदिन काम सोपे व्हावे, नागरिकांनाही आवश्यक सुविधा वेळेवर उपलब्ध करून देता येतील.
                  सर्व आवश्यक कागदपत्रे एकाच छताखाली ग्रामपंचायत नमुना क्र. 8, 9. ग्रामपंचायतीमधील जुन्या नोंदी सुरक्षित करणे, दस्तऐवज व्यवस्थापन, डेटा प्रोसेसिंग, आजीवन डेटा सेव्हिंग, जन्म, मृत्यू, विवाह, बुक बाइंडिंग, जुन्या रेकॉर्डचे स्कॅनिंग. अचूक जन्म, मृत्यू, विवाह रेकॉर्ड स्कॅन कॉपी एका क्लिकवर उपलब्ध, इ.........</p>
                <a href="{{route('webview.aboutus')}}" class="btn btn-primary mt-3">अधिक पहा</a>
            </div>
        </div>
    </div>
</section>
    <!-- Carousel -->
  <section class="container second-crousel margin-top mb-5">
          <h2 class="text-primary fw-bold">आमची गॅलरी</h2>
      <div class="row">

        <div class="owl-carousel gallery-carousel">
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/clean-village.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                    <h5 class="card-content-box-title text-primary mt-1 fw-bold">स्वच्छ हरभरा</h5>
                    <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                  </div>
                </div>
                
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/loan-requirment.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                            <h5 class="card-content-box-title text-primary mt-1 fw-bold">महिलांना कर्ज उपलब्ध करून देणे</h5>
                            <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                  </div>
                </div>
                
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/meeting.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                            <h5 class="card-content-box-title text-primary mt-1 fw-bold">गावाचा प्रश्न सोडवणे</h5>
                            <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                 </div>
               </div>
                
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/Grampanchayat-meeting.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                            <h5 class="card-content-box-title text-primary mt-1 fw-bold">कार्यालयात बैठक</h5>
                            <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                  </div>
                </div>
                
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/village-school.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                            <h5 class="card-content-box-title text-primary mt-1 fw-bold">गावाची शाळा</h5>
                            <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                  </div>
                </div>
                
                <div class="card-content-box">
                  <img src="{{asset('web/assets/images/medical-health-checkup.jpg')}}" class="card-content-box-img-top img-fluid" alt="Image 1">
                  <div class="card-content-box-body">
                            <h5 class="card-content-box-title text-primary mt-1 fw-bold">आरोग्य तपासणी</h5>
                            <p class="card-content-box-text">हे एक प्रदीर्घ प्रस्थापित सत्य आहे की एखाद्या पृष्ठाचा लेआउट पाहताना वाचक वाचनीय सामग्रीमुळे विचलित होईल</p>
                 </div>
                
               </div>
        </div>
      </div>
          


    </section>
@endsection

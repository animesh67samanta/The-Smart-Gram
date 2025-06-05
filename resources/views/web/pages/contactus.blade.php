@extends('web.layouts.main')
@section('title', 'Web Page Contact Us')
@section('content')
<body>

    <!-- header end -->
  <!-- about us-->
  
    <div class="container-fluid banner gx-0">
       <img src="{{asset('web/assets/images/contact-us-banner.jpg')}}" class="img-fluid" alt="about-banner">
  </div>
  
  <section class="main-section container margin-top">

    <h2 class="text-primary fw-bold">आमच्याशी संपर्क साधा</h2>

    <div class="row">
      <div class="col-md-6 order-xl-last order-lg-last">
        <img src="{{asset('web/assets/images/contact-us-inner.jpg')}}" class="img-fluid" alt="online-payment">

      </div>
      <div class="col-md-6 order-xl-first order-lg-first">

    <form>
      <div class="form-row">
        <div class="form-group">
          <label for="first-name">Name</label>
          <input type="text" id="first-name" placeholder="Your First Name">
        </div>
        <div class="form-group">
          <label for="phone-numbr">Phone no.</label>
          <input type="text" id="phone-numbr" placeholder="Your phone no.">
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Your Email">
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" placeholder="Write your message here..."></textarea>
      </div>
      <button type="submit">Send Message</button>
    </form>
      </div>
    </div>

    </section>


@endsection

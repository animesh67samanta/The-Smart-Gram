@extends('web.layouts.main')
@section('title', 'Web Page Contact Us')
@section('content')

<div class="container-fluid banner gx-0 p-0 position-relative" style="overflow:hidden;">
    <img src="{{asset('web/assets/images/contact-us-banner.jpg')}}" class="img-fluid w-100" alt="about-banner" style="object-fit:cover; height:320px; filter:brightness(0.85);">
    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
        {{-- <h1 class="display-4 fw-bold text-white text-shadow" style="text-shadow:2px 2px 8px #000;">Contact Us</h1> --}}
    </div>
</div>

<section class="main-section container py-5">
    <h2 class="text-primary fw-bold mb-4">आमच्याशी संपर्क साधा</h2>
    <div class="row align-items-center g-5">
        <div class="col-md-6 order-md-2 mb-4 mb-md-0">
            <div class="rounded-4 overflow-hidden shadow-sm border border-2 border-primary">
                <img src="{{asset('web/assets/images/contact-us-inner.jpg')}}" class="img-fluid w-100" alt="contact-us">
            </div>
        </div>
        <div class="col-md-6 order-md-1">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('contactUs.submit') }}" class="p-4 bg-light rounded-4 shadow-sm needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                    <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Phone No. <span class="text-danger">*</span></label>
                    <input type="text" class=" @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Your Phone Number" value="{{ old('phone') }}" required pattern="^[0-9]{10,15}$">
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Enter a valid phone number (10-15 digits).</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" class=" @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                    <textarea class=" @error('message') is-invalid @enderror" id="message" name="message" rows="4" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">Send Message</button>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Bootstrap 5 client-side validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endpush

@endsection

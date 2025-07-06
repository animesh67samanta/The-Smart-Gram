<style>
    /* Quick Links Styling */
.col-md-3.col-sm-12 h5 {
    color: #ffffff;
    font-size: 1.25rem;
    margin-bottom: 1.25rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.col-md-3.col-sm-12 h5::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background-color: #ffffff;
}

.col-md-3.col-sm-12 .list-unstyled {
    padding-left: 0;
}

.col-md-3.col-sm-12 .list-unstyled li {
    margin-bottom: 0.75rem;
    transition: all 0.3s ease;
}

.col-md-3.col-sm-12 .list-unstyled li a {
    color: #ffffff;
    text-decoration: none;
    position: relative;
    padding-bottom: 3px;
    transition: all 0.3s ease;
    display: inline-block;
}

/* Hover Effects */
.col-md-3.col-sm-12 .list-unstyled li a:hover {
    color: #f8f9fa;
    transform: translateX(5px);
}

.col-md-3.col-sm-12 .list-unstyled li a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #ffffff;
    transition: width 0.3s ease;
}

.col-md-3.col-sm-12 .list-unstyled li a:hover::before {
    width: 100%;
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .col-md-3.col-sm-12 {
        margin-bottom: 2rem;
    }
    
    .col-md-3.col-sm-12 h5 {
        font-size: 1.1rem;
    }
    
    .col-md-3.col-sm-12 .list-unstyled li {
        margin-bottom: 0.5rem;
    }
}
</style>

<footer class="bg-primary text-light margin-top py-5 py-md-3 py-sm-2 footer">
    <div class="container py-4">
        <div class="row">
            <!-- Footer Column 1 -->
            <div class="col-md-6 col-sm-12 first-content">
                <div class="container text-center">

                    <img src="{{asset('web/assets/images/TheSmartgram-white.png')}}" alt="TheSmartgram" width="30%" class="img-fluid text-center">
                </div>
              <p class="mt-2 text-center">Thesmartgram वेबसाइट प्रमाणपत्रे आणि कर भरण्यासाठी अखंड ऑनलाइन सेवा देऊन ग्रामीण समुदायांमध्ये क्रांती घडवून आणते.</p>
            </div>

            <!-- Footer Column 2 -->
            <div class="col-md-3 col-sm-12">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('webview.index')}}" class="text-light">Home</a></li>
                    <li class="mt-sm-2 mt-md-2 mt-3"><a href="{{route('webview.aboutus')}}" class="text-light">About us</a></li>
                    <li class="mt-sm-2 mt-md-2 mt-3"><a href="{{route('webview.contactus')}}" class="text-light">Contact us</a></li>
                </ul>
            </div>

            <!-- Footer Column 3 -->
            <div class="col-md-3 col-sm-12">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt-fill"></i> 303, Anamika A wing Hanuman Nagar, Katemanivali Kalyan East Thane.</li>
                    <li class="mt-sm-2 mt-md-2 mt-3"><i class="bi bi-telephone-fill"></i> +91 9867771976</li>
                    <li class="mt-sm-2 mt-md-2 mt-3"><i class="bi bi-envelope-fill"></i> info@thesmartgram.com</li>
                </ul>
            </div>
        </div>
    </div>


</footer>
 <!-- Copyright Section -->
    <div class="text-center py-3 bg-dark second-footer">
        <p class="mb-0 text-light">© 2024 Thesmartgram. All Rights Reserved by <a href="#" class="text-light" target="blank">www.thesmartgram.com</a></p>
    </div>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('admin/assets/images/logo-icon.png')}}" type="image/png" />
  <title>The Smart Gram Panchayat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- custom css -->
  {{-- <link rel="stylesheet" type="text/css" href="css/style.css"> --}}
  <link href="{{asset('web/assets/css/style.css')}}" rel="stylesheet">

  <!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

 <!-- crousel slider css link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

 <!--gallary crousel slider css link -->
 <link rel="stylesheet" href="path/to/owl.carousel.min.css">
  <link rel="stylesheet" href="path/to/owl.theme.default.min.css">
  
  
   <!--gallary crousel slide js css link -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/owl.carousel.min.js"></script>
    
    
   <!-- crousel slide js css link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    
  
</head>
<body>
    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>

    $(document).ready(function() {
    $(".service-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    nav: true, // Enables navigation arrows
    dots: false,
    navText: [
            '<i class="fas fa-chevron-left"></i>', 
            '<i class="fas fa-chevron-right"></i>'
        ],                 // Using Font Awesome icons
    // navText: ["<", ">"], // Adds text or icons to the buttons
    autoplay: true, // Enables autoplay
    autoplayTimeout: 3000, // Sets autoplay interval to 3 seconds (3000ms)
    responsive: {
    0: { items: 1 },
    600: { items: 2 },
    1000: { items: 3 }
    }
    });
    });

    

</script>
    
    
<script>  

    $(document).ready(function(){
    $(".gallery-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true, // Enables autoplay
    autoplayTimeout: 3000, // Sets autoplay interval to 3 seconds (3000ms)
    responsive: {
    0: {items: 1},
    600: {items: 2 },
    1000: {items: 4}
    },
    navText: [
            '<i class="fas fa-chevron-left"></i>', 
            '<i class="fas fa-chevron-right"></i>'
        ] // Using Font Awesome icons
    // navText: ["<", ">"] // Custom navigation text
    });
    });
    

</script>



</body>
</html>

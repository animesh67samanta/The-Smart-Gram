<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('admin/assets/images/logo-icon.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<title>The Smart Gram Officer</title>
</head>
<style>
	.card-body{
		background-color: transparent !important;
	}
</style>
<body class="bg-theme bg-theme2">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="{{asset('admin/assets/images/logo-icon.png')}}" width="50%" height="100px" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">The Smart Gram Officer</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" action="{{route('officer.login-action')}}" method="post">
                                            @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Enter Your Email" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Enter Password" required>
													 <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" name="rember_me" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="auth-basic-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Sign in</button>
												</div>
											</div>

										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<p class="mb-0">Gaussian Texture</p>
			  <hr>

			  <ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
			  </ul>
               <hr>
			  <p class="mb-0">Gradient Background</p>
			  <hr>

			  <ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
				<li id="theme13"></li>
				<li id="theme14"></li>
				<li id="theme15"></li>
			  </ul>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
	<!--Password show & hide js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @include('admin.layouts.validation')
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>


<script>
    $(document).ready(function() {
        // Check if a theme is saved in local storage and apply it
        const savedTheme = localStorage.getItem('selectedTheme');
        if (savedTheme) {
            $('body').attr('class', savedTheme);
        }

        $(".switcher-btn").on("click", function() {
            $(".switcher-wrapper").toggleClass("switcher-toggled");
        });

        $(".close-switcher").on("click", function() {
            $(".switcher-wrapper").removeClass("switcher-toggled");
        });

        function applyTheme(themeClass) {
            $('body').attr('class', themeClass);
            localStorage.setItem('selectedTheme', themeClass); // Save the selected theme to local storage
        }

        $('#theme1').click(function() { applyTheme('bg-theme bg-theme1'); });
        $('#theme2').click(function() { applyTheme('bg-theme bg-theme2'); });
        $('#theme3').click(function() { applyTheme('bg-theme bg-theme3'); });
        $('#theme4').click(function() { applyTheme('bg-theme bg-theme4'); });
        $('#theme5').click(function() { applyTheme('bg-theme bg-theme5'); });
        $('#theme6').click(function() { applyTheme('bg-theme bg-theme6'); });
        $('#theme7').click(function() { applyTheme('bg-theme bg-theme7'); });
        $('#theme8').click(function() { applyTheme('bg-theme bg-theme8'); });
        $('#theme9').click(function() { applyTheme('bg-theme bg-theme9'); });
        $('#theme10').click(function() { applyTheme('bg-theme bg-theme10'); });
        $('#theme11').click(function() { applyTheme('bg-theme bg-theme11'); });
        $('#theme12').click(function() { applyTheme('bg-theme bg-theme12'); });
        $('#theme13').click(function() { applyTheme('bg-theme bg-theme13'); });
        $('#theme14').click(function() { applyTheme('bg-theme bg-theme14'); });
        $('#theme15').click(function() { applyTheme('bg-theme bg-theme15'); });
    });
</script>



</body>

</html>

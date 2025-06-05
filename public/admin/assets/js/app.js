$(function() {
	"use strict";

	new PerfectScrollbar(".app-container"),

	new PerfectScrollbar(".header-message-list"),
	new PerfectScrollbar(".header-notifications-list"),

    $(".mobile-search-icon").on("click", function() {

		$(".search-bar").addClass("full-search-bar")

	}),

	  $(".search-close").on("click", function() {
	 	$(".search-bar").removeClass("full-search-bar")
      }),


	$(".mobile-toggle-menu").on("click", function() {
		$(".wrapper").addClass("toggled")
	}), $(".toggle-icon").click(function() {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
			$(".wrapper").addClass("sidebar-hovered")
		}, function() {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	}), $(document).ready(function() {
		$(window).on("scroll", function() {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function() {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}),

	$(document).ready(function () {
			$(window).on("scroll", function () {
				if ($(this).scrollTop() > 60) {
					$('.topbar').addClass('bg-dark');
				} else {
					$('.topbar').removeClass('bg-dark');
				}
			});
			$('.back-to-top').on("click", function () {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});
		});


	$(function() {
		for (var e = window.location, o = $(".metismenu li a").filter(function() {
				return this.href == e
			}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
	}), $(function() {
		$("#menu").metisMenu()
	}), $(".chat-toggle-btn").on("click", function() {
		$(".chat-wrapper").toggleClass("chat-toggled")
	}), $(".chat-toggle-btn-mobile").on("click", function() {
		$(".chat-wrapper").removeClass("chat-toggled")
	}), $(".email-toggle-btn").on("click", function() {
		$(".email-wrapper").toggleClass("email-toggled")
	}), $(".email-toggle-btn-mobile").on("click", function() {
		$(".email-wrapper").removeClass("email-toggled")
	}), $(".compose-mail-btn").on("click", function() {
		$(".compose-mail-popup").show()
	}), $(".compose-mail-close").on("click", function() {
		$(".compose-mail-popup").hide()
	}),


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



});

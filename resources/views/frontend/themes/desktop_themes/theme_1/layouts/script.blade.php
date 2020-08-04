<!-- Javascript Files
================================================== -->
<!-- Core JS -->
<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/core.js')}}"></script>

<!-- Vendor JS -->
<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/twitter/jquery.twitter.js')}}"></script>

<!-- REVEAL ADD-ON FILES -->
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/reveal/js/revolution.addon.revealer.min.js?ver=1.0.0')}}"></script>

<!-- TYPEWRITER ADD-ON FILES -->
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js')}}"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>

<script type="text/javascript">
	var revapi, tpj;
	(function () {
		if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad); else onLoad();

		function onLoad() {
			if (tpj === undefined) {
				tpj = jQuery;
				if ("off" == "on") {
					tpj.noConflict();
				}
			}
			if (tpj("#hero-revslider").revolution == undefined) {
				revslider_showDoubleJqueryError("#hero-revslider");
			} else {
				revapi = tpj("#hero-revslider").show().revolution({
					sliderType: "standard",
					jsFileLocation: "revolution/js/",
					sliderLayout: "auto",
					dottedOverlay: "fourxfour",
					delay: 9000,
					revealer: {
						direction: "tlbr_skew",
						color: "#1d1429",
						duration: "1500",
						delay: "0",
						easing: "Power3.easeOut",
						spinner: "2",
						spinnerColor: "rgba(0,0,0,",
					},
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						mouseScrollReverse: "default",
						onHoverStop: "off",
						arrows: {
							style: "metis",
							enable: true,
							hide_onmobile: false,
							hide_onleave: false,
							tmp: '',
							left: {
								container: "layergrid",
								h_align: "right",
								v_align: "bottom",
								h_offset: 72,
								v_offset: 0
							},
							right: {
								container: "layergrid",
								h_align: "right",
								v_align: "bottom",
								h_offset: 12,
								v_offset: 0
							}
						}
					},
					responsiveLevels: [1200, 992, 768, 576],
					visibilityLevels: [1200, 992, 768, 576],
					gridwidth: [1420, 992, 768, 576],
					gridheight: [620, 580, 460, 400],
					lazyType: "none",
					parallax: {
						type: "scroll",
						origo: "slidercenter",
						speed: 400,
						speedbg: 0,
						speedls: 0,
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, -10, -15, -20, -25, 50, 51, 55],
					},
					shadow: 0,
					spinner: "spinner5",
					stopLoop: "off",
					stopAfterLoops: -1,
					stopAtSlide: -1,
					shuffle: "off",
					autoHeight: "off",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}; /* END OF revapi call */

			//RsRevealerAddOn(tpj, revapi, "<div class='rsaddon-revealer-spinner rsaddon-revealer-spinner-2'><div class='rsaddon-revealer-2' style='border-top-color: 0.65); border-bottom-color: 0.15); border-left-color: 0.65); border-right-color: 0.15)'><\/div><\/div>");
			//RsTypewriterAddOn(tpj, revapi);

		}; /* END OF ON LOAD FUNCTION */
	}()); /* END OF WRAPPING FUNCTION */
</script>

<!-- Template JS -->
<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/init.js')}}"></script>
<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/custom.js')}}"></script>

@yield('script')
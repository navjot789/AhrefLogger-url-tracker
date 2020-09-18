                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script><!-- form toggle switch ON/OFF (with css(1))  -->
            	<script src="https://ahref.tech/ajax/chosen.jquery.min9f1e.js" type="text/javascript" charset="utf-8" async defer></script>
            	<script src="https://ahref.tech/ajax/cookieconsent.min4c20.js" type="text/javascript" charset="utf-8" async defer></script>
            	<script src="https://ahref.tech/ajax/datepicker.min208f.js" type="text/javascript" charset="utf-8" async defer></script>
            	<script src="https://ahref.tech/ajax/icheck.minf700.js" type="text/javascript" charset="utf-8" async defer></script>
            	<script src="https://ahref.tech/ajax/pace95fa.js" type="text/javascript" charset="utf-8" async defer></script>
            	
            	<!-- DATATABLES (with css(2))  -->
            	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  ></script>
                <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" ></script>



            	<script type="text/javascript">
            	$(window).on("scroll", function() {
                if($(window).scrollTop() > 50) {
                    $("header").addClass("activehead");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                   $("header").removeClass("activehead");
                }
            	});
            	
            	function In_headerFunction() {
                var element = $("header");
                element.toggleClass("activeheadmenu2");
            	}
            	
            	function In_ShowPosInfo() {
            	$(".short-adv-sett").fadeIn(100);
            	$(".main-index-top #main-form .main-options").slideDown(100);
            	}
            	
            	//Custom Link Modal
            	var $modallink = $('.link-shared'),
                $overlaylink = $('.overlaylink'),
                $showModallink = $('.show-modal'),
                $closelink = $('.closelink');
                
            	function In_ShowLinkModal(){
            	e.preventDefault();
              
            	var windowHeight = $(window).height(),
                  windowWidth = $(window).width(),
                  modalWidth = windowWidth/2; //50% of window
              
            	$overlaylink.show();
            	$modallink.css({
            		'width' : modalWidth,
            		'margin-left' : -modalWidth/2
            	});
            	}
            
            	$closelink.on('click', function(){
            		$overlaylink.hide();
            	});
            	
            	//Sidebar Menu
            	$(document).on('click','.quicklinks-toggle__btn',function(){
            		$('body').addClass('menu_active');
            	});
            
            	$('#focus-overlay').on('click',function (){
            		$('body').removeClass('menu_active');
            	});
            	
            	$(document).ready(function(){
                    $("#widget_news h3").append(" <i class='zmdi zmdi-info' style='color: #00BCD4;'></i>");
            		$("#widget_activities h3").append(" <i class='zmdi zmdi-swap-vertical-circle' style='color: #ff9800;'></i>");
            		$("#widget_top_urls h3").append(" <i class='zmdi zmdi-trending-up' style='color: #4caf50;'></i>");
            		$("#splash h3, #splash_create h3").append(" <i class='zmdi zmdi-info' style='color: #673ab7;'></i>");
            		$("#overlay h3").append(" <i class='zmdi zmdi-info' style='color: #4CAF50;'></i>");
            		$("#widget_tools h3").append(" <i class='zmdi zmdi-wrench' style='color: #9c27b0;'></i>");
            		$("#widget_export h3").append(" <i class='zmdi zmdi-hourglass-alt' style='color: #4CAF50;'></i>");
            	});
            	
            	//Smooth Scroll
            	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(t){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);(e=e.length?e:$("[name="+this.hash.slice(1)+"]")).length&&(t.preventDefault(),$("html, body").animate({scrollTop:e.offset().top},1e3,function(){var t=$(e);if(t.focus(),t.is(":focus"))return!1;t.attr("tabindex","-1"),t.focus()}))}})
            	</script>
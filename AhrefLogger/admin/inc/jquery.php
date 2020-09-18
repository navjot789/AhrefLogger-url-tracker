 <!--jQuery [ REQUIRED ]-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
   <script>
       /* read-more script to hide long-url */
            $(document).ready(function(){
            	var maxLength = 35;
            	$(".show-read-more").each(function(){
            		var myStr = $(this).text();
            		if($.trim(myStr).length > maxLength){
            			var newStr = myStr.substring(0, maxLength);
            			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            			$(this).empty().html(newStr);
            			$(this).append('<a style="color:#2196f3" href="javascript:void(0);" class="read-more">...Read More</a>');
            			$(this).append('<span class="more-text" style="display:none;">' + removedStr + '</span>');
            		}
            	});
            	$(".read-more").click(function(){
            		$(this).siblings(".more-text").contents().unwrap();
            		$(this).remove();
            	});
            });
		</script>
   
   
   	<script type="text/javascript">
		  
		  $(document).ready(function() {
                                   $('#bundle').bind('change', function() {
                                     var elements = $('div.hidingDiv').children().hide(); // hide all the elements
                                        var value = $(this).val();
                                                        
                                          if (value.length) { // if somethings' selected
                                                 elements.filter('.' + value).show(); // show the ones we want
                                                  }
                                                 }).trigger('change');
                                                });
		  
		  
		    </script>
   
   
   
        <script src="js/jquery-2.1.1.min.js"></script>
 
		
		 <!--FooTable PAGGING [ OPTIONAL ]-->
        <script src="plugins/fooTable/dist/footable.all.min.js"></script>
		
		 <!--FooTable PAGGING Example [ SAMPLE ]-->
        <script src="js/demo/tables-footable.js"></script>
		
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        
         <!--DataTables [ OPTIONAL ]-->
        <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--DataTables Sample [ SAMPLE ]-->
        <script src="js/demo/tables-datatables.js"></script>
        
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.spline.js"></script>
        <script src="plugins/flot-charts/jquery.flot.pie.min.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/moment-range/moment-range.js"></script>
        <script src="plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <!--Flot Order Bars Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <!--ricksaw.js [ OPTIONAL ]-->
        <script src="plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
        <script src="plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
        <script src="plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
        <script src="plugins/jquery-ricksaw-chart/ricksaw.js"></script>
       <!--Summernote [ OPTIONAL ]-->
        <script src="plugins/summernote/summernote.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
        <script src="js/demo/dashboard-v2.js"></script>
        
        
      
        
    
		
		
		
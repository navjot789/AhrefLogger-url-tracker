






 
		
			/*copy to clipboard Script */
		function copyToClipboard(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
            }
            
        
            
			/* Domain changer Script */
		  function changeText(urlPostFixddomains) {
                var protocol;
                var url;
                var domain = '<span style="color:#575e64;">://</span>' + '<span style="color:#2196f3;">'+ urlPostFixddomains + '</span>';
              
             
                switch(urlPostFixddomains) {
                    case "ahref.tech":
                    case "phpproject.xyz":
                        protocol = '<span style="color:#59c053;">https</span>';
                        break;
                    default:
                        protocol = '<span style="color:#575e64;">http</span>';
                }
            
                url = protocol + domain;
                document.getElementById('mydiv1').innerHTML = url;
                  document.getElementById('mydiv2').innerHTML = url;
            }
            
       	/* Path changer Script */
		  function changePath(path) {
            
                var way =  '/<span style="color:#2196f3;">'+ path + '</span>/';
              
              
                  document.getElementById('divpath1').innerHTML = way;
                  document.getElementById('divpath2').innerHTML = way;
            }
            
           	/* Extension changer Script */
		  function changeExtension(exten) {
            
                  var link = '<span style="color:#2196f3;">' + exten + '</span>';
              
              
                  document.getElementById('divExten1').innerHTML = link;
                  document.getElementById('divExten2').innerHTML = link;
            }  
            
		
	/* hide_show bot rows Script */
		$(document).ready(function() {
       
   
           $("button.hideoddrows").click(function(){
           
            
            if ($.trim($(this).text()) === 'Hide') {
                $(this).text('Show');
                $(".table_bg  #effected").hide("show");
            } else {
                $(this).text('Hide'); 
                $(".table_bg  #effected").show(1000);
            }
            
             
             });
             
        });

            
            
            
            	/* read-more script to hide long-url */
            $(document).ready(function(){
            	var maxLength = 45;
            	$(".show-read-more").each(function(){
            		var myStr = $(this).text();
            		if($.trim(myStr).length > maxLength){
            			var newStr = myStr.substring(0, maxLength);
            			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            			$(this).empty().html(newStr);
            			$(this).append('<a style="color:#2196f3" href="javascript:void(0);" class="read-more">...Read More</a>');
            			$(this).append('<span class="more-text">' + removedStr + '</span>');
            		}
            	});
            	$(".read-more").click(function(){
            		$(this).siblings(".more-text").contents().unwrap();
            		$(this).remove();
            	});
            });

              
var urlAjaxHandlerCms	= _SERVER_PATH+'/admin/api/'; // percorso  del contenuto del  dialog

var  curItem;

var Cms = function () {
    function handleIEFixes() {
        //fix html5 placeholder attribute for ie7 & ie8
        if (jQuery.browser.msie && jQuery.browser.version.substr(0, 1) < 9) { // ie7&ie8
            jQuery('input[placeholder], textarea[placeholder]').each(function () {
                var input = jQuery(this);

                jQuery(input).val(input.attr('placeholder'));

                jQuery(input).focus(function () {
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });

                jQuery(input).blur(function () {
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                });
            });
        }
    }

    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        
        jQuery('.tooltips,*[rel=tooltip]').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');    

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');


        jQuery('[data-toggle="buttons-radio"]').button();
    }

    

    function handleToggle() {

        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });


   }

    function listHandler() {
    	
    	$(':input[data-list-value]').on('change',function() {
			var value 		= $(this).val();
			var itemArray	= $(this).data('list-value').split('_');
			var field		= $(this).data('list-name');
			if($(this).is(':checkbox')) {
				value = ( $(this).is(":checked") ) ? 1:0;
        	}

            
            $.ajax({
                url: urlAjaxHandlerCms+'update/updateItemField/'+itemArray[0]+'/'+itemArray[1], 
                data:{	model: itemArray[0],
                	 	field: field,
                	 	value: value 
               	},
                type: "GET",
                dataType: 'json',
                cache: false,
                success: function(response){
                	 //  suppress
                	$.notify(response.message, "success");
                },
                error:function (xhr, ajaxOptions, thrownError){
                	$.notify("Something went Wrong please"+xhr.responseText+thrownError);
                   
                }
              }
            );	
         });


        $('[data-list-boolean]').on('click',function() {

            var itemArray	= $(this).data('list-boolean').split('_');
            var field		= $(this).data('list-name');
            var onObj     = $( this ).find( ".text-success");
            var offObj    = $( this ).find( ".text-error");
            var value	  = ( onObj.hasClass('hidden') ) ? 1 : 0 ;


            $.ajax({
                    url: urlAjaxHandlerCms+'update/updateItemField/'+itemArray[0]+'/'+itemArray[1],
                    data:{	model: itemArray[0],
                        field: field,
                        value: value
                    },
                    type: "GET",
                    dataType: 'json',
                    cache: false,
                    success: function(response){
                        //  suppress
                        onObj.toggleClass('hidden');
                        offObj.toggleClass('hidden');
                        $.notify(response.message, "success");
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        $.notify("Something went Wrong please"+xhr.responseText+thrownError);

                    }
                }
            );
        });
    	
    	
    	$('[data-role="delete-item"]').on('click',function(e) {
			 e.preventDefault();
			 var  curItem = this;
			 bootbox.setLocale( _LOCALE );
			 bootbox.confirm("<h4>Are you sure?</h4>", function(confirmed ) {
				 if( confirmed) { 
					 location.href =  curItem.href ; 
				 }
		    });  
        });
    	
    	
    	  //  gestione  check  box  liste
            $('input.checkbox').click(function() {
                var itemSel = $("input.checkbox:checked").length;
                if (itemSel > 0) {
                    $('#toolbar_cerca').hide();

                    if(itemSel==1) {
                        curItem=$("input.checkbox:checked").val();
                        $('#toolbar_editButtonHandler').show();
                    }
                    else $('#toolbar_editButtonHandler').hide();
                    $('#list-action-bar').fadeIn('1000');
                } else {
                    $('#list-action-bar').hide();
                    $('#toolbar_cerca').fadeIn('1000');
                }
    	 });
    	
    	$('#toolbar_editButtonHandler').on('click',function(e) {
			 e.preventDefault();
			 //  redirect to edit page
			 location.href = $('#row_'+curItem +' [data-role="edit-item"] ' )[ 0 ].href ;
       });
       
       $('#toolbar_deleteButtonHandler').on('click',function(e) {
			 e.preventDefault();
			 //  redirect to edit page
			var role =  $(this).data('role');
			 bootbox.setLocale( _LOCALE );
			 bootbox.confirm("<h4>Are you sure?</h4>", function(confirmed ) {
				 if( confirmed) { 
					 $('input.checkbox:checked').each(function( index ) {
						  $('#row_'+$( this ).val()).fadeOut('1000');
						  deleteUrl = $('#row_'+$( this ).val() +' [data-role="delete-item"] ' )[ 0 ].href ;
						  // Do delete
						  curModel = 'Article';
						  $.ajax({
				                url: urlAjaxHandlerCms+'delete/'+curModel+'/'+$( this ).val(), 
				                type: "GET",
				                dataType: 'json',
				                cache: false,
				                success: function(response){
				                	 //  suppress
				                	//$.notify(response.message, "success");
				                },
				                error:function (xhr, ajaxOptions, thrownError){
				                	$.notify("Something went Wrong please"+xhr.responseText+thrownError);
				                   
				                }
				              }
				            );
					 });
					 $.notify("Selected items had been deleted");
				 }
		    });
			
      });
   }

    
   
    
    return {
        init: function () {
            handleBootstrap();
            //handleIEFixes();
            listHandler();
            handleToggle();
           
        }
    }
  

}();



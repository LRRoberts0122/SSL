(function($){
	$(document).on('change', '.btn-file :file', function() {
	  var input = $(this),
	      numFiles = input.get(0).files ? input.get(0).files.length : 1,
	      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	  input.trigger('fileselect', [numFiles, label]);
	});
	
	$(document).ready(function() {
	    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	        
	        var input = $(this).parents('.input-group').find(':text'),
	            log = numFiles > 1 ? numFiles + ' files selected' : label;
	        
	        if( input.length ) {
	            input.val(log);
	        } else {
	            if( log ) alert(log);
	        }
	        
	    });
	    
	    $(document).on("click", ".edit-user", function () {
			var user = {
				id : $(this).data('id'),
				username: $(this).data('username'),
				firstname : $(this).data('firstname'),
				lastname : $(this).data('lastname'),
				email : $(this).data('email'),
				avatar : $(this).data('avatar')
			}
			
			action = "/admin/users/update/" + user.id;
			
			$("#update-form").attr("action", action);
		    $("#tf_edit_firstname").attr("placeholder", user.firstname);
		    $("#tf_edit_lastname").attr("placeholder", user.lastname);
		    $("#tf_edit_email").attr("placeholder", user.email);
		    $("#tf_edit_username").attr("placeholder", user.username);
		});
		
		$(document).on("click", ".delete-user", function () {
			id = $(this).data('id');
			href = "/delete/" + id;
			$("#delete-user").attr("href", href);
		});
		
		$(document).on("click", "#delete-user", function(e) {
			e.preventDefault();
			$("#delete-user").attr("class", "delete-okay");
			$("#delete").modal("toggle");
		});
		
		$('#delete').on('hidden.bs.modal', function (e) {
			if($("#delete-user").attr("class") == "delete-okay") {
				$("#delete-user").removeAttr("class");
				window.location.href = $("#delete-user").attr("href");
			}
		});
		
		$(document).on("click", "#edit-user-btn", function(e) {
			e.preventDefault();
			$("#edit").modal("toggle");			
		});
		
		$('#edit').on('hidden.bs.modal', function (e) {
			if(
				$("#tf_edit_firstname").val() != '' || 
				$("#tf_edit_lastname").val() != '' || 
				$("#tf_edit_username").val() != '' || 
				$("#tf_edit_email").val() != '') {
					$("#update-form").submit();
				}
		});
		
		$(document).on("click", ".close", function() {
			$("#update-form").trigger("reset");
		});
		
	    var panels = $('.user-infos');
	    var panelsButton = $('.dropdown-user');
	    panels.hide();
	
	    //Click dropdown
	    panelsButton.click(function() {
	        //get data-for attribute
	        var dataFor = $(this).attr('data-for');
	        var idFor = $(dataFor);
	
	        //current button
	        var currentButton = $(this);
	        idFor.slideToggle(400, function() {
	            //Completed slidetoggle
	            if(idFor.is(':visible'))
	            {
	                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
	            }
	            else
	            {
	                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
	            }
	        })
	    }); 
	});
})(jQuery);
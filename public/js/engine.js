$( document ).ready(function() {

	// CSRF Setup
    $.ajaxSetup({
        headers : {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function viewData() {
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: baseUrl + '/getAll',
			success:function(response) {
				var rows = '';
				var no = 1;

				if(response.length) {
						rows += "<button type='submit' class='btn btn-danger' id='btn-delete-selected' style='margin-bottom: 10px; margin-right: 10px'>";
						rows +=		"Delete Selected";
						rows += "</button>";
						rows += "<button type='submit' class='btn btn-success' id='btn-checkedunchecked' style='margin-bottom: 10px'>";
						rows +=		"All Selected or UnSelected";
						rows += "</button>";				

					$.each(response, function(key, value) {						
						rows += "<li class='list-group-item'>";
						rows +=	"<label style='padding-right: 10px'><input type='checkbox' class='check' value='"+value.id+"'></label>";
						rows +=		value.name;
						rows +=	"<button class='btn btn-danger btn-xs btn-delete' value='"+value.id+"' style='float:right'>";
						rows += 	"<span class='glyphicon glyphicon-trash'></span>";
						rows +=	"</button>";
						rows +=	"<button class='btn btn-warning btn-xs btn-edit' value='"+JSON.stringify(value)+"' style='float:right; margin-right: 10px'>";
						rows +=		"<span class='glyphicon glyphicon-pencil'></span>"
						rows +=	"</button>";
						rows += "</li>"
						
						$('ul').html(rows);
					});
				} else {
					rows += "<li class='list-group-item'> No Data Found..</li>"
					$('ul').html(rows);
				}
			}
		});
	}

	viewData();

	$('#text-todo').keyup(function() {
		var typing =  $('#text-todo').val();
		if(typing) {
			$("#type-here").html("Typing: " + typing);
		}else {
			$("#type-here").html("Type in a new todo...");
		}
	});

    $('#btn-submit').click(function() {
    	var typing =  $('#text-todo').val();
    	if(!typing) {
    		$("#text-modal-error").html("todo must be filled!");
      		$('#modal-error').modal("show");
    	} else {
			var data = {'name': typing};
			$.ajax({
                url : baseUrl +'/save',
                type: 'POST',
                data: data,      
                dataType: 'json',
                success:function(data) {
					if(data.success) {
						$('#text-todo').val('');
						$("#type-here").html("Type in a new todo...");
						viewData();
					}
                }
            });
    	}
	});

	$('#text-todo').keypress(function(e) {
		 if (e.which == 13) {
	    	var typing =  $('#text-todo').val();
	    	if(!typing) {
	    		$("#text-modal-error").html("todo must be filled!");
	      		$('#modal-error').modal("show");
	    	} else {
				var data = {'name': typing};
				$.ajax({
	                url : baseUrl +'/save',
	                type: 'POST',
	                data: data,      
	                dataType: 'json',
	                success:function(data) {
						if(data.success) {
							$('#text-todo').val('');
							$("#type-here").html("Type in a new todo...");
							viewData();
						}
	                }
	            });
	    	}
	    }
	});

    $(this).on('click', '.btn-edit', function(e){
    	$getData = JSON.parse($(this).val());
    	$("#txt-id").val($getData.id);
    	$("#txt-name").val($getData.name);
		$('#modal-update').modal("show");
    });

    $(this).on('click', '.btn-delete', function(e) {
    	$.ajax({
            url : baseUrl +'/delete',
            type: 'POST',
            data: {id: JSON.stringify([$(this).val()])},      
            dataType: 'json',
            success:function(data) {
				if(data.success) {
					viewData();
				}
            }
        });
    });

    $('#btn-update').click(function() {
    	var id   = $("#txt-id").val();
    	var name = $("#txt-name").val();
    	
    	$.ajax({
            url : baseUrl +'/update',
            type: 'POST',
            data: {id: id, name: name},      
            dataType: 'json',
            success:function(data) {
				if(data.success) {
					$('#modal-update').modal("toggle");
					viewData();
				}
            }
        });
    });

    $(this).on('click', '#btn-checkedunchecked', function(e) {

    	if($('.check').prop("checked") == false) {
    		$('.check').prop('checked', true);
    	} else {
    		$('.check').prop('checked', false);
    	}
    });

    $(this).on('click', '#btn-delete-selected', function(e) {
	    var searchIDs = $('input:checked').map(function(){
	      return parseInt($(this).val());	        
	    }).get();
	    
	    if(!searchIDs.length) {
	    	$("#text-modal-error").html("you must select at least 1 item");
      		$('#modal-error').modal("show");
	    } else {
	    	console.log({id: searchIDs});
	    	$.ajax({
	            url : baseUrl +'/delete',
	            type: 'POST',
	            data: {id: JSON.stringify(searchIDs)},      
	            dataType: 'json',
	            success:function(data) {
					if(data.success) {
						viewData();
					}
	            }
	        });

	    }
	});


});
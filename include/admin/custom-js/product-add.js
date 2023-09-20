$(function () {
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        },
    });
    $("#formAddProduct").validate({
        rules: {
            serial_number: {
                required: true,
            },
            title: {
                required: true,
                maxlength: 150,
            },
            description: {
                required: true,
            },
            overview: {
                required: true,
            },
            features: {
                required: true,
            },
            specification: {
                required: true,
            },
            product_image: {
                required: true,
            },
        },
        messages: {
            serial_number: {
                required: "Please select a serial number",
            },
            title: {
                required: "Please give a title",
                maxlength: "Title not more than 150 characters",
            },
            description: {
                required: "Description is required",
            },
            overview: {
                required: "Overview is required",
            },
            features: {
                required: "Features is required",
            },
            specification: {
                required: "Specification is required",
            },
            product_image: {
                required: "Images is required",
            },
        },
        ignore: ":hidden:not(.summernote),.note-editable.card-block",
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
});

$(document).on("click", ".img-wrap .close", function () {
    var is_new = $(this).closest(".img-wrap").find("img").data("new");
    var id = $(this).closest(".img-wrap").find("img").data("id");
    var image_url = $(this).closest(".img-wrap").find("img").data("image");
    let parent_div = $(this).parent("div").parent("div"); //$(this).parent('div').parent('div').parent('.form-row');
    parent_div.find(".image_msg_error").remove();
    parent_div.find(".image_msg_success").remove();
    if (image_url) {
        $.ajax({
            // headers: {
            // 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: BASE_URL + "/product/image/delete",
            type: "POST",
            data: {
                image_url: image_url,
                id: id,
                is_new_uploaded: is_new,
            },
            success: function (result) {
                result = JSON.parse(result);
                if (result.status == true) {
                    $(".img_prod_" + id).remove();
                    parent_div.append(
                        '<div class="col-md-12 mb-3 product-thumbs alert alert-success alert-dismissible fade show image_msg_success" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                } else {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 product-thumbs alert alert-danger alert-dismissible fade show image_msg_error" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                }
                setTimeout(function () {
                    $(".image_msg_success").remove();
                    $(".image_msg_error").remove();
                }, 10000);
            },
        });
    }
});

var count = 0;
$(document).on("click", ".btn-upload-image", function (e) {
    e.preventDefault();
    var product_id = $("#product_image").data("id");
    let image = $("#product_image")[0].files;
    let parent_div = $(this).parent("div").parent("div");
    parent_div.find(".image_u_msg_error").remove();
    parent_div.find(".image_u_msg_success").remove();
    if (image.length > 0) {
        if (image[0].size > 5000000) {
            parent_div.append(
                '<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show image_u_msg_error" role="alert">Please upload file less than 2MB. Thanks!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
            );
            setTimeout(function () {
                $(".image_u_msg_success").remove();
                $(".image_u_msg_error").remove();
            }, 10000);
            $("#product_image").parent("div").find("label").text("Choose another image");
            return false;
        }
        var formData = new FormData();
        formData.append("product_id", product_id);
        formData.set("p_image", image[0], image[0].name);

        $.ajax({
            // headers: {
            // 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: BASE_URL + "/product/image/upload",
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                let count_total = $('input[name="uploaded_image[]"]');
                if (count_total) {
                    count = count_total.length;
                }
                if (result.status == true) {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-success alert-dismissible fade show image_u_msg_success" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                    $(".product-thumbs").append(
                        '<div class="img-wrap img_prod_' +
                            count +
                            '"><span class="close">×</span><img src="' +
                            result.file_path +
                            '" width="110" height="110" class="rounded ml-3 shadow" data-image="' +
                            result.file_name +
                            '" data-id="' +
                            count +
                            '" name="uploaded_image[]" value="' +
                            result.file_name +
                            '" data-new="yes"><input type="hidden" name="uploaded_image[]" value="' +
                            result.file_name +
                            '"/></div>'
                    );
                    count++;
                } else {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show image_u_msg_error" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                }
                setTimeout(function () {
                    $(".image_u_msg_success").remove();
                    $(".image_u_msg_error").remove();
                }, 10000);
                $("#product_image").parent("div").find("label").text("Choose another image");
            },
        });
    }
});

$(document).on("click", ".btn-upload-file", function (e) {
    e.preventDefault();
    var file_for = $(this).attr("id");
    $("." + file_for + "_u_msg_error").remove();
    var product_id = $("#" + file_for + "_file").data("id");
    var existing_file = $("#" + file_for + "_file").data("uploaded");
    let file = $("#" + file_for + "_file")[0].files;
    let parent_div = $(this).parent("div").parent("div");
    parent_div.find("." + file_for + "_u_msg_error").remove();
    parent_div.find("." + file_for + "_u_msg_success").remove();
    if (file.length > 0) {
        if (file[0].size > 5000000) {
            parent_div.append(
                '<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show ' +
                    file_for +
                    '_u_msg_error" role="alert">Please upload file less than 2MB. Thanks!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
            );
            setTimeout(function () {
                $("." + file_for + "_u_msg_success").remove();
                $("." + file_for + "_u_msg_error").remove();
            }, 10000);
            return false;
        }
        var formData = new FormData();
        formData.append("product_id", product_id);
        formData.append("existing_file", existing_file);
        formData.append("file_for", file_for);
        formData.set("u_file", file[0], file[0].name);
        $.ajax({
            url: BASE_URL + "/product/file/upload",
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.status == true) {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-success alert-dismissible fade show ' +
                            file_for +
                            '_u_msg_success" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                    $("." + file_for + "-view-btn-area").html(
                        '<a href="' +
                            result.file_path +
                            '" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View Uploaded File</a> <button data-file="' +
                            result.file_name +
                            '" class="ml-2 btn btn-sm btn-outline-danger btn-delete-file" data-title="Reference Manual" data-for="' +
                            file_for +
                            '"><i class="fas fa-trash"></i> Delete Uploaded File</button>'
                    );
                    $("#" + file_for + "_file").attr("uploaded", result.file_name);
                    $("#" + file_for + "_uploaded_file").val(result.file_name);
                } else {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show ' +
                            file_for +
                            '_u_msg_error" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                    $("." + file_for + "-view-btn-area").html("");
                    $("#" + file_for + "_file").attr("uploaded", existing_file);
                    $("#" + file_for + "_uploaded_file").val(existing_file);
                }
                setTimeout(function () {
                    $("." + file_for + "_u_msg_success").remove();
                    $("." + file_for + "_u_msg_error").remove();
                }, 10000);
            },
        });
    }
});

$(document).on("click", ".btn-delete-file", function (e) {
    e.preventDefault();
    var file_for = $(this).data("for");
    $("." + file_for + "_u_msg_error").remove();
    var product_id = $("#" + file_for + "_file").data("id");
    var existing_file = $("#" + file_for + "_file").data("uploaded");
    let file = $(this).data("file");
    let parent_div = $(this).parent("span"); //.parent('div');
    parent_div.find("." + file_for + "_u_msg_error").remove();
    parent_div.find("." + file_for + "_u_msg_success").remove();
    if (file) {
        var formData = new FormData();
        formData.append("product_id", product_id);
        formData.append("existing_file", existing_file);
        formData.append("file_for", file_for);
        formData.append("is_new_uploaded", "yes");
        formData.append("u_file", file);
        $.ajax({
            url: BASE_URL + "/product/file/delete",
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                // result = JSON.parse(result);
                if (result.status == true) {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-success alert-dismissible fade show ' +
                            file_for +
                            '_u_msg_success" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                    $("." + file_for + "-view-btn-area").html("");
                    // $('.'+file_for+'-view-btn-area').html('<a href="'+result.file_path+'" class="btn btn-sm btn-outline-info" target="_blank"><i class="fas fa-file-pdf"></i> View Uploaded File</a> <button data-file="'+result.file_name+'" class="ml-2 btn btn-sm btn-outline-danger btn-delete-file" data-title="Reference Manual" data-for="'+file_for+'"><i class="fas fa-trash"></i> Delete Uploaded File</button>');
                    $("#" + file_for + "_file").attr("uploaded", "");
                    $("#" + file_for + "_uploaded_file").val("");
                } else {
                    parent_div.append(
                        '<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show ' +
                            file_for +
                            '_u_msg_error" role="alert">' +
                            result.message +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>'
                    );
                    // $('.'+file_for+'-view-btn-area').html('');
                    $("#" + file_for + "_file").attr("uploaded", existing_file);
                    $("#" + file_for + "_uploaded_file").val(existing_file);
                }
                setTimeout(function () {
                    $("." + file_for + "_u_msg_success").remove();
                    $("." + file_for + "_u_msg_error").remove();
                }, 10000);
            },
        });
    }
});

$(document).on("change", "#category", function (e) {
    var id = $(this).val();
    if (id) {
        get_child_category(id, "sub_category", "Sub Category");
    } else {
        $("#sub_category").html('<option selected="selected" value="">Choose a Sub Category</option>');
    }
});

$(document).on("change", "#sub_category", function (e) {
    var id = $(this).val();
    if (id) {
        get_child_category(id, "sub_sub_category", "Sub Sub-Category");
    } else {
        $("#sub_sub_category").html('<option selected="selected" value="">Choose a Sub Sub-Category</option>');
    }
});

function get_child_category(parent_id = "-1", child_elment = "test", option_text = "Choose one") {
    $.ajax({
        url: BASE_URL + "/category/child",
        type: "POST",
        data: {
            id: parent_id,
        },
        success: function (result) {
            result = JSON.parse(result);
            if (result.length > 0) {
                var opt = '<option selected="selected" value="">Choose a ' + option_text + "</option>";
                $.each(result, function (keyId, keyVal) {
                    opt += '<option value="' + keyVal.category_id + '">' + keyVal.title + "</option>";
                });
                $("#" + child_elment).html(opt);
            } else {
                $("#" + child_elment).html('<option selected="selected" value="">Choose a ' + option_text + "</option>");
            }
        },
    });
}

$(document).on("click", ".btn-active-status", function () {
    var prod_id = $(this).data("id");
    var a_status = $(this).data("status");
    var changed_status = "inactive";
    if (a_status == "active") {
        changed_status = "inactive";
    } else {
        changed_status = "active";
    }

    var formData = new FormData();
    formData.append("product_id", prod_id);
    formData.append("changed_status", changed_status);
    $.ajax({
        url: BASE_URL + "/product/status",
        type: "POST",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            // result = JSON.parse(result);
            if (result.status == true) {
                alert("Active status successfully changed.");
                setTimeout(function () {
                    location.reload();
                }, 500);
            } else {
                alert("Failed to change status, try again later.");
            }
        },
    });
});

// $(document).on('change', '#product_image', function(e){
// 	e.preventDefault();
// 	var image = document.getElementById('image');
// 	var files = e.target.files;
// 	var $alert = $('.alert');
// 	var $modal = $('#modal');
// 	var done = function (url) {
// 		$(this).value = '';
// 		image.src = url;
// 		$alert.hide();
// 		$modal.modal('show');
// 	};
// 	var reader;
// 	var file;
// 	var url;
// 	if (files && files.length > 0) {
// 		file = files[0];
// 		if (URL) {
// 			done(URL.createObjectURL(file));
// 		} else if (FileReader) {
// 			reader = new FileReader();
// 			reader.onload = function (e) {
// 				done(reader.result);
// 			};
// 			reader.readAsDataURL(file);
// 		}
// 	}
// });

// window.addEventListener('DOMContentLoaded', function () {
// 	// var avatar = document.getElementById('avatar');
// 	// var image = document.getElementById('image');
// 	// var input = document.getElementById('input');
// 	var $progress = $('.progress');
// 	var $progressBar = $('.progress-bar');
// 	var $alert = $('.alert');
// 	var $modal = $('#modal');
// 	var cropper;
// 	$('[data-toggle="tooltip"]').tooltip();
// 	// input.addEventListener('change', function (e) {
// 	// 	var files = e.target.files;
// 	// 	var done = function (url) {
// 	// 		input.value = '';
// 	// 		image.src = url;
// 	// 		$alert.hide();
// 	// 		$modal.modal('show');
// 	// 	};
// 	// 	var reader;
// 	// 	var file;
// 	// 	var url;

// 	// 	if (files && files.length > 0) {
// 	// 		file = files[0];

// 	// 		if (URL) {
// 	// 		done(URL.createObjectURL(file));
// 	// 		} else if (FileReader) {
// 	// 		reader = new FileReader();
// 	// 		reader.onload = function (e) {
// 	// 			done(reader.result);
// 	// 		};
// 	// 		reader.readAsDataURL(file);
// 	// 		}
// 	// 	}
// 	// });

// 	$modal.on('shown.bs.modal', function () {
// 		cropper = new Cropper(image, {
// 			aspectRatio: 1,
// 			viewMode: 3,
// 			width: 500,
// 			height: 500,
// 		});
// 	}).on('hidden.bs.modal', function () {
// 		cropper.destroy();
// 		cropper = null;
// 	});

// 	document.getElementById('crop').addEventListener('click', function () {
// 		// var initialAvatarURL;
// 		var canvas;
// 		$modal.modal('hide');
// 		if (cropper) {
// 			canvas = cropper.getCroppedCanvas({
// 				width: 500,
// 				height: 500,
// 			});
// 			// initialAvatarURL = avatar.src;
// 			// avatar.src = canvas.toDataURL();
// 			$progress.show();
// 			$alert.removeClass('alert-success alert-warning');
// 			canvas.toBlob(function (blob) {
// 				var product_id = $('#product_image').data('id');
// 				let parent_div = $('.img-parent-div');//$('#product_image').parent('div');//.parent('div');
// 				parent_div.find('.image_u_msg_error').remove();
// 				parent_div.find('.image_u_msg_success').remove();
// 				var formData = new FormData();
// 				formData.append('product_id', product_id);
// 				formData.set('p_image', blob, 'blob.png');
// 				$.ajax(BASE_URL+"/product/image/upload", {
// 					method: 'POST',
// 					data: formData,
// 					dataType: 'json',
// 					processData: false,
// 					contentType: false,

// 					xhr: function () {
// 						var xhr = new XMLHttpRequest();
// 						xhr.upload.onprogress = function (e) {
// 							var percent = '0';
// 							var percentage = '0%';
// 							if (e.lengthComputable) {
// 								percent = Math.round((e.loaded / e.total) * 100);
// 								percentage = percent + '%';
// 								$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
// 							}
// 						};
// 						return xhr;
// 					},

// 					success: function (result) {
// 						$alert.show().addClass('alert-success').text('Upload success');
// 						let count_total = $('input[name="uploaded_image[]"]');
// 						if(count_total){
// 							count = count_total.length;
// 						}
// 						if(result.status == true){
// 							parent_div.append('<div class="col-md-12 mb-3 alert alert-success alert-dismissible fade show image_u_msg_success" role="alert">'+result.message+' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>');
// 							$('.product-thumbs').append('<div class="img-wrap img_prod_'+count+'"><span class="close">×</span><img src="'+result.file_path+'" width="110" height="110" class="rounded ml-3 shadow" data-image="'+result.file_name+'" data-id="'+count+'" name="uploaded_image[]" value="'+result.file_name+'" data-new="yes"><input type="hidden" name="uploaded_image[]" value="'+result.file_name+'"/></div>');
// 							count++;
// 							$('.no-img-span').remove();
// 						}else{
// 							parent_div.append('<div class="col-md-12 mb-3 alert alert-danger alert-dismissible fade show image_u_msg_error" role="alert">'+result.message+' <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span> </button></div>');
// 						}
// 						setTimeout(function(){
// 							$alert.hide();
// 							$(".image_u_msg_success").remove();
// 							$(".image_u_msg_error").remove();
// 						}, 10000);
// 						$('#product_image').parent('div').find('label').text('Choose another image');
// 					},

// 					error: function () {
// 						// avatar.src = initialAvatarURL;
// 						$alert.show().addClass('alert-warning').text('Upload error');
// 					},

// 					complete: function () {
// 						$progress.hide();
// 					},
// 				});
// 			});
// 		}
// 	});
// });

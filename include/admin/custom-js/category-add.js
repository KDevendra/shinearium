$(function () {
	$.validator.setDefaults({
	   submitHandler: function (form) {
	      form.submit();
	   }
	});
	$('#formAddProduct').validate({
	   rules: {
	      title: {
	         required: true,
	         maxlength: 150,
	      },
	      category: {
	         required: false,
	      },
	      sub_category: {
	         required: false,
	      }
	   },
	   messages: {
	      title: {
	         required: "Please give a title",
	         maxlength: "Title not more than 150 characters"
	      },
	      category: {
	         required: "Please select a category",
	      },
	      sub_category: {
	         required: "Please select a sub category",
	      }
	   },
	   ignore: ':hidden:not(.summernote),.note-editable.card-block',
	   errorElement: 'span',
	   errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	   },
	   highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	   },
	   unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	   }
	});
           });
           
           
           $(document).on('change', '#category', function (e) {
	var id = $(this).val();
	if (id) {
	   get_child_category(id, 'sub_category', 'Sub Category');
	} else {
	   $("#sub_category").html('<option selected="selected" value="">Choose a Sub Category</option>');
	}
           });
           
           // $(document).on('change', '#sub_category', function(e){
           // 	var id = $(this).val();
           // 	if(id){
           // 		get_child_category(id, 'sub_sub_category', 'Sub Sub-Category');
           // 	}else{
           // 		$("#sub_sub_category").html('<option selected="selected" value="">Choose a Sub Sub-Category</option>');
           // 	}
           // });
           
           function get_child_category(parent_id = '-1', child_elment = 'test', option_text = 'Choose one') {
	$.ajax({
	   url: BASE_URL + "/category/child",
	   type: 'POST',
	   data: {
	      id: parent_id
	   },
	   success: function (result) {
	      result = JSON.parse(result);
	      if (result.length > 0) {
	         var opt = '<option selected="selected" value="">Choose a ' + option_text + '</option>';
	         $.each(result, function (keyId, keyVal) {
	            opt += '<option value="' + keyVal.category_id + '">' + keyVal.title + '</option>'
	         });
	         $("#" + child_elment).html(opt);
	      } else {
	         $("#" + child_elment).html('<option selected="selected" value="">Choose a ' + option_text + '</option>');
	      }
	   }
	});
           }
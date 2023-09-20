$(function () {
	$.validator.setDefaults({
	  submitHandler: function (form) {
		form.submit();
	  }
	});
	$('#formUploadProduct').validate({
	  rules: {
		productfile: {
		  required: true,
		  extension: 'xls|xlsx|csv|'
		},
	  },
	  messages: {
		productfile: {
		  required: "Please select a excel/csv file",
		  extension: "Please select a excel file only"
		},
	  },
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

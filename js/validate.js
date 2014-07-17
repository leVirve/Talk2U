$(function () {
	
	$('#account').on('change', function() {
		checkUsername($(this));
	});
	
	$("#register input").on('change', function() {
		validate_form();
	});

	$('input[type=submit]').on('click', function() {
		validate_form();
	});

	function checkUsername (obj) {
		// $.ajax({
		// 	url:"model/username_check.php",
		// 	data:"username=" + obj.val(),
		// 	type : "POST",
		// 	success:function(msg){
		// 		console.log(msg);
		// 		if(msg === "success") {
		// 			// alert("No");
		// 		} else {    
		// 			alert("名稱已被註冊");
		// 		}
		// 	},
		// 	error:function(xhr){
		// 		console.log('Ajax request 發生錯誤');
		// 	}
		// });
	}

	function validate_form () {
		$('#register').validate({
			rules: {
				account: {
					required: true,
					maxlength: 20
				}
			},
			success: function(label) {
//            	label.addClass("success").text("Ok!");
			}
		});
	};
});
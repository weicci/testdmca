(function(){

	var submitAjaxRequest = function(e){

		var form = $(this);
		var method = form.find('input[name="_method"]').val()||'POST';
		
		$.ajax({
			type: method,
			url: form.prop('action'),
			data: form.serialize(),
			success: function(){
				$.publish('form.submitted',form)
			}

		})
		
		e.preventDefault();
				
		};
	//forms marked with the 'data-remote' attribute
	//will submit via AJAX
	$('form[data-remote]').on('submit',submitAjaxRequest);

	//the data-click-submits-form attribute immediately submit the form on change
	$('[data-click-submits-form]').on('change',function(){
		$(this).closest('form').submit();
		})

})();

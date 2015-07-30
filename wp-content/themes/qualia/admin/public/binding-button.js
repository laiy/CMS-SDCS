(function($){

	$('.qualia-js-binding-button').on('click', function(e){
		e.preventDefault();

		var params = [];
		$(this).parents('.vp-field:first').nextAll().each(function(i, el){
			var $el = $(el);
			params.push($el.find('.vp-input[name!=""]').validationVal());
		});
		params = JSON.stringify(params);
		$(this).val(params).change();

	})

})(jQuery);
(function($) {
	"use strict";

    if($("#elm1").length > 0){
		tinymce.init({
			selector: "textarea#elm1",
			theme: "modern",
			height:300,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
			style_formats: [
				{title: 'متن ضخیم', inline: 'b'},
				{title: 'متن قرمز', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'عنوان قرمز', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'مثال 1', inline: 'span', classes: 'example1'},
				{title: 'مثال 2', inline: 'span', classes: 'example2'},
				{title: 'استایل جدول'},
				{title: 'ردیف جدول 1', selector: 'tr', classes: 'tablerow1'}
			]
		});
	}
	
})(jQuery);
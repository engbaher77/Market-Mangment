(function(document) {
	'use strict';
	
		$.fn.datepicker.defaults.format = "yyyy-mm-dd";
		$('#datepicker').datepicker({ autoclose: true},);
		$("#datepicker").datepicker("setDate", new Date());
})(document);
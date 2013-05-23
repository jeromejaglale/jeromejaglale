"use strict";

function l(str) {
	console.log(str);
}

$(document).ready(function (){
	$('form').submit(function(){
		var amount = $('#amount', $(this)).val(),
			note = $('#note', $(this)).val(),
			d = new Date(),
			date = d.getFullYear() + '-' + d.getMonth() + '-' + d.getDay() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();

		l(date);
		return false;
	});
});
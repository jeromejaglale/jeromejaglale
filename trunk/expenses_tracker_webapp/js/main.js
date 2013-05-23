"use strict";

function l(str) {
	console.log(str);
}

$(document).ready(function (){
	$('form').submit(function(){
		return false;
	});
});
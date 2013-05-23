"use strict";

$(document).ready(function (){
	var EXPENSE_LIST_KEY = 'expense_list';

	$('form').submit(function(){
		var expense_list = $.parseJSON(getFromSession(EXPENSE_LIST_KEY)),
			amount = $('#amount', $(this)).val(),
			note = $('#note', $(this)).val(),
			d = new Date(),
			date = d.getFullYear() + '-' + d.getMonth() + '-' + d.getDay() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds(),
			expense = {
						'date' : date,
						'amount' : amount,
						'note' : note
					},
			expense_list_str = '';

		expense_list.push(expense);
		expense_list_str = JSON.stringify(expense_list);
		saveInSession(EXPENSE_LIST_KEY, expense_list_str);	
		
		logSession();
		return false;
	});
});

/* Functions
*************************************************************************/

function l(str) {
	console.log(str);
}

function saveInSession(key, value) {
	sessionStorage[key] = value;
}

function getFromSession(key) {
	return sessionStorage[key];
}

function clearSession() {
	sessionStorage.clear();
}

function logSession() {
	for (var i = 0; i < sessionStorage.length; i++) {
        var key = sessionStorage.key(i),
        	value = sessionStorage.getItem(key);
        l(key + "=" + value);
    }
}
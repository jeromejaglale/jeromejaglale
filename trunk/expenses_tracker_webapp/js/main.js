"use strict";

$(document).ready(function (){
	var EXPENSE_LIST_KEY = 'expense_list';

	$('form').submit(function(){
		var expense_list = [],
			amount = $('#amount', $(this)).val(),
			note = $('#note', $(this)).val(),
			d = new Date(),
			date = d.getFullYear() + '-' + d.getMonth() + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds(),
			expense = {
						'date' : date,
						'amount' : amount,
						'note' : note
					},

		// init expense list		
		expense_list_str = getFromSession(EXPENSE_LIST_KEY);
		if(expense_list_str !== undefined) {
			expense_list = $.parseJSON(expense_list_str);
		}
		
		// add new expense
		expense_list.push(expense);

		// convert to JSON
		expense_list_str = JSON.stringify(expense_list);
		
		// save to session
		saveInSession(EXPENSE_LIST_KEY, expense_list_str);	
		
		logSession();

		// if there's an internet connection
		if(navigator.onLine) {
			// send expenses to server
			$.post($(this).attr('action'),
				{"expense_list_str": expense_list_str},
				function(data){
					l('data saved');
				},
				"json"
			);
		}

		// prevent actual form submission
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
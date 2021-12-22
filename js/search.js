/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
function getResult(pageNumber) {
	var searchKey = $("#keyword").val();
	$.ajax({
		type : "POST",
		url : "get-search-result.php",
		data : {
			page : pageNumber,
			search : searchKey
		},
		cache : false,
		async: false,
		success : function(response) {
			$("#table-body").html("");
			$("#table-body").html(response);
		}
	});
}

function submitSearch(event) {
	event.preventDefault();
	getResult(1);
}

function getResult2(pageNumber) {
	var searchKey = $("#keyword").val();
	$.ajax({
		type : "POST",
		url : "get-search-result2.php",
		data : {
			page : pageNumber,
			search : searchKey
		},
		cache : false,
		async: false,
		success : function(response) {
			$("#table-body").html("");
			$("#table-body").html(response);
		}
	});
}

function submitSearch2(event) {
	event.preventDefault();
	getResult2(1);
}



function sendEmail(email, fname, lname)
{
	var url = "send-email.php?email=" + email + "&firstName=" + fname + "&lastName=" + lname; //build GET url
	window.location.href = url;
}

function updateRowHandler(currentTableCell_td, id) { 
	var tableRowElement = currentTableCell_td.parentNode; //get the current TD (parameter) parent row
	 
	var td_textArea_element = tableRowElement.getElementsByTagName("td")[4]; //get the 5th TD element from the current row
	var td_date_element = tableRowElement.getElementsByTagName("td")[5]; //get the 6th TD element from the current row
	
	let comment = td_textArea_element.children[0].value; //get the first child of the 5th TD element which is a textarea and then its value
	let diagnosisDate = td_date_element.children[0].value;//get the first child of the 6th TD element which is a date input and then its value
	var url = "update-status.php?id=" + id + "&comment=" + comment + "&diagnosisDate=" + diagnosisDate; //build GET url
	window.location.href = url;
};
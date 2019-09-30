// https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false&q=Moscow Airport data api

const url = {
	airportData:
		"https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false&q="
};

var currentCityOrigin = "",
	currentCityCodeOrigin = "",
	currentCountryOrigin = "",
	currentCountryCodeOrigin = "",
	currentCityDestine = "",
	currentCityCodeDestine = "",
	currentCountryDestine = "",
	currentCountryCodeDestine = "",
	currentActiveScope = "",
	displayNoneLocationStatic;
const originInputBox = $("#originInputBox");
const destinationInputBox = $("#destinationInputBox");
const hiddenOrigin = $('input[name="origin_iata"]'),
	hiddenDestination = $('input[name="destination_iata"]');
const originSearch = $(".scope-origin .airport-search-result");
const destinationSearch = $(".scope-destination .airport-search-result");


$(".location-show-static").click(function(){
	if(displayNoneLocationStatic){
		displayNoneLocationStatic.css({
			display: "block"
		});
	}
	displayNoneLocationStatic = $(this);
	displayNoneLocationStatic.css({
		display: "none"
	});
	if(displayNoneLocationStatic.parent().hasClass("scope-origin")){
		originInputBox.focus();
	}else{
		destinationInputBox.focus();
	}
});

$(document).click(function(event){
	if($(event.target).closest( ".location-show-static").length > 0){
		return;
	}else if($(event.target).closest( ".place-box").length > 0){
		return;
	}else if(displayNoneLocationStatic){
		displayNoneLocationStatic.css({
			display: "block"
		});
	}
});

originInputBox.keyup(function() {
	originSearch.html("");
	currentActiveScope = "scope-origin";
	let searchValue = $(this).val();
	if (searchValue.length > 0) {
		getData(url["airportData"] + searchValue, function(data) {
			if (data.length > 0) {
				let jsonToObj = JSON.parse(JSON.stringify(data));
				jsonToObj.forEach(obj => {
					renderSearchItem(obj, originSearch);
					originSearch.addClass("view");
				});
			} else {
				renderSearchNoItem(originSearch);
				originSearch.addClass("view");
			}
		});
	}
});

$("#destinationInputBox").keyup(function() {
	destinationSearch.html("");
	currentActiveScope = "scope-destination";
	let searchValue = $(this).val();

	getData(url["airportData"] + searchValue, function(data) {
		if (data.length > 0) {
			let jsonToObj = JSON.parse(JSON.stringify(data));
			jsonToObj.forEach(obj => {
				renderSearchItem(obj, destinationSearch);
				destinationSearch.addClass("view");
			});
		} else {
			renderSearchNoItem(destinationSearch);
			destinationSearch.addClass("view");
		}
	});
});


$(document).on("click", ".airport-search-result .result-item", function(event) {
	let city = $(this).attr("data-city");
	let cityCode = $(this).attr("data-cityCode");
	let country = $(this).attr("data-country");
	let countryCode = $(this).attr("data-countryCode");
	originInputBox.val(city);
	if (currentActiveScope == "scope-origin") {
		$(".scope-origin .location-show-static .city").html(city + ",");
		$(".scope-origin .location-show-static .city-code").html(cityCode);
		$(".scope-origin .location-show-static .country").html(country);
		hiddenOrigin.val(cityCode);
		originInputBox.val(city);
		$('input[name="origin_city"]').val(city);
		$('input[name="origin_country"]').val(country);
	} else {
		$(".scope-destination .location-show-static .city").html(city + ",");
		$(".scope-destination .location-show-static .country").html(country);
		$(".scope-destination .location-show-static .city-code").html(cityCode);
		hiddenDestination.val(cityCode);
		destinationInputBox.val(city);
		$('input[name="destination_city"]').val(city);
		$('input[name="destination_country"]').val(country);
	}
	$(this)
		.parent()
		.removeClass("view");
});

function renderSearchNoItem(renderScope) {
	renderScope.append('<div class="text-center">No data found</div>');
}

function renderSearchItem(obj, renderScope) {
	let city = obj.city_name,
		cityCode = obj.city_code,
		airportCode = obj.code,
		country = obj.country_name,
		countryCode = obj.country_name,
		fullName = obj.city_fullname,
		type = obj._type,
		airportName = obj.name;
	if (!(type == "airport")) {
		airportName = "All Airport of " + city;
	}
	renderScope.append(
		'<div class="result-item" data-city="' +
			city +
			'"' +
			'data-cityCode="' +
			airportCode +
			'"' +
			'data-country="' +
			country +
			'"' +
			'data-countryCode="' +
			countryCode +
			'">' +
			'<div class="row">' +
				'<div class="col-8">' +
				fullName +
				"<br>" +
					"<small>" +
					airportName +
					"</small>" +
				"</div>" +
				'<div class="col-4">' +
				airportCode +
				"</div>" +
			"</div>" +
		"</div>"
	);
}

function getData(url, handler) {
	$.getJSON(url, handler);
}

// Ticket section

var inputAdultsTicket = $('input[name="adults"]'),
	inputchildrenTicket = $('input[name="children"]'),
	inputInfantsTicket = $('input[name="infants"]'),
	totalNumberOfTicket = $("#numberOfTicket"),
	ticketSectionArea = $(".ticket-section-area");

$(".adults-ticket-section .increase").click(function() {
	let value = parseInt(inputAdultsTicket.val());
	value += 1;
	inputAdultsTicket.val(value);
	updateAllTicketInfo();
});

$(".adults-ticket-section .decrease").click(function() {
	let value = parseInt(inputAdultsTicket.val());
	if (value > 1) {
		value -= 1;
		inputAdultsTicket.val(value);
		updateAllTicketInfo();
	}
});

$(".children-ticket-section .increase").click(function() {
	let value = parseInt(inputchildrenTicket.val());
	value = value || 0;
	value += 1;
	inputchildrenTicket.val(value);
	updateAllTicketInfo();
});

$(".children-ticket-section .decrease").click(function() {
	let value = parseInt(inputchildrenTicket.val());
	value = value || 0;
	if (value > 0) {
		value -= 1;
		inputchildrenTicket.val(value);
		updateAllTicketInfo();
	}
});

$(".infants-ticket-section .increase").click(function() {
	let value = parseInt(inputInfantsTicket.val());
	value = value || 0;
	value += 1;
	inputInfantsTicket.val(value);
	updateAllTicketInfo();
});

$(".infants-ticket-section .decrease").click(function() {
	let value = parseInt(inputInfantsTicket.val());
	value = value || 0;
	if (value > 0) {
		value -= 1;
		inputInfantsTicket.val(value);
		updateAllTicketInfo();
	}
});

$("#openTicketSection").click(function(event) {
	event.preventDefault();
	ticketSectionArea.toggle(".3");
});
$(".close-ticket-section").click(function(event) {
	event.preventDefault();
	ticketSectionArea.toggle(".3");
});

function updateAllTicketInfo(){
	let adultsValue = inputAdultsTicket.val();
	let childrenValue = inputchildrenTicket.val();
	let infantsValue = inputInfantsTicket.val();
	$(".adults-ticket-section .value").html(adultsValue);
	$(".children-ticket-section .value").html(childrenValue);
	$(".infants-ticket-section .value").html(infantsValue);
	updateTotalNumberOfTicket();
}

function updateTotalNumberOfTicket() {
	let adults = parseInt(inputAdultsTicket.val());
	let children = parseInt(inputchildrenTicket.val());
	let infants = parseInt(inputInfantsTicket.val());
	let total = 0;
	if (adults) {
		total = adults;
	}
	if (children) {
		total += children;
	}
	if(infants){
		total += infants;
	}
	totalNumberOfTicket.html(total);
}

updateAllTicketInfo();

// Flight Search Result Page

var flightSearchResult = $("#flightSearchResult");
const searchLoadingMessage = $(".fligt-loding-message");


if (flightSearchResult) {
	let search_id = flightSearchResult.attr("data-flightSearchid");
	setTimeout(function(){
		$.ajax({
			url: baseUrl + "flight/search_result/" + search_id
		}).done(function(data) {
			searchLoadingMessage.css({
				display: "none"
			});
			if (data) {
				let aciveFligts = getActiveFlight(data);
				aciveFligts.forEach(function(flight) {
					if (flight) {
						let data = renderSearchResultToHtml(flight);
						appendFlightSearchResult(data);
					}
				});
			}
		});
	}, 3000);
}

function getActiveFlight(data) {
	let dataArray = JSON.parse(data);
	dataArray = dataArray.map(function(row) {
		if (row.proposals.length > 0) {
			return row;
		}
		return false;
	});
	console.log(dataArray);
	return dataArray;

}

function appendFlightSearchResult(data) {
	flightSearchResult.append(data);
}

var airlinesMapping = {
	"EK": "Emirates",
	"BG": "Biman Bangladesh Airlines",
	"QR": "Qatar Airways"

};

function renderSearchResultToHtml(data) {
	// for(proposals.terms.price ){

	// }
	// let price = ;
	let turnAround = false;
	let proposals = data.proposals[0];
	let gateId = data.meta.gates[0].id;
	let terms;
	let carrierCode = data.proposals[0].validating_carrier;
	let gateInfo = data.gates_info[gateId.toString()];
	let depart_origin  = proposals.segments_airports[0][0];
	let depart_destination  = proposals.segments_airports[0][1];
	let return_origin;
	let return_destination;
	let return_route = [];
	let depart_stops = `<li>${depart_origin} <i class="fas fa-long-arrow-alt-right"></i></li>`;
	let return_stops = "";
	let stopsArr = data.proposals[0].stops_airports;
	let carrierName = data.airlines[carrierCode].name;
	while(Array.isArray(proposals)){
		proposals = proposals[0];
	}
	terms = proposals.terms;
	//Need to working here with temrs. Sometime data.meta.gates[0].id return wronge id

	if(data.segments.length == 2){
		turnAround = true;
		return_destination = data.segments[1].destination;
		return_origin  = proposals.segments_airports[1][0];
		return_destination  = proposals.segments_airports[1][1];
	}
	let routeIndex = 0;
	for(; routeIndex < stopsArr.length; routeIndex++){
		if(stopsArr[routeIndex] == depart_destination){
			depart_stops += `<li>${stopsArr[routeIndex]} </li>`;
			break;
		}else{
			depart_stops += `<li>${stopsArr[routeIndex]} <i class="fas fa-long-arrow-alt-right"></i></li>`;
		}
	}
	for(; routeIndex > 0; routeIndex++){
		if(stopsArr[routeIndex] == return_destination){
			return_stops += `<li>${stopsArr[routeIndex]} </li>`;
			break;
		}else{
			return_stops += `<li>${stopsArr[routeIndex]} <i class="fas fa-long-arrow-alt-right"></i></li>`;
		}
	}
	let htmlResult = 
		'<div class="flight-item">' +
			'<div class="item-media">' +
				'<div class="image-cover">' +
					`<img src="${baseUrl}assets/home/images/flight/1.jpg" alt="">` +
                '</div>' +
			'</div>' +
			'<div class="item-body">' +
				'<div class="item-title">' +
					'<h2>' +
						`<a href="flight-detail.html">${carrierName} : ${depart_origin} - ${depart_destination}</a>` +
					'</h2>' +
				'</div>' +
				'<table class="item-table">' +
 					'<thead>' +
						'<tr>' +
							'<th class="route">Route</th>' +
							'<th class="depart">Depart</th>' +
							'<th class="arrive">Arrive</th>' +
							'<th class="duration">Duration</th>' +
						'</tr>' +
					'</thead>' +
					'<tbody>' +
 						'<tr>' +
							'<td class="route">' +
								'<ul>' +
									depart_stops +
								'</ul>' +
							'</td>' +
							'<td class="depart">' +
								'<span>10:25</span>' +
								'<span class="date">14 Feb</span>' +
							'</td>' +
							'<td class="arrive">' +
								'<span>12:30</span>' +
							'</td>' +
							'<td class="duration">' +
								'<span>38h5m</span>' +
							'</td>' +
						'</tr>';
	if(turnAround){
		htmlResult +=
		'<tr>' +
			'<td class="route">' +
				'<ul>' +
					return_stops +
				'</ul>' +
			'</td>' +
			'<td class="depart">' +
				'<span>10:25</span>' +
			'</td>' +
			'<td class="arrive">' +
				'<span>12:30</span>' +
				'<span class="date">15 MAr</span>' +
			'</td>' +
			'<td class="duration">' +
				'<span>38h5m</span>' +
			'</td>' +
		'</tr>';
	}
	htmlResult +=
					'</tbody>' +
				'</table>' +
			'</div>' +
			'<div class="item-price-more">' +
				'<div class="price">' +
					`<span class="amount">$${terms[gateId.toString()].price}</span>` +
					gateInfo.label +
				'</div>' +
				'<button class="ticketBookingBtn btn btn-warning"' +
					`data-ticketLink="${terms[gateId.toString()].url}"` +
					`data-uuid="${data.meta.uuid}"` +
					`class="btn btn-warning">Book now</button>` +
			'</div>' +
		'</div>';
	return htmlResult;
}

$(document).on("click", ".ticketBookingBtn", function(event) {
	let ticketLink = $(this).attr("data-ticketLink");
	let uuid = $(this).attr("data-uuid");
	let url = `${baseUrl}flight/ticket_link/${uuid}/${ticketLink}`;
	$.get(url, function(data){
		let dataObj = JSON.parse(data);
		window.location.href = dataObj.url
	});
});
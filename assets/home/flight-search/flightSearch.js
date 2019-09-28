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
	} else {
		$(".scope-destination .location-show-static .city").html(city + ",");
		$(".scope-destination .location-show-static .country").html(country);
		$(".scope-destination .location-show-static .city-code").html(cityCode);
		hiddenDestination.val(cityCode);
		destinationInputBox.val(city);
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
			cityCode +
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
				cityCode +
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
	$(".adults-ticket-section .value").html(value);
	updateTotalNumberOfTicket();
});

$(".adults-ticket-section .decrease").click(function() {
	let value = parseInt(inputAdultsTicket.val());
	if (value > 1) {
		value -= 1;
		inputAdultsTicket.val(value);
		$(".adults-ticket-section .value").html(value);
		updateTotalNumberOfTicket();
	}
});

$(".children-ticket-section .increase").click(function() {
	let value = parseInt(inputchildrenTicket.val());
	value = value || 0;
	value += 1;
	inputchildrenTicket.val(value);
	$(".children-ticket-section .value").html(value);
	updateTotalNumberOfTicket();
});

$(".children-ticket-section .decrease").click(function() {
	let value = parseInt(inputchildrenTicket.val());
	value = value || 0;
	if (value > 0) {
		value -= 1;
		inputchildrenTicket.val(value);
		$(".children-ticket-section .value").html(value);
		updateTotalNumberOfTicket();
	}
});

$(".infants-ticket-section .increase").click(function() {
	let value = parseInt(inputInfantsTicket.val());
	value = value || 0;
	value += 1;
	inputInfantsTicket.val(value);
	$(".infants-ticket-section .value").html(value);
	updateTotalNumberOfTicket();
});

$(".infants-ticket-section .decrease").click(function() {
	let value = parseInt(inputInfantsTicket.val());
	value = value || 0;
	if (value > 0) {
		value -= 1;
		inputInfantsTicket.val(value);
		$(".infants-ticket-section .value").html(value);
		updateTotalNumberOfTicket();
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

// Flight Search Result Page

var flightSearchResult = $("#flightSearchResult");

if (flightSearchResult) {
	let search_id = flightSearchResult.attr("data-flightSearchid");
	$.ajax({
		url: baseUrl + "flight/search_result/" + search_id
	}).done(function(data) {
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
}

function getActiveFlight(data) {
	let dataArray = JSON.parse(data);
	dataArray = dataArray.map(function(row) {
		if (row.proposals.length > 0) {
			return row;
		}
		return false;
	});
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
	let gateId = data.meta.gates[0].id;
	let terms = data.proposals[0].terms;
	let carrierCode = data.proposals[0].validating_carrier;
	let gateInfo = data.gates_info[gateId.toString()];
	let origin  = data.segments[0].origin;
	let destination  = data.segments[0].destination;
	let stops = `<li>${origin} <i class="fas fa-long-arrow-alt-right"></i></li>`;
	let stopsArr = data.proposals[0].stops_airports;
	let carrierName = data.airlines[carrierCode].name;
	
	for(let i = 0; i < stopsArr.length; i++){
		if(i == stopsArr.length - 1){
			stops += `<li>${stopsArr[i]} </li>`;
		}else{
			stops += `<li>${stopsArr[i]} <i class="fas fa-long-arrow-alt-right"></i></li>`;
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
						`<a href="flight-detail.html">${carrierName} : ${origin} - ${destination}</a>` +
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
									stops +
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
						'</tr>' +
						'<tr>' +
							'<td class="route">' +
								'<ul>' +
									'<li>JFK <i class="fas fa-long-arrow-alt-right"></i></li>' +
									'<li>SVO <i class="fas fa-long-arrow-alt-right"></i></li>' +
									'<li>HAN </li>' +
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
						'</tr>' +
					'</tbody>' +
				'</table>' +
			'</div>' +
			'<div class="item-price-more">' +
				'<div class="price">' +
					`<span class="amount">₽${terms[gateId.toString()].price}</span>` +
					gateInfo.label +
				'</div>' +
				'<a href="#" class="btn btn-warning">Book now</a>' +
			'</div>' +
		'</div>'
	return htmlResult;
}

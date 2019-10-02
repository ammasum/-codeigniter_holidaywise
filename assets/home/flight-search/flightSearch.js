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
Vue.prototype.$http = axios;
new Vue({
	el: "#flightResult",
	data:{
		greeting: "Hello world",
		flightResults: [],
		isTurnAround: false,
		flightSearchMsg: true,
		filterSort: ""
	},
	methods:{
		dummy: function(){
			return this.filterSort;
		},
		bookNow: function(url, uuid){
			let getUrlAdd = `${baseUrl}flight/ticket_link/${uuid}/${url}`;
			this.$http.get(getUrlAdd)
				.then(function(data){
					if(data){
						window.location.href = data.data.url;
					}
				});
		},
		flightSortDir: function(type){
			return function(a, b){
				return (a[type] > b[type]) ? 1 : -1;
			}
		},
		getActiveResult: function(data){
			let activeResult = [];
			let parseResult = JSON.parse(JSON.stringify(data));
			for(let i = 0; i < parseResult.length; i++){
				if(parseResult[i].proposals.length > 0){
					activeResult.push(parseResult[i]);
				}
			}
			console.log(activeResult);
			return activeResult;
		},
		formattedFlight: function(flights){
			return flights.map(function(flight){
				let formattedFlight = {};
				let turnAround = false;
				let proposals = flight.proposals[0];
				let gateId = flight.meta.gates[0].id;
				let terms;
				let carrierCode;
				let gateInfo = flight.gates_info[gateId.toString()];
				let depart_origin  = proposals.segments_airports[0][0];
				let depart_destination  = proposals.segments_airports[0][1];
				let return_origin;
				let return_destination;
				let uuid = flight.meta.uuid;
				let return_route = [];
				let depart_stops = `<li>${depart_origin}<i class="fas fa-long-arrow-alt-right"></i></li>`;
				let return_stops = "";
				let stopsArr = flight.proposals[0].stops_airports;
				let carrierName;
				while(Array.isArray(proposals)){
					proposals = proposals[0];
				}
				terms = proposals.terms;
				carrierCode = proposals.validating_carrier;
				carrierName = flight.airlines[carrierCode].name;
				if(flight.segments.length === 2){
					turnAround = true;
					return_origin  = proposals.segments_airports[1][0];
					return_destination  = proposals.segments_airports[1][1];
				}
				let routeIndex = 0;
				for(; routeIndex < stopsArr.length; routeIndex++){
					if(stopsArr[routeIndex] === depart_destination){
						depart_stops += `<li>${stopsArr[routeIndex]}</li>`;
						break;
					}else{
						depart_stops += `<li>${stopsArr[routeIndex]}<i class="fas fa-long-arrow-alt-right"></i></li>`;
					}
				}
				routeIndex++;
				return_stops += `<li>${return_origin}<i class="fas fa-long-arrow-alt-right"></i></li>`;
				for(; routeIndex < stopsArr.length; routeIndex++){
					if(stopsArr[routeIndex] === return_destination){
						return_stops += `<li>${stopsArr[routeIndex]}</li>`;
						break;
					}else{
						return_stops += `<li>${stopsArr[routeIndex]}<i class="fas fa-long-arrow-alt-right"></i></li>`;
					}
				}
				formattedFlight.isTurnAround = turnAround;
				formattedFlight.carrierCode = carrierCode;
				formattedFlight.carrierName = carrierName;
				formattedFlight.departOrigin = depart_origin;
				formattedFlight.departDestination = depart_destination;
				formattedFlight.departStops = depart_stops;
				formattedFlight.returnStops = return_stops;
				formattedFlight.price = terms[gateId.toString()].price;
				formattedFlight.departOrigin = depart_origin;
				formattedFlight.bookUrl = terms[gateId.toString()].url;
				formattedFlight.uuid = uuid;
				return formattedFlight;
			});
		}
	},
	computed:{
		sortFlight: function(){
			let vi = this;
			return this.filterSort ? vi.flightResults.sort(vi.flightSortDir(this.filterSort)) : vi.flightResults;
		}
	},
	created(){
		let vi = this;
		let id = document.querySelector(".filter-item-wrapper").getAttribute("data-flightSearchid");
		setTimeout(function(){
			vi.$http.get(baseUrl + "flight/search_result/" + id)
				.then(function(data){
					vi.flightSearchMsg = false;
					if(data){
						let activeResult = vi.getActiveResult(data.data);
						vi.flightResults = vi.formattedFlight(activeResult);
					}
				})
		}, 3000);
	}
});

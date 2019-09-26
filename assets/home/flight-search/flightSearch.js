// https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false&q=Moscow Airport data api


const url = {
    airportData: "https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false&q="
}

var currentCityOrigin = "",
    currentCityCodeOrigin = "",
    currentCountryOrigin = "",
    currentCountryCodeOrigin = "",
    currentCityDestine = "",
    currentCityCodeDestine = "",
    currentCountryDestine = "",
    currentCountryCodeDestine = "",
    currentActiveScope = "";

const hiddenOrigin = $('input[name="origin_iata"]'),
    hiddenDestination = $('input[name="destination_iata"]');
const originSearch = $(".scope-origin .airport-search-result");
const destinationSearch = $(".scope-destination .airport-search-result");



$("#originInputBox").keyup(function(){
    originSearch.html("");
    currentActiveScope = "scope-origin";
    let searchValue = $(this).val();
    if(searchValue.length > 0){
        getData(url["airportData"] + searchValue, function(data){
            if(data.length > 0){
                let jsonToObj = JSON.parse(JSON.stringify(data));
                jsonToObj.forEach(obj => {
                    renderSearchItem(obj, originSearch);
                    originSearch.addClass("view");
                });
            }else{
                renderSearchNoItem(originSearch);
                originSearch.addClass("view");
            }
        
        });
    }

});



$("#destinationInputBox").keyup(function(){
    destinationSearch.html("");
    currentActiveScope = "scope-destination";
    let searchValue = $(this).val();

    getData(url["airportData"] + searchValue, function(data){
        if(data.length > 0){
            let jsonToObj = JSON.parse(JSON.stringify(data));
            jsonToObj.forEach(obj => {
                renderSearchItem(obj, destinationSearch);
                destinationSearch.addClass("view");
            });
        }else{
            renderSearchNoItem(destinationSearch);
            destinationSearch.addClass("view");
        }
    
    });

});

$(document).on('click', '.airport-search-result .result-item',function(event){
    let city = $(this).attr("data-city");
    let cityCode = $(this).attr("data-cityCode");
    let country = $(this).attr("data-country");
    let countryCode = $(this).attr("data-countryCode");
    if(currentActiveScope == "scope-origin"){
        $(".scope-origin .location-show-static .city").html(city);
        $(".scope-origin .location-show-static .country").html(country);
        $(".scope-origin .location-show-static .city-code").html(cityCode);
        hiddenOrigin.val(cityCode);
    }else{
        $(".scope-destination .location-show-static .city").html(city);
        $(".scope-destination .location-show-static .country").html(country);
        $(".scope-destination .location-show-static .city-code").html(cityCode);
        hiddenDestination.val(cityCode);
    }
    $(this).parent().removeClass("view");
});


function renderSearchNoItem(renderScope){
    renderScope.append(
        '<div class="text-center">No data found</div>'
    );
}

function renderSearchItem(obj, renderScope){
    let city = obj.city_name,
        cityCode = obj.city_code,
        country = obj.country_name,
        countryCode = obj.country_name,
        fullName = obj.city_fullname,
        type = obj._type,
        airportName = obj.name;
    if(!(type == "airport")){
        airportName = "All Airport of " + city;
    }
    renderScope.append(
        '<div class="result-item" data-city="' + city + '"' +
            'data-cityCode="' + cityCode + '"' +
            'data-country="' + country + '"' +
            'data-countryCode="' + countryCode + '">' +
            '<div class="row">' +
            '   <div class="col-8">' +
                fullName + '<br>' +
                    '<small>' + airportName + '</small>' +
                '</div>' +
                '<div class="col-4">' +
                    cityCode +
                '</div>' +
            '</div>' +
        '</div>'
    );
}


function getData(url, handler){
    $.getJSON(url, handler);
}




// Ticket section

var inputAdultsTicket = $('input[name="adults"]'),
    inputchildrenTicket = $('input[name="children"]'),
    inputInfantsTicket = $('input[name="infants"]'),
    totalNumberOfTicket = $("#numberOfTicket"),
    ticketSectionArea = $(".ticket-section-area");

$(".adults-ticket-section .increase").click(function(){
    let value = parseInt(inputAdultsTicket.val());
    value += 1;
    inputAdultsTicket.val(value);
    $(".adults-ticket-section .value").html(value);
    updateTotalNumberOfTicket();
});

$(".adults-ticket-section .decrease").click(function(){
    let value = parseInt(inputAdultsTicket.val());
    if(value > 1){
        value -= 1;
        inputAdultsTicket.val(value);
        $(".adults-ticket-section .value").html(value);
        updateTotalNumberOfTicket();
    }
});

$(".children-ticket-section .increase").click(function(){
    let value = parseInt(inputchildrenTicket.val());
    value = value || 0; 
    value += 1;
    inputchildrenTicket.val(value);
    $(".children-ticket-section .value").html(value);
    updateTotalNumberOfTicket();
});

$(".children-ticket-section .decrease").click(function(){
    let value = parseInt(inputchildrenTicket.val());
    value = value || 0; 
    if(value > 0){
        value -= 1;
        inputchildrenTicket.val(value);
        $(".children-ticket-section .value").html(value);
        updateTotalNumberOfTicket();
    }
});

$(".infants-ticket-section .increase").click(function(){
    let value = parseInt(inputchildrenTicket.val());
    value = value || 0; 
    value += 1;
    inputInfantsTicket.val(value);
    $(".children-ticket-section .value").html(value);
    updateTotalNumberOfTicket();
});

$(".infants-ticket-section .decrease").click(function(){
    let value = parseInt(inputchildrenTicket.val());
    value = value || 0; 
    if(value > 0){
        value -= 1;
        inputInfantsTicket.val(value);
        $(".children-ticket-section .value").html(value);
        updateTotalNumberOfTicket();
    }
});

$("#openTicketSection").click(function(event){
    event.preventDefault();
    ticketSectionArea.toggle(".3");
});
$(".close-ticket-section").click(function(event){
    event.preventDefault();
    ticketSectionArea.toggle(".3");
});

function updateTotalNumberOfTicket(){
    let adults = parseInt(inputAdultsTicket.val());
    let children = parseInt(inputchildrenTicket.val());
    let total = 0;
    if(adults){
        total = adults;
    }
    if(children){
        total += children;
    }
    totalNumberOfTicket.html(total);
}


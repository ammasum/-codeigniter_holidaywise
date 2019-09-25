<div class="search-tabs" id="search-tabs-2" ng-app="holidaywiseSearchFlight">

















<div class="container mb-5">
    <h1 class="text-center">Search</h1>
    <div class="row">
        <div class="col-12">
            <form action="" method="get">
                <div class="form-row">

                    <div class="col-md-6 scope scope-origin">
                        <p class="location-show-static">
                            <span class="city"></span>
                            <span class="country"></span>
                            <span class="city-code float-right"></span>
                        </p>
                        <input type="text" id="originInputBox" class="place-box">
                        <input type="hidden" name="origin_iata">
                        <div class="airport-search-result"></div>
                    </div>

                    <div class="col-md-6 scope scope-destination">
                        <p class="location-show-static">
                            <span class="city"></span>
                            <span class="country"></span>
                            <span class="city-code float-right"></span>
                        </p>
                        <input type="text" id="destinationInputBox" class="place-box">
                        <input type="hidden" name="destination_iata">
                        
                        <div class="airport-search-result">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control hp-50" id="depart_date" name="depart_date">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control hp-50" id="return_date" name="return_date">
                    </div>
                    <div class="col-md-4 scope scope-ticket">
                        <button class="ticket-info-button w-100" id="openTicketSection">
                            <h6 class="mb-0"><span id="numberOfTicket">1</span> Pessenger</h6>
                            <small>Bussniess Class</small>
                        </button>
                        <div class="ticket-section-area">
                            <div class="ticket-section adults-ticket-section">
                                <input type="hidden" name="adults" value="1">
                                <div class="row">
                                    <div class="col-4">Adults</div>
                                    <div class="col-3"><span class="decrease">-</span></div>
                                    <div class="col-2"><span class="value">1</span></div>
                                    <div class="col-3"><span class="increase">+</span></div>
                                </div>
                            </div>
                            <div class="tricket-section children-ticket-section">
                                <input type="hidden" name="children" value="0">
                                <div class="row">
                                    <div class="col-4">Children</div>
                                    <div class="col-3"><span class="decrease">-</span></div>
                                    <div class="col-2"><span class="value">0</span></div>
                                    <div class="col-3"><span class="increase">+</span></div>
                                </div>
                            </div>
                            <button class="close-ticket-section">Done</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="custom-submit w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


























</div><!-- end search-tabs -->

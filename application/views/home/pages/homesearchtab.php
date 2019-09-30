
<div class="container mb-5">
    <h1 class="text-center">Flight Search</h1>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo base_url() . 'flight/search'; ?>" method="get" autocomplete="off">
                <div class="form-row">

                    <div class="col-md-6 scope scope-origin">
                        <label>Origin</label>
                        <p class="location-show-static">
                            <span class="city">
                                <?php
                                    if($origin = $this->input->get("origin_city")){
                                        echo $origin . ",";
                                    }else{
                                        echo "Origin";
                                    }
                                ?>
                            </span>
                            <span class="country">
                                <?php
                                    echo $this->input->get("origin_country");
                                ?>
                            </span>
                            <span class="city-code float-right">
                                <?php
                                    echo $this->input->get("origin_iata");
                                ?>
                            </span>
                        </p>
                        <input type="hidden" name="origin_city">
                        <input type="hidden" name="origin_country">
                        <input type="text" id="originInputBox" class="place-box">
                        <input
                            type="hidden"
                            name="origin_iata"
                            value="<?php echo $this->input->get("origin_iata"); ?>">
                        <div class="airport-search-result"></div>
                    </div>

                    <div class="col-md-6 scope scope-destination">
                        <label>Destination</label>
                        <p class="location-show-static">
                            <span class="city">
                                <?php
                                    if($origin = $this->input->get("destination_city")){
                                        echo $origin . ",";
                                    }else{
                                        echo "Origin";
                                    }
                                ?>
                            </span>
                            <span class="country">
                                <?php
                                    echo $this->input->get("destination_country");
                                ?>
                            </span>
                            <span class="city-code float-right">
                                <?php
                                    echo $this->input->get("destination_iata");
                                ?>
                            </span>
                        </p>
                        <input type="hidden" name="destination_city">
                        <input type="hidden" name="destination_country">
                        <input type="text" id="destinationInputBox" class="place-box">
                        <input
                            type="hidden"
                            name="destination_iata"
                            value="<?php echo $this->input->get("destination_iata"); ?>">
                        
                        <div class="airport-search-result">
                            
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <label>Depart Date</label>
                        <input
                            type="text"
                            class="form-control hp-50"
                            id="depart_date"
                            name="depart_date"
                            value="<?php echo $this->input->get("depart_date"); ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Return Date</label>
                        <input
                            type="text"
                            class="form-control hp-50"
                            id="return_date"
                            name="return_date"
                            value="<?php echo $this->input->get("return_date"); ?>">
                    </div>
                    <div class="col-md-4 scope scope-ticket">
                        <label>Passengers</label>
                        <button class="ticket-info-button w-100" id="openTicketSection">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="mb-0"><span id="numberOfTicket">1</span> Pessenger</h6>
                                    <small>Bussniess Class</small>
                                </div>
                                <div class="col-4">
                                    <div style="font-size: 25px;"><i class="text-left fas fa-caret-down"></i></div>
                                </div>
                            </div>
                        </button>
                        <div class="ticket-section-area">
                            <div class="ticket-section adults-ticket-section">
                                <?php
                                    $adults = 1;
                                    if($this->input->get("adults")){
                                        $adults = $this->input->get("adults");
                                    }
                                ?>
                                <input
                                    type="hidden"
                                    name="adults"
                                    value="<?php echo $adults; ?>">
                                <div class="row">
                                    <div class="col-4">Adults</div>
                                    <div class="col-3"><span class="decrease operator-round-icon"><i class="fas fa-minus"></i></span></div>
                                    <div class="col-2"><span class="value">1</span></div>
                                    <div class="col-3"><span class="increase operator-round-icon"><i class="fas fa-plus"></i></span></div>
                                </div>
                            </div>
                            <div class="ticket-section children-ticket-section">
                                <?php
                                    $children = 0;
                                    if($this->input->get("children")){
                                        $children = $this->input->get("children");
                                    }
                                ?>
                                <input type="hidden" name="children" value="<?php echo $children; ?>">
                                <div class="row">
                                    <div class="col-4">Children</div>
                                    <div class="col-3"><span class="decrease operator-round-icon"><i class="fas fa-minus"></i></span></div>
                                    <div class="col-2"><span class="value">0</span></div>
                                    <div class="col-3"><span class="increase operator-round-icon"><i class="fas fa-plus"></i></span></div>
                                </div>
                            </div>
                            <div class="ticket-section infants-ticket-section">
                                <?php
                                    $infants = 0;
                                    if($this->input->get("infants")){
                                        $infants = $this->input->get("infants");
                                    }
                                ?>
                                <input type="hidden" name="infants" value="<?php echo $infants; ?>">
                                <div class="row">
                                    <div class="col-4">Infants</div>
                                    <div class="col-3"><span class="decrease operator-round-icon"><i class="fas fa-minus"></i></span></div>
                                    <div class="col-2"><span class="value">0</span></div>
                                    <div class="col-3"><span class="increase operator-round-icon"><i class="fas fa-plus"></i></span></div>
                                </div>
                            </div>
                            <button class="close-ticket-section">Done</button>
                        </div>
                    </div>
                    <div class="col-md-2 custom-pt-5">
                        <button type="submit" class="custom-submit w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


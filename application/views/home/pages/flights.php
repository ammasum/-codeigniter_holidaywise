
<section class="filter-page">





    <?php $this->load->view('home/pages/homesearchtab'); ?>



    <div class="container">
        <div class="row">
                    
            <div class="col-md-9 col-md-push-3">
                <div class="filter-page__content">
                    <div
                        class="filter-item-wrapper"
                        id="flightSearchResult"
                        data-flightSearchid="<?php echo $search_id; ?>">
                    </div>


                            <!-- PAGINATION -->
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item ">
                            <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                2
                                <span class="sr-only">(current)</span>
                            </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                            <!-- END / PAGINATION -->
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="page-sidebar">
                    <div class="sidebar-title">
                        <h2>Flight</h2>
                        <div class="clear-filter">
                            <a href="#">Clear all</a>
                        </div>
                    </div>
                    <!-- WIDGET -->
                    <div class="widget widget_has_radio_checkbox_text">
                        <h3>Flight Type</h3>
                        <div class="widget_content">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Oneway" value="Oneway">
                                <label class="form-check-label" for="Oneway">Oneway</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Turn-around" value="Turn-around">
                                <label class="form-check-label" for="Turn-around">Turn-around</label>
                            </div>     
                            <div class="form-group faph">
                                <label for="from">From</label>
                                <input type="text" class="form-control " id="from" >
                                <i class="fas fa-map-marker-alt"></i>
                            </div>  
                            <div class="form-group faph">
                                <label for="to">To</label>
                                <input type="text" class="form-control" id="to">
                                <i class="fas fa-map-marker-alt"></i>    
                            </div>
                        </div>
                    </div>
                    <!-- END / WIDGET -->

                           

                    <!-- WIDGET -->
                    <div class="widget widget_has_radio_checkbox">
                        <h3>Star Rating</h3>
                        <ul>
                            <li>
                                <label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </div>  
                                </label>
                            </li>
                            <li>
                                <label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </div>  
                                </label>
                            </li>
                            <li>
                                <label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </div>       
                                </label>
                            </li>
                            <li>
                                <label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </div>            
                                </label>
                            </li>
                            <li>
                                <label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </div>        
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- END / WIDGET -->

                    <!-- WIDGET -->
                    <div class="widget widget_has_radio_checkbox">
                        <h3>Service Include</h3>
                        <ul>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Room service
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Laundry
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Meal at room
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Wifi &amp; internet
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Parking lot
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    TV and appliances
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Pool
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox">
                                    <i class="awe-icon awe-icon-check"></i>
                                    Gym and Spa
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- END / WIDGET -->

                </div>
            </div>
        </div>
    </div>
</section>

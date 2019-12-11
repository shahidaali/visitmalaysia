@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="flights-search clearfix">
	        <div class="vdf_search_filters_column">
	             <div class="filter-results-cont">
	                <div class="filter-results-wrapper">
	                   <div class="filter-result-col-left">
	                      <button type="button" class="button_close_filter">×</button>
	                      <div class="filter-mob-btn">
	                         <a id="applyFilterMobile" href="javascript:void(0);" class="filter-mob-apply-btn">
	                         <img alt="apply" src="/Components/VDFactory/assets/images/icons/apply-panel-tick.png">
	                         <span>Apply</span>
	                         </a>
	                         <a id="resetFilterMobile" href="javascript:void(0);" class="filter-mob-reset-btn">
	                         <img alt="reset" src="/Components/VDFactory/assets/images/icons/reset-panel-icon.png">
	                         <span>Reset</span>
	                         </a>
	                      </div>
	                      <div class="filter-result-inner">
	                         <div class="filter-save-search">
	                            <h3>Save Search</h3>
	                            <div class="search-count">
	                               <span id="historyCount">(0) </span>
	                               <div class="changed-from-label">search result saved</div>
	                            </div>
	                            <fieldset class="name-save-search">
	                               <legend class="aaa-screenreader-hidden">Subscribe</legend>
	                               <input type="text" id="txtSearchName" placeholder="Enter Name:" />
	                            </fieldset>
	                            <div class="save-search-btn">
	                               <a id="btnSaveSearch" href="javascript:void(0);">Save</a>
	                            </div>
	                            <ul id="SearchHistoryContainer" class="save-search-list">
	                            </ul>
	                         </div>
	                         <h4 id="plhcontent_1_phcolumn1_0_headingSearchFlight">Edit your search</h4>
	                         <div class="filter-detail-edit-field">
	                            <div class="filter-location-field">
	                               <input id="flightType" type="hidden" value="RT" data-defaulttrip="RT">
	                               <label class="aaa-screenreader-hidden" for="tbFrom">From</label>
	                               <input name="tbFrom" type="text" id="tbFrom" placeholder="City or airport of origin" />
	                               <input id="tbTo" type="hidden" value="Dubai, United Arab Emirates (DXBA)">
	                            </div>
	                            <div class="filter-date-pick">
	                               <label for="tbDepartDate">Depart</label>
	                               <div class="filter-date-pick-inner">
	                                  <input name="tbDepartDate" type="text" value="{{ $filters['departureDateInput'] }}" readonly="readonly" id="tbDepartDate" class="datepicker" />                                    
	                                  <label class="date-pick-icon aaa-screenreader-hidden-Text" for="tbDepartDate">DepartDate</label>
	                               </div>
	                            </div>
	                            <div class="filter-date-pick">
	                               <label for="tbReturnDate">Return</label>
	                               <div class="filter-date-pick-inner">
	                                  <input name="tbReturnDate" type="text" value="{{ $filters['returnDateInput'] }}" readonly="readonly" id="tbReturnDate" class="datepicker" />
	                                  <label class="date-pick-icon aaa-screenreader-hidden-Text" for="tbReturnDate">ReturnDate</label>                                    
	                               </div>
	                            </div>
	                            <div class="travellers_cabin_field">
                                                   <label for="travellersCabinField" >Cabin Class & Travelers</label>
                                                   <div class="inputcover">
                                                      <input id="travellersCabinField" type="text" placeholder="1 Adult, Economy" class="vdf_input_text travellers_cabin_value" readonly tabindex="0">
                                                      <label for="travellersCabinField" class="icon_down aaa-screenreader-hidden-Text">traveller cabin</label>
                                                   </div>
                                                   <div class="traveller_cabin_info_popup">
                                                      <button type="button" class="popover_close">×</button>                                    
                                                      <div class="changed-from-label">Cabin Class</div>
                                                      <select class="cabin_class">
                                                         <option selected="selected" value="Economy">Economy</option>
                                                         <option value="PremiumEconomy">Premium Economy</option>
                                                         <option value="Business">Business Class</option>
                                                         <option value="First">First Class</option>
                                                      </select>
                                                      <div class="traveller_count">
                                                         <div class="info_traveller">
                                                            <i class="fa fa-info-circle tooltipster" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Your age at time of travel must be valid for the age category booked. Airlines have restrictions on under 18s traveling alone.<br>
                                                               Age limits and policies for traveling with children may vary so please check with the airline before booking."></i>
                                                         </div>
                                                         <div class="changed-from-label">Adults (18+)</div>
                                                         <button type="button" id="travel-and-cabin-adult-passenger-decrement" class="decrement adults" disabled="disabled">−</button>
                                                         <input type="text" readonly="" id="travel-and-cabin-adult-passenger-count" class="traveller_numbers " value="1">
                                                         <button type="button" id="travel-and-cabin-adult-passenger-increment" class="increment adults">+</button>
                                                         <span class="labelAdd">16+ years</span>
                                                         <div class="changed-from-label">Children (0-17)</div>
                                                         <button type="button" id="travel-and-cabin-children-passenger-decrement" class="decrement adults" disabled="">−</button>
                                                         <input type="text" readonly="" id="travel-and-cabin-children-passenger-count" class="traveller_numbers" value="0">
                                                         <button type="button" id="travel-and-cabin-children-passenger-increment" class="increment adults">+</button>
                                                         <span class="labelAdd">0-15 years</span>
                                                         <div class="clear"></div>
                                                         <div class="childAges">
                                                            <div id="childDiv-0" class="childNode hidden">
                                                               <label for="childAge-0" class="traveller-label">Age of child 1 </label>
                                                               <select id="childAge-0" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-1" class="childNode hidden">
                                                               <label for="childAge-1" class="traveller-label">Age of child 2 </label>
                                                               <select id="childAge-1" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-2" class="childNode hidden">
                                                               <label for="childAge-2" class="traveller-label">Age of child 3 </label>
                                                               <select id="childAge-2" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-3" class="childNode hidden">
                                                               <label for="childAge-3" class="traveller-label">Age of child 4 </label>
                                                               <select id="childAge-3" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-4" class="childNode hidden">
                                                               <label for="childAge-4" class="traveller-label">Age of child 5 </label>
                                                               <select id="childAge-4" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-5" class="childNode hidden">
                                                               <label for="childAge-5" class="traveller-label">Age of child 6 </label>
                                                               <select id="childAge-5" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-6" class="childNode hidden">
                                                               <label for="childAge-6" class="traveller-label">Age of child 7 </label>
                                                               <select id="childAge-6" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div id="childDiv-7" class="childNode hidden">
                                                               <label for="childAge-7" class="traveller-label">Age of child 8 </label>
                                                               <select id="childAge-7" class="childAge" data-selector="0">
                                                                  <option value="0">0</option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>
                                                                  <option value="11">11</option>
                                                                  <option value="12">12</option>
                                                                  <option value="13">13</option>
                                                                  <option value="14">14</option>
                                                                  <option value="15">15</option>
                                                               </select>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <a class="button_done">DONE</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
	                            <div class="filter-searsh-btn">
	                               <a id="btnSearch" href="javascript:void(0);" class="btn-block btn-blue-summer" tabindex="0">
	                               <span class="fa fa-search"></span>
	                               </a>
	                            </div>
	                         </div>
	                         <div id="FilterContainer" class="filters-flight-schedule"></div>
	                      </div>
	                   </div>
	                </div>
	             </div>
	          </div>

	          <div class="vdf_search_result_column">
	             <div id="errorMessage" class="vdf_search_no_results" style="display: none">
	                <h3>Sorry, there aren't any flights that match your filters.</h3>
	                <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Change your filter settings</p>
	             </div>
	             <div class="spinner">
	                <div class="loader_flight"></div>
	                <h3 class="loader_flight_text">Searching Flights <span></span></h3>
	             </div>
	             <div class="load_updates">
	                <h5><span>Updating...</span></h5>
	             </div>
	             <div id="flightSortingContainer" class="vdf_flight_heading" style="display: none;">
	                <ul class="heading_filters">
	                   <li><a href="javascript:void(0);" data-sorttype="airline" data-sortorder="asc" class="sort-filter asc sort-filter-airline">Airline <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a></li>
	                   <li><a href="javascript:void(0);" data-sorttype="departure" data-sortorder="asc" class="sort-filter asc sort-filter-departure">Departure <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a></li>
	                   <li><a href="javascript:void(0);" data-sorttype="duration" data-sortorder="asc" class="sort-filter asc sort-filter-duration">Duration <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a></li>
	                   <li style="display: none;"><a href="javascript:void(0);" data-sorttype="stops" data-sortorder="asc" class="sort-filter asc sort-filter-stops">Stop  <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a></li>
	                   <li><a href="javascript:void(0);" data-sorttype="return" data-sortorder="asc" class="sort-filter asc sort-filter-return">Arrival <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a></li>
	                </ul>
	                <div class="heading_prices">
	                   <a href="javascript:void(0);" data-sorttype="price" data-sortorder="desc" class="sort-filter asc sort-filter-price active">Price <i class="fa fa-sort" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i></a>
	                </div>
	                <div class="clear"></div>
	             </div>
	             <div class="clear"></div>
	             <ul id="flightDetailContainer" class="vdf_item_card_list" data-sorttype="price" data-sortorder="asc" data-default-sorttype="price" data-default-sortorder="asc"></ul>
	             <div id="loadMoreInfo" class="center loadbotton" style="display: none;" data-pageno="1" data-pagesize="10">
	                <a id="btnLoadMore" href="javascript:void(0);" class="button_load_more">Load More</a>
	             </div>
	             <!-- Pagination -->
	             <div class="vdf_pagination" style="display: none;">
	                <div class="vdf_pagination_result">
	                   <h5>1 to 10 of 211 results</h5>
	                </div>
	                <ul>
	                   <li><a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
	                   <li><a href="#" class="active">1</a></li>
	                   <li><a href="#">2</a></li>
	                   <li><a href="#">3</a></li>
	                   <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
	                </ul>
	                <div class="clear"></div>
	             </div>
	             <!-- -->
	             <div class="clear"></div>
	             <!-- 03 -->
	          </div>
	    </div>
	</div>

	<input type="hidden" id="Flight-API-SearchFlights" value="{{ route('flights.search_flights') }}" />
	<input type="hidden" id="Flight-API-SearchPlaces" value="{{ route('flights.places.search') }}" />
	<input type="hidden" id="Flight-API-FilterResultFound" value='out of {$} results found' />
	<input type="hidden" id="Flight-API-HoursLabel" value='hours' />
	<input type="hidden" id="Flight-API-CurrencyID" value='{2801D763-7F6E-4320-B82E-B091B39F53E4}' />
	<input type="hidden" id="Flight-API-CurrencySymbol" value='AED' />
	<input type="hidden" id="Flight-TravelAndCabin-MinimumAdultPassenger" value='1' />
	<input type="hidden" id="Flight-TravelAndCabin-MaximumAdultPassenger" value='8' />
	<input type="hidden" id="Flight-TravelAndCabin-MinimumChildrenPassenger" value='0' />
	<input type="hidden" id="Flight-TravelAndCabin-MaximumChildrenPassenger" value='8' />
	<input type="hidden" id="Flight-TravelAndCabin-MaximumInfanAgeLimit" value='1' />
	<input type="hidden" id="Flight-TravelAndCabin-MinimumChildrenAgeLimit" value='0' />
	<input type="hidden" id="Flight-TravelAndCabin-MaximumChildrenAgeLimit" value='15' />
	<input type="hidden" id="Flight-TravelAndCabin-LabelPassengerOnly" value='Adult' />
	<input type="hidden" id="Flight-TravelAndCabin-LabelMultiplePassenger" value='Traveller' />

	<input type="hidden" id="Flight-API-FlightCurrency" value='AED' />
	<input type="hidden" id="Flight-API-FlightSettings" value='{1676E78E-908D-44AC-8161-644CE49C33B6}' />

	 <div class="footer-socials"></div>
@endsection

@section('javascript')

	<script id="FiltersSearchHistory" type="text/html">
    @@{{#.}}
    <li>
        <a class="history-record" href="javascript:void(0);" data-id="@@{{Id}}" data-currency="@@{{SearchCriteria.Currency}}" data-sourceid="@@{{SearchCriteria.sourceId}}" data-destinationid="@@{{SearchCriteria.destinationId}}" data-currencysymbol="@@{{SearchCriteria.CurrencySymbol}}"
            data-originalplace="@{{SearchCriteria.OriginPlace}}" data-destinationplace="@{{SearchCriteria.DestinationPlace}}" data-adults="@{{SearchCriteria.Adults}}" data-children="@{{SearchCriteria.Children}}"
            data-infants="@{{SearchCriteria.Infants}}" data-inbounddate="@{{SearchCriteria.InboundDate}}" data-outbounddate="@{{SearchCriteria.OutboundDate}}"
            data-flighttype="@{{SearchCriteria.FlightType}}" data-cabinclass="@{{SearchCriteria.CabinClass}}" data-pageid="@{{SearchCriteria.PageId}}" data-child1="@{{SearchCriteria.Child1}}"
            data-child2="@{{SearchCriteria.Child2}}" data-child3="@{{SearchCriteria.Child3}}" data-child4="@{{SearchCriteria.Child4}}" data-child5="@{{SearchCriteria.Child5}}"
            data-child6="@{{SearchCriteria.Child6}}" data-child7="@{{SearchCriteria.Child7}}" data-child8="@{{SearchCriteria.Child8}}">@{{HistoryName}}
        </a>
        <span class="save-list-delete" data-id="@{{Id}}"></span>
    </li>
    @{{/.}}
</script>

<script id="Filters" type="text/html">
    
    <div class="filter-depart-cont">
        <h3>Departure Time</h3>

        <div class="filter-depart-inner">
            <p>Outbound</p>
            <div class="currency-values">
                <fieldset class="currency-range">
                    <legend class="aaa-screenreader-hidden">Subscribe</legend>
                    <label class="currency-synbol" for="tbDepLandingFrom"></label>
                    <span class="flight-time-value" id="deplandfrom">00:00</span>
                    <input name="tbDepLandingFrom" type="text" value="00:00" id="tbDepLandingFrom" class="range-result" enabled="true">
                </fieldset>
                <fieldset class="currency-range" style="left: 100%;">
                    <legend class="aaa-screenreader-hidden">Subscribe</legend>
                    <label class="currency-synbol" for="tbDepLandingTo"></label>
                    <span class="flight-time-value" id="deplandto">- 24:00</span>
                    <input name="tbDepLandingTo" type="text" value="24:00" id="tbDepLandingTo" class="range-result" enabled="true">
                </fieldset>
            </div>
            <div class="slider-range Outbound "></div>
        </div>
        
        @{{#Query.InboundDate}}
        <div class="filter-depart-inner">
            <br />
            <p>Return</p>
            <div class="currency-values">
                <fieldset class="currency-range">
                    <legend class="aaa-screenreader-hidden">Subscribe</legend>
                    <label class="currency-synbol" for="tbReturnFrom"></label>
                    <span class="flight-time-value" id="retlandfrom">00:00</span>
                    <input name="tbReturnFrom" type="text" value="00:00" id="tbReturnFrom" class="range-result" enabled="true">
                </fieldset>
                <fieldset class="currency-range" style="left: 100%;">
                    <label class="currency-synbol" for="tbReturnTo"></label>
                    <span class="flight-time-value" id="retlandto">- 24:00</span>
                    <input name="tbReturnTo" type="text" value="24:00" id="tbReturnTo" class="range-result" enabled="true">
                </fieldset>
            </div>
            <div class="slider-range Return"></div>
        </div>
        @{{/Query.InboundDate}}
        
    </div>
    
    <div id="filterDuration" class="filter-depart-cont" style="display: none;">
        <h3>Journey duration</h3>

        <div class="filter-depart-inner">
            <div class="currency-values">
                <fieldset class="currency-range">
                    <legend class="aaa-screenreader-hidden">Subscribe</legend>
                    <label class="currency-synbol" for="tbDurationFrom"></label>
                    <span class="flight-time-value" id="timestring">8 – 19</span>
                    <input name="tbDurationFrom" type="text" value="00:00" id="tbDurationFrom" class="range-result" enabled="true">
                </fieldset>

            </div>
            <div class="slider-range slider-range-single journey"></div>
        </div>

    </div>
    
    <div class="filter-type-cont">
        <h3>Airlines</h3>
        <ul class="filter-type-wrapper">
            <li class="agent-chk">
                <input type="checkbox" id="AllAgentChk" data-name="all" checked />
                <label for="AllAgentChk">All</label>
            </li>
            @{{#Carriers}}
            <li class="agent-chk">
                <input type="checkbox" id="Agent@{{Name}}" data-name="@{{Name}}" checked />
                <label for="Agent@{{Name}}">@{{Name}}</label>
            </li>
            @{{/Carriers}}
        </ul>
    </div>
    
    <div class="filter-reset">
        <a id="ResetFilter" href="javascript:void(0);">Reset all filters</a>
    </div>
</script>

<script id="flightDetails" type="text/html">
    @{{#SearchResult}}
    @{{#agent.0}}
    <li class="vdf_item_card fs-cardItem" data-toggle="modal" data-target="#flight_info">
        <article class="vdf_flight_search_item">
            <div class="vdf_flight_airline_mob">
                @{{#OutBoundFlightLogo}}
                                        <img src="@{{OutBoundFlightLogo}}" data-toggle="tooltip" class="tt_top" title="@{{OutBoundFlightName}}" alt="@{{OutBoundFlightName}}" data-name="@{{OutBoundFlightName}}">
                @{{/OutBoundFlightLogo}}
                @{{^OutBoundFlightLogo}}
                                        <span class="flight_name">@{{{OutBoundFlightName}}}</span>
                @{{/OutBoundFlightLogo}}  
            @{{#InBoundFlightLogo}}
                                        +
                <img src="@{{InBoundFlightLogo}}" alt="@{{InBoundFlightName}}" data-toggle="tooltip" class="tt_top" title="@{{InBoundFlightName}}" data-name="@{{InBoundFlightName}}" />
                @{{/InBoundFlightLogo}}
                                        @{{^InBoundFlightLogo}}
                                        @{{#InBoundFlightName}}
                                        <span class="flight_name">@{{{InBoundFlightName}}}</span>
                @{{/InBoundFlightName}}
                @{{/InBoundFlightLogo}}
            </div>

            <div class="vdf_flight_maindetails">
                <div class="vdf_flight_mainquote_table">
                    <div class="vdf_flight_mainquote_table_cell">
                        <section class="vdf_flight_one_side">
                            <div class="vdf_flight_airline">
                                @{{#OutBoundFlightLogo}}
                                        <img src="@{{OutBoundFlightLogo}}" title="@{{OutBoundFlightName}}" data-toggle="tooltip" class="tt_top" alt="@{{OutBoundFlightName}}" data-name="@{{OutBoundFlightName}}">
                                @{{/OutBoundFlightLogo}}
                                @{{^OutBoundFlightLogo}}
                                        <span class="flight_name">@{{{OutBoundFlightName}}}</span>
                                @{{/OutBoundFlightLogo}}
                            </div>

                            <div class="vdf_flight_depart_time">
                                <div class="time_table_cell">
                                    <div class="depart_time">@{{outBoundDepartureTime}}</div>
                                    <div class="start_airport tt_top" title="@{{outBoundOriginStationWithCode}}">@{{outBoundOriginStation}}</div>
                                </div>
                            </div>

                            <div class="vdf_flight_stops">
                                <div class="time_table_cell">
                                    <span class="duration">@{{outBoundDurationString}}</span>
                                    <ul class="stop-line">
                                        @{{{outBoundStopsli}}}
                                    </ul>
                                    <div class="stops">
                                        @{{#IsoutBoundDirect}}
                                        <span>Direct</span>
                                        @{{/IsoutBoundDirect}}
                                        @{{^IsoutBoundDirect}}
                                        <span>@{{outBoundStopCount}} Stop</span>@{{{OutBoundStopName}}}
                                        @{{/IsoutBoundDirect}}
                                       
                                    </div>

                                    
                                </div>
                            </div>

                            <div class="vdf_flight_arrive_time">
                                <div class="time_table_cell">
                                    <div class="arrive_time">
                                        @{{outBoundArrivalTime}}
                            @{{#outBoundJourneyDays}}
                                    <span class="tt_top" data-toggle="tooltip" title="@{{outBoundArrivesOnDay}}">@{{outBoundJourneyDays}}</span>
                                        @{{/outBoundJourneyDays}}
                                    </div>
                                    <div class="ends_airport tt_top" title="@{{outBoundDestationStationWithCode}}">@{{outBoundDestationStation}}</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </section>

                        @{{#IsRountTrip}}
                                <section class="vdf_flight_one_side via_return">
                                    <div class="vdf_flight_airline">
                                        @{{#InBoundFlightLogo}}
     <img src="@{{InBoundFlightLogo}}" alt="@{{InBoundFlightName}}" data-toggle="tooltip" class="tt_top" title="@{{InBoundFlightName}}" data-name="@{{InBoundFlightName}}" />
                                        @{{/InBoundFlightLogo}}
                                        @{{^InBoundFlightLogo}}
                                        <span class="flight_name">@{{{InBoundFlightName}}}</span>
                                        @{{/InBoundFlightLogo}}
                                    </div>

                                    <div class="vdf_flight_depart_time">
                                        <div class="time_table_cell">
                                            <div class="depart_time">@{{inBoundDepartureTime}}</div>
                                            <div class="start_airport tt_top" title="@{{inBoundOriginStationWithCode}}">@{{inBoundOriginStation}}</div>
                                        </div>
                                    </div>

                                    <div class="vdf_flight_stops">
                                        <div class="time_table_cell">
                                            <span class="duration">@{{inBoundDurationString}}</span>

                                            <ul class="stop-line">
                                                @{{{inBoundStopsli}}}
                                            </ul>
                                            <div class="stops">
                                                @{{#IsinBoundDirect}}
                                        <span>Direct</span>
                                                @{{/IsinBoundDirect}}
                                        @{{^IsinBoundDirect}}
                                        <span>@{{inBoundStopCount}} Stop</span>@{{{InBoundStopName}}}
                                        @{{/IsinBoundDirect}}
                                       
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <div class="vdf_flight_arrive_time">
                                        <div class="time_table_cell">
                                            <div class="arrive_time">
                                                @{{inBoundArrivalTime}}
                                            @{{#inBoundJourneyDays}}
                                    <span class="tt_top" data-toggle="tooltip" title="@{{inBoundArrivesOnDay}}">@{{inBoundJourneyDays}}</span>
                                                @{{/inBoundJourneyDays}}
                                            </div>
                                            <div class="ends_airport tt_top" title="@{{inBoundDestationStationWithCode}}">@{{inBoundDestationStation}}</div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </section>
                        @{{/IsRountTrip}}
                    </div>
                </div>
            </div>

            <div class="vdf_flight_card_price">
                <div class="vdf_flight_mainquote">
                    <div class="vdf_flight_mainquote_table">
                        <div class="vdf_flight_mainquote_table_cell">
                            <div class="mainquote-deals">
                                @{{CurrencySymbol}} @{{price | commaFormat}}
                            </div>
                            <a href="@{{deepLinkURL}}" target="_blank" rel="nofollow" class="button_select_flight">Select flight</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <div class="popupContent" style="display: none;">
            <button type="button" class="button_close_popup">×</button>

            <h3>Check your itinerary <span>(All times are local)</span></h3>
            <h5>Outbound <span>- @{{outBoundPopUpDate}}</span></h5>
            <section class="vdf_flight_one_side">
                <div class="vdf_flight_airline">
                    @{{#OutBoundFlightLogo}}
                                        <img src="@{{OutBoundFlightLogo}}" title="@{{OutBoundFlightName}}" data-toggle="tooltip" class="tt_top" alt="@{{OutBoundFlightName}}" data-name="@{{OutBoundFlightName}}">
                    @{{/OutBoundFlightLogo}}
                                @{{^OutBoundFlightLogo}}
                                        <span class="flight_name">@{{{OutBoundFlightName}}}</span>
                    @{{/OutBoundFlightLogo}}
                </div>

                <div class="vdf_flight_depart_time">
                    <div class="time_table_cell">
                        <div class="depart_time">@{{outBoundDepartureTime}}</div>
                        <div class="start_airport">@{{outBoundOriginStationWithCode}}</div>
                    </div>
                </div>

                <div class="vdf_flight_stops">
                    <div class="time_table_cell">
                        <span class="duration">@{{outBoundDurationString}}</span>
                        <ul class="stop-line">
                            @{{{outBoundStopsli}}}
                        </ul>
                        <div class="stops">
                            @{{#IsoutBoundDirect}}
                                        <span>Direct</span>
                            @{{/IsoutBoundDirect}}
                                        @{{^IsoutBoundDirect}}
                                        <span>@{{outBoundStopCount}} Stop</span>@{{{OutBoundStopName}}}
                                        @{{/IsoutBoundDirect}}
                                       
                        </div>
                    </div>
                </div>
                <div class="vdf_flight_arrive_time">
                    <div class="time_table_cell">
                        <div class="arrive_time">@{{outBoundArrivalTime}}</div>
                        <div class="ends_airport">@{{outBoundDestationStationWithCode}}</div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>
            @{{#IsRountTrip}}
            <h5>Return <span>- @{{inBoundPopUpDate}}</span></h5>
            <section class="vdf_flight_one_side">
                <div class="vdf_flight_airline">
                    @{{#InBoundFlightLogo}}
     <img src="@{{InBoundFlightLogo}}" data-toggle="tooltip" class="tt_top" alt="@{{InBoundFlightName}}" title="@{{InBoundFlightName}}" data-name="@{{InBoundFlightName}}" />
                    @{{/InBoundFlightLogo}}
                                        @{{^InBoundFlightLogo}}
                                        <span class="flight_name">@{{{InBoundFlightName}}}</span>
                    @{{/InBoundFlightLogo}}
                </div>

                <div class="vdf_flight_depart_time">
                    <div class="time_table_cell">
                        <div class="depart_time">@{{inBoundDepartureTime}}</div>
                        <div class="start_airport">@{{inBoundOriginStationWithCode}}</div>
                    </div>
                </div>

                <div class="vdf_flight_stops">
                    <div class="time_table_cell">
                        <span class="duration">@{{inBoundDurationString}}</span>
                        <ul class="stop-line">
                            @{{{inBoundStopsli}}}
                        </ul>
                        <div class="stops">
                            @{{#IsinBoundDirect}}
                                        <span>Direct</span>
                            @{{/IsinBoundDirect}}
                                        @{{^IsinBoundDirect}}
                                        <span>@{{inBoundStopCount}} Stop</span>@{{{InBoundStopName}}}
                                        @{{/IsinBoundDirect}}
                                       
                        </div>
                    </div>
                </div>
                <div class="vdf_flight_arrive_time">
                    <div class="time_table_cell">
                        <div class="arrive_time">@{{inBoundArrivalTime}}</div>
                        <div class="ends_airport">@{{inBoundDestationStationWithCode}}</div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>
            @{{/IsRountTrip}}
            <div class="clear"></div>
            <br />
            <h3>Book your ticket <span>@{{CabinClass}}, @{{Passenger}}</span></h3>

            <ul class="vdf_flight_options">
                @{{#agent}}
                <li>
                    <div class="vdf_flight_airline">
                        <span>
                            <img src="@{{ImageUrl}}" data-toggle="tooltip" class="tt_top" alt="@{{agentName}}" title="@{{agentName}}" data-name="@{{agentName}}"></span>
                    </div>
                    <div class="vdf_flight_mainquote_table_cell">
                        <div class="mainquote-deals">@{{CurrencySymbol}} @{{price | commaFormat}}</div>
                        <a href="@{{deepLinkURL}}" target="_blank" rel="nofollow" class="button_select_flight">Select flight</a>
                    </div>
                    <div class="clear"></div>
                </li>
                @{{/agent}}
            </ul>
            <div class="clear"></div>
        </div>
    </li>

    <!-- 00 Flight Popup -->
    <!-- Popup HTML Ends -->
    @{{/agent.0}}
    @@{{/SearchResult}}
</script>

<script>
	// $(document).ready(function () {

	// var dtDprt=$("#tbDepartDate").val().replace('\.','/');
	// var dtReturn=$("#tbReturnDate").val().replace('\.','/');

	// $("#tbDepartDate").val(dtDprt);
	// $("#tbReturnDate").val(dtReturn);

	// });
</script> 
<script type="text/javascript">
    
    var culture = 'plhcontent_1_phcolumn1_0_FlightSearchMainDiv';
    var LanguageAndLocale = 'en';
    var FlightSearchHeaderDescription = 'results';
    var outboundMin = '00:00';
    var outboundMax = '24:00';
    var returnBoundMin = '00:00';
    var returnBoundMax = '24:00';
   
    var cabinEconomy = 'Economy';
    var cabinPremiumEconomy = 'Premium Economy';
    var cabinBusiness = 'Business Class';
    var cabinFirst = 'First Class';
    var clearDateLabel = '';
    var Flight_API_AutoSuggestURL = "{{ route('flights.places.search') }}";
   
   
</script>

<script type="text/javascript">
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var request = [];
request.term = getUrlVars()["sourceId"];
</script>

<script>

        function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            }
            else var expires = "";

            document.cookie = name + "=" + value + expires + "; path=/";
        }

        var isDubaiCalendar = false;
        var currentLanguage = "en";
        var currentItemId = "{83C941BD-DA3E-4953-B7BE-409EFFC44923}";
        var currentLanguageTwoLetterISO = "en";
        var isRTLbool = false;
        var serverURL = 'https://www.visitdubai.com';
        var flightDomain = 'http://dubaitourism.directflights.com/';

        // This cookie would be used for Akamai page cache identification for language.
        createCookie("currentWebsiteLanguage", currentLanguage, 6);



         
        var enableFullFunctionality = true;
        
    </script>
    <script type="text/javascript">
        var dynamicSelectors = { singlePageMapCenter: {}, pinsArray: [] };
    </script>
<script src="{{asset('assets/js/minifiedabovejs.js ') }}" defer></script>
<script src="{{asset('assets/js/minifiedVdFactory.min.js ') }}" defer></script>

<!-- <script src="{{asset('assets/js/jquery.cookie.js ') }}" defer></script>
<script src="{{asset('assets/js/jquery.ddslick.min.js ') }}" defer></script> -->

<script src="{{asset('assets/js/minifiedjs.js ') }}" defer></script>
<script src="{{asset('assets/js/FlightSearch.min.js ') }}" defer></script>

@endsection
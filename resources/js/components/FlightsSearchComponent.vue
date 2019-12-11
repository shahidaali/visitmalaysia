<template>
    <div class="flights-search clearfix">
        <div class="row">
            <div class="col-md-3">
                <div class="search-sidebar">
                    <h2 class="widget-title">Edit your search</h2>
                    <div class="search-sidebar-widget">
                      <div class="filter-field filter-location-field">
                          <flights-places-search-component
                              :places-search-path="placesSearchPath"
                              :currency="currency"
                              :default-id="sourceId"
                              :default-place="sourcePlace"
                          /></flights-search-item-component>
                        </div>
                        <div class="filter-field filter-date-pick">
                           <label for="departureDate">Depart</label>
                           <div class="filter-date-pick-inner">
                              <input name="departureDate" type="text" :value="departureDate" readonly="readonly" id="departureDate" class="datepicker" />
                              <label class="date-pick-icon aaa-screenreader-hidden-Text" for="departureDate">Depart</label>
                           </div>
                        </div>
                        <div class="filter-field filter-date-pick">
                           <label for="returnDate">Return</label>
                           <div class="filter-date-pick-inner">
                              <input name="returnDate" type="text" :value="returnDate" readonly="readonly" id="returnDate" class="datepicker" />
                              <label class="date-pick-icon aaa-screenreader-hidden-Text" for="returnDate">Return</label>
                           </div>
                        </div>
                        <div class="filter-searsh-btn">
                            <a id="btnSearch" href="javascript:void(0);" class="btn btn-primary" tabindex="0" @click="filterFlights()">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <input type="hidden" name="flightTo" id="flightTo" :value="flightTo">
                        <input type="hidden" name="flightType" id="flightType" :value="flightType">
                        <input type="hidden" name="sourceAirport" id="sourceAirport" :value="sourceId">
                        <input type="hidden" name="destinationAirport" id="destinationAirport" :value="destinationId">
                        <input type="hidden" name="searchCulture" id="searchCulture" :value="searchCulture">
                        <input type="hidden" name="CurrencyID" id="CurrencyID" :value="currency">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="search-results">
                    <div class="spinner">
                        <div class="loader_flight"></div>
                        <h3 class="loader_flight_text">Searching Flights <span></span></h3>
                    </div>
                    <ul class="vdf_item_card_list">
                        <flights-search-item-component
                              v-for="(item, key) in searchResults"
                              :key="key"
                              :item="item"
                              :responseObject="responseObject"
                          /></flights-search-item-component>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            flightsSearchPath: {
                type: String,
                default: '',
            },
            placesSearchPath: {
                type: String,
                default: '',
            },
            searchCulture: {
                type: String,
                default: 'en',
            },
            flightType: {
                type: String,
                default: '',
            },
            flightTo: {
                type: String,
                default: '',
            },
            departureDate: {
                type: String,
                default: '',
            },
            returnDate: {
                type: String,
                default: '',
            },
            currency: {
                type: String,
                default: '',
            },
            sourceId: {
                type: String,
                default: '',
            },
            sourcePlace: {
                type: String,
                default: '',
            },
            destinationId: {
                type: String,
                default: '',
            },
            destination: {
                type: String,
                default: '',
            },
            cabin: {
                type: String,
                default: '',
            },
            passengers: {
                type: Number,
                default: 1,
            },
            children: {
                type: Number,
                default: 0,
            },
            infants: {
                type: Number,
                default: 0,
            },
        },
    	  data() {
            return {
                retryCount: 0,
                firstDataLoaded: !1,
                searchResults: {},
                responseObject: {},
                retryCount: 0,
                sessionKey: "",
            }
        },
        methods: {
            GetAdultTraveller: function() {
                return 1;
            },
            GetChildTraveller: function() {
                return 0;
            },
            GetInfantTraveller: function() {
                return 0;
            },
            GetCabinFieldValue: function() {
              var vm = this;
              return {
                Adults: vm.GetAdultTraveller(),
                Children: vm.GetChildTraveller(),
                Infants: vm.GetInfantTraveller(),
                Class: 'economy'
              }
            },
            getSelectedFilters: function() {
                var vm = this;

                var CabinValue = vm.GetCabinFieldValue(),
                    OriginPlace = $("#flightFrom").val(),
                    DestinationPlace = $("#flightTo").val(),
                    OutboundDate = $("#departureDate").val(),
                    InboundDate = $("#returnDate").val(),
                    Adults = CabinValue.Adults,
                    Children = CabinValue.Children,
                    Infants = CabinValue.Infants,
                    CabinClass = CabinValue.Class,
                    FlightType = $("#flightType").val(),
                    sourceId = $("#flightFromId").val(),
                    destinationId = $("#destinationAirport").val(),
                    Culture = $("#searchCulture").val(),
                    Currency = $("#CurrencyID").val(),
                    i = 0,
                    t = 0;

                return {
                    originPlace: OriginPlace,
                    destinationPlace: DestinationPlace,
                    adults: Adults,
                    children: Children,
                    infants: Infants,
                    inboundDate: vm.SkyFormatDate(InboundDate),
                    outboundDate: vm.SkyFormatDate(OutboundDate),
                    flightType: FlightType,
                    cabinClass: CabinClass,
                    culture: Culture,
                    currency: Currency,
                    sourceId: sourceId,
                    destinationId: destinationId,
                    sessionKey: vm.sessionKey
                }
            },
            searchFlights: function() {
              var vm = this;
              var filters = vm.getSelectedFilters();

              vm.showLoader();

            	$.ajax({
                  url: vm.flightsSearchPath,
                  contentType: "application/json; charset=utf-8",
                  method: "GET",
                  data: filters,
                  dataType: "json",
                  success: function(result) {

                    if( result.status == 'success' ) {
                      var r = result.data;

                      if( r.RootObject.Status == 'UpdatesComplete' ) {
                          vm.sessionKey = "";

                        r.SearchResult = vm.SortByPrice(r.SearchResult, "asc");

                        vm.responseObject = r;
                        vm.searchResults = r.SearchResult;

                        vm.hideLoader();
                      } 
                      else {
                        if( vm.retryCount >= 20 ) {
                            vm.showNoResult();
                        } 
                        else {
                            vm.retryCount++;
                            vm.sessionKey = r.RootObject.SessionKey;

                            setTimeout(function() {
                                vm.searchFlights()
                            }, 2000)
                        }
                      }
                    }
                    console.log(vm.responseObject);
                  },
                  error: function() {
                      
                  }
                })
            },
            filterFlights: function() {
                this.searchFlights();
            },
            showLoader: function() {
                $('.spinner').addClass('on');
            },
            hideLoader: function() {
                $('.spinner').removeClass('on');
            },
            showNoResult: function() {
                vm.sessionKey = "";
            },
            SkyFormatDate: function(d) {
              if( d == "")
                return "";

              var r = d.split("/"), 
                  n = new Date(r[2], r[1] - 1, r[0]);

              console.log(d, r, n);   
              var r = n.getFullYear(),
                i = (1 + n.getMonth()).toString(),
                t;
              return i = i.length > 1 ? i : "0" + i, t = n.getDate().toString(), t = t.length > 1 ? t : "0" + t, r + "-" + i + "-" + t
            },
            Sort: function(n, t, i) {
              return n.SearchResult = t == "duration" ? this.SortByDuration(n.SearchResult, i) : t == "airline" ? this.SortByAgent(n.SearchResult, i) : t == "departure" ? this.SortByDeparture(n.SearchResult, i) : t == "return" ? this.SortByReturn(n.SearchResult, i) : t == "stops" ? this.SortByStop(n.SearchResult, i) : this.SortByPrice(n.SearchResult, i), n
            },
            SortByDuration: function(n, t) {
              return n.sort(function(n, i) {
                var r, u;
                return t == "desc" ? (r = parseInt(n.inBoundDuration) + parseInt(n.outBoundDuration), u = parseInt(i.inBoundDuration) + parseInt(i.outBoundDuration), u - r) : (r = parseInt(n.inBoundDuration) + parseInt(n.outBoundDuration), u = parseInt(i.inBoundDuration) + parseInt(i.outBoundDuration), r - u)
              })
            },
            SortByStop: function(n, t) {
              return n.sort(function(n, i) {
                var r, u;
                return t == "desc" ? n.inBoundStopCount ? (r = parseInt(i.outBoundStopCount) + parseInt(i.inBoundStopCount), u = parseInt(n.outBoundStopCount) + parseInt(n.inBoundStopCount), r - u || parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice)) : parseInt(n.outBoundStopCount) - parseInt(i.outBoundStopCount) || parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice) : n.inBoundStopCount ? parseInt(n.outBoundStopCount) == 0 && parseInt(i.outBoundStopCount) == 0 && parseInt(n.inBoundStopCount) == 0 && parseInt(i.inBoundStopCount) == 0 ? parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice) : (r = parseInt(i.outBoundStopCount) + parseInt(i.inBoundStopCount), u = parseInt(n.outBoundStopCount) + parseInt(n.inBoundStopCount), u - r || parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice)) : parseInt(n.outBoundStopCount) == 0 && parseInt(i.outBoundStopCount) == 0 ? parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice) : parseInt(i.outBoundStopCount) - parseInt(n.outBoundStopCount) || parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice)
              })
            },
            SortByReturn: function(n, t) {
              return n.sort(function(n, i) {
                return t == "desc" ? new Date(i.inBoundDepartureTimeSort) - new Date(n.inBoundDepartureTimeSort) : new Date(n.inBoundDepartureTimeSort) - new Date(i.inBoundDepartureTimeSort)
              })
            },
            SortByDeparture: function(n, t) {
              return n.sort(function(n, i) {
                return t == "desc" ? new Date(i.outBoundDepartureTimeSort) - new Date(n.outBoundDepartureTimeSort) : new Date(n.outBoundDepartureTimeSort) - new Date(i.outBoundDepartureTimeSort)
              })
            },
            SortByPrice: function(n, t) {
              n = this.SortNestedItemsbyPrice(n, t);
              return n.sort(function(n, i) {
                return t == "desc" ? parseInt(i.AgentMaxPrice) - parseInt(n.AgentMaxPrice) : parseInt(n.AgentMinPrice) - parseInt(i.AgentMinPrice)
              })
            },
            SortNestedItemsbyPrice: function(n, t) {
              return $.each(n, function() {
                return this.agent.sort(function(n, i) {
                  return t == "desc" ? parseInt(i.price) - parseInt(n.price) : parseInt(n.price) - parseInt(i.price)
                })
              })
            },
            SortByAgent: function(n, t) {
              n = this.sortNestedItemsByAgent(n, t);
              return n.sort(function(n, i) {
                return t == "desc" ? i.AgentNameDESC.toLowerCase() < n.AgentNameDESC.toLowerCase() ? -1 : i.AgentNameDESC.toLowerCase() > n.AgentNameDESC.toLowerCase() ? 1 : 0 : n.AgentNameASC.toLowerCase() < i.AgentNameASC.toLowerCase() ? -1 : n.AgentNameASC.toLowerCase() > i.AgentNameASC.toLowerCase() ? 1 : 0
              })
            },
            sortNestedItemsByAgent: function(n, t) {
              return $.each(n, function() {
                return this.agent.sort(function(n, i) {
                  return t == "desc" ? i.agentName.toLowerCase() < n.agentName.toLowerCase() ? -1 : i.agentName.toLowerCase() > n.agentName.toLowerCase() ? 1 : 0 : n.agentName.toLowerCase() < i.agentName.toLowerCase() ? -1 : n.agentName.toLowerCase() > i.agentName.toLowerCase() ? 1 : 0
                })
              })
            },
        },
        mounted() {
            var vm = this;

            jQuery(document).ready(function($) {
                vm.searchFlights();

                var t = new Date,
                    n = new Date;

                $("#departureDate").datepicker({
                    minDate: t,
                    dateFormat: "dd/mm/yy",
                    onSelect: function() {
                      n = $(this).val();
                      n > $("#returnDate").val() ? ($("#returnDate").datepicker("option", "minDate", n), $("#returnDate").val("")) : $("#returnDate").datepicker("option", "minDate", n);
                      setTimeout(function() {
                        $("#returnDate").datepicker("show")
                      }, 100)
                    }
                });

                $("#returnDate").datepicker({
                  dateFormat: "dd/mm/yy",
                  minDate: $("#departureDate").val() != "" ? $("#departureDate").val() : n,
                  showButtonPanel: !0,
                  closeText: "Clear",
                  // onClose: function() {
                  //   var n = arguments.callee.caller.caller.arguments[0];
                  //   $(n.delegateTarget).hasClass("ui-datepicker-close") ? $(this).val("") : $(n.delegateTarget).hasClass("ui-datepicker-current") && $(this).val(new Date)
                  // }
                });
            }); 
        }
    }
</script>
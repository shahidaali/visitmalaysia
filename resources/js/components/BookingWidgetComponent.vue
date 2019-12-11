<template>
    <div class="booking_wrapper">
        <div class="booking_tabs clearfix">
        	<a href="javascript:void(0)" v-bind:class="{ active: (activeTab == 'flights') }">Flights</a>
        	<!-- <a href="javascript:void(0)" @click="changeTab('hotels')" v-bind:class="{ active: (activeTab == 'hotels') }">Hotels</a> -->
        </div>
        <div class="tab-content flights-tab clearfix" v-if="activeTab == 'flights'">
        	<div class="booking_controls_wrap clearfix">
                <div class="clearfix">
                    <div class="booking_from clearfix">
                        <flights-places-search-component
                              :places-search-path="placesSearchPath"
                              :currency="Settings.FlightCurrency"
                          /></flights-search-item-component>
                        <div class="travellers_cabin_field">
                            <input id="travellersCabinField" type="text" placeholder="1 Adult, Economy"  class="travellers_cabin_value" readonly="">
                            <!-- <label for="travellersCabinField" class="icon_down aaa-screenreader-hidden-Text"></label> -->
                        </div>
                    </div>   
                    <div class="booking_dates clearfix">
                        <label for="FlightWidgetFromDatePicker">
                            <span class="input-plus-icon"></span>
                            <input name="FlightWidgetFromDatePicker" type="text" readonly="readonly" id="FlightWidgetFromDatePicker" class="date_control flight-widget-datepicker flight-widget-fromdatepicker" title="Flight from date">
                            <div class="calendar_wrap">
                                <span id="widgetFlightCheckInMonth"></span>
                                <span id="widgetFlightCheckInDate"></span>
                                <span id="widgetFlightCheckInDay"></span>
                            </div>
                        </label>
                        <label for="FlightWidgetToDatePicker">
                            <span class="input-plus-icon"></span>
                            <input name="FlightWidgetToDatePicker" type="text" readonly="readonly" id="FlightWidgetToDatePicker" class="date_control flight-widget-datepicker flight-widget-todatepicker" title="Flight To Date">
                            <div class="calendar_wrap">
                                <span id="widgetFlightCheckOutMonth"></span>
                                <span id="widgetFlightCheckOutDate"></span>
                                <span id="widgetFlightCheckOutDay"></span>
                            </div>
                        </label>
                    </div>
                </div>
                <a id="flight_btnSearch" href="javascript:void(0);" class="booking_button" @click="SearchFlightBooking()">
                    <span class="fa fa-search"></span>
                </a>
            </div>
        </div>
        <div class="tab-content hotels-tab clearfix" v-if="activeTab == 'hotels'">
        	
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
            }
        },
    	data() {
            return {
                activeTab: "flights",
                Settings: {
                    Locale: 'en',
                    MinimumAdultPassenger: 1,
                    MaximumAdultPassenger: 8,
                    MinimumChildrenPassenger: 0,
                    MaximumChildrenPassenger: 8,
                    MaximumInfanAgeLimit: 1,
                    MinimumChildrenAgeLimit: '',
                    MaximumChildrenAgeLimit: 15,
                    LabelPassengerOnly: 'Adult',
                    LabelMultiplePassenger: 'Traveller',
                    FlightCurrency: 'AED',
                    FlightSettings: '{1676E78E-908D-44AC-8161-644CE49C33B6}',
                    FlightLanguageLocale: 'en',
                    SelectBoxNoResult: 'No Result Found',
                },

                // FlightS data
                hdnSourceAirport: 'ISBA-sky',
                SelectedDeparture: '',
                FlightDateFrom: '',
                FlightDateTo: '',
            }
        },
        methods: {
            changeTab: function(tab) {
            	this.activeTab = tab;
            },
            SkyFormatDate: function(n) {
                var r = n.getFullYear(),
                    i = (1 + n.getMonth()).toString(),
                    t;
                return i = i.length > 1 ? i : "0" + i, t = n.getDate().toString(), t = t.length > 1 ? t : "0" + t, r + "-" + i + "-" + t
            },
            ValidateEmptyString: function(n) {
                return n != null && n != "" && n.length > 0 ? !0 : !1
            },
            GetAdultTraveller: function() {
                return 1;

                return parseInt($("#travel-and-cabin-adult-passenger-count").val())
            },
            GetChildTraveller: function() {
                var vm = this;

                var t = parseInt($("#travel-and-cabin-children-passenger-count").val()),
                    n;
                return t < 1 ? t : (n = 0, $(".childAges .childNode:not(.hidden)").each(function() {
                    var t = $(this).find(".childAge").val();
                    t != null && t != undefined && parseInt(t) > vm.Settings.MaximumInfanAgeLimit && (n = n + 1)
                }), n)
            },
            GetChildAges: function() {
                var n = [];
                return $(".childAges .childNode:not(.hidden)").each(function() {
                    var t = $(this).find(".childAge").val();
                    t != null && t != undefined && n.push(t)
                }), n.join(",")
            },
            GetInfantTraveller: function() {
                var vm = this;

                var t = parseInt($("#travel-and-cabin-children-passenger-count").val()),
                    n;
                return t < 1 ? t : (n = 0, $(".childAges .childNode:not(.hidden)").each(function() {
                    var t = $(this).find(".childAge").val();
                    t != null && t != undefined && parseInt(t) <= vm.Settings.MaximumInfanAgeLimit && (n = n + 1)
                }), n)
            },
            TotalTravellers: function() {
                return vm.GetAdultTraveller() + vm.GetChildTraveller() + vm.GetInfantTraveller()
            },
            ValidateFlight: function() {
                var vm = this;

                var is_valid = 1;
                if($('#flightFromId').val() == "") {
                    $('#flightFrom').addClass('error');
                    is_valid = 0;
                } else {
                    $('#flightFrom').removeClass('error');
                }

                if($('#FlightWidgetFromDatePicker').val() == "") {
                    $('#FlightWidgetFromDatePicker').addClass('error');
                    is_valid = 0;
                } else {
                    $('#FlightWidgetFromDatePicker').removeClass('error');
                }

                if($('#FlightWidgetToDatePicker').val() == "") {
                    $('#FlightWidgetToDatePicker').addClass('error');
                    is_valid = 0;
                } else {
                    $('#FlightWidgetToDatePicker').removeClass('error');
                }
                
                return is_valid;
            },
            SearchFlightBooking: function() {
                var vm = this;

                var r, t, e, o, u, s, h, c, f, l;
                if (vm.ValidateFlight()) {
 
                    var n = vm.flightsSearchPath,
                        i = $(".flight-widget-fromdatepicker").val().toString().split("/"),
                        a = vm.SkyFormatDate(new Date(Number(i[2]), Number(i[0]) - 1, Number(i[1])));
                    n = n + "?departureDate=" + a;
                    r = $(".flight-widget-todatepicker").val();
                    vm.ValidateEmptyString(r) ? (t = r.toString().split("/"), e = vm.SkyFormatDate(new Date(Number(t[2]), Number(t[0]) - 1, Number(t[1]))), n = n + "&returnDate=" + e, n = n + "&trip=2") : n = n + "&trip=1";
                    n = n + "&currency=" + vm.Settings.FlightCurrency;
                    o = $('#flightFromPlace').val();
                    vm.ValidateEmptyString(o) && $('#flightFromId').val() && (n = n + "&sourceId=" + $('#flightFromId').val());
                    n = n + "&sourcePlace=" + o;
                    n = n + "&destinationId=DXBA-sky";
                    n = n + "&destination=Dubai, United Arab Emirates (DXB)";
                    u = $(".cabin_class").val();
                    vm.ValidateEmptyString(u) && (n = n + "&cabin=" + u);
                    s = vm.GetAdultTraveller();
                    n = n + "&passengers=" + s;
                    h = vm.GetChildTraveller();
                    n = n + "&children=" + h;
                    c = vm.GetInfantTraveller();
                    n = n + "&infants=" + c;
                    f = vm.GetChildAges();
                    vm.ValidateEmptyString(f) && (n = n + "&childAges=" + f);
                    l = window.open("", "_blank");
                    l.location = n
                }
            },
        },
        mounted() {
            var vm = this;

            jQuery(document).ready(function($) {

                $(".flight-widget-datepicker").datepicker({
                    dateFormat: "mm/dd/yy",
                    minDate: 0,
                    onSelect: function() {
                        var t, e;
                        if ($(".flight-widget-fromdatepicker").removeClass("error"), $(this).hasClass("flight-widget-fromdatepicker")) {
                            $(".flight-widget-todatepicker").datepicker("destroy");
                            $(".flight-widget-todatepicker").val("").text("");
                            $("#widgetFlightCheckOutDay").text("");
                            $("#widgetFlightCheckOutMonth").text("");
                            $("#widgetFlightCheckOutDate").text("");
                            $($(".flight-widget-todatepicker").prev(".input-plus-icon")).show();
                            t = $(".flight-widget-fromdatepicker").val().toString().split("/");
                            e = new Date(Number(t[2]), Number(t[0]) - 1, Number(t[1]) + 1);
                            $(".flight-widget-todatepicker").datepicker({
                                dateFormat: "mm/dd/yy",
                                minDate: e,
                                onSelect: function() {
                                    $(".flight-widget-todatepicker").removeClass("error");
                                    var n = $(this).datepicker("getDate"),
                                        t = $.datepicker.regional[ vm.Settings.Locale ].dayNames[n.getDay()],
                                        i = $.datepicker.regional[ vm.Settings.Locale ].monthNames[n.getMonth()],
                                        r = n.getDate();
                                    t || (t = $.datepicker.regional.en.dayNames[n.getDay()]);
                                    i || (i = $.datepicker.regional.en.monthNames[n.getMonth()]);
                                    $($(this).prev(".input-plus-icon")).hide();
                                    $("#widgetFlightCheckOutDay").text(t);
                                    $("#widgetFlightCheckOutMonth").text(i);
                                    $("#widgetFlightCheckOutDate").text(r)
                                }
                            });
                            setTimeout(function() {
                                $(".flight-widget-todatepicker").datepicker("show")
                            }, 200);
                            var n = $(this).datepicker("getDate"),
                                i = $.datepicker.regional[ vm.Settings.Locale ].dayNames[n.getDay()],
                                r = $.datepicker.regional[ vm.Settings.Locale ].monthNames[n.getMonth()],
                                o = n.getDate();
                            i || (i = $.datepicker.regional.en.dayNames[n.getDay()]);
                            r || (r = $.datepicker.regional.en.monthNames[n.getMonth()]);
                            $($(this).prev(".input-plus-icon")).hide();
                            $("#widgetFlightCheckInDay").text(i);
                            $("#widgetFlightCheckInMonth").text(r);
                            $("#widgetFlightCheckInDate").text(o)
                        } else if ($(this).hasClass("flight-widget-todatepicker")) {
                            $(".flight-widget-todatepicker").removeClass("error");
                            var n = $(this).datepicker("getDate"),
                                u = $.datepicker.regional[ vm.Settings.Locale ].dayNames[n.getDay()],
                                f = $.datepicker.regional[ vm.Settings.Locale ].monthNames[n.getMonth()],
                                s = n.getDate();
                            u || (u = $.datepicker.regional.en.dayNames[n.getDay()]);
                            f || (f = $.datepicker.regional.en.monthNames[n.getMonth()]);
                            $($(this).prev(".input-plus-icon")).hide();
                            $("#widgetFlightCheckOutDay").text(u);
                            $("#widgetFlightCheckOutMonth").text(f);
                            $("#widgetFlightCheckOutDate").text(s)
                        }
                    }
                });
            });

            // $(function() {
            //     var FlightSearchTimeout = null;

            //     if (!$("#flightFrom").hasClass("ui-autocomplete-input")) {
            //         $.widget("custom.catcomplete", $.ui.autocomplete, {
            //             _create: function() {
            //                 this._super();
            //                 this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            //                 this.widget().addClass("sw_autocomplete")
            //             },
            //             _renderMenu: function(n, t) {
            //                 var i = this;
            //                 $.each(t, function(t, r) {
            //                     var u, f = "",
            //                         e;
            //                     if (r.isCity && (f = "City"), r.country == "-sky") {
            //                         f = "Country";
            //                         return
            //                     }
            //                     u = i.__renderItemData(n, r, f);
            //                     r.category && (u.attr("aria-label", r.category + " : " + r.label), e = window.isRTLbool ? "padding-right:30px;" : "padding-left:30px;", u.attr("style", e))
            //                 })
            //             },
            //             __renderItemData: function(n, t, i) {
            //                 return this.__renderItem(n, t, i).data("ui-autocomplete-item", t)
            //             },
            //             __renderItem: function(n, t, i) {
            //                 return i == "Country" ? $("<li>").append($("<a>").html("<i class='fa fa-globe' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n) : i == "City" ? $("<li>").append($("<a>").html("<i class='fa fa-map-marker' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n) : $("<li>").append($("<a>").html("<i class='fa fa-plane' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n)
            //             }
            //         });
            //         var n = "",
            //             t = "";
            //         $("#flightFrom").catcomplete({
            //             classes: "highlight",
            //             delay: 0,
            //             select: function(n, t) {
            //                 vm.hdnSourceAirport = t.item.sourceAirport;
            //                 vm.SelectedDeparture = t.item.value;
            //                 $("#flightFrom").removeClass("error")
            //             },
            //             open: function() {
            //                 $("#flightFrom").removeClass("error")
            //             },
            //             source: function(i, r) {
            //                 if( (i.term).length < 3 )
            //                     return;

            //                 clearTimeout(FlightSearchTimeout);

            //                 FlightSearchTimeout = setTimeout(function(){
            //                     $.ajax({
            //                         url: vm.placesSearchPath,
            //                         dataType: "json",
            //                         data: {
            //                             searchQuery: i.term,
            //                             Currency: vm.Settings.FlightCurrency,
            //                             settingsID: vm.Settings.FlightSettings
            //                         },
            //                         success: function(i) {
            //                             n = "";
            //                             t = "";
            //                             var data = JSON.parse(i.data);
            //                             r($.map(data.Places, function(i) {
            //                                 if (!i.CityId || i.CityId != "DXBA-sky") return i.PlaceId == i.CityId ? (n = i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId + ")", t = i.CityId, {
            //                                     label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     isCity: !0,
            //                                     sourceAirport: i.PlaceId
            //                                 }) : i.CityId == t ? {
            //                                     label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     category: n,
            //                                     sourceAirport: i.PlaceId
            //                                 } : {
            //                                     label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
            //                                     country: i.CityId,
            //                                     sourceAirport: i.PlaceId
            //                                 }
            //                             }))
            //                         }
            //                     });
            //                 }, 1000);
                            
            //             },
            //             position: window.isRTLbool ? {
            //                 my: "right top",
            //                 at: "right bottom",
            //                 collision: "none"
            //             } : {}
            //         })
            //     }
            // });
        }
    }
</script>
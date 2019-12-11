<template>
    <div class="autocomplete-search">
        <input name="flightFrom" type="text" id="flightFrom" placeholder="City or airport of origin" class="flight-from" autocomplete="off" :value="defaultPlace">
        <span class="loader-icon"></span>
        <input type="hidden" name="flightFromId" id="flightFromId" :value="defaultId">
        <input type="hidden" name="flightFromPlace" id="flightFromPlace" :value="defaultPlace">
    </div>
</template>

<script>
    export default {
        props: {
            placesSearchPath: {
                type: String,
                default: '',
            },
            currency: {
                type: String,
                default: '',
            },
            defaultId: {
                type: String,
                default: '',
            },
            defaultPlace: {
                type: String,
                default: '',
            }
        },
    	  data() {
            return {
                timeOut: null,
                is_loading: false,
            }
        },
        methods: {

        },
        mounted() {
            var vm = this;
            jQuery(document).ready(function($) {
                if (!$("#flightFrom").hasClass("ui-autocomplete-input")) {
                    $.widget("custom.catcomplete", $.ui.autocomplete, {
                        _create: function() {
                            this._super();
                            this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                            this.widget().addClass("sw_autocomplete")
                        },
                        _renderMenu: function(n, t) {
                            var i = this;
                            $.each(t, function(t, r) {
                                var u, f = "",
                                    e;
                                if (r.isCity && (f = "City"), r.country == "-sky") {
                                    f = "Country";
                                    return
                                }
                                u = i.__renderItemData(n, r, f);
                                r.category && (u.attr("aria-label", r.category + " : " + r.label), e = window.isRTLbool ? "padding-right:30px;" : "padding-left:30px;", u.attr("style", e))
                            })
                        },
                        __renderItemData: function(n, t, i) {
                            return this.__renderItem(n, t, i).data("ui-autocomplete-item", t)
                        },
                        __renderItem: function(n, t, i) {
                            return i == "Country" ? $("<li>").append($("<a>").html("<i class='fa fa-globe' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n) : i == "City" ? $("<li>").append($("<a>").html("<i class='fa fa-map-marker' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n) : $("<li>").append($("<a>").html("<i class='fa fa-plane' aria-hidden='true'><\/i><span>" + t.label + "<\/span>")).appendTo(n)
                        }
                    });

                    var n = "",
                        t = "";
                    $("#flightFrom").catcomplete({
                        classes: "highlight",
                        delay: 0,
                        select: function(n, t) {
                            $('#flightFromId').val(t.item.sourceAirport);
                            $('#flightFromPlace').val(t.item.value);
                            $("#flightFrom").removeClass("error");
                        },
                        open: function() {
                            $("#flightFrom").removeClass("error")
                        },
                        source: function(i, r) {
                            if( (i.term).length < 3 )
                                return;

                            clearTimeout(vm.timeOut);

                            $('.loader-icon').addClass('show');
                            vm.timeOut = setTimeout(function(){
                                $.ajax({
                                    url: vm.placesSearchPath,
                                    dataType: "json",
                                    data: {
                                        searchQuery: i.term,
                                        Currency: vm.currency,
                                    },
                                    success: function(i) {
                                        n = "";
                                        t = "";
                                        var data = JSON.parse(i.data);
                                        r($.map(data.Places, function(i) {
                                            if (!i.CityId || i.CityId != "DXBA-sky") return i.PlaceId == i.CityId ? (n = i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId + ")", t = i.CityId, {
                                                label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                isCity: !0,
                                                sourceAirport: i.PlaceId
                                            }) : i.CityId == t ? {
                                                label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                category: n,
                                                sourceAirport: i.PlaceId
                                            } : {
                                                label: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                value: i.PlaceName + ", " + i.CountryName + " (" + i.PlaceId.replace("-sky", "") + ")",
                                                country: i.CityId,
                                                sourceAirport: i.PlaceId
                                            }
                                        }));

                                        $('.loader-icon').removeClass('show');
                                    }
                                });
                            }, 1000);
                            
                        },
                        position: window.isRTLbool ? {
                            my: "right top",
                            at: "right bottom",
                            collision: "none"
                        } : {}
                    });
                }
            }); 
        },
        filters: {
          commaFormat: function (value) {
            return Number((value).toFixed(2)).toLocaleString();
          }
        }
    }
</script>
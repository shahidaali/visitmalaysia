<template>
    <li class="vdf_item_card fs-cardItem" data-toggle="modal" data-target="#flight_info">
        <article class="vdf_flight_search_item">
            <div class="vdf_flight_airline_mob">
                <img v-if="item.OutBoundFlightLogo" :src="item.OutBoundFlightLogo" data-toggle="tooltip" class="tt_top" :title="item.OutBoundFlightName" :alt="item.OutBoundFlightName" :data-name="item.OutBoundFlightName">
                <span v-if="!item.OutBoundFlightLogo"  class="flight_name" v-html="item.OutBoundFlightName"></span>
                +
                <img :src="item.InBoundFlightLogo" :alt="item.InBoundFlightName" data-toggle="tooltip" class="tt_top" :title="item.InBoundFlightName" :data-name="item.InBoundFlightName" />
                <span v-if="!item.InBoundFlightLogo" class="flight_name" v-html="item.InBoundFlightName"></span>
            </div>

            <div class="vdf_flight_maindetails">
                <div class="vdf_flight_mainquote_table">
                    <div class="vdf_flight_mainquote_table_cell">
                        <section class="vdf_flight_one_side clearfix">
                            <div class="vdf_flight_airline">
                                <img :src="item.OutBoundFlightLogo" :title="item.OutBoundFlightName" data-toggle="tooltip" class="tt_top" :alt="item.OutBoundFlightName" :data-name="item.OutBoundFlightName">
                                <span v-if="!item.OutBoundFlightName" class="flight_name" v-html="item.OutBoundFlightName"></span>
                            </div>

                            <div class="vdf_flight_depart_time">
                                <div class="time_table_cell">
                                    <div class="depart_time">{{ item.outBoundDepartureTime }}</div>
                                    <div class="start_airport tt_top" :title="item.outBoundOriginStationWithCode">{{ item.outBoundOriginStation }}</div>
                                </div>
                            </div>

                            <div class="vdf_flight_stops">
                                <div class="time_table_cell">
                                    <span class="duration">{{ item.outBoundDurationString }}</span>
                                    <ul class="stop-line" v-html="item.outBoundStopsli">
                                    </ul>
                                    <div class="stops">
                                        <span v-if="item.IsoutBoundDirect">Direct</span>
                                        <span v-else>{{ item.outBoundStopCount }} Stop</span>
                                        <span v-html="item.OutBoundStopName"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="vdf_flight_arrive_time">
                                <div class="time_table_cell">
                                    <div class="arrive_time">
                                        {{ item.outBoundArrivalTime }}
                                        <span v-if="item.outBoundJourneyDays" class="tt_top" data-toggle="tooltip" :title="item.outBoundArrivesOnDay">{{ item.outBoundJourneyDays }}</span>
                                    </div>
                                    <div class="ends_airport tt_top" :title="item.outBoundDestationStationWithCode">{{ item.outBoundDestationStation }}</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </section>

                        <section v-if="responseObject.IsRountTrip" class="vdf_flight_one_side via_return clearfix">
                            <div class="vdf_flight_airline">
                                <img :src="item.InBoundFlightLogo" :alt="item.InBoundFlightName" data-toggle="tooltip" class="tt_top" :title="item.InBoundFlightName" :data-name="item.InBoundFlightName" />
                                <span v-if="!item.InBoundFlightName" class="flight_name" v-html="item.InBoundFlightName"></span>
                            </div>

                            <div class="vdf_flight_depart_time">
                                <div class="time_table_cell">
                                    <div class="depart_time">{{ item.inBoundDepartureTime }}</div>
                                    <div class="start_airport tt_top" :title="item.inBoundOriginStationWithCode">{{ item.inBoundOriginStation }}</div>
                                </div>
                            </div>

                            <div class="vdf_flight_stops">
                                <div class="time_table_cell">
                                    <span class="duration">{{ item.inBoundDurationString }}</span>

                                    <ul class="stop-line" v-html="item.inBoundStopsli">

                                    </ul>
                                    <div class="stops">
                                        <span v-if="item.IsinBoundDirect">Direct</span>
                                        <span v-else>{{ item.inBoundStopCount }} Stop</span>
                                        <span v-html="item.InBoundStopName"></span>
                                    </div>

                                    
                                </div>
                            </div>

                            <div class="vdf_flight_arrive_time">
                                <div class="time_table_cell">
                                    <div class="arrive_time">
                                        {{ item.inBoundArrivalTime }}
                                        <span v-if="item.inBoundJourneyDays" class="tt_top" data-toggle="tooltip" :title="item.inBoundArrivesOnDay">{{ item.inBoundJourneyDays }}</span>
                                    </div>
                                    <div class="ends_airport tt_top" :title="item.inBoundDestationStationWithCode">{{ item.inBoundDestationStation }}</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="vdf_flight_card_price">
                <div class="vdf_flight_mainquote">
                    <div class="vdf_flight_mainquote_table">
                        <div class="vdf_flight_mainquote_table_cell">
                            <div class="mainquote-deals">
                                {{ responseObject.CurrencySymbol }} {{ item.agent[0].price | commaFormat }}
                            </div>
                            <a :href="item.agent[0].deepLinkURL" target="_blank" rel="nofollow" class="button_select_flight">Select flight</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </li>
</template>

<script>
    export default {
        props: {
            item: {
                type: Object,
                default: {},
            },
            responseObject: {
                type: Object,
                default: {},
            },
        },
    	  data() {
            return {

            }
        },
        methods: {
            GetAdultTraveller: function() {
                return 1;
            },    
        },
        mounted() {
            var vm = this;
            jQuery(document).ready(function($) {
                
            }); 
        },
        filters: {
          commaFormat: function (value) {
            return Number((value).toFixed(2)).toLocaleString();
          }
        }
    }
</script>
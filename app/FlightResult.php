<?php
namespace App;

use Illuminate\Support\Arr;

class FlightResult 
{
    private $data = null;

    public function __construct( $data ) {
        $this->data = $data;
    }

    public function __get( $key ) {
        return $this->data->{$key};
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formatRow( $Itinerary )
    {
        // Gte Pricing Options
        $PricingOptions = array_values(Arr::sort($Itinerary->PricingOptions, function ($value) {
            return $value->Price;
        }));
        $MinPricingOption = Arr::first($PricingOptions);
        $MaxPricingOption = Arr::last($PricingOptions);

        // Agents
        $MinPriceAgent = $this->filterItem($this->Agents, $MinPricingOption->Agents[0]);
        $Agents[] = [
            'price' => $this->formatPrice($MinPricingOption->Price),
            'agentName' => $MinPriceAgent->Name,
            'ImageUrl' => $MinPriceAgent->ImageUrl,
            'deepLinkURL' => $MinPricingOption->DeeplinkUrl,
        ];
        if( $MinPricingOption->Agents[0] != $MaxPricingOption->Agents[0] ) {
            $MaxPriceAgent = $this->filterItem($this->Agents, $MaxPricingOption->Agents[0]);
            $Agents[] = [
                'price' => $this->formatPrice($MaxPricingOption->Price),
                'agentName' => $MaxPriceAgent->Name,
                'ImageUrl' => $MaxPriceAgent->ImageUrl,
                'deepLinkURL' => $MaxPricingOption->DeeplinkUrl,
            ];
        }

        // Get Legs
        $InboundLeg = $this->filterItem($this->Legs, $Itinerary->InboundLegId);
        $OutboundLeg = $this->filterItem($this->Legs, $Itinerary->OutboundLegId);

        // Get Carriers
        $InBoundCarriers = $this->filterItems($this->Carriers, $InboundLeg->Carriers);
        $OutBoundCarriers = $this->filterItems($this->Carriers, $OutboundLeg->Carriers);
        $InBoundCarrierFirst = Arr::first($InBoundCarriers);
        $OutBoundCarrierFirst = Arr::first($OutBoundCarriers);

        // Carrier Names
        $InBoundCarrierNames = [];
        foreach ($InBoundCarriers as $Carrier) {
            $InBoundCarrierNames[] = '<label>'. $Carrier->Name .'</label>';
        }

        // Carrier Names
        $OutBoundCarrierNames = [];
        foreach ($OutBoundCarriers as $Carrier) {
            $OutBoundCarrierNames[] = '<label>'. $Carrier->Name .'</label>';
        }

        // Stops
        $InBoundStops = $this->filterItems($this->Places, $InboundLeg->Stops);
        $OutBoundStops = $this->filterItems($this->Places, $OutboundLeg->Stops);
        // Stop Names
        $InBoundStopNames = [];
        foreach ($InBoundStops as $Stop) {
            $InBoundStopNames[] = "<span class='tt_top' title='".$Stop->Name." (".$Stop->Code.")'>". $Stop->Code ."</label>";
        }
        // Stop Names
        $OutBoundStopNames = [];
        foreach ($OutBoundStops as $Stop) {
            $OutBoundStopNames[] = "<span class='tt_top' title='".$Stop->Name." (".$Stop->Code.")'>". $Stop->Code ."</label>";
        }

        // Stations
        $InBoundOriginStation = $this->filterItem($this->Places, $InboundLeg->OriginStation);
        $InBoundDestinationStation = $this->filterItem($this->Places, $InboundLeg->DestinationStation);
        $OutBoundOriginStation = $this->filterItem($this->Places, $OutboundLeg->OriginStation);
        $OutBoundDestinationStation = $this->filterItem($this->Places, $OutboundLeg->DestinationStation);

        $agent = [];

        $SearchItem = [
            'AgentMinPrice' => $this->formatPrice($MinPricingOption->Price),
            'AgentMaxPrice' => $this->formatPrice($MaxPricingOption->Price),
            'AgentNameASC' => $InBoundCarrierFirst->Name,
            'AgentNameDESC' => $InBoundCarrierFirst->Name,

            // InBound
            'InBoundFlightLogo' => count($InBoundCarriers) > 0 ? $InBoundCarrierFirst->ImageUrl : null,
            'InBoundFlightName' => implode(" + ", $InBoundCarrierNames),
            'InBoundStopName' => implode("<span class='flight_stop_comma'>,</span>", $InBoundStopNames),
            'inBoundLegId' => $Itinerary->InboundLegId,
            'inBoundOriginStation' => $this->getVal($InBoundOriginStation, "Code", ""),
            'inBoundOriginStationWithCode' => $this->getVal($InBoundOriginStation, "Name", "") . ' ('. $this->getVal($InBoundOriginStation, "Code", "") .')',
            'inBoundDestationStation' => $this->getVal($InBoundDestinationStation, 'Code', ''),
            'inBoundDestationStationWithCode' => $this->getVal($InBoundDestinationStation, "Name", "") . ' ('. $this->getVal($InBoundDestinationStation, 'Code', '') .')',
            'inBoundDepartureTime' => date('H:i', strtotime($OutboundLeg->Departure)),
            'inBoundDepartureTimeSort' => date('D d M Y H:i ', strtotime($OutboundLeg->Departure)),
            'inBoundArrivalTime' => date('H:i', strtotime($OutboundLeg->Arrival)),
            'inBoundArrivalTimeSort' => date('D d M Y H:i ', strtotime($OutboundLeg->Arrival)),
            'inBoundStopCount' => count($InBoundStops),
            'inBoundDuration' => $OutboundLeg->Duration,
            'inBoundDurationString' => $this->convertToHours($OutboundLeg->Duration),
            'inBoundDeparture24HoursTime' => date('H:i', strtotime($OutboundLeg->Departure)),
            'inBoundArrival24HoursTime' => date('H:i', strtotime($OutboundLeg->Arrival)),
            'IsinBoundDirect' => (count($InBoundStops) > 0) ? false : true,
            'IsinBoundStop' => (count($InBoundStops) > 0) ? true : false,
            'IsinBoundTwoStop' => (count($InBoundStops) > 1) ? true : false,
            'inBoundPopUpDate' => date('D, M d, Y', strtotime($OutboundLeg->Departure)),
            'InBoundCarriers' => $InBoundCarriers,
            'inBoundArrivesOnDay' => date('l, d F, Y', strtotime($OutboundLeg->Arrival)),
            'inBoundJourneyDays' => $this->journeyDays($OutboundLeg->Duration),
            'inBoundStopsli' => str_repeat("<li></li>", count($InBoundStops)),

            // Outbound
            'OutBoundFlightLogo' => count($OutBoundCarriers) > 0 ? $OutBoundCarrierFirst->ImageUrl : null,
            'OutBoundFlightName' => implode(" + ", $OutBoundCarrierNames),
            'OutBoundStopName' => implode("<span class='flight_stop_comma'>,</span>", $OutBoundStopNames),
            'outBoundLegId' => $Itinerary->OutboundLegId,
            'outBoundOriginStation' => $this->getVal($OutBoundOriginStation, "Code", ""),
            'outBoundOriginStationWithCode' => $this->getVal($OutBoundOriginStation, "Name", "") . ' ('. $this->getVal($OutBoundOriginStation, "Code", "") .')',
            'outBoundDestationStation' => $this->getVal($OutBoundDestinationStation, "Code", ""),
            'outBoundDestationStationWithCode' => $this->getVal($OutBoundDestinationStation, "Name", "") . ' ('. $this->getVal($OutBoundDestinationStation, "Code", "") .')',
            'outBoundDepartureTime' => date('H:i', strtotime($OutboundLeg->Departure)),
            'outBoundDepartureTimeSort' => date('D d M Y H:i ', strtotime($OutboundLeg->Departure)),
            'outBoundArrivalTime' => date('H:i', strtotime($OutboundLeg->Arrival)),
            'outBoundArrivalTimeSort' => date('D d M Y H:i ', strtotime($OutboundLeg->Arrival)),
            'outBoundStopCount' => count($OutBoundStops),
            'outBoundDuration' => $OutboundLeg->Duration,
            'outBoundDurationString' => $this->convertToHours($OutboundLeg->Duration),
            'outBoundDeparture24HoursTime' => date('H:i', strtotime($OutboundLeg->Departure)),
            'outBoundArrival24HoursTime' => date('H:i', strtotime($OutboundLeg->Arrival)),
            'IsoutBoundDirect' => (count($OutBoundStops) > 0) ? false : true,
            'IsoutBoundStop' => (count($OutBoundStops) > 0) ? true : false,
            'IsoutBoundTwoStop' => (count($OutBoundStops) > 1) ? true : false,
            'outBoundPopUpDate' => date('D, M d, Y', strtotime($OutboundLeg->Departure)),
            'OutBoundCarriers' => $OutBoundCarriers,
            'outBoundArrivesOnDay' => date('l, d F, Y', strtotime($OutboundLeg->Arrival)),
            'outBoundJourneyDays' => $this->journeyDays($OutboundLeg->Duration),
            'outBoundStopsli' => str_repeat("<li></li>", count($OutBoundStops)),

            'agent' => $Agents,
        ];

        return $SearchItem;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getVal($object, $prop, $default = null)
    {
        return isset($object->{$prop}) ? $object->{$prop} : $default;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formatRows()
    {
        $SearchResult = [];
        foreach ($this->Itineraries as $key => $Itinerary) 
        {
            $SearchResult[] = $this->formatRow($Itinerary);
        }
        return $SearchResult;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getResults()
    {
        $Query = $this->Query;
        $SearchResult = $this->formatRows();

        $Passenger = [];
        if($Query->Adults) {
            $Passenger[] = $Query->Adults . ' Adults';
        }
        if($Query->Children) {
            $Passenger[] = $Query->Children . ' Children';
        }
        if($Query->Infants) {
            $Passenger[] = $Query->Infants . ' Infants';
        }

        $fomated = [
            'FlightType' => 'RT',
            'Currency' => $Query->Currency,
            'CurrencySymbol' => $Query->Currency,
            'IsRountTrip' => 1,
            'CabinClass' => ucfirst($Query->CabinClass),
            'Passenger' => implode(", ", $Passenger),
            'RootObject' => $this->data,
            'Filters' => [
                'Agents' => [
                    'Airblue',
                    'Bravofly',
                    'eDreams',
                ],
                'MinPrice' => '1590',
                'MaxPrice' => '5193',
                'InBoundMinDuration' => '180',
                'InBoundMaxDuration' => '1920',
                'OutBoundMinDuration' => '366',
                'OutBoundMaxDuration' => '1395',
            ],
            'SearchResult' => $SearchResult
        ];

        return $fomated;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterItem( $array, $value, $by = 'Id' )
    {
        foreach ($array as $key => $item) {
            if( $item->{$by} == $value ) {
                return $item;
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterItems( $array, $values, $by = 'Id' )
    {
        $result = Arr::where($array, function ($item, $key) use ($values, $by) {
            return in_array($item->{$by}, $values);
        });

        return array_values($result);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function convertToHours($time) {
        if ($time < 1) {
            return;
        }


        $hours = floor($time / 60);
        $minutes = ($time % 60);

        $output = $hours . "h";
        if( $minutes > 0 ) {
           $output .= " " . $minutes . "m"; 
        }
        return $output;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function journeyDays($time) {
        if ($time < 1) {
            return;
        }

        $hours = floor($time / 60);
        $days = floor($hours / 12);
        return ($days > 0) ? '(+'.$days.')' : null;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formatPrice($price) {
        return intval($price);
    }
}

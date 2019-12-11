@extends('layouts.app', ['body_classes' => 'flights-search-page'])

@section('content')
	<div class="container">
		<flights-search-component
			flights-search-path="{{ route('flights.search_flights') }}"
	    	places-search-path="{{ route('flights.places.search') }}"
	    	flight-type="{{ $filters['flightType'] }}"
	    	flight-to="{{ $filters['flightTo'] }}"
	    	departure-date="{{ $filters['departureDateInput'] }}"
	    	return-date="{{ $filters['returnDateInput'] }}"
	    	currency="{{ $filters['currency'] }}"
	    	source-id="{{ $filters['sourceId'] }}"
	    	source-place="{{ $filters['sourcePlace'] }}"
	    	destination-id="{{ $filters['destinationId'] }}"
	    	destination="{{ $filters['destination'] }}"
	    	cabin="{{ $filters['cabin'] }}"
	    	:passengers="{{ $filters['passengers'] }}"
	    	:children="{{ $filters['children'] }}"
	    	:infants="{{ $filters['infants'] }}"
		></flights-search-component>
	</div>
@endsection

@section('javascript')

@endsection
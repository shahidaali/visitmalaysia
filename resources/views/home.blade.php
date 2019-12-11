@extends('layouts.app')

@section('content')
	<div class="container">
	    @include('category.category-grid')

	    <booking-widget-component
	    	flights-search-path="{{ route('flights.search') }}"
	    	places-search-path="{{ route('flights.places.search') }}"
	    ></booking-widget-component>
	</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="container-content">
		<div class="content__snippet">
			<h1>{{ $page->title }}</h1>
			<div class="content__snippet-text">
				{!! $page->body !!}
			</div>
		</div>
	</div>
</div>
@endsection

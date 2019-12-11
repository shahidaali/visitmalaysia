<section class="chip__item clearfix">
	<a href="{{ $post->permalink() }}" class="chip__item-link"></a>
	<div class="chip__item-trans"></div>
	<div class="chip__item-bg">
		@if(!empty($post->image))
			<img src="{{ Voyager::image($post->thumbnail('tile')) }}" alt="{{ $post->title }}">
		@endif
	</div>

	<div class="chip__item-content">
		<div class="chip__item-text">
			@if(!empty($post->tagline_title) && !empty($post->tagline_link))
				<div class="chip__item-tag">
					<a href="{{ $post->tagline_link }}">{{ $post->tagline_title }}</a>
				</div>
			@endif
			<div class="chip__item-heading">
				<h2>{{ $post->title }}</h2>
				<h3>{{ $post->title_small }}</h3>
			</div>
		</div>
	</div>
</section>


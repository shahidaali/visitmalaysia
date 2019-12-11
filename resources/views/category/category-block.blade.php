<section class="content__panel clearfix">
	<div class="content__panel-bg">
		@if(!empty($category->image))
			<img src="{{ Voyager::image($category->image) }}" alt="{{ $category->title }}">
		@endif
	</div>

	<div class="content__panel-content">
		<div class="content__panel-text">
			<h2 class="heading">{{ $category->name }}</h2>

			@if($category->tag_icon != "")
				<div class="content__panel-tag">
					<img src="{{ Voyager::image($category->tag_icon) }}">
				</div>
			@endif
		</div>

		<div class="content__panel-chips">
			@foreach ($category->posts()->limit(3)->get() as $key => $post)
				@include('category.category-block-item')
			@endforeach	
		</div>
	</div>
</section>


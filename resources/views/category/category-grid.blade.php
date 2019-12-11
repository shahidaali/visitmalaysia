<div class="category-section-grid clearfix">
	@foreach ($categories as $key => $category)
		@include('category.category-block')
	@endforeach
</div>
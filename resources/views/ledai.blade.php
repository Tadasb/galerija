@extends('layouts.main')
@section('title', 'Ledai')
@section('content')
<div class="row pb-4">
	<div class="col text-center">
		@if(isset($page->data) && $page->data->text)
			<h2 class="p-3 page-text">{!!$page->data->text!!}</h2>
		@endif
	</div>
</div>

<div class="row">

	@foreach($page->data->images as $image)
	<div class="col-sm-4">
		<img v-img:nuoma src="{{$image->url}}" alt="">
	</div>
	@endforeach
</div>
@endsection

@section('scripts')
@include('layouts.vue')
@endsection
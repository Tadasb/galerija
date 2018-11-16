@extends('layouts.main')
@section('title', 'Fotografija')
@section('content')
<div class="row pb-4">
	<div class="col text-center">
		@if(isset($page->data) && $page->data->text)
			<div class="p-3 page-text">{!!$page->data->text!!}</div>
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
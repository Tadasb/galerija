@extends('layouts.main')
@section('title', 'Ledai')
@section('content')
<div class="row py-4">
	<div class="col">
		@if(isset($page->data) && $page->data->text)
			<div class="page-text">{!!$page->data->text!!}</div>
		@endif
	</div>
</div>

<div class="row">

	@foreach($page->data->images as $image)
	<div class="col-sm-4 pb-4">
		<img v-img:nuoma src="{{$image->url}}" alt="">
	</div>
	@endforeach
</div>
@endsection

@section('scripts')
@include('layouts.vue')
@endsection
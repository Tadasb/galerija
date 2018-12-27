@extends('layouts.main')
@section('title', 'Meniu')
@section('content')
<div class="row pb-4">
	<div class="col">
		@if(isset($page->data) && $page->data->text)
			<div class="page-text py-4">{!!$page->data->text!!}</div>
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
@extends('layouts.main')

@section('content')
<div class="row p-5">
	<div class="col">
		@if(isset($page) && $page->data)
		{{$page->data->text}}

		@endif
	</div>
</div>

<div class="row p-3">

	@foreach($page->data->images as $image)
	<div class="col">
		<img v-img:nuoma src="{{env('APP_URL') . $image->url}}" alt="">
	</div>
	@endforeach
</div>
@endsection
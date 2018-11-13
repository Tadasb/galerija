@extends('layouts.main')
@section('title'){{$renginys->name}}@endsection
@section('content')

<div class="row">
	<div class="col-sm-6">
		<h1>{{$renginys->name}}</h1>
		<div class="py-4">
			{!!$renginys->description!!}
		</div>
	</div>
	<div class="col-sm-6">
		@if(data_get($renginys, 'data.images.0'))
		<img class="img-fluid" src="{{$renginys->data->images[0]->url}}" alt="">
		@endif
	</div>
</div>

@endsection


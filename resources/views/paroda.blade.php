@extends('layouts.main')
@section('title'){{$paroda->name}}@endsection
@section('content')

<div class="row">
	<div class="col-sm-6">
		<h1>{{$paroda->name}}</h1>
		<div class="py-4">
			{!!$paroda->description!!}
		</div>
	</div>
	<div class="col-sm-6">
		@if(data_get($paroda, 'data.images.0'))
		<img class="img-fluid" src="{{$paroda->data->images[0]->url}}" alt="">
		@endif
	</div>
</div>

@endsection


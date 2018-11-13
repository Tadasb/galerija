@extends('layouts.main')
@section('title'){{$dirbtuve->name}}@endsection
@section('content')

<div class="row">
	<div class="col-sm-6">
		<h1>{{$dirbtuve->name}}</h1>
		<div class="py-4">
			{!!$dirbtuve->description!!}
		</div>
	</div>
	<div class="col-sm-6">
		@if(data_get($dirbtuve, 'data.images.0'))
		<img class="img-fluid" src="{{$dirbtuve->data->images[0]->url}}" alt="">
		@endif
	</div>
</div>

@endsection

